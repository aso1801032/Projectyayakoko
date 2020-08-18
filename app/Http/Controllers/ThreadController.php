<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\comment;
use App\Thread;
use App\tag;
use Illuminate\Support\Facades\Hash;
use Threads;


class ThreadController extends Controller
{
    //
    public function detail(){
        $detail = $_GET['thread'];
        $tag = tag::get();
        $thread = Thread::find($detail);
        $data = [
            "detail" => $detail,
            "thread" => $thread,
            "tag" => $tag
        ];
        //var_dump($comment);
        return view('thread.comment',$data);
    }

    public function send(CommentRequest $req){
        $py = app()->make("App\Http\Controllers\PythonController");
        if(isset($req->comment)){
            $comment = new comment;
            $name = Thread::firstWhere('id',$req->thread);
            if(isset($req->name)){
                $username=$req->name;
            }else{
                $username = $name->username;
            }
            $num = count(comment::where('thread_id',$req->thread)->get())+1;
            $com = nl2br($req->comment);
            $py->text($username);
            $username = $py->change();//username置換
            $py->text($com);
            $com = $py->change();//comment置換
            $data = [
                'comment' => $com,
                'thread_id' => $req->thread,
                'thread_num' => $num,
                'name' => $username,
                'use_id' => substr(Hash::make($req->ip()),0,8),
                'high_rating' => 0,
                'low_rating' => 0,
                'hide_setting' => false,
            ];
            $comment->fill($data)->save();
            $name->com_sum = $num;
            $name -> save();
            echo '成功';
        }
    }

    public function get(){
        $detail = $_GET['thread'];
        $thread = Thread::with('comment')->where('id',$detail)->get();
        $data = [
            "thread" => $thread,
        ];
        return response()->json($data);
    }

    public function high(Request $req){
        $comment = comment::find($req->high_rating);
        $comment->high_rating += 1;
        $comment->save();
        $id = $comment->com_num;
        echo $id;
    }

    public function low(Request $req){
        $comment = comment::find($req->low_rating);
        $comment->low_rating += 1;
        $comment->save();
        $id = $comment->com_num;
        echo $id;
    }

    public function index(){
        return view("user.index");
    }

    public function home(){
        $tag = tag::get();
        $data = thread::get();
    
        return view("user.home")->with([
            "tag"=>$tag,
            "data"=>$data,
        ]);
    }

    public function comment(){
        return view("user.comment");
    }

    public function search(Request $req){
        $tag = tag::get();
        $search=$req->search;
        $query =thread::query();
        if(!empty($search)) {
            $query->where('title', 'like', '%'.$search.'%');
        }
        $data = $query->get();
        return view("user.home")->with([
            "tag"=>$tag,
            "data"=>$data,
        ]);
    }

    public function make(){
        $tag = tag::get();

        return view("newthread")->with([
            "tag"=>$tag,
        ]);
    }

    public function makesend(Request $req){
        $tags = tag::where('name',$req->tag_name)->get();
        if(0==count($tags)){
            $tag=new tag;
            $tag->name=$req->tag_name;
            $tag->save();

        }else{
            $tag = $tags[0];
        }
        $py = app()->make("App\Http\Controllers\PythonController");
        $thread=new thread;
        $py->text($req->title);
        $reqtitle = $py->change();//title置換
        $thread->title=$reqtitle;
        $py->text($req->content);
        $reqcontent = $py->change();//conetnt置換
        $thread->content=$reqcontent;
        $thread->tag_id=$tag->id;
        $thread->username=$req->username;
        $thread->save();


        
        return \redirect('/home');
    }
}

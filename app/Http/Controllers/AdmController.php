<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\User;

class AdmController extends Controller
{

    public function home(){
        return view("admin.home");
    }

    public function delete(Request $req){
        User::destroy($req->id);
        return redirect("login");
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $table = 'threads';
    protected $guarded = ['id'];

    public function comment(){
        return $this->hasmany('App\Comment','thread_id');
    }

    public function tag(){
        return $this->belongsTo('App\tag');
    }
}

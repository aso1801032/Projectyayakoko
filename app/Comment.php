<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $primaryKey = 'com_num';
    protected $guarded = ['com_num'];
    public $timestamps = false;

    public function thread(){
        return $this->hasOne('App\Thread','id');
    }
}

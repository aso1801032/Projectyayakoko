<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    //
    protected $table = 'admins';
    public $incrementing = false;
    protected $fillable = ['id',"password"];

    public function _login($request)
    {
        if(\Auth::attempt([
            'id'    => $request->id,
            'password' => $request->password
        ]))
        {
            return [
                'success' => true
            ];
        }
        else
        {
            return [
                'success' => false
            ];
        }
    }
}

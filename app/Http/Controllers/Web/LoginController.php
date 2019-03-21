<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;

class LoginController extends Controller{
    public function login(){
        return view('login.login');
    }
    public function loginadd(){

    }
}
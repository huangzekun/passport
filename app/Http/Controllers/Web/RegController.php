<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;

class RegController extends Controller{

    public function reg(){
        return view('reg.reg');
    }
    public function regadd(){
        echo 'OK';
    }
}
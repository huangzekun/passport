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
        $data=$_POST;
        $pwd=password_verify($data['user_pwd'],PASSWORD_BCRYPT);
        $info=[
            'user_name'=>$data['user_name'],
            'user_pwd'=>$pwd,
            'user_tel'=>$data['user_tel'],
            'register_time'=>time()
        ];
        $model=UserModel::insertGetId($info);
        if($model){
            $token=substr(md5(time().mt_rand(1,99999)),10,10);
            setcookie('uid',$model,time()+86400,'/','anjingdehua.cn',false,true);
            setcookie('token',$token,time()+86400,'/','anjingdehua.cn',false,true);
            request()->session()->put('uid',$model);
            request()->session()->put('u_token',$token);
            //header('refresh:2,/center');
            echo '注册成功';
        }else{
            header('refresh:2,/reg');
            echo '注册失败';
        }
    }
}
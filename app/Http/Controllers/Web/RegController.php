<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;

class RegController extends Controller{

    public function reg(){
        $url=$_GET['url'];
        $data=[
            'url'=>$url
        ];
        return view('reg.reg',$data);
    }
    public function regadd(){
        $data=$_POST;
        $pwd=password_hash($data['user_pwd'],PASSWORD_BCRYPT);
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
            $key="str:u:token:web:".$model['user_id'];
            Redis::set($key,$token);
            Redis::setTimeout($key,86400);
            header('refresh:2,'.$data['url']);
            echo '注册成功';
        }else{
            header('refresh:2,/reg');
            echo '注册失败';
        }
    }
}
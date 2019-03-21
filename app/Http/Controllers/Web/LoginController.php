<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\UserModel;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller{
    public function login(){
        $url=$_GET['url'];
        $data=[
            'url'=>$url
        ];
        return view('login.login',$data);
    }
    public function loginadd(){
        $data=$_POST;
        $model=UserModel::where(['user_name'=>$data['user_name']])->first();
        if($model){
            $pwd=password_verify($data['user_pwd'],$model['user_pwd']);
            if($pwd==true){
                $token=substr(md5(time().mt_rand(1,99999)),10,10);
                setcookie('uid',$model['user_id'],time()+86400,'/','anjingdehua.cn',false,true);
                setcookie('token',$token,time()+86400,'/','anjingdehua.cn',false,true);
                request()->session()->put('uid',$model['user_id']);
                request()->session()->put('u_token',$token);
                $key="str:u:token:web:".$model['user_id'];
                Redis::set($key,$token);
                Redis::setTimeout($key,86400);
                header("Refresh:2,url=".$data['url']);
                echo '登陆成功';
            }else{
                header('refresh:2,/login');
                echo '登录失败';
            }
        }else{
            echo '用户名有误';
            header('refresh:2,/login');
        }
    }
}
<?php
namespace app\controller;

use think\Request;
use think\facade\View;
use think\facade\Session;
use app\model\User;

class Login
{
    public function index()
    {
        return View::fetch('login/index');
    }


    
    public function check(Request $request)
    {
        $data = $request->post(); // ✅ 使用 POST 获取数据
        $user = User::where('username', $data['username'])->find();
    
        if ($user && $user->password === md5($data['password'])) {
            Session::set('admin', true);
            Session::set('admin_user', $user->username);
            session_write_close(); // 强制立即保存 Session
            header('Location: ' . url('/index'));// 登录成功跳转
        } else {
            return redirect((string)url('index'))->with('error', '账号或密码错误');
        }
    }
    
    

    public function logout()
    {
        Session::clear();
        return redirect((string)url('login/index'));
    }
}

<?php

namespace app\controller;

use app\BaseController;
use think\facade\Session;

class Index extends BaseController
{
    public function index()

    {

        phpinfo();
        return '<style>*{ padding: 0; margin: 0; }</style><iframe src="https://www.thinkphp.cn/welcome?version=' . \think\facade\App::version() . '" width="100%" height="100%" frameborder="0" scrolling="auto"></iframe>';
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}

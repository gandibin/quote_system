<?php

namespace app\controller;

use app\BaseController;
use think\facade\Session;
use app\model\Client;  
use app\model\Product;
use app\model\Quotation;

class Index extends BaseController
{
    public function index()

    {

        $client_count = Client::count();
        $product_count = Product::count();
        $quote_count = Quotation::count();

        return view('index/index', [
            'client_count' => $client_count,
            'product_count' => $product_count,
            'quote_count'  => $quote_count
        ]);
    }
    // ✅ 顶部 head 区域
    public function head()
    {
        return view('index/head');
    }

    // ✅ 左侧导航栏区域
    public function left()
    {
        return view('index/left');
    }

    // ✅ 主区域默认内容页
    public function main()
    {
        return view('index/main');
    }


    
    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}

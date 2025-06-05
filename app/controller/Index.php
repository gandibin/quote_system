<?php

namespace app\controller;

use app\BaseController;
use think\facade\Session;

class Index extends BaseController
{
    public function index()

    {

        $client_count = Client::count();
        $product_count = Product::count();
        $quote_count = Quote::count();

        return view('index/index', [
            'client_count' => $client_count,
            'product_count' => $product_count,
            'quote_count'  => $quote_count
        ]);
    }

    public function hello($name = 'ThinkPHP8')
    {
        return 'hello,' . $name;
    }
}

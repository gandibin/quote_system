<?php
namespace app\controller;

use think\Controller;
use app\model\Quote;

class Quote extends Controller
{
    public function index()
    {
        $quotes = Quote::order('id', 'desc')->paginate(10);
        return view('quote/index', ['quotes' => $quotes]);
    }

    public function create()
    {
        return view('quote/create');
    }

    public function save()
    {
        $data = input('post.');
        $quote = new Quote();
        $quote->save($data);
        return redirect('quote/index');
    }
}

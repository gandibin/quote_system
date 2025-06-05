<?php
namespace app\controller;

use app\model\Quotation;

class QuotationController
{
    public function index()
    {
        $quotations = Quotation::order('id', 'desc')->paginate(10);
        return view('quotation/index', ['quotations' => $quotations]);
    }

    public function create()
    {
        return view('quotation/create');
    }

    public function save()
    {
        $data = request()->post(); // v8 推荐用 request() 辅助函数
        $quotation = new Quotation();
        $quotation->save($data);
        return redirect('quotation_controller/index');
    }
}

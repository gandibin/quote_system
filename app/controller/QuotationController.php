<?php
namespace app\controller;

use think\Controller;
use app\model\Quotation;

class QuotationController extends Controller
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
        $data = input('post.');
        $quotation = new Quotation();
        $quotation->save($data);
        return redirect('quotation_controller/index');
    }
}

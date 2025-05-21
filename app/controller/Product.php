<?php
namespace app\controller;

use think\Request;
use think\facade\Db;

class Product
{
    public function index(Request $request)
    {
        $keyword = $request->get('keyword', '');
        $query = Db::name('products');

        if (!empty($keyword)) {
            $query->where('name', 'like', "%$keyword%");
        }

        // 加上倒序排序
        $products = $query->order('id', 'desc')->paginate(20);

        return view('product/index', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }

    public function create()
    {
        $types = Db::name('product_types')->column('name'); // 获取所有类型名
        return view('product/create', ['types' => $types]);
    }
    

    public function save(Request $request)
    {
        $data = $request->post();
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
    
        $result = Db::name('products')->insert($data);
    
        if ($result) {
            return view('public/success', [
                'message' => '产品添加成功！',
                'redirect_url' => '/product'
            ]);
        } else {
            return view('public/error', [
                'message' => '产品添加失败！',
                'redirect_url' => '/product'
            ]);
        }
    }
    public function edit($id)
    {
        $product = Db::name('products')->find($id);
        $types = Db::name('product_types')->column('name'); // 获取所有类型名
        return view('product/edit', [
            'product' => $product,
            'types' => $types
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->post();
        $data['updated_at'] = date('Y-m-d H:i:s');
        $result = Db::name('products')->where('id', $id)->update($data);
        if ($result) {
            return view('public/success', [
                'message' => '产品添加成功！',
                'redirect_url' => '/product'
            ]);
        } else {
            return view('public/error', [
                'message' => '产品添加失败！',
                'redirect_url' => '/product'
            ]);
        }
    }

    public function delete($id)
    {
        Db::name('products')->delete($id);
        return redirect('/product');
    }

    // 文件上传处理
    public function uploadSpecSheet(Request $request)
    {
        file_put_contents('upload.log', "触发上传方法 at " . date('Y-m-d H:i:s') . PHP_EOL, FILE_APPEND);
        die('upload method called');
    }
    
    

}

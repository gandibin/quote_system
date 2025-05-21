<?php
namespace app\controller;

use think\Request;
use think\facade\View;
use app\model\Client as ClientModel; // 避免和控制器类名冲突
use think\facade\Session;

class Client
{


    // 客户列表
    public function index()
    {
        $clients = ClientModel::order('id', 'desc')->paginate(20);
        return View::fetch('client/index', ['clients' => $clients]);
    }

    // 新建客户页面
    public function create()
    {
        return View::fetch('client/create');
    }

    // 保存新客户
    public function save(Request $request)
    {
        $data = $request->post();
        ClientModel::create($data);
        return redirect((string)url('client/index'));
    }

    // 编辑客户页面
    public function edit($id)
    {
        $client = ClientModel::find($id);
        return View::fetch('client/edit', ['client' => $client]);
    }

    // 更新客户信息
    public function update(Request $request, $id)
    {
        $data = $request->post();
        ClientModel::update($data, ['id' => $id]);
        return redirect((string)url('client/index'));
    }

    // 删除客户
    public function delete($id)
    {
        ClientModel::destroy($id);
        return redirect((string)url('client/index'));
    }
}

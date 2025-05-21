<?php
namespace app\model;

use think\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $autoWriteTimestamp = 'datetime'; // 自动维护 created_at 和 updated_at
}

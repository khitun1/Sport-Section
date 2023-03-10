<?php
namespace App\Models;

use Framework\MysqlModel;

class UserModel extends MysqlModel
{
    protected $table="user";

    public function deleteWhere($conditions)
    {
    }

    public function updateWhere($conditions)
    {
    }

    public function create($fields)
    {
    }
}
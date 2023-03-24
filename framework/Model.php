<?php

namespace Framework;

abstract class Model
{
    public function getById($id){
        return $this->getWhere([$this->getIdField()=>$id]);
    }

    public static abstract function getWhere($field = null, $operation = null, $value = null);

    public static abstract function all();

    public function deleteById($id){
        $this->getWhere([$this->getIdField()=>$id]);
    }

    public abstract function deleteWhere($conditions);

    public function updateById($id){
        return $this->updateWhere([$this->getIdField()=>$id]);
    }

    public static abstract function updateWhere($conditions);

    public static abstract function create($fields);

    protected function getIdField(): string
    {
        return "id";
    }
}
<?php
namespace App\Contracts;

interface UserContract
{
    public function add($data);
    public function getAll();
    public function getOne($id);
}

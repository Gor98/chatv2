<?php
namespace App\Contracts;

interface MessageContract
{
    public function add($data);
    public function getAll();
    public function getOne($id);
}

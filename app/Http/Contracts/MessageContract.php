<?php
namespace App\Contracts;

interface MessageContract
{
    public function add($roomId,$userId,$text);
    public function getAll();
    public function getOne($id);
}

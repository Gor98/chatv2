<?php
namespace App\Contracts;

interface RoomContract
{
    public function add($data);
    public function getAll();
    public function getOne($id);
}

<?php
namespace App\Contracts;

interface RoomContract
{
    public function add($userId, $data);
    public function getAll();
    public function getOne($id);
    public function countMembers($rooms);
    public function getMessages($id);
}

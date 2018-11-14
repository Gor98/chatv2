<?php
/**
 * Created by PhpStorm.
 * User: hacktech
 * Date: 11/9/18
 * Time: 10:56 AM
 */

namespace App\Http\Repositories;
use App\Contracts\RoomContract;
use App\Room;
use DB;
class RoomRepository implements RoomContract
{

    /**
     * Object of Admin class.
     *
     * @var $model
     */
    private $room;

    /**
     * Create a new instance of AdminRepository class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->room = new Room;
    }

    public function add($userId,$data)
    {
        return $this->room->create($data)->users()->attach((int) $userId);
    }


    public function getOne($id)
    {
        return $this->room->findOrfail($id);
    }

    public function getMessages($id)
    {
       return $this->getOne($id)->messages()->with('user')->get();
    }

    public function countMembers($rooms)
    {
        foreach ($rooms as $room){
            $room->countMembers = count($room->users);
        }

        return $rooms;
    }

    public function getAll()
    {
        return $this->room->all();
    }


}

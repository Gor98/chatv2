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
    private $Room;

    /**
     * Create a new instance of AdminRepository class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->Room = new Room;
    }

    public function add($data)
    {
        // TODO: Implement add() method.
    }


    public function getOne($id)
    {
        // TODO: Implement getOne() method.
    }

    public function getAll()
    {
        // TODO: Implement addAll() method.
    }


}

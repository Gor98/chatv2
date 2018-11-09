<?php
/**
 * Created by PhpStorm.
 * User: hacktech
 * Date: 11/9/18
 * Time: 10:54 AM
 */

namespace App\Http\Repositories;
use App\Contracts\MessageContract;
use App\Message;

class MessageRepository implements MessageContract
{
    /**
     * Object of Admin class.
     *
     * @var $model
     */
private $message;

    /**
     * Create a new instance of AdminRepository class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = new Message;
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

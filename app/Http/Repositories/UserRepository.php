<?php
/**
 * Created by PhpStorm.
 * User: hacktech
 * Date: 11/9/18
 * Time: 10:56 AM
 */

namespace App\Http\Repositories;
use App\Contracts\UserContract;
use App\User;
use DB;
class UserRepository implements UserContract
{

    /**
     * Object of Admin class.
     *
     * @var $model
     */
    private $user;

    /**
     * Create a new instance of AdminRepository class.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user = new User;
    }

    public function add($data)
    {
        // TODO: Implement add() method.
    }


    public function getOne($id)
    {
        return $this->user->findOrfail($id);
    }

    public function getAll()
    {
        // TODO: Implement addAll() method.
    }


}

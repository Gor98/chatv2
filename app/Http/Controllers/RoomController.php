<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\RoomContract;
use App\Http\Requests\AddChatRoom;
use Auth;

class RoomController extends Controller
{


    /**
     * Object of RoomContract class
     *
     * @var userRepo
     */
    private $roomRepo;


    public function __construct(
        RoomContract $RoomRepo
    )
    {

        $this->roomRepo = $RoomRepo;
    }


    public function addChatRoom(AddChatRoom $request){

        $userId = Auth::id();
        try{
            $this->roomRepo->add($userId,$request->all());
        }
        catch (\Exception $e){
            report($e);
            return Response($e->getMessage(),$e->getCode());
        }

        return Response(200);
    }


    public function getRooms(){

        // get rooms
        $rooms = $this->roomRepo->getAll();

        // count how mach members there are in each room
        $rooms = $this->roomRepo->countMembers($rooms);
        return Response($rooms,200);
    }

    public function getMessages($id){

            // get room messages
            $messages = $this->roomRepo->getMessages($id);

            return Response($messages,200);
    }

    public function ConnectToRoom(Request $request){

        try{
            Auth::user()->rooms()->syncWithoutDetaching($request->id);
        }
        catch (\Exception $e){
            report($e);
            return Response($e->getMessage(),$e->getCode());
        }


        return Response(200);
    }

}

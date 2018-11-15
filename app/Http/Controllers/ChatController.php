<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Requests\OpenChatMessage;
use App\Http\Requests\PrivateChatMessage;
use App\Contracts\MessageContract;
use App\Contracts\RoomContract;
use App\Contracts\UserContract;
use App\Events\OpenChat;
use App\Events\SendPrivateChatMessage;
use Auth;

class ChatController extends Controller
{
    /**
     * Object of UserContract class
     *
     * @var userRepo
     */
    private $userRepo;

    /**
     * Object of RoomContract class
     *
     * @var userRepo
     */
    private $roomRepo;

    /**
     * Object of RoomContract class
     *
     * @var userRepo
     */
    private $messageRepo;

    public function __construct(
        RoomContract $RoomRepo,
        UserContract $userRepo,
        MessageContract $MessageRepo)
    {

        $this->userRepo = $userRepo;
        $this->roomRepo = $RoomRepo;
        $this->messageRepo = $MessageRepo;

    }


    public function openChat(){
        return view('openChat');
    }

    public function privateChat($id){

        $user = Auth::user();

        return view('privateChat')->with(['room_id'=>$id, 'user'=>$user]);


    }

    public function privateChatRooms(){
        return view('privateChatRooms');
    }


    public function addOpenChatMessage(OpenChatMessage $request){

        try{
            event(new OpenChat( $request->get('text')) );
        }
        catch (\Exception $e){
            report($e);

            return Response($e->getMessage(),$e->getCode());
        }


        return Response(200);
    }

    public function addPrivateChatMessage(PrivateChatMessage $request){

        // add message
        $this->messageRepo->add($request->roomId,$request->userId, $request->text);
        event(new SendPrivateChatMessage( $request->get('text'),Auth::id()));

        return Response(200);
    }



}

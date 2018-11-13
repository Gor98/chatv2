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

    public function privateChat(){
        return view('privateChat');
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

        dd($request->all());

        return Response(200);
    }



}

<?php

namespace App\Http\Controllers\Member;

use App\Conversation;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function MongoDB\BSON\toJSON;
use Psy\Util\Json;

class ChatsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('member');
    }

    public function fetchConversations(){
        $user = Auth::user();
        $conversations = Conversation::has('messages')->where('user_one', $user->id)->orWhere('user_two',$user->id)->with(['messages'=>function($query){
            $query->latest()->take(10);
        }])->latest()->take(10)->get();
        foreach ($conversations as $key =>$conversation){
            $conversation->receiver_name = $conversation->receiver()->name;
            $conversation->receiver_image = $conversation->receiver()->image;
        }
         return $conversations->toJson();

    }
    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages($conversation_id)
    {
        $userId = Auth::user()->id;
        $messages = Conversation::findOrFAil($conversation_id)->messages()->with('sender')->get();
        foreach ($messages as $message){
            $message->isReceiver = $message->user_id === $userId ? false : true;
            $message->senderImage = $message->sender->image;
        }
        return $messages->toJson();
    }


    public function sendMessage(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();

        $conversation = Conversation::findOrFail($data['id']);

        if($message = $conversation->messages()->create([
            'user_id' => $user->id,
            'message' => $data['message']
        ])){
            $message->isReceiver = false;
            $message->senderImage = $user->image;
            broadcast(new MessageSent($message))->toOthers();
            return $message->toJson();
        }

    }

    public function getMembers($name){
        $nameArray = explode(' ',$name);
        $members = User::whereIn('surname',$nameArray)->orWhereIn('firstname',$nameArray)->orWhereIn('othernames',$nameArray)->whereNotIn('id',[Auth::user()->id])->get();
        foreach ($members as $member){
            $member->userName = $member->name;
            $member->userImage = $member->image;
        }
        return  $members->toJson();
    }
    public function startConversation($id){
        $userId = Auth::user()->id;
        $conversation = Conversation::firstOrCreate([
            'user_one' => $userId,
            'user_two' => $id,
            'status' => '1'
        ]);
        return $conversation->toJson();
    }
}

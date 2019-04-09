<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('conversation.{id}',function($user,$id){
    return ($user->id === \App\Conversation::findOrFail($id)->user_one) or ($user->id === \App\Conversation::findOrFail($id)->user_two);
},['guards'=>['web','member']]);
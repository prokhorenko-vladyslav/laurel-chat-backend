<?php

namespace App\Http\Controllers;

use App\Actions\Message\DestroyAction;
use App\Actions\Message\StoreAction;
use App\Actions\Message\UpdateAction;
use App\Http\Requests\Message\DestroyRequest;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Requests\Message\UpdateRequest;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request, Chat $chat)
    {

    }

    public function store(StoreRequest $request, Chat $chat, StoreAction $action)
    {
        abort_if(!$chat->isMember(User::currentId()), 403, 'You are not member of this chat');

        $action->run(
            $request->getDTO()
        );

        return response(null, 201);
    }

    public function update(UpdateRequest $request, Chat $chat, Message $message, UpdateAction $action)
    {
        abort_if(!$chat->isMember(User::currentId()), 403, 'You are not member of this chat');
        abort_if(!$message->isOwner(User::currentId()), 403, 'You are not owner of this message');

        $action->run(
            $request->getDTO()
        );
    }

    public function destroy(DestroyRequest $request, Chat $chat, Message $message, DestroyAction $action)
    {
        abort_if(!$chat->isMember(User::currentId()), 403, 'You are not member of this chat');
        abort_if(!$message->isOwner(User::currentId()), 403, 'You are not owner of this message');

        $action->run(
            $request->getDTO()
        );
    }
}

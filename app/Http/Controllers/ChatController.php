<?php

namespace App\Http\Controllers;

use App\Actions\Chat\DestroyAction;
use App\Actions\Chat\StoreAction;
use App\Actions\Chat\UpdateAction;
use App\Http\Requests\Chat\DestroyRequest;
use App\Http\Requests\Chat\StoreRequest;
use App\Http\Requests\Chat\UpdateRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request, Chat $chat)
    {

    }

    public function show(Request $request, Chat $chat)
    {

    }

    public function store(StoreRequest $request, StoreAction $action)
    {
        $action->run(
            $request->getDTO()
        );

        return response(null, 201);
    }

    public function update(UpdateRequest $request, Chat $chat, UpdateAction $action)
    {
        abort_if(!$chat->isOwner(User::currentId()), 403, 'You are not owner of this chat');

        $action->run(
            $request->getDTO()
        );
    }

    public function destroy(DestroyRequest $request, Chat $chat, DestroyAction $action)
    {
        abort_if(!$chat->isOwner(User::currentId()), 403, 'You are not owner of this chat');

        $action->run(
            $request->getDTO()
        );
    }
}

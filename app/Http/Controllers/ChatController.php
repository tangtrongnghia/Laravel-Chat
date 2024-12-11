<?php

namespace App\Http\Controllers;

use App\Events\MessagePosted;
use App\Models\Message;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::with('user')->get();

        return Inertia::render('Chat/Chat', [
            'messages' => $messages,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $socket_id = $request->input('socket_id');

        $message = new Message();
        $message->message = request()->get('message', '');
        $message->user_id = $user->id;
        $message->save();
        $message->load('user');

        broadcast(new MessagePosted($message, $socket_id))->toOthers();

        return ['message' => $message];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

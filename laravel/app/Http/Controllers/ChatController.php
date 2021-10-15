<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Events\TestEvent;

class ChatController extends Controller
{
    //
    public function index()
    {
        return Message::all();
    }

    public function store(Request $req)
    {
        $body = $req->input('body');

        $message = Message::create([
            'body' => $body,
        ]);

        event(new TestEvent($message));

        return $body;
    }
}

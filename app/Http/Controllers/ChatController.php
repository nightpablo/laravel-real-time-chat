<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendChat(Request $request) {
        // dump($request->all());die;
        event(new RealTimeMessage($request->get('sendTo'), $request->get('message')));
    }
}

<?php

namespace App\Http\Controllers;

use App\Events\RealTimeMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        event(new RealTimeMessage('chat1', 'Hello World'));

        dump("EJECUTADO EL EVENTO");
    }
}

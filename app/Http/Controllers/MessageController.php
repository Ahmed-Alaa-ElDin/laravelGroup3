<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    function getMessage()
    {
        return view('message');
    }
}

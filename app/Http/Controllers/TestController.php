<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    function sendData()
    {
        $data = [
            'id' => 1,
            'age' => 10,
            'level' => 5
        ];

        return view('check',compact('data'));
    }

    function filterURL(Request $request)
    {
        if ($request->method() == 'GET') {
            dd($request->all());
            // return $request->fullUrl();
        } else {
            return 'Invalid Request';
        }
    }
}

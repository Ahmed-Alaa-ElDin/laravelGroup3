<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'password' => 'required|min:6|confirmed',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        $data['password'] = bcrypt($data['password']);

        if ($data) {
            $user = User::create($data);

            if ($user) {
                Auth::login($user);
                return redirect()->route('products.index')->with('successMessage', 'You regestered successfully');
            } else {
                return back()->with('errorMessage', 'You didn\'t register, please try again leter.');
            }
        } else {
            return back()->with('errorMessage', 'You didn\'t register, please try again leter.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return view('login');
    }

    public function loginCheck(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($data) {
            if (Auth::attempt($data)) {
                return redirect()->route('products.index');
            } else {
                return back();
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

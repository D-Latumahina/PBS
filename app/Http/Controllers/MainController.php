<?php

namespace App\Http\Controllers;

use App\Events\MainEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function showLogin(){
        return view('auth.login');
    }

    public function login(Request $request) {
        $incomingFields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $incomingFields['email'], 'password' => $incomingFields['password']])) {
            $request->session()->regenerate();
            event(new MainEvent(['email' => auth()->user()->email, 'action' => 'login']));
            return redirect('/home')->with('success', 'You have successfully logged in.');
        } else {
            return redirect('/')->with('failure', 'Invalid login.');
        }
    }

    public function register(){
        return view('auth.register');
    }

    public function logout(){
            event(new MainEvent(['email' => auth()->user()->email, 'action' => 'logout']));
            auth()->logout();
            return redirect('/')->with('success', 'You are now logged out.');
    }
}

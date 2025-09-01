<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    public function showLoginForm(){
        return view('auth.login');
    }
    public function username(){
        return 'username';
    }
    public function login(Request $r){
        $r->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        $credentials = $r->only('username','password');
        if(Auth::attempt($credentials)){
            $r->session()->regenerate();
            return redirect()->intended('/hospitals');
        } else {
            dd($credentials, \App\Models\User::all());
        }
        
        return back()->withErrors(['username'=>'Login failed'])->withInput();
    }
    public function logout(Request $r){
        Auth::logout();
        $r->session()->invalidate();
        $r->session()->regenerateToken();
        return redirect('/login');
    }
}

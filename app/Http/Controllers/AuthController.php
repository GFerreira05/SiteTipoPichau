<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function autenticateUser(Request $request)
    {
        $login = $request->email;
        $senha = $request->senha;

        $user = User::where("email",$login)->where("senha",$senha)->first();

        if(!$user)
        {
            return redirect()->route('login')->with('error', 'Usuário ou senha inválidos');
        }

        $request->session()->regenerate();

        Auth::login($user);

        Session::put('nome', $user->nome);
        Session::put('email', $user->email);
        Session::put("type_user", $user->type_user);
  
        return redirect()->route('home');
    }

    public function logoutUser(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.user.login');
    }

    public function do_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => "required|email",
            "password" => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (empty($user)) {
            return redirect()->back()->with('error', "Credentials are wrong.");
        }

        if (!Auth::attempt(["email" => $user->email, "password" => $request->password])) {
            return redirect()->back()->with('error', "Credentials are wrong.");
        }
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Anda berhasil logout.');
    }
}

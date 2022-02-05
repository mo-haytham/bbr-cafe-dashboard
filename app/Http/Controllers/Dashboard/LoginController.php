<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $validationRules = [
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ];
        $validator = Validator::make($request->all(), $validationRules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $remember_me = $request->remember_me == 'on' ? true : false;
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->status == 1) {
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
                        return redirect()->intended('/');
                    } else {
                        return redirect()->back()->with(['customError' => 'Wrong Password']);
                    }
                } elseif ($user->status == 9) {
                    return redirect()->back()->with(['customError' => 'Account is deleted.']);
                } else {
                    return redirect()->back()->with(['customError' => 'Account is blocked, Please contact support.']);
                }
            } else {
                return redirect()->back()->with(['customError' => 'Email address is not registered.']);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with(['customError' => 'Internal error occured, please try again.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('d.get.login')->with(['customSuccess' => 'See you later..']);
    }
}

<?php

namespace App\Http\Controllers;


use App\Models\User;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => ["required"],
            "password" => ["required", "min:6"]
        ]);

        if(auth("web")->attempt($data)) {
            return redirect(("/"));
        }

        return redirect(route("login"))->withErrors(["email" => "Пользователь не найден, либо данные введены не правильно"]);
    }

    public function logout()
    {
        auth("web")->logout();
        return redirect('/');
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }


    public function register(Request $request)
    {
        $data = $request->validate([
            "name" => ["required", "string"],
            "email" => ["required", "string", "unique:users,email"],
            "password" => ["required", "confirmed"]
        ]);

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "password" => bcrypt($data["password"])
        ]);

        if($user) {
            //event(new Registered($user));
            auth("web")->login($user);
        }

        return redirect('/');
    }

    public function showProfile(Request $request)
    {
        return view("profile");
    }


}

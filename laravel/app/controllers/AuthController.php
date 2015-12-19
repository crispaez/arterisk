<?php

class AuthController extends BaseController {

    public function showLogin()
    {
        if (Auth::check())
        {
            return Redirect::to('/');
        }
        return View::make('login');
    }

    public function postLogin()
    {
        $data = [
            'username' => Input::get('correo'),
            'password' => Input::get('contrasena'),
        ];

        if (Auth::attempt($data, Input::get('remember')))
        {
            return Redirect::intended('/');
        }
        return Redirect::back()->with('error_message', 'Correo o Contraseña incorrectos')->withInput();
    }

    public function logOut()
    {
        Auth::logout();
        return Redirect::to('login')->with('error_message', 'Logged out correctly');
    }

}
<?php

namespace App\Http\Controllers\Base;

use App\Http\Controllers\Controller;
use App\Helpers\BaseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Socialite;

class AuthController extends Controller
{
    // Show pages
    public function showSigninPage()
    {
        return view("pages.signin");
    }

    public function showSignupPage(Request $request)
    {
        return view('pages.signup');
    }

    // POST
    public function makeAuth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $base_helper = new BaseHelper();
        $remember = $request->input('remember_me');
        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds, $remember)) {
            return redirect($base_helper->redirectUrl());
        } else {
            return back()->withErrors(['msg' => 'Ошибка авторизации']);
        }
    }

    public function makeNewUser(Request $request)
    {
        $base_helper = new BaseHelper();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        Auth::login($user, true);

        return redirect($base_helper->redirectUrl($request));
    }

    // Logout
    public function signout()
    {
        Auth::logout();
        return Redirect('');
    }

    // Socialite //
    // GitHub
    public function github()
    {
        return Socialite::driver("github")->redirect();
    }

    public function guthubCallback(Request $request)
    {
        $username = "";
        $base_helper = new BaseHelper();
        $user_git = Socialite::driver("github")->user();

        if ($user_git->name == null) $username = $user_git->nickname;
        else $username = $user_git->name;

        $user = User::firstOrCreate(
            ["email" => $user_git->email],
            [
                "name" => $username,
                "password" => Hash::make(genCustomId(6)),
            ]
        );

        Auth::login($user, true);
        return redirect($base_helper->redirectUrl($request));
    }

    // VK
    public function vkontakte()
    {
        return Socialite::driver("vkontakte")->redirect();
    }

    public function vkontakteCallback(Request $request)
    {
        $username = "";
        $email = "";
        $base_helper = new BaseHelper();
        $user_git = Socialite::driver("vkontakte")->user();

        // name exists check
        if ($user_git->name == null) $username = $user_git->nickname;
        else $username = $user_git->name;

        // email exists check
        if ($user_git->email == null) $email = genCustomId(4);
        else $email = $user_git->name;

        $user = User::firstOrCreate(
            ["email" => $email],
            [
                "name" => $username,
                "password" => Hash::make(genCustomId(6)),
            ]
        );

        Auth::login($user, true);
        return redirect($base_helper->redirectUrl($request));
    }

    // Google
    public function google()
    {
        return Socialite::driver('google')
            // ->scopes(['openid', 'profile', 'email'])
            // ->scopes([Google_Service_People::CONTACTS_READONLY])
            ->redirect();
    }

    public function googleCallback(Request $request)
    {
        $username = "";
        $email = "";
        $base_helper = new BaseHelper();
        $user_git = Socialite::driver("google")->user();

        // name exists check
        if ($user_git->name == null) $username = $user_git->nickname;
        else $username = $user_git->name;

        // email exists check
        if ($user_git->email == null) $email = genCustomId(4);
        else $email = $user_git->name;

        $user = User::firstOrCreate(
            ["email" => $email],
            [
                "name" => $username,
                "password" => Hash::make(genCustomId(6)),
            ]
        );

        Auth::login($user, true);
        return redirect($base_helper->redirectUrl($request));
    }
}

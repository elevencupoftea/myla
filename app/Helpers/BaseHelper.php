<?php


namespace App\Helpers;


use App\Models\Code;
use App\Models\PhoneNumber;
use App\Models\PhoneVote;
use App\Models\User;
use Illuminate\Http\Request;

class BaseHelper
{

    public function redirectUrl()
    {
        if (session('redirect_url')) {
            return session('redirect_url');
        }
        return "/";
    }
}

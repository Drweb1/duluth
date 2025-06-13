<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class UserHelper
{
    public static function currentUserType()
    {
        if (Auth::check()) {
            return Auth::user()->type;
        }
        return null;
    }
}

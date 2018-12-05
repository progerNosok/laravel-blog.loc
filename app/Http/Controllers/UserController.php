<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutUserRequest;
use App\User;
use App\UserFullInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showFormUserFullInfo()
    {
        return view('user.about');
    }

    public function saveUserFullInfo(Request $request)
    {
        $userInfo = UserFullInfo::where('user_id', Auth::user()->id);
        $userInfo->update($request->except('_token', 'submit'));

        return redirect()->back()->with('message', 'Информация о себе дополнена');

    }


}

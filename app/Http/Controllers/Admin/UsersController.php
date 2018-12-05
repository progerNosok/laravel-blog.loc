<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index()
    {
//        dd(228);
        $users = User::all();
//        dd($users);

        return view('admin.users.index')->with('users', $users);
    }

    public function ban(int $id)
    {
        User::find($id)->ban();

        return redirect()->back()->with('message', 'Пользователь успешно забанен');
    }

    public function unban(int $id)
    {
        User::find($id)->unban();

        return redirect()->back()->with('message', 'Пользователь успешно разбанен');
    }

    public function moreInfo(int $id)
    {
        $user = User::find($id);

        return view('admin.users.info')->with('user', $user);
    }

    public function destroy(int $id)
    {
        User::find($id)->delete();

        return redirect()->back()->with('message', 'Пользователь успешно удален');
    }

}

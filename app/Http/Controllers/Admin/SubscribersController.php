<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SubscribeRequest;
use App\Subscription;
use App\Http\Controllers\Controller;

class SubscribersController extends Controller
{
    public function index()
    {
        $subs = Subscription::all();

        return view('admin.subscribers.index')->with('subs', $subs);
    }

    public function showAddForm()
    {
        return view('admin.subscribers.add');
    }

    public function add(SubscribeRequest $request)
    {
        $sub = new Subscription();
        $sub->email = $request->email;
        $sub->token = null;
        $sub->save();

        return redirect()->route('subscribers.index')->with('message', 'Пользователь добавлен в рассылку');
    }

    public function destroy(int $id)
    {
        Subscription::find($id)->delete();

        return redirect()->back()->with('message', 'Этот пользователь больше не подписан на рассылку');
    }
}

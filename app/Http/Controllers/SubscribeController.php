<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscribeRequest;
use App\Subscription;
use Illuminate\Support\Facades\Mail;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        $sub = new Subscription();
        $sub->email = $request->email;
        $sub->token = str_random(40);
        $sub->save();

        $this->sendEmailConfirm($sub);

        return redirect()->back()->with('message', 'Потвердите email чтобы получать уведомление о выходе новых постов');
    }

    public function subConfirm(string $token)
    {
        $sub = Subscription::where('token', $token)->firstOrFail();
        $sub->token = null;
        $sub->save();

        return redirect()->route('index')->with('message', 'Email успешно потвержден');
    }

    private function sendEmailConfirm(Subscription $user)
    {
        Mail::send('emails.verify_sub', ['token' => $user->token], function($message) use ($user) {
            $message->from('laravelproekt@gmail.com', 'Laravel Blog');
            $message->to($user->email);
        });
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\RegisterRequest;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/account/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->create($request->except('image'));

        if($user)
        {
            $user->uploadImage($request->image);
            $user->createFullInfo();
            $this->sendEmailConfirm($user);
            return redirect()->route('index')->with('message', 'Вы успешно зареганы. Потвердите email');
        }
        dd("Что то пошло не так");
    }

    public function confirm(string $token)
    {
        $user = User::where('remember_token', $token)->firstOrFail();

        $user->remember_token = null;
        $user->email_verified_at = Carbon::now()->toDateTimeString();
        $user->save();

        return redirect()->route('index');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'remember_token' => str_random(40)
        ]);
    }

    private function sendEmailConfirm(User $user)
    {
        Mail::send('emails.verify', ['token' => $user->remember_token], function($message) use ($user) {
            $message->to($user->email, $user->name)->subject('Регистрация на сайте laravel blog');
        });
    }
}

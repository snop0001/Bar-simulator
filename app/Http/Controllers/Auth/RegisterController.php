<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Console\Input\Input;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $message = [
            'email.required' => 'Wir benötigen deine Email-Adresse!',
            'email.unique' => 'Diese Adresse ist bereits registriert!',
            'email.max' => 'Deine Email-Adresse darf maximal 255 Zeichen lang sein!',
            'lastname.required' => 'Dein Name wird benötigt!',
            'lastname.max' => 'Dein Name darf maximal 255 Zeichen lang sein!',
            'password.required' => 'Du benötigst ein Passwort!',
            'password.confirmed' => 'Da stimmt etwas nicht?! Passwörter sind nicht gleich!',
            'password.min' => 'Dein Passwort ist zu kurz!',
            'firstname.required' => 'Dein Vorname wird benötigt!',
            'firstname.max' => 'Dein Vorname darf nur 255 Zeichen lang sein!',
            'username.required' => 'Ein Nutzername wird benötigt',
            'username.max' => 'Dein Nutzername darf nicht länger als 70  Zeichen sein!',
            'username.unique' => 'Dieser Nutzername wird bereits verwendet, bitte benutze einen anderen!'
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users','email'],
            'password' => ['required', 'string', 'min:8','confirmed'],
        ], $message);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}

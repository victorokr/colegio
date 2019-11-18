<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;//se agrego para que funcione el metodo resetPassword
use Illuminate\Support\Str;//se agrego para que funcione el metodo resetPassword
use Illuminate\Auth\Events\PasswordReset;//se agrego para que funcione el metodo resetPassword

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function rules()//Se saco del traid use ResetsPasswords
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
        ];
    }


    protected function resetPassword($user, $password)//Se saco del traid use ResetsPasswords
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        //$this->guard()->login($user);//evita iniciar sesion despues de resetear contraseña al estar comentado

        return back()->with('infoContraseña','Tu contraseña se ha actualizado, por favor inicia sesion'); 
    }

    

}

<?php

namespace App\Http\Controllers\acudientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;//se agrego para que funcione metodo broker

class AcudienteForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;//retorna la vista email Send Password Reset Link

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:acudiente');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('acudientepassword.passwords.email');
    }



    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('acudiente');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('acudiente');
    }
}

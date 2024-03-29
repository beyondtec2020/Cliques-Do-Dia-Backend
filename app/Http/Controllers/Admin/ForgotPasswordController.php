<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Http\Request;
use App\TraitsFolder\CommonTrait;

class ForgotPasswordController extends Controller
{
    use CommonTrait;
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

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $general= GeneralSetting::first();
        
         // Config::set('mail.driver','mail');
        /*Config::set('mail.driver','smtp');
        Config::set('mail.host','smtp.mailtrap.io');
        Config::set('mail.username','3d99b9a27da3ed');
        Config::set('mail.password','6590f71722091f');
        Config::set('mail.port','2525');*/

        Config::set('mail.driver','smtp');
        Config::set('mail.host','mail.cliquepede.com.br');
        Config::set('mail.username','noreply@cliquepede.com.br');
        Config::set('mail.password','V$%=i;3Ajaj*');
        Config::set('mail.port','25');
        
        Config::set('mail.from',$general->office_email);
        Config::set('mail.name',$general->title);
    }
    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('form.password-reset');
    }
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $us = User::whereEmail($request->email)->count();
        if ($us == 0)
        {
            $notification =  array(
                'message' => 'We can\'t find a user with that e-mail address.', 
                'alert-type' => 'warning', 
            );
            return redirect()->back()->with($notification);
        }else{
            $user1 = User::whereEmail($request->email)->first();
            $route = 'admin.password.reset';
            $this->userPasswordReset($user1->email,$user1->first_name,$route);
            $notification =  array(
                'message' => 'Password Reset Link Send Your E-mail', 
                'alert-type' => 'success', 
            );
            return redirect()->back()->with($notification);
        }

    }
    

    
}

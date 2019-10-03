<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use http\Env\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //重写 ResetsPasswords (trait类) 中的 rules 方法，使密码最小长度为 6
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ];
    }

    public function sendResetResponse(Request $request, $response)
    {
        session()->flash('success', '密码更新成功，您已成功登陆！');
        return redirect($this->redirectPath());
    }

}

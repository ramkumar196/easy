<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use View;

use Illuminate\Http\Request;
use App\Http\Requests;
use JWTAuth;
use JWTAuthException;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |``
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return View::make('frontend.pages.login');
    }

    // public function login(Request $request){
    //     $credentials = $request->only('email', 'password');
    //     $token = null;
    //     try {
    //         if (!$token = JWTAuth::attempt($credentials)) {
    //             return response()->json([
    //                 'response' => 'error',
    //                 'message' => 'invalid_email_or_password',
    //             ]);
    //         }
    //     } catch (JWTAuthException $e) {
    //         return response()->json([
    //             'response' => 'error',
    //             'message' => 'failed_to_create_token',
    //         ]);
    //     }
    //     return response()->json([
    //         'response' => 'success',
    //         'result' => [
    //             'token' => $token,
    //         ],
    //     ]);
    // }

    // public function getAuthUser(Request $request){
    //     $user = JWTAuth::toUser($request->token);        
    //     return response()->json(['result' => $user]);
    // }

}

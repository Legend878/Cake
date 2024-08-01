<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Импортируйте класс Request
use Illuminate\Support\Facades\Auth; // Импортируйте фасад Auth
use Illuminate\Support\Facades\Validator; // Импортируйте фасад Validator
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
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
    protected $redirectTo = '/create';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest')->except('logout');
       // $this->middleware('auth')->only('logout');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>['required'],
            'password'=>['required'],
        ]);

        if(Auth::guard('admin')->attempt($request->only('email','password'))){
            return redirect()->route('home');
        }

    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Завершение сессии администратора

        // Перенаправление на страницу входа или на главную страницу
        return redirect('/login')->with('message', 'Вы вышли из системы.');
    }
    


}

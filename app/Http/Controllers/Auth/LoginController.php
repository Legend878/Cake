<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInFormRequest;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Импортируйте класс Request
use Illuminate\Support\Facades\Auth; // Импортируйте фасад Auth
use Illuminate\Support\Facades\Validator; // Импортируйте фасад Validator
use App\Models\VerifiCode; // Импортируйте модель
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
    // protected $redirectTo = '/create';

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
    

    public function login(SignInFormRequest $request){
    
    // Проверяем, существует ли администратор с таким email
    $admin = Admin::where('email', $request->input('email'))->first();

    if (!$admin || !Hash::check($request->input('password'), $admin->password)) {
        return back()->withErrors([
            'email' => 'Неверное имя поля Email или Password.'
        ])->onlyInput('email');
    }

    // Регистрация новой сессии
    $request->session()->regenerate();

    // Генерация и отправка 6-значного кода подтверждения
    $code = rand(100000, 999999);
    session(['verification_code' => $code]); // Сохраняем код в сессии
    session(['admin_authenticated' => true]);
    session(['email' => $admin->email]);
    // Отправка кода на почту
    Mail::to($admin->email)->send(new VerificationCodeMail($code));

    return redirect()->route('verification.form'); // Перенаправление на страницу ввода кода
    }

    public function logout(Request $request)
{
  
    Auth::guard('admin')->logout();
    
    // Удаление всех данных из сессии
    $request->session()->invalidate();
    
    return redirect('/login')->with('message', 'Вы вышли из системы.');
}

    public function showVerificationForm()
    {
        return view('auth.verify'); // Убедитесь, что файл находится в resources/views/auth/verification.blade.php    }
    }
    
    public function verifyCode(Request $request)
{
    $request->validate(['code' => 'required|digits:6']);

    // Проверяем, совпадает ли введенный код с сохраненным в сессии
    if ($request->input('code') == session('verification_code')) {
        // Получаем email из сессии
        $email = session('email');

        // Находим администратора по email
        $admin =Admin::where('email', $email)->first();

        if ($admin) {
            // Аутентификация администратора
            Auth::guard('admin')->login($admin);

            // Удаляем флаг из сессии
            session()->forget('verification_code');
            session()->forget('admin_authenticated');
            session()->forget('email');


            return redirect()->route('home'); // Перенаправление на админ панель
        } else {
            return back()->withErrors(['code' => 'Администратор не найден.']);
        }
    }

    return back()->withErrors(['code' => 'Неверный код.']);
}


}

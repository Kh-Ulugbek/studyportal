<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'login';
    }

    public function showLoginForm()
    {
        $availableLocales = ['ru', 'en', 'uz'];
        $locale = Session::get('locale');
        if (!in_array($locale, $availableLocales)){
            $locale = config('app.locale');
        }
        Session::put('locale', $locale);
        App::setLocale($locale);
        $head = view('head')->with('page_title', 'Вход в личный кабинет');
        $view = view('auth.login_page')->with('head',$head);
        return $view;
    }
}

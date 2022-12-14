<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\BackgroundImage;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

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

    // public function authenticate(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     $email    = $request->email;
    //     $password = $request->password;

    //     $dt         = Carbon::now();
    //     $todayDate  = $dt->toDayDateTimeString();

    //     $activityLog = [

    //         'name'        => $email,
    //         'email'       => $email,
    //         'description' => 'has log in',
    //         'date_time'   => $todayDate,
    //     ];
    //     if (Auth::attempt(['email'=>$email,'password'=>$password,'status'=>'Active'])) {
    //         DB::table('activity_logs')->insert($activityLog);
    //         return redirect()->intended('home');
    //     }elseif (Auth::attempt(['email'=>$email,'password'=>$password,'status'=> null])) {
    //         DB::table('activity_logs')->insert($activityLog);
    //         return redirect()->intended('home');
    //     }
    //     else{
    //         return redirect('login');
    //     }

    // }

    protected function credentials(Request $request)
    {
        // return $request->only($this->username(), 'password');
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
            'password' => [trans('auth.password')],
            'status' => [trans('auth.status')],
        ]);
    }

    public function logout()
    {
        $user = Auth::User();
        Session::put('user', $user);
        $user = Session::get('user');

        $name       = $user->name;
        $email      = $user->email;
        $dt         = Carbon::now();
        $todayDate  = $dt->toDayDateTimeString();

        $activityLog = [

            'name'        => $name,
            'email'       => $email,
            'description' => 'has logged out',
            'date_time'   => $todayDate,
        ];
        DB::table('activity_logs')->insert($activityLog);
        Auth::logout();
        // Toastr::success('Logout successfully :)','Success');
        return redirect('/');
    }

    public function showLoginForm()
    {
        $background = BackgroundImage::orderByDesc('updated_at')->first();
        return view('auth.login', compact('background'));
    }
}
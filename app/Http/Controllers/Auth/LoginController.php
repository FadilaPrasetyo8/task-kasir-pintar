<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */

     protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function postlogin(Request $request) {
    //     if(Auth::user()->role == 'staff') {
    //         return redirect('/pengajuan-reimburse');
    //     }
    // }

   public function login(Request $request): RedirectResponse
{
    $input = $request->all();

    $this->validate($request, [
        'nip' => 'required',
        'password' => 'required',
    ]);

    if(auth()->attempt(array('nip' => $input['nip'], 'password' => $input['password']))) {
        if(auth()->user()->role == 'staff') {
            return redirect()->route('pengajuan-reimburse');
        } else if(auth()->user()->role == 'finance') {
            return redirect()->route('pengajuan-reimburse.finance');
        } else if(auth()->user()->role == 'direktur') {
            return redirect()->route('approve-pengajuan.direktur');
        } else {
            return redirect('/login');
        }
    } else {
        return redirect()->route('login')->with('error','Email-Address And Password Are Wrong.');
    }

    return redirect()->route('login')->with('error','Login Failed. Please check your credentials.');
}

}

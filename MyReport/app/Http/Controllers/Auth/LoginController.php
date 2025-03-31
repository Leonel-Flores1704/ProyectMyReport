<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Administrador;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/reports';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request){
        // Intentar autenticar como usuario normal (tabla users)
        if (Auth::guard('web')->attempt($this->credentials($request))) {
            return true;
        }

        $admin = Administrador::where('email', $request->email)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('admin')->login($admin);
            return true;
        }
        return false;
    }
    protected function authenticated(Request $request, $user){
        if (!$user) {
            return redirect()->route('login')->withErrors(['error' => 'No se pudo autenticar al usuario']);
        }
        if (preg_match('/^[a-zA-Z]+\.[a-zA-Z]+@MyReport\.com$/', $user->email)) {
            return redirect()->route('administrador.index');
        }else{
            return redirect('/reports');
        }
    }
}
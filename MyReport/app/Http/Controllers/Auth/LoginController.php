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

    protected function attemptLogin(Request $request)
    {
        // Intentar autenticar como usuario normal
        if (Auth::guard('web')->attempt($this->credentials($request))) {
            return true;
        }

        // Intentar autenticar como administrador
        if (Auth::guard('admin')->attempt($this->credentials($request))) {
            return true;
        }

        return false;
    }

    protected function authenticated(Request $request, $user)
    {
        // Verificar si el usuario es un administrador o un usuario normal
        if (Auth::guard('admin')->check()) {
            return redirect()->route('administrador.index');
        }

        return redirect('/reports');
    }
}

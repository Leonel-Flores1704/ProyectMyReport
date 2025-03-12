<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialiteController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'last_name' => 'Desconocido', // Valor por defecto
                    'birthdate' => null, // Dejarlo como NULL en la BD si no se tiene la fecha
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()), // Generar una contraseña aleatoria
                    'email_verified_at' => now(),
                ]
            );

            Auth::login($user);

            return redirect('/reports');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Error al iniciar sesión con Google.');
            }
        }
        //
    }

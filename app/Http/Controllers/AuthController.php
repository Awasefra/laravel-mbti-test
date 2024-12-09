<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\ErrorHandler;
use App\Services\AuthService;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Class constructor.
     */

    public function index()
    {
        return view('login');
    }

    public function authenticate(LoginRequest $request)
    {

        try {
            $credentials = $request->only('email', 'password');


            if (!Auth::attempt($credentials)) {
                throw new \Exception("Kredensial tidak valid", 401);
            } else {

                $request->session()->regenerate();
            }

            return redirect()->route('home');
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return back()->with('error', $error['message']);
        }
    }

    public function logout(): RedirectResponse
    {
        try {

            Auth::logout();

            request()->session()->invalidate();
            request()->session()->regenerateToken();

            return redirect()->route('/home');
        } catch (\Exception $e) {
            $error = ErrorHandler::handle($e);

            return back()->with('error', $error['message']);
        }
    }
}

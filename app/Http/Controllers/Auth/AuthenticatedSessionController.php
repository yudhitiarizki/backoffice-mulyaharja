<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();


        $user =  User::where(['email' => $request->email])->first();

        if ($user->is_active == '1') {
            $message = 'Otentikasi berhasil!';
            session()->flash('code', 200);
            return view('auth.login', compact('message'));
        } else {
            return $this->destroyIsActive($request);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function destroyIsActive(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $message = 'Akun Anda Di Non Aktifkan';

        throw ValidationException::withMessages([
            'email' => 'Akun Anda dinonaktifkan.',
        ]);

        return view('auth.login', compact('message'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

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
    public function store(LoginRequest $request): RedirectResponse
{
    $userBanned = User::withTrashed()->where('email', $request->email)->first();
    if ($userBanned && $userBanned->trashed()) {
        return redirect('login')->with('error', 'Your account has been banned');
    }

    $request->authenticate();

    $request->session()->regenerate();

    $user = auth()->user();

    if ($user->admin) {
        return redirect()->intended(route('admin'));
    } elseif ($user->organisateur) {
        return redirect()->intended(route('organisateur'));
    } elseif ($user->client) {
        return redirect()->intended(route('client'));
    } else {
        return redirect()->intended(route('login'));
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
}

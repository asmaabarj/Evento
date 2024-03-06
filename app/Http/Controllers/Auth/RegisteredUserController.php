<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\organisateur;
use App\Models\client;

use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:55'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role' => ['required', 'string', Rule::in(['client', 'organisateur'])],
    ]);

    $user = User::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    if ($request->role === 'client') {
        $client = Client::create([
            'user_id' => $user->id,
        ]);
    } elseif ($request->role === 'organisateur') {
        $organisateur = Organisateur::create([
            'user_id' => $user->id,
        ]);
    }

    event(new Registered($user));

    Auth::login($user);

    if ($request->role === 'client') {
        return redirect()->route('client');
    } elseif ($request->role === 'organisateur') {
        return redirect()->route('organisateur');
    }elseif($request->role === 'admin'){
        return redirect()->route('admin');

    };

    return redirect(RouteServiceProvider::HOME);
}

}

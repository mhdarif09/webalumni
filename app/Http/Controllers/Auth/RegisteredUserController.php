<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'username' => ['nullable', 'string', 'max:40', 'unique:'.User::class.',username'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $username = $request->input('username');

        if (blank($username)) {
            $username = $this->generateUsername($request->name, $request->email);
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $username,
            'email' => $request->email,
            'role' => 'alumni',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('alumni.dashboard');
    }

    protected function generateUsername(string $name, string $email): string
    {
        $base = Str::slug(Str::before($name, ' '), '-');

        if (blank($base)) {
            $base = Str::before(Str::lower(Str::before($email, '@')), '@');
        }

        $base = Str::lower($base ?: 'alumni');
        $candidate = $base;
        $counter = 1;

        while (User::where('username', $candidate)->exists()) {
            $candidate = $base.'-'.$counter;
            $counter++;
        }

        return $candidate;
    }
}

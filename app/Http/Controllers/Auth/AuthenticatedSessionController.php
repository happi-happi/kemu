<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Staff;

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
    $credentials = $request->only('email', 'password');

    // Attempt to authenticate using the 'web' guard
    if (Auth::guard('web')->attempt($credentials)) {
        $user = Auth::guard('web')->user();

        // Redirect based on the role for the 'web' guard
        switch ($user->Role) {
            case 'Admin':
                return redirect()->intended(RouteServiceProvider::ADMIN);
            case 'HeadTeacher':
            case 'SecondHeadTeacher':
            case 'DiscplineMaster':
            case 'Teacher':
                return redirect()->intended(RouteServiceProvider::TEACHER);
            case 'Student':
                return redirect()->intended(RouteServiceProvider::STUDENT);
            case 'Burser':
                return redirect()->intended(RouteServiceProvider::BURSER);
            default:
                return redirect()->back()->withErrors(['message' => 'Unauthorized role']);
        }
    }

    // Attempt to authenticate using the 'staff' guard
    if (Auth::guard('staff')->attempt($credentials)) {
        $staff = Auth::guard('staff')->user();

        // Redirect based on the role for the 'staff' guard
        switch ($staff->staffRole) {
            case 'Teacher':
            case 'HeadTeacher':
            case 'SecondHeadTeacher':
            case 'DiscplineMaster':
                return redirect()->intended(RouteServiceProvider::TEACHER);
            case 'Admin':
                return redirect()->intended(RouteServiceProvider::ADMIN);
            default:
                return redirect()->back()->withErrors(['message' => 'Unauthorized role']);
        }
    }

 // If authentication fails, redirect back with an error message
 return redirect()->back()->withErrors(['message' => 'Authentication failed']);
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

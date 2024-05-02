<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
        $request->authenticate();
    
        $request->session()->regenerate();
    
        if ($request->user()->Role === 'Teacher' || $request->user()->Role === 'HeadTeacher'
        || $request->user()->Role === 'SecondHeadTeacher'|| $request->user()->Role === 'DiscplineMaster') {
            return redirect()->intended(RouteServiceProvider::TEACHER);
        } elseif ($request->user()->Role === 'Admin') {
            return redirect()->intended(RouteServiceProvider::ADMIN);
        } elseif ($request->user()->Role === 'Burser') {
            return redirect()->intended(RouteServiceProvider::BURSER);
        }
        else {
            return redirect()->intended(RouteServiceProvider::STUDENT);
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

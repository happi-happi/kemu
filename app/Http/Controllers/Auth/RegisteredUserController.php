<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\schoolinformation;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $SchoolName = schoolinformation::all();
        return view('auth.register',compact('SchoolName'));
    }

    



    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Fname' => ['required', 'string', 'max:255'],
            'Mname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'class' => ['string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'subject' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'firstphonenumber' => ['required', 'integer'],
            'secondphonenumber' => ['required', 'integer'],
            'nameofschool' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'Fname' => $request->Fname,
            'Mname' => $request->Mname,
            'Lname' => $request->Lname,
            'class' => $request->class,
            'Role' => $request-> Role,
            'subject' => $request->subject,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'firstphonenumber' => $request->firstphonenumber,
            'secondphonenumber' => $request->secondphonenumber,
            'nameofschool' => $request->nameofschool,
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','student registration succesful');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\guardian;
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

   
  public function viewregisterstaff()
  {
    $SchoolName = schoolinformation::all(); 
    return view('registerStaff', compact('SchoolName'));
  }

    
  public function viewregisterguardian()
  {
    return view('registerguardian');
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
            'DateofBirth'   => ['required', 'string', 'max:255'],
            'PlaceofBirth'   => ['required', 'string', 'max:255'],
            'Nationality'  => ['required', 'string', 'max:255'],
            'Region'  => ['required', 'string', 'max:255'],
            'District'  => ['required', 'string', 'max:255'],
            'Currentresidence'  => ['required', 'string', 'max:255'],
            'SchoolName' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'PreviousSchool'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['confirmed', Rules\Password::defaults()],

        ]);

        $user = User::create([
            'Fname' => $request->Fname,
            'Mname' => $request->Mname,
            'Lname' => $request->Lname,
            'DateofBirth' => $request->DateofBirth,
            'PlaceofBirth' => $request->PlaceofBirth,
            'Nationality' => $request->Nationality,
            'Region' => $request->Region,
            'District' => $request->District,
            'Currentresidence' => $request->Currentresidence,
            'SchoolName' => $request->SchoolName,
            'Role' => $request-> Role,
            'PreviousSchool' => $request->PreviousSchool,
            'email' => $request->email,
            'password' => Hash::make($request->password),          
        
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','student registration succesful');
    }


    public function Guardian(Request $request): RedirectResponse
    {
          // Dump all request data and stop execution
    //dd($request->all());
    $request->validate([
        'FatherFullName' => ['required', 'string', 'max:255'],
        'Fatherfirstphonenumber' => ['required', 'string', 'max:10'],
        'Fathersecondphonenumber' => ['required', 'string', 'max:10'],
        'FatherOccupation' => ['nullable', 'string', 'max:255'],
        'Fatheremail' => ['required', 'string', 'email', 'max:255', 'unique:guardian,Fatheremail'],
        'FatherPhysicalAddress' => ['required', 'string', 'max:255'],
        'MotherFullName' => ['required', 'string', 'max:255'],
        'Motherfirstphonenumber' => ['required', 'string', 'max:15'],          
        'Mothersecondphonenumber' => ['required', 'string', 'max:15'],
        'MotherOccupation' => ['required', 'string', 'max:255'],
        'Motheremail' => ['required', 'string', 'email', 'max:255', 'unique:guardian,Motheremail'],
        'MotherPhysicalAddress' => ['required', 'string', 'max:255'],
        'GuardianFullName' => ['required', 'string', 'max:255'],
        'Relationtostudent' => ['required', 'string', 'max:255'],
        'Guardianfirstphonenumber' => ['required', 'string', 'max:10'],
        'Guardiansecondphonenumber' => ['required', 'string', 'max:10'],
        'password' => ['confirmed', Rules\Password::defaults()],
    ]);
    
        $guardian = guardian::create([
            'FatherFullName' => $request->FatherFullName,
            'Fatherfirstphonenumber' => $request->Fatherfirstphonenumber,
            'Fathersecondphonenumber' => $request->Fathersecondphonenumber,
            'FatherOccupation' => $request->FatherOccupation,
            'Fatheremail'=> $request->Fatheremail,
            'FatherPhysicalAddress' => $request->FatherPhysicalAddress,
            'MotherFullName' => $request->MotherFullName,   
            'Motherfirstphonenumber' => $request->Motherfirstphonenumber,       
            'Mothersecondphonenumber' => $request->Mothersecondphonenumber,
            'MotherOccupation' =>$request->MotherOccupation,
            'Motheremail' => $request->Motheremail,
            'GuardianFullName'   => $request->GuardianFullName,
            'Relationtostudent'   => $request->Relationtostudent,
            'Guardianfirstphonenumber' => $request->Guardianfirstphonenumber,
            'Guardiansecondphonenumber'  => $request->Guardiansecondphonenumber,
            'password' => Hash::make($request->password),
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','Guardian registration succesful');
    }

    public function registerstaff (Request $request): RedirectResponse
    {
        $request->validate([
            'staffFname' => ['required', 'string', 'max:255'],
            'staffMname' => ['required', 'string', 'max:255'],
            'staffLname' => ['required', 'string', 'max:255'],
            'staffDateofBirth' => ['string', 'max:255'],
            'staffPlaceofBirth' => ['required', 'string', 'max:255'],
            'staffNationality' => ['string', 'max:255'],
            'staffRegion' => ['required', 'string', 'max:255'],
            'staffDistrict' => ['required', 'string', 'max:255'],
            'staffCurrentresidence' => ['required', 'string', 'max:255'],
            'staffPreviousSchool' => ['required', 'string', 'max:255'],
            'staffnameofschool'   => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.staff::class],
            'class'   => ['required', 'string', 'max:255'],
            'staffRole'  => ['required', 'string', 'max:255'],
            'Password' => ['required', 'confirmed', Rules\Password::defaults()],
           
        ]);
        
        $staff = staff::create([
            'staffFname' => $request->staffFname,
            'staffMname' => $request->staffMname,
            'staffLname' => $request->staffLname,
            'staffDateofBirth' => $request->staffDateofBirth,
            'staffPlaceofBirth' => $request->staffPlaceofBirth,
            'staffNationality' => $request->staffNationality,          
            'staffRegion' => $request->staffRegion,
            'staffDistrict' =>$request->staffDistrict,
            'staffCurrentresidence' => $request->staffCurrentresidence,
            'staffPreviousSchool'  => $request->staffPreviousSchool,
            'staffnameofschool'   => $request->staffnameofschool,
            'email'=> $request->email,
            'class'  => $request->class,
            'staffRole'  => $request->staffRole,
            'Password' => Hash::make($request->password),
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','staff registration succesful');
    }
}

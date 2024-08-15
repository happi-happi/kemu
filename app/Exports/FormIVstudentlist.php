<?php

namespace App\Exports;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;

class FormIVstudentlist implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        $userId = Auth::id(); 
        $User = \DB::table('users')
        ->where('id', $userId)
        ->first();    
        $NameofSchool = $User->nameofschool;

        return user::select('id','Fname','Mname','Lname')->where('class','LIKE',"Formfour")
        ->where("nameofschool",'LIKE',$NameofSchool)  
        ->get();
    }
}

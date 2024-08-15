<?php

namespace App\Exports;
use App\Models\user;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class STDVIIstudentlist implements FromCollection
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
        return user::select('id','Fname','Mname','Lname')->where('class','LIKE',"Standardseven")-> where("nameofschool",'LIKE',$NameofSchool) 
        ->get(); 
    }
}

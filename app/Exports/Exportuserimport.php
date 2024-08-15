<?php

namespace App\Exports;
use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;

class Exportuserimport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return user::select('id','Fname','Mname','Lname')->where('Role','LIKE',"Student")
        ->get(); 
    }
}

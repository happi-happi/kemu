<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\standard_six_first_midterm;

class standard_six_first_midtermresult implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //


        foreach ($rows as $row) 
        {
            standard_six_first_midterm::create([
                'id'=>$row['id'] ?? null,
                'Fname'=>$row['fname'] ?? null,
                'Mname'=> $row['mname'] ?? null ,
                'Lname'=> $row['lname'] ?? null,
                'Arabic'=> $row['arabic'] ?? null,
                'CivicsandMorals'=> $row['civicsandmorals'] ?? null,
                'English'=> $row['english'] ?? null,
                'EDK'=> $row['edk'] ?? null,
                'Mathematics'=> $row['mathematics'] ?? null,
                'Science'=> $row['science'] ?? null,
                'Socialsstudies'=> $row['socialsstudies'] ?? null,
                'Kiswahili'=> $row['kiswahili'] ?? null,
            ]);
        }
    }
}

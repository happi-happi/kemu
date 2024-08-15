<?php

namespace App\Imports;
use App\Models\formiv_annual;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class formfour_annualresult implements ToCollection,WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach ($rows as $row) 
        {
            formiv_annual::create([
                'id'=>$row['id'] ?? null,
                'Fname'=>$row['fname'] ?? null,
                'Mname'=> $row['mname'] ?? null ,
                'Lname'=> $row['lname'] ?? null,
                'Arabiclanguage'=> $row['arabiclanguage'] ?? null,
                'Basicmathematics'=> $row['basicmathematics'] ?? null,
                'Bibleknowledge'=> $row['bibleknowledge'] ?? null,
                'Bookkeeping'=> $row['bookkeeping'] ?? null,
                'Biology'=> $row['biology'] ?? null,
                'Civics'=> $row['civics'] ?? null,
                'Chemistry'=> $row['chemistry'] ?? null,
                'Computerstudy'=> $row['computerstudy'] ?? null,
                'Biology'=> $row['biology'] ?? null,
                'Creativearts'=> $row['creativearts'] ?? null,
                'Commerce'=> $row['commerce'] ?? null,
                'Englishliterature'=> $row['englishliterature'] ?? null,
                'French'=> $row['french'] ?? null,
                'Geography'=> $row['geography'] ?? null,
                'History'=> $row['history'] ?? null,
                'Islamicknowledge'=> $row['islamicknowledge'] ?? null,
                'Computerstudy'=> $row['computerstudy'] ?? null,
                'Kiswahili'=> $row['kiswahili'] ?? null,
                'Lifeskill'=> $row['lifeskill'] ?? null,
                'Physics'=> $row['physics'] ?? null,
                'Swimming'=> $row['swimming'] ?? null,
                'Nutrition'=> $row['nutrition'] ?? null,
            ]);
        }

    }
}

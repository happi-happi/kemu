<?php

namespace App\Imports;
use App\Models\standad_one;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class standard_OneImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
{
    foreach ($rows as $row) {
        standad_one::create([
           // 'id' => $row[0], // Assuming 'id' is in the first column (index 0)
            'Fname' => $row[0] ?? null,
            'Mname' => $row[1] ?? null,
            'Lname' => $row[2] ?? null,
            'Biology' => $row[3] ?? null,
            'Civics' => $row[4] ?? null,
            'Englishlanguage' => $row[5] ?? null,
            'French' => $row[6] ?? null,
            'Geography' => $row[7] ?? null,
            'History' => $row[8] ?? null,
            'InformationandCommunicationTechnology' => $row[9] ?? null,
            'Kiswahili' => $row[10] ?? null,
            'Mathematics' => $row[11]?? null,
            'schoolsports' => $row[12] ?? null,
            'Science' => $row[13] ?? null,
            'vocationalsubjects' => $row[14]?? null,
            
        ]);
    }
}
}

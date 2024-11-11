<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Subject;
use App\Models\Schoolinformation;
use App\Models\staff;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Assuming a relation exists or you join data from the models
        $results = User::with(['subject', 'schoolinformation',''])
            ->where('school_id', auth()->user()->school_id)
            ->where('class', auth()->user()->class)
            ->get()
            ->map(function ($user) {
                return [
                    'Student ID' => $user->user->id ?? '',
                    'student_name' => $user->Fname . ' ' . $user->Mname . ' ' . $user->Lname,
                    'subject_name' => $user->subject->name ?? '',
                    'subjects_id' => $user->subject->id ?? '',
                    'staff_id' => $user->staff->id ?? '',
                    'school_name' => $user->schoolinformation->id ?? '',
                    'score' => $user->score ?? '', // Adjust as per actual field
                    'academic_year' => now()->year, // Example for academic year
                ];
            });

        return collect($results);
    }

    public function headings(): array
    {
        return [
            'Student Name',
            'Subject',
            'School Name',
            'Score',
            'Academic Year',
        ];
    }
}

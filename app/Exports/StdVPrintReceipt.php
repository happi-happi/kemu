<?php

namespace App\Exports;
use App\Models\User;
use App\Models\stdv_payment_fee;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StdVPrintReceipt implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection(): Collection
    {
        // Fetch data from the database
        $user = User::findOrFail($this->id);
        
        $payments = stdv_payment_fee::whereHas('user', function ($query) {
            $query->where('id', $this->id);
        })->get();
    
        // Initialize an empty array to hold the transformed data
        $data = [];
    
        // Add user information as the first row in the data array
        $data[] = [
            'Field' => 'Fname',
            'Value' => $user->Fname,
        ];
        $data[] = [
            'Field' => 'Mname',
            'Value' => $user->Mname,
        ];
        $data[] = [
            'Field' => 'Lname',
            'Value' => $user->Lname,
        ];
        $data[] = [
            'Field' => 'Class',
            'Value' => $user->class,
        ];
        $data[] = [
            'Field' => 'Occupation',
            'Value' => $user->Occupation,
        ];
        $data[] = [
            'Field' => 'Email',
            'Value' => $user->email,
        ];
        $data[] = [
            'Field' => 'First Phone Number',
            'Value' => $user->firstphonenumber,
        ];
        $data[] = [
            'Field' => 'Second Phone Number',
            'Value' => $user->secondphonenumber,
        ];
        $data[] = [
            'Field' => 'Name of School',
            'Value' => $user->nameofschool,
        ];
    
        // Add an empty row to separate user information from payment details
        $data[] = ['Field' => '', 'Value' => ''];
    
        // Iterate through each payment and add its details as subsequent rows
        foreach ($payments as $payment) {
            $data[] = [
                'Field' => 'Total Fee Amount',
                'Value' => $payment->TotalFeeAmount,
            ];
            $data[] = [
                'Field' => 'Amount Paid',
                'Value' => $payment->AmountPaid,
            ];
            $data[] = [
                'Field' => 'Amount Not Paid',
                'Value' => $payment->AmountNotPaid,
            ];
            $data[] = [
                'Field' => 'Status',
                'Value' => $payment->Status,
            ];
            $data[] = [
                'Field' => 'Overpayment',
                'Value' => $payment->OverPayment,
            ];
    
            // Add an empty row to separate payment details from the next user's information
            $data[] = ['Field' => '', 'Value' => ''];
        }
    
        // Convert the data array into a collection
        return new Collection($data);
    }

    public function headings(): array
    {
        // Define table headers
        return [
            'Field',
            'Value',
        ];
    }
    }


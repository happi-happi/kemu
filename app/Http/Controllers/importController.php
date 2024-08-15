<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class importController extends Controller
{
    //

    public function import(Request $request){
         
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new standard_OneImpor, $request->file('import_file'));
        return redirect()->back()->with('status','import successfull');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\user;
use App\Models\standad_one;
use App\Models\standard_four;
use App\Models\standard_four_first_midterm;
use App\Models\standard_four_semi_annual;
use App\Models\standard_four_second_midterm;
use App\Models\standard_four_annual;
use App\Models\standard_five_first_midterm;
use App\Models\standard_five_semi_annual;
use App\Models\standard_five_second_midterm;
use App\Models\standard_five_annual;
use App\Models\standard_six_first_midterm;
use App\Models\standard_six_semi_annual;
use App\Models\standard_six_second_midterm;
use App\Models\standard_six_annual;
use App\Models\standard_seven_first_midterm;
use App\Models\standard_seven_semi_annual;
use App\Models\standard_seven_second_midterm;
use App\Models\standard_seven_annual;
use App\Models\student_payment_fee;
use App\Models\stdv_payment_fee;
use App\Models\stdvi_payment_fee;
use App\Models\stdvii_payment_fee;
use App\Models\comment;
use App\Models\message;
use App\Models\schoolinformation;
use App\Models\formi_first_midterm;
use App\Models\formi_semi_annual;
use App\Models\formi_second_midterm;
use App\Models\formi_annual;
use App\Models\formii_first_midterm;
use App\Models\formii_semi_annual;
use App\Models\formii_second_midterm;
use App\Models\formii_annual;
use App\Models\formiii_first_midterm;
use App\Models\formiii_semi_annual;
use App\Models\formiii_second_midterm;
use App\Models\formiii_annual;
use App\Models\formiv_first_midterm;
use App\Models\formiv_semi_annual;
use App\Models\formiv_second_midterm;
use App\Models\formiv_annual;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\standard_OneImport;
use App\Imports\standard_four_first_midtermresult;
use App\Imports\standard_four__semi__annualresult;
use App\Imports\standard_four_second_midtermresult;
use App\Imports\standard_four_annualresult;
use App\Imports\standard_five_first_midtermresult;
use App\Imports\standard_five_second_midtermresult;
use App\Imports\standard_five_semi_annualresult;
use App\Imports\standard_five_annual_result;
use App\Imports\standard_six_first_midtermresult;
use App\Imports\standard_six_second_midtermresult;
use App\Imports\standard_six_semi_annualresult;
use App\Imports\standard_six_annual_result;
use App\Imports\standard_seven_first_midtermresult;
use App\Imports\standard_seven_second_midtermresult;
use App\Imports\standard_seven_semi_annualresult;
use App\Imports\standard_seven_annualresult;
use App\Imports\formone_first_midtermresult;
use App\Imports\formone_semi_annualresult;
use App\Imports\formone_second_midtermtresult;
use App\Imports\formone_annualresult;
use App\Imports\formtwo_first_midtermresult;
use App\Imports\formtwo_semi_annualresult;
use App\Imports\formtwo_second_midtermtresult;
use App\Imports\formtwo_annualresult;
use App\Imports\formthree_first_midtermresult;
use App\Imports\formthree_semi_annualresult;
use App\Imports\formthree_second_midtermresult;
use App\Imports\formthree_annualresult;
use App\Imports\formfour_first_midtermresult;
use App\Imports\formfour_semi_annualresult;
use App\Imports\formfour_second_midtermresult;
use App\Imports\formfour_annualresult;
use App\Exports\Exportuserimport;
use App\Exports\StdIVPrintReceipt;
use App\Exports\StdVPrintReceipt;
use App\Exports\StdVIPrintReceipt;
use App\Exports\StdVIIPrintReceipt;
use App\Exports\STDIVstudentlist;
use App\Exports\STDVstudentlist;
use App\Exports\STDVIstudentlist;
use App\Exports\STDVIIstudentlist;
use App\Exports\FormIstudentlist;
use App\Exports\FormIIstudentlist;
use App\Exports\FormIIIstudentlist;
use App\Exports\FormIVstudentlist;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    Public function teacher()
    {
        $SchoolName = schoolinformation::all(); 
        return view('Teacher', compact('SchoolName'));
    }

    Public function importexcel()
    {

        return view('import');
    }

   Public function standardfiveimport(){

    return view('standardfive');
   }

   Public function standardsiximport(){

    return view('standardsix');
   }

   Public function standardsevenimport(){

    return view('standardseven');
   }

   Public function standardformoneimport(){

    return view('formone');
   }

   Public function standardformtwoimport(){

    return view('formtwo');
   }

   Public function standardformthreeimport(){

    return view('formthree');
   }


   Public function standardformfourimport(){

    return view('formfour');

   }

  
 public function Deactivateview(){
    $SchoolName = schoolinformation::all(); 
    $UserName = user::all(); 

    return view('DeactivateAccount', compact('SchoolName','UserName'));
}

public function deactivateUsersByRole(Request $request) {
    $schoolId = $request->input('SchoolName');
    
    // Find the school by its ID
    $school = schoolinformation::find($schoolId);

    if (!$school) {
        return redirect()->back()->with('error', 'School not found.');
    }

    // Deactivate all users associated with this school
    $users = user::where('nameofschool', $school->SchoolName)->update(['is_active' => false]);

    return redirect()->back()->with('success', 'All users associated with the school ' . $school->SchoolName . ' have been deactivated successfully.');
}


public function activateUsersByRole(Request $request) {
    $schoolId = $request->input('SchoolName');
    
    // Find the school by its ID
    $school = schoolinformation::find($schoolId);

    if (!$school) {
        return redirect()->back()->with('error', 'School not found.');
    }

    // Deactivate all users associated with this school
    $users = user::where('nameofschool', $school->SchoolName)->update(['is_active' => true]);

    return redirect()->back()->with('success', 'All users associated with the school ' . $school->SchoolName . ' have been deactivated successfully.');
}

    public function import(Request $request){
         
        $request->validate([
            'import_file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new standard_OneImport, $request->file('import_file'));
        return redirect()->back()->with('status','import successfull');
    }

    public function exportUsers(Request $request){
        return Excel::download(new Exportuserimport, 'users.xlsx');
    }

    public function STDIVstudentlist(Request $request){
        return Excel::download(new STDIVstudentlist, 'user.xlsx');
    }

    public function STDVstudentlist(Request $request){
        return Excel::download(new STDVstudentlist, 'user.xlsx');
    }

    public function STDVIstudentlist(Request $request){
        return Excel::download(new STDVIstudentlist, 'user.xlsx');
    }

    public function STDVIIstudentlist(Request $request){
        return Excel::download(new STDVIIstudentlist, 'user.xlsx');
    }


    public function FormI(Request $request){
        return Excel::download(new FormIstudentlist, 'user.xlsx');
    }

    public function FormII(Request $request){
        return Excel::download(new FormIIstudentlist, 'user.xlsx');
    }

    public function FormIII(Request $request){
        return Excel::download(new FormIIIstudentlist, 'user.xlsx');
    }

    public function FormIV(Request $request){
        return Excel::download(new FormIVstudentlist, 'user.xlsx');
    }



    public function standardfourfirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_four_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function standardfourSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_four__semi__annualresult, $request->file('import_file'));
           return redirect()->back()->with('status','import successfull');
    }




   public function standard_four_second_midterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_four_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }


   public function standard_four_annual(Request $request){
    $request ->validate(
        [
            'import_file' => [
                'required',
                  'file'
            ],
        ]);

        Excel::import(new standard_four_annualresult, $request->file('import_file'));
       return redirect()->back()->with('notification','import successfull');
}



    public function standardfivefirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_five_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    
    public function standardfivesecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_five_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }


      
    public function standardfiveSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_five_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }


    public function standardfiveAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_five_annual_result, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }


    public function standardsixfirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_six_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }


    public function standardsixsecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_six_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    public function standardsixSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_six_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }


   public function standardsixAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_six_annual_result, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }



    public function standardsevenfirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_seven_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function standardsevensecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_seven_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    public function standardsevenSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_seven_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }

    public function standardsevenAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new standard_seven_annualresult, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }

    public function standardformonefirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formone_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function standardformoneSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formone_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }

    public function standardformonesecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formone_second_midtermtresult, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }

    public function standardformoneAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formone_annualresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    public function standardformtwofirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formtwo_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function  standardformtwoSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formtwo_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }

    public function standardformtwosecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formtwo_second_midtermtresult, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }

    public function standardformtwoAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formtwo_annualresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    public function standardformthreefirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formthree_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function  standardformthreeSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formthree_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }

    public function standardformthreesecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formthree_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }

    public function standardformthreeAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formthree_annualresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    public function standardformfourfirstmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formfour_first_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('message','import successfull');
    }

    public function  standardformfourSemiAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formfour_semi_annualresult, $request->file('import_file'));
           return redirect()->back()->with('Alert','import successfull');
    }

    public function standardformfoursecondmidterm(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formfour_second_midtermresult, $request->file('import_file'));
           return redirect()->back()->with('notifications','import successfull');
    }

    public function standardformfourAnnual(Request $request){
        $request ->validate(
            [
                'import_file' => [
                    'required',
                      'file'
                ],
            ]);

            Excel::import(new formfour_annualresult, $request->file('import_file'));
           return redirect()->back()->with('notification','import successfull');
    }

    //student Page 
    private function calculateGrade($score) {
        if ($score >= 80) {
            return 'A';
        } elseif ($score >= 70) {
            return 'B';
        } elseif ($score >= 60) {
            return 'C';
        } elseif ($score >= 50) {
            return 'D';
        } else {
            return 'F';
        }
    }

  

   

    public function calculatePositionSTDIV($id) {
        // Fetch all scores from the database
        $ArabicallScoresFM = standard_four_first_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresFM = standard_four_first_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresFM = standard_four_first_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresFM = standard_four_first_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresFM = standard_four_first_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresFM = standard_four_first_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresFM = standard_four_first_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresFM = standard_four_first_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSA = standard_four_semi_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSA = standard_four_semi_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSA = standard_four_semi_annual::pluck('English', 'id')->toArray();
        $EDKallScoresSA = standard_four_semi_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSA = standard_four_semi_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSA= standard_four_semi_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSA = standard_four_semi_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSA = standard_four_semi_annual::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSM = standard_four_second_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSM = standard_four_second_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSM = standard_four_second_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresSM = standard_four_second_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSM = standard_four_second_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSM= standard_four_second_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSM = standard_four_second_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSM = standard_four_second_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresAL = standard_four_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresAL = standard_four_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresAL = standard_four_annual::pluck('English', 'id')->toArray();
        $EDKallScoresAL = standard_four_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresAL = standard_four_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresAL= standard_four_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresAL = standard_four_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresAL = standard_four_annual::pluck('Kiswahili', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabicallScoresFM);
        arsort($CivicsandMoralsallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($EDKallScoresFM);
        arsort($MathematicsallScoresFM);
        arsort($ScienceScoresFM);
        arsort($SocialsstudiesallScoresFM);
        arsort($KiswahiliScoresFM);

        arsort($ArabicallScoresSA);
        arsort($CivicsandMoralsallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($EDKallScoresSA);
        arsort($MathematicsallScoresSA);
        arsort($ScienceScoresSA);
        arsort($SocialsstudiesallScoresSA);
        arsort($KiswahiliScoresSA);

        arsort($ArabicallScoresSM );
        arsort($CivicsandMoralsallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($EDKallScoresSM);
        arsort($MathematicsallScoresSM);
        arsort($ScienceScoresSM);
        arsort($SocialsstudiesallScoresSM);
        arsort($KiswahiliScoresSM);


        arsort($ArabicallScoresAL);
        arsort($CivicsandMoralsallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($EDKallScoresAL);
        arsort($MathematicsallScoresAL);
        arsort($ScienceScoresAL);
        arsort($SocialsstudiesallScoresAL);
        arsort($KiswahiliScoresAL);



    
        // Find the position of the user
        $positionArabic = array_search($id, array_keys($ArabicallScoresFM)) + 1;
        $positionCivicsandMorals = array_search($id, array_keys($CivicsandMoralsallScoresFM)) + 1;
        $positionEnglish = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionEDK  = array_search($id, array_keys($EDKallScoresFM)) + 1;
        $positionMathematics = array_search($id, array_keys($MathematicsallScoresFM)) + 1;
        $positionScience = array_search($id, array_keys($ScienceScoresFM)) + 1;
        $positionSocialsstudies = array_search($id, array_keys($SocialsstudiesallScoresFM)) + 1;
        $positionKiswahili = array_search($id, array_keys($KiswahiliScoresFM)) + 1;


        $positionArabicSA  = array_search($id, array_keys($ArabicallScoresSA)) + 1;
        $positionCivicsandMoralsSA  = array_search($id, array_keys($CivicsandMoralsallScoresSA )) + 1;
        $positionEnglishSA  = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionEDKSA   = array_search($id, array_keys($EDKallScoresSA)) + 1;
        $positionMathematicsSA  = array_search($id, array_keys($MathematicsallScoresSA)) + 1;
        $positionScienceSA  = array_search($id, array_keys($ScienceScoresSA)) + 1;
        $positionSocialsstudiesSA  = array_search($id, array_keys($SocialsstudiesallScoresSA)) + 1;
        $positionKiswahiliSA  = array_search($id, array_keys($KiswahiliScoresSA)) + 1;

        $positionArabicSM = array_search($id, array_keys($ArabicallScoresSM)) + 1;
        $positionCivicsandMoralsSM = array_search($id, array_keys($CivicsandMoralsallScoresSM)) + 1;
        $positionEnglishSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionEDKSM  = array_search($id, array_keys($EDKallScoresSM)) + 1;
        $positionMathematicsSM = array_search($id, array_keys($MathematicsallScoresSM)) + 1;
        $positionScienceSM = array_search($id, array_keys($ScienceScoresSM)) + 1;
        $positionSocialsstudiesSM = array_search($id, array_keys($SocialsstudiesallScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliScoresSM)) + 1;

        $positionArabicAL = array_search($id, array_keys($ArabicallScoresAL)) + 1;
        $positionCivicsandMoralsAL = array_search($id, array_keys($CivicsandMoralsallScoresAL)) + 1;
        $positionEnglishAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionEDKAL  = array_search($id, array_keys($EDKallScoresAL)) + 1;
        $positionMathematicsAL = array_search($id, array_keys($MathematicsallScoresAL)) + 1;
        $positionScienceAL = array_search($id, array_keys($ScienceScoresAL)) + 1;
        $positionSocialsstudiesAL = array_search($id, array_keys($SocialsstudiesallScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliScoresAL)) + 1;
        return [
            'FirstMidterm' => [
                'Arabic' => $positionArabic,
                'CivicsandMorals' => $positionCivicsandMorals,
                'English' => $positionEnglish,
                'EDK' => $positionEDK,
                'Mathematics' => $positionMathematics,
                'Science' => $positionScience,
                'Socialsstudies' => $positionSocialsstudies,
                'Kiswahili' => $positionKiswahili,
            ],
            'SemiAnnual' => [
                'Arabic' => $positionArabicSA,
                'CivicsandMorals' => $positionCivicsandMoralsSA,
                'English' => $positionEnglishSA,
                'EDK' => $positionEDKSA,
                'Mathematics' => $positionMathematicsSA,
                'Science' => $positionScienceSA,
                'Socialsstudies' => $positionSocialsstudiesSA,
                'Kiswahili' => $positionKiswahiliSA,
            ],
            'SecondMidterm' => [
                'Arabic' => $positionArabicSM,
                'CivicsandMorals' => $positionCivicsandMoralsSM,
                'English' => $positionEnglishSM,
                'EDK' => $positionEDKSM,
                'Mathematics' => $positionMathematicsSM,
                'Science' => $positionScienceSM,
                'Socialsstudies' => $positionSocialsstudiesSM,
                'Kiswahili' => $positionKiswahiliSM,
            ],
            'Annual' => [
                'Arabic' => $positionArabicAL,
                'CivicsandMorals' => $positionCivicsandMoralsAL,
                'English' => $positionEnglishAL,
                'EDK' => $positionEDKAL,
                'Mathematics' => $positionMathematicsAL,
                'Science' => $positionScienceAL,
                'Socialsstudies' => $positionSocialsstudiesAL,
                'Kiswahili' => $positionKiswahiliAL,
            ],
        ];
        
    }


    public function student()
    {
        $userId = Auth::id();
        $data = standard_four_first_midterm::where('id', $userId)->first();
     
        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('Student', compact('errorMessage'));
        }

        $positionArabic = $this->calculatePositionSTDIV($userId);
        $positionCivicsandMorals = $this->calculatePositionSTDIV($userId);
        $positionEnglish = $this->calculatePositionSTDIV($userId);
        $positionEDK = $this->calculatePositionSTDIV($userId);
        $positionMathematics = $this->calculatePositionSTDIV($userId);
        $positionScience = $this->calculatePositionSTDIV($userId);
        $positionSocialsstudies = $this->calculatePositionSTDIV($userId);
        $positionKiswahili = $this->calculatePositionSTDIV($userId);
       
       
        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili;

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageFM = $TotalSubjectMarks/$TotalSubject;
        
 
        
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

   
    
        $standardfourSAR = standard_four_semi_annual::where('id', $userId)->first();
        if (!$standardfourSAR) {
            $errorMessage = "No data found for the authenticated user.";
            return view('Student', compact('errorMessage'));
        }

        $positionArabicSA = $this->calculatePositionSTDIV($userId);
        $positionCivicsandMoralsSA = $this->calculatePositionSTDIV($userId);
        $positionEnglishSA = $this->calculatePositionSTDIV($userId);
        $positionEDKSA = $this->calculatePositionSTDIV($userId);
        $positionMathematicsSA = $this->calculatePositionSTDIV($userId);
        $positionScienceSA = $this->calculatePositionSTDIV($userId);
        $positionSocialsstudiesSA = $this->calculatePositionSTDIV($userId);
        $positionKiswahiliSA = $this->calculatePositionSTDIV($userId);

        $Arabic = $standardfourSAR->Arabic;
        $CivicsandMorals = $standardfourSAR->CivicsandMorals;
        $English = $standardfourSAR->English;
        $EDK = $standardfourSAR->EDK;
        $Mathematics = $standardfourSAR->Mathematics; 
        $Science = $standardfourSAR->Science;
        $Socialsstudies = $standardfourSAR->Socialsstudies;
        $Kiswahili = $standardfourSAR->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $gradesSTDIVSM = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        
        // Pass all data to the view as a single array
        return view('Student', [
            'data' => $data,
            'grades' => $grades,
            'standardfourSAR' => $standardfourSAR,
            'gradesSTDIVSM' => $gradesSTDIVSM,
        
            'positionArabic' => $positionArabic,           
    'positionCivicsandMorals' => $positionCivicsandMorals,
    'positionEnglish' => $positionEnglish,
    'positionEDK' => $positionEDK,
    'positionMathematics' => $positionMathematics,
    'positionScience' => $positionScience,
    'positionSocialsstudies' => $positionSocialsstudies,
    'positionKiswahili' => $positionKiswahili,
    '$AverageFM'  => $AverageFM,
    

    'positionArabicSA' => $positionArabicSA,           
    'positionCivicsandMoralsSA' => $positionCivicsandMoralsSA,
    'positionEnglishSA' => $positionEnglishSA,
    'positionEDKSA' => $positionEDKSA,
    'positionMathematicsSA' => $positionMathematicsSA,
    'positionScienceSA' => $positionScienceSA,
    'positionSocialsstudiesSA' => $positionSocialsstudiesSA,
    'positionKiswahiliSA' => $positionKiswahiliSA,
    'AverageSA' => $AverageSA,           
    

        ],compact('AverageFM','AverageSA'));
    }



    Public function standardfourSM(){
        $userId = Auth::id();
        $standardfourSM = standard_four_second_midterm::where('id',$userId)->first();


        if (!$standardfourSM) {
            $errorMessage = "No data found for the authenticated user.";
            return view('Student', compact('errorMessage'));
        }

        $positionArabicSM = $this->calculatePositionSTDIV($userId);
        $positionCivicsandMoralsSM = $this->calculatePositionSTDIV($userId);
        $positionEnglishSM = $this->calculatePositionSTDIV($userId);
        $positionEDKSM = $this->calculatePositionSTDIV($userId);
        $positionMathematicsSM = $this->calculatePositionSTDIV($userId);
        $positionScienceSM = $this->calculatePositionSTDIV($userId);
        $positionSocialsstudiesSM = $this->calculatePositionSTDIV($userId);
        $positionKiswahiliSM = $this->calculatePositionSTDIV($userId);
        

        $Arabic = $standardfourSM->Arabic;
        $CivicsandMorals = $standardfourSM->CivicsandMorals;
        $English = $standardfourSM->English;
        $EDK = $standardfourSM->EDK;
        $Mathematics = $standardfourSM->Mathematics; 
        $Science = $standardfourSM->Science;
        $Socialsstudies = $standardfourSM->Socialsstudies;
        $Kiswahili = $standardfourSM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSM = $TotalSubjectMarks/$TotalSubject;


    
        // Calculating grades
        $StdIVSMgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        $standardfourAnnual = standard_four_annual::where('id',$userId)->first();

        $positionArabicAL = $this->calculatePositionSTDIV($userId);
        $positionCivicsandMoralsAL = $this->calculatePositionSTDIV($userId);
        $positionEnglishAL = $this->calculatePositionSTDIV($userId);
        $positionEDKAL = $this->calculatePositionSTDIV($userId);
        $positionMathematicsAL = $this->calculatePositionSTDIV($userId);
        $positionScienceAL = $this->calculatePositionSTDIV($userId);
        $positionSocialsstudiesAL = $this->calculatePositionSTDIV($userId);
        $positionKiswahiliAL = $this->calculatePositionSTDIV($userId);

        $Arabic = $standardfourAnnual->Arabic;
        $CivicsandMorals = $standardfourAnnual->CivicsandMorals;
        $English = $standardfourAnnual->English;
        $EDK = $standardfourAnnual->EDK;
        $Mathematics = $standardfourAnnual->Mathematics; 
        $Science = $standardfourAnnual->Science;
        $Socialsstudies = $standardfourAnnual->Socialsstudies;
        $Kiswahili = $standardfourAnnual->Kiswahili; 
    
        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageAL = $TotalSubjectMarks/$TotalSubject;

        // Calculating grades
        $StdAnnualgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        return view('standardfourSM', [
            'standardfourSM' => $standardfourSM,
            'StdIVSMgrades' => $StdIVSMgrades,           
            'standardfourAnnual' => $standardfourAnnual,
            'StdAnnualgrades' => $StdAnnualgrades,
            
            'positionArabicSM' => $positionArabicSM,           
            'positionCivicsandMoralsSM' => $positionCivicsandMoralsSM,
            'positionEnglishSM' => $positionEnglishSM,
            'positionEDKSM' => $positionEDKSM,
            'positionMathematicsSM' => $positionMathematicsSM,
            'positionScienceSM' => $positionScienceSM,
            'positionSocialsstudiesSM' => $positionSocialsstudiesSM,
            'positionKiswahiliSM' => $positionKiswahiliSM,

            'positionArabicAL' => $positionArabicAL,           
            'positionCivicsandMoralsAL' => $positionCivicsandMoralsAL,
            'positionEnglishAL' => $positionEnglishAL,
            'positionEDKAL' => $positionEDKAL,
            'positionMathematicsAL' => $positionMathematicsAL,
            'positionScienceAL' => $positionScienceAL,
            'positionSocialsstudiesAL' => $positionSocialsstudiesAL,
            'positionKiswahiliAL' => $positionKiswahiliAL,
        ],compact('AverageSM','AverageAL'));
    }
   

public function calculatePositionSTDV($id) {
        // Fetch all scores from the database
        $ArabicallScoresFM = standard_five_first_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresFM = standard_five_first_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresFM = standard_five_first_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresFM = standard_five_first_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresFM = standard_five_first_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresFM = standard_five_first_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresFM = standard_five_first_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresFM = standard_five_first_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSA = standard_five_semi_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSA = standard_five_semi_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSA = standard_five_semi_annual::pluck('English', 'id')->toArray();
        $EDKallScoresSA = standard_five_semi_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSA = standard_five_semi_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSA= standard_five_semi_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSA = standard_five_semi_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSA =standard_five_semi_annual::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSM = standard_five_second_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSM = standard_five_second_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSM = standard_five_second_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresSM = standard_five_second_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSM = standard_five_second_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSM= standard_five_second_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSM = standard_five_second_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSM = standard_four_second_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresAL = standard_five_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresAL = standard_five_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresAL = standard_five_annual::pluck('English', 'id')->toArray();
        $EDKallScoresAL = standard_five_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresAL = standard_five_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresAL= standard_five_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresAL = standard_five_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresAL = standard_five_annual::pluck('Kiswahili', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabicallScoresFM);
        arsort($CivicsandMoralsallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($EDKallScoresFM);
        arsort($MathematicsallScoresFM);
        arsort($ScienceScoresFM);
        arsort($SocialsstudiesallScoresFM);
        arsort($KiswahiliScoresFM);

        arsort($ArabicallScoresSA);
        arsort($CivicsandMoralsallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($EDKallScoresSA);
        arsort($MathematicsallScoresSA);
        arsort($ScienceScoresSA);
        arsort($SocialsstudiesallScoresSA);
        arsort($KiswahiliScoresSA);

        arsort($ArabicallScoresSM );
        arsort($CivicsandMoralsallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($EDKallScoresSM);
        arsort($MathematicsallScoresSM);
        arsort($ScienceScoresSM);
        arsort($SocialsstudiesallScoresSM);
        arsort($KiswahiliScoresSM);


        arsort($ArabicallScoresAL);
        arsort($CivicsandMoralsallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($EDKallScoresAL);
        arsort($MathematicsallScoresAL);
        arsort($ScienceScoresAL);
        arsort($SocialsstudiesallScoresAL);
        arsort($KiswahiliScoresAL);



    
        // Find the position of the user
        $positionArabic = array_search($id, array_keys($ArabicallScoresFM)) + 1;
        $positionCivicsandMorals = array_search($id, array_keys($CivicsandMoralsallScoresFM)) + 1;
        $positionEnglish = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionEDK  = array_search($id, array_keys($EDKallScoresFM)) + 1;
        $positionMathematics = array_search($id, array_keys($MathematicsallScoresFM)) + 1;
        $positionScience = array_search($id, array_keys($ScienceScoresFM)) + 1;
        $positionSocialsstudies = array_search($id, array_keys($SocialsstudiesallScoresFM)) + 1;
        $positionKiswahili = array_search($id, array_keys($KiswahiliScoresFM)) + 1;


        $positionArabicSA  = array_search($id, array_keys($ArabicallScoresSA)) + 1;
        $positionCivicsandMoralsSA  = array_search($id, array_keys($CivicsandMoralsallScoresSA )) + 1;
        $positionEnglishSA  = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionEDKSA   = array_search($id, array_keys($EDKallScoresSA)) + 1;
        $positionMathematicsSA  = array_search($id, array_keys($MathematicsallScoresSA)) + 1;
        $positionScienceSA  = array_search($id, array_keys($ScienceScoresSA)) + 1;
        $positionSocialsstudiesSA  = array_search($id, array_keys($SocialsstudiesallScoresSA)) + 1;
        $positionKiswahiliSA  = array_search($id, array_keys($KiswahiliScoresSA)) + 1;

        $positionArabicSM = array_search($id, array_keys($ArabicallScoresSM)) + 1;
        $positionCivicsandMoralsSM = array_search($id, array_keys($CivicsandMoralsallScoresSM)) + 1;
        $positionEnglishSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionEDKSM  = array_search($id, array_keys($EDKallScoresSM)) + 1;
        $positionMathematicsSM = array_search($id, array_keys($MathematicsallScoresSM)) + 1;
        $positionScienceSM = array_search($id, array_keys($ScienceScoresSM)) + 1;
        $positionSocialsstudiesSM = array_search($id, array_keys($SocialsstudiesallScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliScoresSM)) + 1;

        $positionArabicAL = array_search($id, array_keys($ArabicallScoresAL)) + 1;
        $positionCivicsandMoralsAL = array_search($id, array_keys($CivicsandMoralsallScoresAL)) + 1;
        $positionEnglishAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionEDKAL  = array_search($id, array_keys($EDKallScoresAL)) + 1;
        $positionMathematicsAL = array_search($id, array_keys($MathematicsallScoresAL)) + 1;
        $positionScienceAL = array_search($id, array_keys($ScienceScoresAL)) + 1;
        $positionSocialsstudiesAL = array_search($id, array_keys($SocialsstudiesallScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliScoresAL)) + 1;
        return [
            'FirstMidterm' => [
                'Arabic' => $positionArabic,
                'CivicsandMorals' => $positionCivicsandMorals,
                'English' => $positionEnglish,
                'EDK' => $positionEDK,
                'Mathematics' => $positionMathematics,
                'Science' => $positionScience,
                'Socialsstudies' => $positionSocialsstudies,
                'Kiswahili' => $positionKiswahili,
            ],
            'SemiAnnual' => [
                'Arabic' => $positionArabicSA,
                'CivicsandMorals' => $positionCivicsandMoralsSA,
                'English' => $positionEnglishSA,
                'EDK' => $positionEDKSA,
                'Mathematics' => $positionMathematicsSA,
                'Science' => $positionScienceSA,
                'Socialsstudies' => $positionSocialsstudiesSA,
                'Kiswahili' => $positionKiswahiliSA,
            ],
            'SecondMidterm' => [
                'Arabic' => $positionArabicSM,
                'CivicsandMorals' => $positionCivicsandMoralsSM,
                'English' => $positionEnglishSM,
                'EDK' => $positionEDKSM,
                'Mathematics' => $positionMathematicsSM,
                'Science' => $positionScienceSM,
                'Socialsstudies' => $positionSocialsstudiesSM,
                'Kiswahili' => $positionKiswahiliSM,
            ],
            'Annual' => [
                'Arabic' => $positionArabicAL,
                'CivicsandMorals' => $positionCivicsandMoralsAL,
                'English' => $positionEnglishAL,
                'EDK' => $positionEDKAL,
                'Mathematics' => $positionMathematicsAL,
                'Science' => $positionScienceAL,
                'Socialsstudies' => $positionSocialsstudiesAL,
                'Kiswahili' => $positionKiswahiliAL,
            ],
        ];
        
    }


    Public function standardfiverFM(){
        $userId = Auth::id();
        $data = standard_five_first_midterm::where('id', $userId)->first();

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardfiveFM', compact('errorMessage'));
        }
         
        $positionArabic = $this->calculatePositionSTDV($userId);
        $positionCivicsandMorals = $this->calculatePositionSTDV($userId);
        $positionEnglish = $this->calculatePositionSTDV($userId);
        $positionEDK = $this->calculatePositionSTDV($userId);
        $positionMathematics = $this->calculatePositionSTDV($userId);
        $positionScience = $this->calculatePositionSTDV($userId);
        $positionSocialsstudies = $this->calculatePositionSTDV($userId);
        $positionKiswahili = $this->calculatePositionSTDV($userId);



        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageFM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        $standardfiveFM = standard_five_semi_annual::where('id',$userId)->first();
        
        
        $positionArabicSA = $this->calculatePositionSTDV($userId);
        $positionCivicsandMoralsSA = $this->calculatePositionSTDV($userId);
        $positionEnglishSA = $this->calculatePositionSTDV($userId);
        $positionEDKSA = $this->calculatePositionSTDV($userId);
        $positionMathematicsSA = $this->calculatePositionSTDV($userId);
        $positionScienceSA = $this->calculatePositionSTDIV($userId);
        $positionSocialsstudiesSA = $this->calculatePositionSTDV($userId);
        $positionKiswahiliSA = $this->calculatePositionSTDV($userId);

        $Arabic = $standardfiveFM->Arabic;
        $CivicsandMorals = $standardfiveFM->CivicsandMorals;
        $English = $standardfiveFM->English;
        $EDK = $standardfiveFM->EDK;
        $Mathematics = $standardfiveFM->Mathematics; 
        $Science = $standardfiveFM->Science;
        $Socialsstudies = $standardfiveFM->Socialsstudies;
        $Kiswahili = $standardfiveFM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $STDVFMgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

       
        return view('StandardfiveFM', [
            'data' => $data,
            'grades' => $grades,
            'standardfiveFM' => $standardfiveFM,
            'STDVFMgrades' => $STDVFMgrades,
           

            'positionArabic' => $positionArabic,           
    'positionCivicsandMorals' => $positionCivicsandMorals,
    'positionEnglish' => $positionEnglish,
    'positionEDK' => $positionEDK,
    'positionMathematics' => $positionMathematics,
    'positionScience' => $positionScience,
    'positionSocialsstudies' => $positionSocialsstudies,
    'positionKiswahili' => $positionKiswahili,
    


    'positionArabicSA' => $positionArabicSA,           
    'positionCivicsandMoralsSA' => $positionCivicsandMoralsSA,
    'positionEnglishSA' => $positionEnglishSA,
    'positionEDKSA' => $positionEDKSA,
    'positionMathematicsSA' => $positionMathematicsSA,
    'positionScienceSA' => $positionScienceSA,
    'positionSocialsstudiesSA' => $positionSocialsstudiesSA,
    'positionKiswahiliSA' => $positionKiswahiliSA,
   


        ],compact('AverageFM','AverageSA'));
    }
    
    Public function standardfiverSM(){
        $userId = Auth::id();
        $data = standard_five_second_midterm::where('id', $userId)->first();

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardfiveSM', compact('errorMessage'));
        }

        $positionArabicSM = $this->calculatePositionSTDV($userId);
        $positionCivicsandMoralsSM = $this->calculatePositionSTDV($userId);
        $positionEnglishSM = $this->calculatePositionSTDV($userId);
        $positionEDKSM = $this->calculatePositionSTDIV($userId);
        $positionMathematicsSM = $this->calculatePositionSTDV($userId);
        $positionScienceSM = $this->calculatePositionSTDV($userId);
        $positionSocialsstudiesSM = $this->calculatePositionSTDV($userId);
        $positionKiswahiliSM = $this->calculatePositionSTDV($userId);

        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        $standardfiveSM = standard_five_annual::where('id',$userId)->first();

        $positionArabicAL = $this->calculatePositionSTDV($userId);
        $positionCivicsandMoralsAL = $this->calculatePositionSTDV($userId);
        $positionEnglishAL = $this->calculatePositionSTDV($userId);
        $positionEDKAL = $this->calculatePositionSTDV($userId);
        $positionMathematicsAL = $this->calculatePositionSTDV($userId);
        $positionScienceAL = $this->calculatePositionSTDV($userId);
        $positionSocialsstudiesAL = $this->calculatePositionSTDV($userId);
        $positionKiswahiliAL = $this->calculatePositionSTDV($userId);

        
        $Arabic = $standardfiveSM->Arabic;
        $CivicsandMorals = $standardfiveSM->CivicsandMorals;
        $English = $standardfiveSM->English;
        $EDK = $standardfiveSM->EDK;
        $Mathematics = $standardfiveSM->Mathematics; 
        $Science = $standardfiveSM->Science;
        $Socialsstudies = $standardfiveSM->Socialsstudies;
        $Kiswahili = $standardfiveSM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $STDVSMgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        return view('StandardfiveSM', [
            'data' => $data,
            'grades' => $grades,
            'standardfiveSM' => $standardfiveSM,
            'STDVSMgrades' => $STDVSMgrades,

            'positionArabicSM' => $positionArabicSM,           
            'positionCivicsandMoralsSM' => $positionCivicsandMoralsSM,
            'positionEnglishSM' => $positionEnglishSM,
            'positionEDKSM' => $positionEDKSM,
            'positionMathematicsSM' => $positionMathematicsSM,
            'positionScienceSM' => $positionScienceSM,
            'positionSocialsstudiesSM' => $positionSocialsstudiesSM,
            'positionKiswahiliSM' => $positionKiswahiliSM,


            'positionArabicAL' => $positionArabicAL,           
            'positionCivicsandMoralsAL' => $positionCivicsandMoralsAL,
            'positionEnglishAL' => $positionEnglishAL,
            'positionEDKAL' => $positionEDKAL,
            'positionMathematicsAL' => $positionMathematicsAL,
            'positionScienceAL' => $positionScienceAL,
            'positionSocialsstudiesAL' => $positionSocialsstudiesAL,
            'positionKiswahiliAL' => $positionKiswahiliAL,

        ],compact('AverageSM','AverageAL'));
    }



    public function calculatePositionSTDVI($id) {
        // Fetch all scores from the database
        $ArabicallScoresFM = standard_six_first_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresFM = standard_six_first_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresFM = standard_six_first_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresFM = standard_six_first_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresFM = standard_six_first_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresFM = standard_six_first_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresFM = standard_six_first_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresFM = standard_six_first_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSA = standard_six_semi_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSA = standard_six_semi_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSA = standard_six_semi_annual::pluck('English', 'id')->toArray();
        $EDKallScoresSA = standard_six_semi_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSA = standard_six_semi_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSA= standard_six_semi_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSA = standard_six_semi_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSA =standard_six_semi_annual::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSM = standard_six_second_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSM = standard_six_second_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSM = standard_six_second_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresSM = standard_six_second_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSM = standard_six_second_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSM= standard_six_second_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSM = standard_six_second_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSM = standard_six_second_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresAL = standard_six_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresAL = standard_six_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresAL = standard_six_annual::pluck('English', 'id')->toArray();
        $EDKallScoresAL = standard_six_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresAL = standard_six_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresAL= standard_six_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresAL = standard_six_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresAL = standard_six_annual::pluck('Kiswahili', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabicallScoresFM);
        arsort($CivicsandMoralsallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($EDKallScoresFM);
        arsort($MathematicsallScoresFM);
        arsort($ScienceScoresFM);
        arsort($SocialsstudiesallScoresFM);
        arsort($KiswahiliScoresFM);

        arsort($ArabicallScoresSA);
        arsort($CivicsandMoralsallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($EDKallScoresSA);
        arsort($MathematicsallScoresSA);
        arsort($ScienceScoresSA);
        arsort($SocialsstudiesallScoresSA);
        arsort($KiswahiliScoresSA);

        arsort($ArabicallScoresSM );
        arsort($CivicsandMoralsallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($EDKallScoresSM);
        arsort($MathematicsallScoresSM);
        arsort($ScienceScoresSM);
        arsort($SocialsstudiesallScoresSM);
        arsort($KiswahiliScoresSM);


        arsort($ArabicallScoresAL);
        arsort($CivicsandMoralsallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($EDKallScoresAL);
        arsort($MathematicsallScoresAL);
        arsort($ScienceScoresAL);
        arsort($SocialsstudiesallScoresAL);
        arsort($KiswahiliScoresAL);



    
        // Find the position of the user
        $positionArabic = array_search($id, array_keys($ArabicallScoresFM)) + 1;
        $positionCivicsandMorals = array_search($id, array_keys($CivicsandMoralsallScoresFM)) + 1;
        $positionEnglish = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionEDK  = array_search($id, array_keys($EDKallScoresFM)) + 1;
        $positionMathematics = array_search($id, array_keys($MathematicsallScoresFM)) + 1;
        $positionScience = array_search($id, array_keys($ScienceScoresFM)) + 1;
        $positionSocialsstudies = array_search($id, array_keys($SocialsstudiesallScoresFM)) + 1;
        $positionKiswahili = array_search($id, array_keys($KiswahiliScoresFM)) + 1;


        $positionArabicSA  = array_search($id, array_keys($ArabicallScoresSA)) + 1;
        $positionCivicsandMoralsSA  = array_search($id, array_keys($CivicsandMoralsallScoresSA )) + 1;
        $positionEnglishSA  = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionEDKSA   = array_search($id, array_keys($EDKallScoresSA)) + 1;
        $positionMathematicsSA  = array_search($id, array_keys($MathematicsallScoresSA)) + 1;
        $positionScienceSA  = array_search($id, array_keys($ScienceScoresSA)) + 1;
        $positionSocialsstudiesSA  = array_search($id, array_keys($SocialsstudiesallScoresSA)) + 1;
        $positionKiswahiliSA  = array_search($id, array_keys($KiswahiliScoresSA)) + 1;

        $positionArabicSM = array_search($id, array_keys($ArabicallScoresSM)) + 1;
        $positionCivicsandMoralsSM = array_search($id, array_keys($CivicsandMoralsallScoresSM)) + 1;
        $positionEnglishSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionEDKSM  = array_search($id, array_keys($EDKallScoresSM)) + 1;
        $positionMathematicsSM = array_search($id, array_keys($MathematicsallScoresSM)) + 1;
        $positionScienceSM = array_search($id, array_keys($ScienceScoresSM)) + 1;
        $positionSocialsstudiesSM = array_search($id, array_keys($SocialsstudiesallScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliScoresSM)) + 1;

        $positionArabicAL = array_search($id, array_keys($ArabicallScoresAL)) + 1;
        $positionCivicsandMoralsAL = array_search($id, array_keys($CivicsandMoralsallScoresAL)) + 1;
        $positionEnglishAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionEDKAL  = array_search($id, array_keys($EDKallScoresAL)) + 1;
        $positionMathematicsAL = array_search($id, array_keys($MathematicsallScoresAL)) + 1;
        $positionScienceAL = array_search($id, array_keys($ScienceScoresAL)) + 1;
        $positionSocialsstudiesAL = array_search($id, array_keys($SocialsstudiesallScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliScoresAL)) + 1;
        return [
            'FirstMidterm' => [
                'Arabic' => $positionArabic,
                'CivicsandMorals' => $positionCivicsandMorals,
                'English' => $positionEnglish,
                'EDK' => $positionEDK,
                'Mathematics' => $positionMathematics,
                'Science' => $positionScience,
                'Socialsstudies' => $positionSocialsstudies,
                'Kiswahili' => $positionKiswahili,
            ],
            'SemiAnnual' => [
                'Arabic' => $positionArabicSA,
                'CivicsandMorals' => $positionCivicsandMoralsSA,
                'English' => $positionEnglishSA,
                'EDK' => $positionEDKSA,
                'Mathematics' => $positionMathematicsSA,
                'Science' => $positionScienceSA,
                'Socialsstudies' => $positionSocialsstudiesSA,
                'Kiswahili' => $positionKiswahiliSA,
            ],
            'SecondMidterm' => [
                'Arabic' => $positionArabicSM,
                'CivicsandMorals' => $positionCivicsandMoralsSM,
                'English' => $positionEnglishSM,
                'EDK' => $positionEDKSM,
                'Mathematics' => $positionMathematicsSM,
                'Science' => $positionScienceSM,
                'Socialsstudies' => $positionSocialsstudiesSM,
                'Kiswahili' => $positionKiswahiliSM,
            ],
            'Annual' => [
                'Arabic' => $positionArabicAL,
                'CivicsandMorals' => $positionCivicsandMoralsAL,
                'English' => $positionEnglishAL,
                'EDK' => $positionEDKAL,
                'Mathematics' => $positionMathematicsAL,
                'Science' => $positionScienceAL,
                'Socialsstudies' => $positionSocialsstudiesAL,
                'Kiswahili' => $positionKiswahiliAL,
            ],
        ];
        
    }


    Public function standardsixFM(){
        $userId = Auth::id();
        $data = standard_six_first_midterm::where('id', $userId)->first();
        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardsixFM', compact('errorMessage'));
        }


        $positionArabic = $this->calculatePositionSTDVI($userId);
        $positionCivicsandMorals = $this->calculatePositionSTDVI($userId);
        $positionEnglish = $this->calculatePositionSTDVI($userId);
        $positionEDK = $this->calculatePositionSTDVI($userId);
        $positionMathematics = $this->calculatePositionSTDVI($userId);
        $positionScience = $this->calculatePositionSTDVI($userId);
        $positionSocialsstudies = $this->calculatePositionSTDVI($userId);
        $positionKiswahili = $this->calculatePositionSTDVI($userId);


        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageFM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        $standardsixFM = standard_six_semi_annual::where('id',$userId)->first();

        $positionArabicSA = $this->calculatePositionSTDVI($userId);
        $positionCivicsandMoralsSA = $this->calculatePositionSTDVI($userId);
        $positionEnglishSA = $this->calculatePositionSTDVI($userId);
        $positionEDKSA = $this->calculatePositionSTDVI($userId);
        $positionMathematicsSA = $this->calculatePositionSTDVI($userId);
        $positionScienceSA = $this->calculatePositionSTDVI($userId);
        $positionSocialsstudiesSA = $this->calculatePositionSTDVI($userId);
        $positionKiswahiliSA = $this->calculatePositionSTDVI($userId);
         

        $Arabic = $standardsixFM->Arabic;
        $CivicsandMorals = $standardsixFM->CivicsandMorals;
        $English = $standardsixFM->English;
        $EDK = $standardsixFM->EDK;
        $Mathematics = $standardsixFM->Mathematics; 
        $Science = $standardsixFM->Science;
        $Socialsstudies = $standardsixFM->Socialsstudies;
        $Kiswahili = $standardsixFM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $StdVIFMgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];                       

        return view('StandardsixFM', [
            'data' => $data,
            'grades' => $grades,
            'StdVIFMgrades' => $StdVIFMgrades,
            'standardsixFM' => $standardsixFM,

            'positionArabic' => $positionArabic,           
            'positionCivicsandMorals' => $positionCivicsandMorals,
            'positionEnglish' => $positionEnglish,
            'positionEDK' => $positionEDK,
            'positionMathematics' => $positionMathematics,
            'positionScience' => $positionScience,
            'positionSocialsstudies' => $positionSocialsstudies,
            'positionKiswahili' => $positionKiswahili,
        
        
            'positionArabicSA' => $positionArabicSA,           
            'positionCivicsandMoralsSA' => $positionCivicsandMoralsSA,
            'positionEnglishSA' => $positionEnglishSA,
            'positionEDKSA' => $positionEDKSA,
            'positionMathematicsSA' => $positionMathematicsSA,
            'positionScienceSA' => $positionScienceSA,
            'positionSocialsstudiesSA' => $positionSocialsstudiesSA,
            'positionKiswahiliSA' => $positionKiswahiliSA,
        ],compact('AverageFM','AverageSA'));
    }

    Public function standardsixSM(){
        $userId = Auth::id();
        $data = standard_six_second_midterm::where('id', $userId)->first();

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardsixSM', compact('errorMessage'));
        }

        $positionArabicSM = $this->calculatePositionSTDVI($userId);
        $positionCivicsandMoralsSM = $this->calculatePositionSTDVI($userId);
        $positionEnglishSM = $this->calculatePositionSTDVI($userId);
        $positionEDKSM = $this->calculatePositionSTDVI($userId);
        $positionMathematicsSM = $this->calculatePositionSTDVI($userId);
        $positionScienceSM = $this->calculatePositionSTDVI($userId);
        $positionSocialsstudiesSM = $this->calculatePositionSTDVI($userId);
        $positionKiswahiliSM = $this->calculatePositionSTDVI($userId);

        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        $standardsixSM = standard_six_annual::where('id',$userId)->first();

        $positionArabicAL = $this->calculatePositionSTDVI($userId);
        $positionCivicsandMoralsAL = $this->calculatePositionSTDVI($userId);
        $positionEnglishAL = $this->calculatePositionSTDVI($userId);
        $positionEDKAL = $this->calculatePositionSTDVI($userId);
        $positionMathematicsAL = $this->calculatePositionSTDVI($userId);
        $positionScienceAL = $this->calculatePositionSTDVI($userId);
        $positionSocialsstudiesAL = $this->calculatePositionSTDVI($userId);
        $positionKiswahiliAL = $this->calculatePositionSTDVI($userId);

        $Arabic =$standardsixSM->Arabic;
        $CivicsandMorals = $standardsixSM->CivicsandMorals;
        $English = $standardsixSM->English;
        $EDK = $standardsixSM->EDK;
        $Mathematics = $standardsixSM->Mathematics; 
        $Science = $standardsixSM->Science;
        $Socialsstudies = $standardsixSM->Socialsstudies;
        $Kiswahili = $standardsixSM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $STDVIAnnualgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];

        return view('StandardsixSM', [
            'data' => $data,
            'grades' => $grades,
            'STDVIAnnualgrades' => $STDVIAnnualgrades,
            'standardsixSM' => $standardsixSM,

            'positionArabicSM' => $positionArabicSM,           
            'positionCivicsandMoralsSM' => $positionCivicsandMoralsSM,
            'positionEnglishSM' => $positionEnglishSM,
            'positionEDKSM' => $positionEDKSM,
            'positionMathematicsSM' => $positionMathematicsSM,
            'positionScienceSM' => $positionScienceSM,
            'positionSocialsstudiesSM' => $positionSocialsstudiesSM,
            'positionKiswahiliSM' => $positionKiswahiliSM,


            'positionArabicAL' => $positionArabicAL,           
            'positionCivicsandMoralsAL' => $positionCivicsandMoralsAL,
            'positionEnglishAL' => $positionEnglishAL,
            'positionEDKAL' => $positionEDKAL,
            'positionMathematicsAL' => $positionMathematicsAL,
            'positionScienceAL' => $positionScienceAL,
            'positionSocialsstudiesAL' => $positionSocialsstudiesAL,
            'positionKiswahiliAL' => $positionKiswahiliAL,
        ],compact('AverageSM','AverageAL'));
    }


    public function calculatePositionSTDVII($id) {
        // Fetch all scores from the database
        $ArabicallScoresFM = standard_seven_first_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresFM = standard_seven_first_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresFM = standard_seven_first_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresFM = standard_seven_first_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresFM = standard_seven_first_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresFM = standard_seven_first_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresFM = standard_seven_first_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresFM = standard_seven_first_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSA = standard_seven_semi_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSA = standard_six_semi_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSA = standard_six_semi_annual::pluck('English', 'id')->toArray();
        $EDKallScoresSA = standard_six_semi_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSA = standard_six_semi_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSA= standard_six_semi_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSA = standard_six_semi_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSA =standard_six_semi_annual::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresSM =standard_seven_second_midterm::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresSM = standard_seven_second_midterm::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresSM = standard_seven_second_midterm::pluck('English', 'id')->toArray();
        $EDKallScoresSM = standard_seven_second_midterm::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresSM = standard_seven_second_midterm::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresSM= standard_seven_second_midterm::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresSM = standard_seven_second_midterm::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresSM = standard_seven_second_midterm::pluck('Kiswahili', 'id')->toArray();

        $ArabicallScoresAL = standard_seven_annual::pluck('Arabic', 'id')->toArray();
        $CivicsandMoralsallScoresAL = standard_seven_annual::pluck('CivicsandMorals', 'id')->toArray();
        $EnglishallScoresAL = standard_seven_annual::pluck('English', 'id')->toArray();
        $EDKallScoresAL = standard_seven_annual::pluck('EDK', 'id')->toArray();
        $MathematicsallScoresAL = standard_seven_annual::pluck('Mathematics', 'id')->toArray();
        $ScienceScoresAL= standard_seven_annual::pluck('Science', 'id')->toArray();
        $SocialsstudiesallScoresAL = standard_seven_annual::pluck('Socialsstudies', 'id')->toArray();
        $KiswahiliScoresAL = standard_seven_annual::pluck('Kiswahili', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabicallScoresFM);
        arsort($CivicsandMoralsallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($EDKallScoresFM);
        arsort($MathematicsallScoresFM);
        arsort($ScienceScoresFM);
        arsort($SocialsstudiesallScoresFM);
        arsort($KiswahiliScoresFM);

        arsort($ArabicallScoresSA);
        arsort($CivicsandMoralsallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($EDKallScoresSA);
        arsort($MathematicsallScoresSA);
        arsort($ScienceScoresSA);
        arsort($SocialsstudiesallScoresSA);
        arsort($KiswahiliScoresSA);

        arsort($ArabicallScoresSM );
        arsort($CivicsandMoralsallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($EDKallScoresSM);
        arsort($MathematicsallScoresSM);
        arsort($ScienceScoresSM);
        arsort($SocialsstudiesallScoresSM);
        arsort($KiswahiliScoresSM);


        arsort($ArabicallScoresAL);
        arsort($CivicsandMoralsallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($EDKallScoresAL);
        arsort($MathematicsallScoresAL);
        arsort($ScienceScoresAL);
        arsort($SocialsstudiesallScoresAL);
        arsort($KiswahiliScoresAL);



    
        // Find the position of the user
        $positionArabic = array_search($id, array_keys($ArabicallScoresFM)) + 1;
        $positionCivicsandMorals = array_search($id, array_keys($CivicsandMoralsallScoresFM)) + 1;
        $positionEnglish = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionEDK  = array_search($id, array_keys($EDKallScoresFM)) + 1;
        $positionMathematics = array_search($id, array_keys($MathematicsallScoresFM)) + 1;
        $positionScience = array_search($id, array_keys($ScienceScoresFM)) + 1;
        $positionSocialsstudies = array_search($id, array_keys($SocialsstudiesallScoresFM)) + 1;
        $positionKiswahili = array_search($id, array_keys($KiswahiliScoresFM)) + 1;


        $positionArabicSA  = array_search($id, array_keys($ArabicallScoresSA)) + 1;
        $positionCivicsandMoralsSA  = array_search($id, array_keys($CivicsandMoralsallScoresSA )) + 1;
        $positionEnglishSA  = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionEDKSA   = array_search($id, array_keys($EDKallScoresSA)) + 1;
        $positionMathematicsSA  = array_search($id, array_keys($MathematicsallScoresSA)) + 1;
        $positionScienceSA  = array_search($id, array_keys($ScienceScoresSA)) + 1;
        $positionSocialsstudiesSA  = array_search($id, array_keys($SocialsstudiesallScoresSA)) + 1;
        $positionKiswahiliSA  = array_search($id, array_keys($KiswahiliScoresSA)) + 1;

        $positionArabicSM = array_search($id, array_keys($ArabicallScoresSM)) + 1;
        $positionCivicsandMoralsSM = array_search($id, array_keys($CivicsandMoralsallScoresSM)) + 1;
        $positionEnglishSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionEDKSM  = array_search($id, array_keys($EDKallScoresSM)) + 1;
        $positionMathematicsSM = array_search($id, array_keys($MathematicsallScoresSM)) + 1;
        $positionScienceSM = array_search($id, array_keys($ScienceScoresSM)) + 1;
        $positionSocialsstudiesSM = array_search($id, array_keys($SocialsstudiesallScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliScoresSM)) + 1;

        $positionArabicAL = array_search($id, array_keys($ArabicallScoresAL)) + 1;
        $positionCivicsandMoralsAL = array_search($id, array_keys($CivicsandMoralsallScoresAL)) + 1;
        $positionEnglishAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionEDKAL  = array_search($id, array_keys($EDKallScoresAL)) + 1;
        $positionMathematicsAL = array_search($id, array_keys($MathematicsallScoresAL)) + 1;
        $positionScienceAL = array_search($id, array_keys($ScienceScoresAL)) + 1;
        $positionSocialsstudiesAL = array_search($id, array_keys($SocialsstudiesallScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliScoresAL)) + 1;
        return [
            'FirstMidterm' => [
                'Arabic' => $positionArabic,
                'CivicsandMorals' => $positionCivicsandMorals,
                'English' => $positionEnglish,
                'EDK' => $positionEDK,
                'Mathematics' => $positionMathematics,
                'Science' => $positionScience,
                'Socialsstudies' => $positionSocialsstudies,
                'Kiswahili' => $positionKiswahili,
            ],
            'SemiAnnual' => [
                'Arabic' => $positionArabicSA,
                'CivicsandMorals' => $positionCivicsandMoralsSA,
                'English' => $positionEnglishSA,
                'EDK' => $positionEDKSA,
                'Mathematics' => $positionMathematicsSA,
                'Science' => $positionScienceSA,
                'Socialsstudies' => $positionSocialsstudiesSA,
                'Kiswahili' => $positionKiswahiliSA,
            ],
            'SecondMidterm' => [
                'Arabic' => $positionArabicSM,
                'CivicsandMorals' => $positionCivicsandMoralsSM,
                'English' => $positionEnglishSM,
                'EDK' => $positionEDKSM,
                'Mathematics' => $positionMathematicsSM,
                'Science' => $positionScienceSM,
                'Socialsstudies' => $positionSocialsstudiesSM,
                'Kiswahili' => $positionKiswahiliSM,
            ],
            'Annual' => [
                'Arabic' => $positionArabicAL,
                'CivicsandMorals' => $positionCivicsandMoralsAL,
                'English' => $positionEnglishAL,
                'EDK' => $positionEDKAL,
                'Mathematics' => $positionMathematicsAL,
                'Science' => $positionScienceAL,
                'Socialsstudies' => $positionSocialsstudiesAL,
                'Kiswahili' => $positionKiswahiliAL,
            ],
        ];
        
    }

    Public function standardsevenFM(){
        $userId = Auth::id();
        $data = standard_seven_first_midterm::where('id', $userId)->first();

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardsevenFM', compact('errorMessage'));
        }


        $positionArabic = $this->calculatePositionSTDVII($userId);
        $positionCivicsandMorals = $this->calculatePositionSTDVII($userId);
        $positionEnglish = $this->calculatePositionSTDVII($userId);
        $positionEDK = $this->calculatePositionSTDVII($userId);
        $positionMathematics = $this->calculatePositionSTDVII($userId);
        $positionScience = $this->calculatePositionSTDVII($userId);
        $positionSocialsstudies = $this->calculatePositionSTDVII($userId);
        $positionKiswahili = $this->calculatePositionSTDVII($userId);

        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 
    
        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageFM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        $StandardsevenFM = standard_seven_semi_annual::where('id',$userId)->first();

        $positionArabicSA = $this->calculatePositionSTDVII($userId);
        $positionCivicsandMoralsSA = $this->calculatePositionSTDVII($userId);
        $positionEnglishSA = $this->calculatePositionSTDVII($userId);
        $positionEDKSA = $this->calculatePositionSTDVII($userId);
        $positionMathematicsSA = $this->calculatePositionSTDVII($userId);
        $positionScienceSA = $this->calculatePositionSTDVII($userId);
        $positionSocialsstudiesSA = $this->calculatePositionSTDVII($userId);
        $positionKiswahiliSA = $this->calculatePositionSTDVII($userId);


        $Arabic = $StandardsevenFM->Arabic;
        $CivicsandMorals = $StandardsevenFM->CivicsandMorals;
        $English = $StandardsevenFM->English;
        $EDK = $StandardsevenFM->EDK;
        $Mathematics = $StandardsevenFM->Mathematics; 
        $Science = $StandardsevenFM->Science;
        $Socialsstudies = $StandardsevenFM->Socialsstudies;
        $Kiswahili = $StandardsevenFM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
    
        // Calculating grades
        $STDVIIFMgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        
        return view('StandardsevenFM', [
            'data' => $data,
            'grades' => $grades,
            'STDVIIFMgrades' => $STDVIIFMgrades,
            'StandardsevenFM' => $StandardsevenFM,


            'positionArabic' => $positionArabic,           
            'positionCivicsandMorals' => $positionCivicsandMorals,
            'positionEnglish' => $positionEnglish,
            'positionEDK' => $positionEDK,
            'positionMathematics' => $positionMathematics,
            'positionScience' => $positionScience,
            'positionSocialsstudies' => $positionSocialsstudies,
            'positionKiswahili' => $positionKiswahili,
        
        
            'positionArabicSA' => $positionArabicSA,           
            'positionCivicsandMoralsSA' => $positionCivicsandMoralsSA,
            'positionEnglishSA' => $positionEnglishSA,
            'positionEDKSA' => $positionEDKSA,
            'positionMathematicsSA' => $positionMathematicsSA,
            'positionScienceSA' => $positionScienceSA,
            'positionSocialsstudiesSA' => $positionSocialsstudiesSA,
            'positionKiswahiliSA' => $positionKiswahiliSA,
        ],compact('AverageFM','AverageSA'));
    }
    
    Public function standardsevenSM(){
        $userId = Auth::id();
        $data = standard_seven_second_midterm::where('id', $userId)->first();

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('StandardsevenSM', compact('errorMessage'));
        }


        $positionArabicSM = $this->calculatePositionSTDVII($userId);
        $positionCivicsandMoralsSM = $this->calculatePositionSTDVII($userId);
        $positionEnglishSM = $this->calculatePositionSTDVII($userId);
        $positionEDKSM = $this->calculatePositionSTDVII($userId);
        $positionMathematicsSM = $this->calculatePositionSTDVII($userId);
        $positionScienceSM = $this->calculatePositionSTDVII($userId);
        $positionSocialsstudiesSM = $this->calculatePositionSTDVII($userId);
        $positionKiswahiliSM = $this->calculatePositionSTDVII($userId);

        $Arabic = $data->Arabic;
        $CivicsandMorals = $data->CivicsandMorals;
        $English = $data->English;
        $EDK = $data->EDK;
        $Mathematics = $data->Mathematics; 
        $Science = $data->Science;
        $Socialsstudies = $data->Socialsstudies;
        $Kiswahili = $data->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageSM = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $grades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        $StandardsevenSM = standard_seven_annual::where('id',$userId)->first();

        $positionArabicAL = $this->calculatePositionSTDVII($userId);
        $positionCivicsandMoralsAL = $this->calculatePositionSTDVII($userId);
        $positionEnglishAL = $this->calculatePositionSTDVII($userId);
        $positionEDKAL = $this->calculatePositionSTDVII($userId);
        $positionMathematicsAL = $this->calculatePositionSTDVII($userId);
        $positionScienceAL = $this->calculatePositionSTDVII($userId);
        $positionSocialsstudiesAL = $this->calculatePositionSTDVII($userId);
        $positionKiswahiliAL = $this->calculatePositionSTDVII($userId);

        $Arabic = $StandardsevenSM->Arabic;
        $CivicsandMorals = $StandardsevenSM->CivicsandMorals;
        $English = $StandardsevenSM->English;
        $EDK = $StandardsevenSM->EDK;
        $Mathematics = $StandardsevenSM->Mathematics; 
        $Science = $StandardsevenSM->Science;
        $Socialsstudies = $StandardsevenSM->Socialsstudies;
        $Kiswahili = $StandardsevenSM->Kiswahili; 

        $TotalSubject = 8;
        $TotalSubjectMarks = $Arabic + $CivicsandMorals +$English +$EDK+$Mathematics + $Science +$Socialsstudies+$Kiswahili;
        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $STDVIIgrades = [
            'Arabic' => $this->calculateGrade($Arabic),
            'CivicsandMorals' => $this->calculateGrade($CivicsandMorals),
            'English' => $this->calculateGrade($English),
            'EDK' => $this->calculateGrade($EDK),
            'Mathematics' => $this->calculateGrade($Mathematics),
            'Science' => $this->calculateGrade($Science),
            'Socialsstudies' => $this->calculateGrade($Socialsstudies),
            'Kiswahili' => $this->calculateGrade($Kiswahili)
        ];
        
        return view('StandardsevenSM', [
            'data' => $data,
            'grades' => $grades,
            'STDVIIgrades' => $STDVIIgrades,
            'StandardsevenSM' => $StandardsevenSM,

            'positionArabicSM' => $positionArabicSM,           
            'positionCivicsandMoralsSM' => $positionCivicsandMoralsSM,
            'positionEnglishSM' => $positionEnglishSM,
            'positionEDKSM' => $positionEDKSM,
            'positionMathematicsSM' => $positionMathematicsSM,
            'positionScienceSM' => $positionScienceSM,
            'positionSocialsstudiesSM' => $positionSocialsstudiesSM,
            'positionKiswahiliSM' => $positionKiswahiliSM,


            'positionArabicAL' => $positionArabicAL,           
            'positionCivicsandMoralsAL' => $positionCivicsandMoralsAL,
            'positionEnglishAL' => $positionEnglishAL,
            'positionEDKAL' => $positionEDKAL,
            'positionMathematicsAL' => $positionMathematicsAL,
            'positionScienceAL' => $positionScienceAL,
            'positionSocialsstudiesAL' => $positionSocialsstudiesAL,
            'positionKiswahiliAL' => $positionKiswahiliAL,
        ],compact('AverageSM','AverageAL'));
    }

         //Secondary  Grade  
        private function SecondarycalculateGrade($score) {
            if ($score >= 75) {
                return 'A';
            } elseif ($score >= 74) {
                return 'B';
            } elseif ($score >= 64) {
                return 'C';
            } elseif ($score >= 44) {
                return 'D';
            } else {
                return 'F';
            }
        }


    public function calculatePositionFormI($id) {
        // Fetch all scores from the database
        $ArabiclanguageFM = formi_first_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresFM = formi_first_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresFM = formi_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresFM = formi_first_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresFM = formi_first_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresFM = formi_first_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresFM =formi_first_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresFM = formi_first_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresFM = formi_first_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresFM = formi_first_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresFM = formi_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresFM = formi_first_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresFM = formi_first_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresFM = formi_first_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresFM =formi_first_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresFM = formi_first_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresFM = formi_first_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresFM = formi_first_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresFM =formi_first_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresFM = formi_first_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresFM = formi_first_midterm::pluck('Nutrition', 'id')->toArray();

        $ArabiclanguageallScoresSA = formi_semi_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSA = formi_semi_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSA = formi_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSA= formi_semi_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSA = formi_semi_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresSA = formi_semi_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSA =formi_semi_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSA = formi_semi_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSA = formi_semi_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSA = formi_semi_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSA = formi_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSA = formi_semi_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSA = formi_semi_annual::pluck('French', 'id')->toArray();
        $GeographyScoresSA =formi_semi_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSA =formi_semi_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSA= formi_semi_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSA = formi_semi_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSA = formi_semi_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSA =formi_semi_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSA = formi_semi_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSA = formi_semi_annual::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresSM = formi_second_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSM = formi_second_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSM = formi_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSM = formi_second_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSM = formi_second_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresSM = formi_second_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSM =formi_second_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSM = formi_second_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSM = formi_second_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSM = formi_second_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSM= formi_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSM = formi_second_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSM = formi_second_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresSM =formi_second_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSM =formi_second_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSM = formi_second_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSM = formi_second_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSM = formi_second_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSM=formi_second_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSM = formi_second_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSM = formi_second_midterm::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresAL = formi_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresAL = formi_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresAL = formi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresAL = formi_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresAL = formi_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresAL =formi_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresAL =formi_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresAL= formi_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresAL = formi_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresAL = formi_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresAL = formi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresAL = formi_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresAL = formi_annual::pluck('French', 'id')->toArray();
        $GeographyScoresAL = formi_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresAL =formi_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresAL = formi_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresAL = formi_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresAL = formi_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresAL =formi_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresAL = formi_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresAL = formi_annual::pluck('Nutrition', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabiclanguageFM );
        arsort($BasicmathematicsallScoresFM);
        arsort($BibleknowledgeallScoresFM);
        arsort($BookkeepingallScoresFM);
        arsort($BiologyallScoresFM);
        arsort($CivicsScoresFM);
        arsort($ChemistryallScoresFM);
        arsort($ComputerstudyScoresFM);
        arsort($CreativeartsallScoresFM);
        arsort($CommerceallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($FrenchallScoresFM);
        arsort($GeographyScoresFM);
        arsort($HistoryallScoresFM);
        arsort($IslamicknowledgeScoresFM);
        arsort($KiswahiliallScoresFM);
        arsort($LifeskillScoresFM);
        arsort($PhysicsallScoresFM);
        arsort($SwimmingScoresFM);
        arsort($NutritionScoresFM);

        arsort($ArabiclanguageallScoresSM );
        arsort($BasicmathematicsallScoresSM);
        arsort($BibleknowledgeallScoresSM);
        arsort($BookkeepingallScoresSM);
        arsort($BiologyallScoresSM);
        arsort($CivicsScoresSM);
        arsort($ChemistryallScoresSM);
        arsort($ComputerstudyScoresSM);
        arsort($CreativeartsallScoresSM);
        arsort($CommerceallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($FrenchallScoresSM);
        arsort($GeographyScoresSM);
        arsort($HistoryallScoresSM);
        arsort($IslamicknowledgeScoresSM);
        arsort($KiswahiliallScoresSM);
        arsort($LifeskillScoresSM);
        arsort($PhysicsallScoresSM);
        arsort($SwimmingScoresSM);
        arsort($NutritionScoresSM);

        arsort($ArabiclanguageallScoresSA );
        arsort($BasicmathematicsallScoresSA);
        arsort($BibleknowledgeallScoresSA);
        arsort($BookkeepingallScoresSA);
        arsort($BiologyallScoresSA);
        arsort($CivicsScoresSA);
        arsort($ChemistryallScoresSA);
        arsort($ComputerstudyScoresSA);
        arsort($CreativeartsallScoresSA);
        arsort($CommerceallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($FrenchallScoresSA);
        arsort($GeographyScoresSA);
        arsort($HistoryallScoresSA);
        arsort($IslamicknowledgeScoresSA);
        arsort($KiswahiliallScoresSA);
        arsort($LifeskillScoresSA);
        arsort($PhysicsallScoresSA);
        arsort($SwimmingScoresSA);
        arsort($NutritionScoresSA);

        arsort($ArabiclanguageallScoresAL );
        arsort($BasicmathematicsallScoresAL);
        arsort($BibleknowledgeallScoresAL);
        arsort($BookkeepingallScoresAL);
        arsort($BiologyallScoresAL);
        arsort($CivicsScoresAL);
        arsort($ChemistryallScoresAL);
        arsort($ComputerstudyScoresAL);
        arsort($CreativeartsallScoresAL);
        arsort($CommerceallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($FrenchallScoresAL);
        arsort($GeographyScoresAL);
        arsort($HistoryallScoresAL);
        arsort($IslamicknowledgeScoresAL);
        arsort($KiswahiliallScoresAL);
        arsort($LifeskillScoresAL);
        arsort($PhysicsallScoresAL);
        arsort($SwimmingScoresAL);
        arsort($NutritionScoresAL);



    
        // Find the position of the user
        $positionArabiclanguageFM = array_search($id, array_keys($ArabiclanguageFM )) + 1;
        $positionBasicmathematicFM = array_search($id, array_keys($BasicmathematicsallScoresFM)) + 1;
        $positionBibleknowledgeFM = array_search($id, array_keys($BibleknowledgeallScoresFM)) + 1;
        $positionBookkeepingFM  = array_search($id, array_keys($BookkeepingallScoresFM)) + 1;
        $positionBiologyFM = array_search($id, array_keys($BiologyallScoresFM)) + 1;
        $positionCivicsFM = array_search($id, array_keys($CivicsScoresFM)) + 1;
        $positionChemistryFM = array_search($id, array_keys($ChemistryallScoresFM)) + 1;
        $positionComputerstudyFM = array_search($id, array_keys($ComputerstudyScoresFM)) + 1;
        $positionCreativeartFM = array_search($id, array_keys($CreativeartsallScoresFM )) + 1;
        $positionCommerceFM = array_search($id, array_keys($CommerceallScoresFM)) + 1;
        $positionEnglishliteratureFM = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionFrenchFM = array_search($id, array_keys($FrenchallScoresFM)) + 1;
        $positionGeographyFM = array_search($id, array_keys($GeographyScoresFM)) + 1;
        $positionHistoryFM = array_search($id, array_keys($HistoryallScoresFM)) + 1;
        $positionIslamicknowledgeFM = array_search($id, array_keys($IslamicknowledgeScoresFM)) + 1;
        $positionKiswahiliFM = array_search($id, array_keys($KiswahiliallScoresFM)) + 1;
        $positionLifeskillFM = array_search($id, array_keys($LifeskillScoresFM)) + 1;
        $positionPhysicsFM = array_search($id, array_keys($PhysicsallScoresFM)) + 1;
        $positionSwimmingFM = array_search($id, array_keys($SwimmingScoresFM)) + 1;
        $positionNutritionFM = array_search($id, array_keys($NutritionScoresFM)) + 1;

       

        $positionArabiclanguageSA = array_search($id, array_keys($ArabiclanguageallScoresSA )) + 1;
        $positionBasicmathematicSA = array_search($id, array_keys($BasicmathematicsallScoresSA)) + 1;
        $positionBibleknowledgeSA = array_search($id, array_keys($BibleknowledgeallScoresSA)) + 1;
        $positionBookkeepingSA  = array_search($id, array_keys($BookkeepingallScoresSA)) + 1;
        $positionBiologySA = array_search($id, array_keys($BiologyallScoresSA)) + 1;
        $positionCivicsSA = array_search($id, array_keys($CivicsScoresSA)) + 1;
        $positionChemistrySA = array_search($id, array_keys($ChemistryallScoresSA)) + 1;
        $positionComputerstudySA = array_search($id, array_keys($ComputerstudyScoresSA)) + 1;
        $positionCreativeartsSA = array_search($id, array_keys($CreativeartsallScoresSA)) + 1;
        $positionCommerceSA = array_search($id, array_keys($CommerceallScoresSA)) + 1;
        $positionEnglishliteratureSA = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionFrenchSA = array_search($id, array_keys($FrenchallScoresSA)) + 1;
        $positionGeographySA = array_search($id, array_keys($GeographyScoresSA)) + 1;
        $positionHistorySA = array_search($id, array_keys($HistoryallScoresSA)) + 1;
        $positionIslamicknowledgeSA = array_search($id, array_keys($IslamicknowledgeScoresSA)) + 1;
        $positionKiswahiliSA = array_search($id, array_keys($KiswahiliallScoresSA)) + 1;
        $positionLifeskillSA = array_search($id, array_keys($LifeskillScoresSA)) + 1;
        $positionPhysicsSA = array_search($id, array_keys($PhysicsallScoresSA)) + 1;
        $positionSwimmingSA = array_search($id, array_keys($SwimmingScoresSA)) + 1;
        $positionNutritionSA = array_search($id, array_keys($NutritionScoresSA)) + 1;



        $positionArabiclanguageSM = array_search($id, array_keys($ArabiclanguageallScoresSM )) + 1;
        $positionBasicmathematicSM = array_search($id, array_keys($BasicmathematicsallScoresSM)) + 1;
        $positionBibleknowledgeSM = array_search($id, array_keys($BibleknowledgeallScoresSM)) + 1;
        $positionBookkeepingSM  = array_search($id, array_keys($BookkeepingallScoresSM)) + 1;
        $positionBiologySM = array_search($id, array_keys($BiologyallScoresSM)) + 1;
        $positionCivicsSM = array_search($id, array_keys($CivicsScoresSM)) + 1;
        $positionChemistrySM = array_search($id, array_keys($ChemistryallScoresSM)) + 1;
        $positionComputerstudySM = array_search($id, array_keys($ComputerstudyScoresSM)) + 1;
        $positionCreativeartSM = array_search($id, array_keys($CreativeartsallScoresSM)) + 1;
        $positionCommerceSM = array_search($id, array_keys($CommerceallScoresSM)) + 1;
        $positionEnglishliteratureSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionFrenchSM = array_search($id, array_keys($FrenchallScoresSM)) + 1;
        $positionGeographySM = array_search($id, array_keys($GeographyScoresSM)) + 1;
        $positionHistorySM = array_search($id, array_keys($HistoryallScoresSM)) + 1;
        $positionIslamicknowledgeSM = array_search($id, array_keys($IslamicknowledgeScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliallScoresSM)) + 1;
        $positionLifeskillSM = array_search($id, array_keys($LifeskillScoresSM)) + 1;
        $positionPhysicsSM = array_search($id, array_keys($PhysicsallScoresSM)) + 1;
        $positionSwimmingSM= array_search($id, array_keys($SwimmingScoresSM)) + 1;
        $positionNutritionSM = array_search($id, array_keys($NutritionScoresSM)) + 1;

 

   
        $positionArabiclanguageAL = array_search($id, array_keys($ArabiclanguageallScoresAL )) + 1;
        $positionBasicmathematicAL = array_search($id, array_keys($BasicmathematicsallScoresAL)) + 1;
        $positionBibleknowledgeAL = array_search($id, array_keys($BibleknowledgeallScoresAL)) + 1;
        $positionBookkeepingAL  = array_search($id, array_keys($BookkeepingallScoresAL)) + 1;
        $positionBiologyAL = array_search($id, array_keys($BiologyallScoresAL)) + 1;
        $positionCivicsAL = array_search($id, array_keys($CivicsScoresAL)) + 1;
        $positionChemistryAL = array_search($id, array_keys($ChemistryallScoresAL)) + 1;
        $positionComputerstudyAL = array_search($id, array_keys($ComputerstudyScoresAL)) + 1;
        $positionCreativeartAL = array_search($id, array_keys($CreativeartsallScoresAL)) + 1;
        $positionCommerceAL = array_search($id, array_keys($CommerceallScoresAL)) + 1;
        $positionEnglishliteratureAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionFrenchAL = array_search($id, array_keys($FrenchallScoresAL)) + 1;
        $positionGeographyAL= array_search($id, array_keys($GeographyScoresAL)) + 1;
        $positionHistoryAL = array_search($id, array_keys($HistoryallScoresAL)) + 1;
        $positionIslamicknowledgeAL = array_search($id, array_keys($IslamicknowledgeScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliallScoresAL)) + 1;
        $positionLifeskillAL = array_search($id, array_keys($LifeskillScoresAL)) + 1;
        $positionPhysicsAL = array_search($id, array_keys($PhysicsallScoresAL)) + 1;
        $positionSwimmingAL = array_search($id, array_keys($SwimmingScoresAL)) + 1;
        $positionNutritionAL = array_search($id, array_keys($NutritionScoresAL)) + 1;

        return [
            'FirstMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageFM,
                'Basicmathematics' => $positionBasicmathematicFM,
                'Bibleknowledge' => $positionBibleknowledgeFM,
                'Bookkeeping' => $positionBookkeepingFM,
                'Biology' => $positionBiologyFM,
                'Civics' => $positionCivicsFM,
                'Chemistry' => $positionChemistryFM,
                'Computerstudy' => $positionComputerstudyFM,
                'Creativearts' => $positionCreativeartFM,
                'Commerce' => $positionCommerceFM,
                'Englishliterature' => $positionEnglishliteratureFM,
                'French' => $positionFrenchFM,
                'Geography' => $positionGeographyFM,
                'History' => $positionHistoryFM,
                'Islamicknowledge' => $positionIslamicknowledgeFM,
                'Kiswahili' => $positionKiswahiliFM,
                'Lifeskill' => $positionLifeskillFM,
                'Physics' => $positionPhysicsFM,
                'Swimming' => $positionSwimmingFM,
                'Nutrition' => $positionNutritionFM,

            ],
            'SemiAnnual' => [
                'Arabiclanguage' => $positionArabiclanguageSA,
                'Basicmathematics' => $positionBasicmathematicSA,
                'Bibleknowledge' => $positionBibleknowledgeSA,
                'Bookkeeping' => $positionBookkeepingSA,
                'Biology' => $positionBiologySA,
                'Civics' => $positionCivicsSA,
                'Chemistry' => $positionChemistrySA,
                'Computerstudy' => $positionComputerstudySA,
                'Creativearts' => $positionCreativeartsSA,
                'Commerce' => $positionCommerceSA,
                'Englishliterature' => $positionEnglishliteratureSA,
                'French' => $positionFrenchSA,
                'Geography' => $positionGeographySA,
                'History' => $positionHistorySA,
                'Islamicknowledge' => $positionIslamicknowledgeSA,
                'Kiswahili' => $positionKiswahiliSA,
                'Lifeskill' => $positionLifeskillSA,
                'Physics' => $positionPhysicsSA,
                'Swimming' => $positionSwimmingSA,
                'Nutrition' => $positionNutritionSA,
            ],
            'SecondMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageSM,
                'Basicmathematics' => $positionBasicmathematicSM,
                'Bibleknowledge' => $positionBibleknowledgeSM,
                'Bookkeeping' => $positionBookkeepingSM,
                'Biology' => $positionBiologySM,
                'Civics' => $positionCivicsSM,
                'Chemistry' => $positionChemistrySM,
                'Computerstudy' => $positionComputerstudySM,
                'Creativearts' => $positionCreativeartSM,
                'Commerce' => $positionCommerceSM,
                'Englishliterature' => $positionEnglishliteratureSM,
                'French' => $positionFrenchSM,
                'Geography' => $positionGeographySM,
                'History' => $positionHistorySM,
                'Islamicknowledge' => $positionIslamicknowledgeSM,
                'Kiswahili' => $positionKiswahiliSM,
                'Lifeskill' => $positionLifeskillSM,
                'Physics' => $positionPhysicsSM,
                'Swimming' => $positionSwimmingSM,
                'Nutrition' => $positionNutritionSM,
            ],
            'Annual' => [
                'Arabiclanguage' => $positionArabiclanguageAL,
                'Basicmathematics' => $positionBasicmathematicAL,
                'Bibleknowledge' => $positionBibleknowledgeAL,
                'Bookkeeping' => $positionBookkeepingAL,
                'Biology' => $positionBiologyAL,
                'Civics' => $positionCivicsAL,
                'Chemistry' => $positionChemistryAL,
                'Computerstudy' => $positionComputerstudyAL,
                'Creativearts' => $positionCreativeartAL,
                'Commerce' => $positionCommerceAL,
                'Englishliterature' => $positionEnglishliteratureAL,
                'French' => $positionFrenchAL,
                'Geography' => $positionGeographyAL,
                'History' => $positionHistoryAL,
                'Islamicknowledge' => $positionIslamicknowledgeAL,
                'Kiswahili' => $positionKiswahiliAL,
                'Lifeskill' => $positionLifeskillAL,
                'Physics' => $positionPhysicsAL,
                'Swimming' => $positionSwimmingAL,
                'Nutrition' => $positionNutritionAL,
            ],
        ];
        
    }


    public function FormOneFM()
    {
        $userId = Auth::id();
        $data = formi_first_midterm::where('id', $userId)->first(); 

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormoneFM', compact('errorMessage'));
        }


       $positionArabiclanguageFM = $this->calculatePositionFormI($userId);
        $positionBasicmathematicFM = $this->calculatePositionFormI($userId);
        $positionBibleknowledgeFM = $this->calculatePositionFormI($userId);
        $positionBookkeepingFM = $this->calculatePositionFormI($userId);
        $positionBiologyFM = $this->calculatePositionFormI($userId);
        $positionCivicsFM = $this->calculatePositionFormI($userId);
        $positionChemistryFM = $this->calculatePositionFormI($userId);
        $positionComputerstudyFM = $this->calculatePositionFormI($userId);
        $positionCreativeartFM = $this->calculatePositionFormI($userId);
        $positionCommerceFM = $this->calculatePositionFormI($userId);                        
        $positionEnglishliteratureFM = $this->calculatePositionFormI($userId);
        $positionFrenchFM = $this->calculatePositionFormI($userId);
        $positionGeographyFM = $this->calculatePositionFormI($userId);
        $positionHistoryFM = $this->calculatePositionFormI($userId);
        $positionIslamicknowledgeFM = $this->calculatePositionFormI($userId);
        $positionKiswahiliFM = $this->calculatePositionFormI($userId);
        $positionLifeskillFM = $this->calculatePositionFormI($userId);
        $positionPhysicsFM = $this->calculatePositionFormI($userId);
        $positionSwimmingFM = $this->calculatePositionFormI($userId);
        $positionNutritionFM = $this->calculatePositionFormI($userId);    
        
        $ArabiclanguageFM = $data->Arabiclanguage;
        $BasicmathematicsFM = $data->Basicmathematics;
        $BibleknowledgeFM = $data->Bibleknowledge;
        $BookkeepingFM= $data->Bookkeeping;
        $BiologyFM = $data->Biology; 
        $CivicsFM = $data->Civics;
        $ChemistryFM = $data->Chemistry;
        $ComputerstudyFM = $data->Computerstudy;
        $CreativeartsFM= $data->Creativearts;
        $CommerceFM = $data->Commerce; 
        $EnglishliteratureFM = $data->Englishliterature;
        $FrenchFM = $data->French;
        $GeographyFM = $data->Geography;
        $HistoryFM= $data->History;
        $IslamicknowledgeFM = $data->Islamicknowledge; 
        $KiswahiliFM = $data->Kiswahili;
        $LifeskillFM = $data->Lifeskill;
        $PhysicsFM = $data->Physics;
        $SwimmingFM = $data->Swimming;
        $NutritionFM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageFM + $BasicmathematicsFM +$BibleknowledgeFM +$BookkeepingFM +$BiologyFM + 
        $CivicsFM +$ChemistryFM +$ComputerstudyFM +$CreativeartsFM +$CommerceFM +$EnglishliteratureFM +$FrenchFM+$GeographyFM
        +$HistoryFM+ $IslamicknowledgeFM+$KiswahiliFM+$LifeskillFM+$PhysicsFM+$SwimmingFM +$NutritionFM;

        $AverageFM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageFM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsFM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeFM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingFM),
            'Biology' => $this->SecondarycalculateGrade($BiologyFM),
            'Civics' => $this->SecondarycalculateGrade($CivicsFM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryFM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyFM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsFM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceFM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureFM),
            'French' => $this->SecondarycalculateGrade($FrenchFM),
            'Geography' => $this->SecondarycalculateGrade($GeographyFM),
            'History' => $this->SecondarycalculateGrade($HistoryFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliFM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillFM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingFM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionFM)
        ];
    
       $FormISA = formi_semi_annual::where('id', $userId)->first();

       if (!$FormISA) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormoneFM', compact('errorMessage'));
    }

       $positionArabiclanguageSA = $this->calculatePositionFormI($userId);
        $positionBasicmathematicSA= $this->calculatePositionFormI($userId);
        $positionBibleknowledgeSA = $this->calculatePositionFormI($userId);
        $positionBookkeepingSA = $this->calculatePositionFormI($userId);
        $positionBiologySA = $this->calculatePositionFormI($userId);
        $positionCivicsSA = $this->calculatePositionFormI($userId);
        $positionChemistrySA = $this->calculatePositionFormI($userId);
        $positionComputerstudySA = $this->calculatePositionFormI($userId);
        $positionCreativeartsSA = $this->calculatePositionFormI($userId);
        $positionCommerceSA= $this->calculatePositionFormI($userId);
        $positionEnglishliteratureSA = $this->calculatePositionFormI($userId);
        $positionFrenchSA = $this->calculatePositionFormI($userId);
        $positionGeographySA = $this->calculatePositionFormI($userId);
        $positionHistorySA= $this->calculatePositionFormI($userId);
        $positionIslamicknowledgeSA = $this->calculatePositionFormI($userId);
        $positionKiswahiliSA = $this->calculatePositionFormI($userId);
        $positionLifeskillSA= $this->calculatePositionFormI($userId);
        $positionPhysicsSA = $this->calculatePositionFormI($userId);
        $positionSwimmingSA = $this->calculatePositionFormI($userId);
        $positionNutritionSA = $this->calculatePositionFormI($userId);

        $ArabiclanguageSA = $FormISA->Arabiclanguage;
        $BasicmathematicsSA = $FormISA->Basicmathematics;
        $BibleknowledgeSA = $FormISA->Bibleknowledge;
        $BookkeepingSA= $FormISA->Bookkeeping;
        $BiologySA = $FormISA->Biology; 
        $CivicsSA = $FormISA->Civics;
        $ChemistrySA = $FormISA->Chemistry;
        $ComputerstudySA = $FormISA->Computerstudy;
        $CreativeartsSA= $FormISA->Creativearts;
        $CommerceSA = $FormISA->Commerce; 
        $EnglishliteratureSA = $FormISA->Englishliterature;
        $FrenchSA = $FormISA->French;
        $GeographySA = $FormISA->Geography;
        $HistorySA= $FormISA->History;
        $IslamicknowledgeSA = $FormISA->Islamicknowledge; 
        $KiswahiliSA = $FormISA->Kiswahili;
        $LifeskillSA = $FormISA->Lifeskill;
        $PhysicsSA = $FormISA->Physics;
        $SwimmingSA = $FormISA->Swimming;
        $NutritionSA = $FormISA->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSA + $BasicmathematicsSA +$BibleknowledgeSA +$BookkeepingSA+$BiologySA + 
        $CivicsSA +$ChemistrySA +$ComputerstudySA+$CreativeartsSA+$CommerceSA+$EnglishliteratureSA+$FrenchSA+$GeographySA+$HistorySA+
        $IslamicknowledgeSA+$KiswahiliSA+$LifeskillSA+$PhysicsSA+$SwimmingSA +$NutritionSA;

        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesSA = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSA),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSA),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSA),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSA),
            'Biology' => $this->SecondarycalculateGrade($BiologySA),
            'Civics' => $this->SecondarycalculateGrade($CivicsSA),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySA),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySA),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSA),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSA),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSA),
            'French' => $this->SecondarycalculateGrade($FrenchSA),
            'Geography' => $this->SecondarycalculateGrade($GeographySA),
            'History' => $this->SecondarycalculateGrade($HistorySA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSA),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSA),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSA),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSA)
        ];
        
        // Pass all data to the view as a single array
        return view('FormoneFM', [
            'data' => $data,
            'FormISA' => $FormISA,
            'grades' => $grades,           
    'FormIgradesSA' => $FormIgradesSA,

    'positionArabiclanguageFM' => $positionArabiclanguageFM,
    'positionBasicmathematicFM' => $positionBasicmathematicFM, 
    'positionBibleknowledgeFM' => $positionBibleknowledgeFM, 
    'positionBookkeepingFM' =>$positionBookkeepingFM,
    'positionBiologyFM' => $positionBiologyFM,
    'positionCivicsFM' => $positionCivicsFM,
    'positionChemistryFM' => $positionChemistryFM,
    'positionComputerstudyFM' => $positionComputerstudyFM, 
    'positionCreativeartFM' => $positionCreativeartFM,
    'positionCommerceFM' => $positionCommerceFM,
    'positionEnglishliteratureFM' => $positionEnglishliteratureFM, 
    'positionFrenchFM' => $positionFrenchFM, 
    'positionGeographyFM' => $positionGeographyFM, 
    'positionHistoryFM' => $positionHistoryFM, 
    'positionIslamicknowledgeFM' => $positionIslamicknowledgeFM,
    'positionKiswahiliFM' => $positionKiswahiliFM, 
    'positionLifeskillFM' => $positionLifeskillFM,
    'positionPhysicsFM' => $positionPhysicsFM,
    'positionSwimmingFM' =>$positionSwimmingFM, 
    'positionNutritionFM' => $positionNutritionFM,
    '$AverageFM'  => $AverageFM,

    'positionArabiclanguageSA' => $positionArabiclanguageSA,
    'positionBasicmathematicSA' => $positionBasicmathematicSA, 
    'positionBibleknowledgeSA' => $positionBibleknowledgeSA, 
    'positionBookkeepingSA' =>$positionBookkeepingSA,
    'positionBiologySA' => $positionBiologySA,
    'positionCivicsSA' => $positionCivicsSA,
    'positionChemistrySA' => $positionChemistrySA,
    'positionComputerstudySA' => $positionComputerstudySA, 
    'positionCreativeartsSA' => $positionCreativeartsSA,
    'positionCommerceSA' => $positionCommerceSA,
    'positionEnglishliteratureSA' => $positionEnglishliteratureSA, 
    'positionFrenchSA' => $positionFrenchSA, 
    'positionGeographySA' => $positionGeographySA, 
    'positionHistorySA' => $positionHistorySA, 
    'positionIslamicknowledgeSA' => $positionIslamicknowledgeSA,
    'positionKiswahiliSA' => $positionKiswahiliSA, 
    'positionLifeskillSA' => $positionLifeskillSA,
    'positionPhysicsSA' => $positionPhysicsSA,
    'positionSwimmingSA' =>$positionSwimmingSA, 
    'positionNutritionSA' => $positionNutritionSA,
    'AverageSA' => $AverageSA,

 ],compact('AverageFM','AverageSA'));
      
    }


    public function FormOneSM()
    {
        $userId = Auth::id();
        $data = formi_second_midterm::where('id', $userId)->first(); 

         if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormOneSM', compact('errorMessage'));
        }

       $positionArabiclanguageSM = $this->calculatePositionFormI($userId);
        $positionBasicmathematicSM = $this->calculatePositionFormI($userId);
        $positionBibleknowledgeSM = $this->calculatePositionFormI($userId);
        $positionBookkeepingSM = $this->calculatePositionFormI($userId);
        $positionBiologySM = $this->calculatePositionFormI($userId);
        $positionCivicsSM = $this->calculatePositionFormI($userId);
        $positionChemistrySM = $this->calculatePositionFormI($userId);
        $positionComputerstudySM = $this->calculatePositionFormI($userId);
        $positionCreativeartSM = $this->calculatePositionFormI($userId);
        $positionCommerceSM = $this->calculatePositionFormI($userId);                        
        $positionEnglishliteratureSM = $this->calculatePositionFormI($userId);
        $positionFrenchSM = $this->calculatePositionFormI($userId);
        $positionGeographySM = $this->calculatePositionFormI($userId);
        $positionHistorySM = $this->calculatePositionFormI($userId);
        $positionIslamicknowledgeSM = $this->calculatePositionFormI($userId);
        $positionKiswahiliSM = $this->calculatePositionFormI($userId);
        $positionLifeskillSM = $this->calculatePositionFormI($userId);
        $positionPhysicsSM = $this->calculatePositionFormI($userId);
        $positionSwimmingSM = $this->calculatePositionFormI($userId);
        $positionNutritionSM = $this->calculatePositionFormI($userId);    
        
        $ArabiclanguageSM = $data->Arabiclanguage;
        $BasicmathematicsSM = $data->Basicmathematics;
        $BibleknowledgeSM = $data->Bibleknowledge;
        $BookkeepingSM= $data->Bookkeeping;
        $BiologySM = $data->Biology; 
        $CivicsSM = $data->Civics;
        $ChemistrySM = $data->Chemistry;
        $ComputerstudySM = $data->Computerstudy;
        $CreativeartsSM= $data->Creativearts;
        $CommerceSM = $data->Commerce; 
        $EnglishliteratureSM = $data->Englishliterature;
        $FrenchSM = $data->French;
        $GeographySM = $data->Geography;
        $HistorySM= $data->History;
        $IslamicknowledgeSM = $data->Islamicknowledge; 
        $KiswahiliSM = $data->Kiswahili;
        $LifeskillSM = $data->Lifeskill;
        $PhysicsSM = $data->Physics;
        $SwimmingSM = $data->Swimming;
        $NutritionSM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSM + $BasicmathematicsSM +$BibleknowledgeSM +$BookkeepingSM+$BiologySM + 
        $CivicsSM +$ChemistrySM+$ComputerstudySM+$CreativeartsSM+$CommerceSM+$EnglishliteratureSM+$FrenchSM+$GeographySM+$HistorySM+
        $IslamicknowledgeSM+$KiswahiliSM+$LifeskillSM+$PhysicsSM+$SwimmingSM +$NutritionSM;

        $AverageSM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSM),
            'Biology' => $this->SecondarycalculateGrade($BiologySM),
            'Civics' => $this->SecondarycalculateGrade($CivicsSM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSM),
            'French' => $this->SecondarycalculateGrade($FrenchSM),
            'Geography' => $this->SecondarycalculateGrade($GeographySM),
            'History' => $this->SecondarycalculateGrade($HistorySM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSM)
        ];
    
       $FormIAL = formi_annual::where('id', $userId)->first();

       if (!$FormIAL) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormOneSM', compact('errorMessage'));
      }

       $positionArabiclanguageAL = $this->calculatePositionFormI($userId);
        $positionBasicmathematicAL= $this->calculatePositionFormI($userId);
        $positionBibleknowledgeAL = $this->calculatePositionFormI($userId);
        $positionBookkeepingAL = $this->calculatePositionFormI($userId);
        $positionBiologyAL = $this->calculatePositionFormI($userId);
        $positionCivicsAL = $this->calculatePositionFormI($userId);
        $positionChemistryAL = $this->calculatePositionFormI($userId);
        $positionComputerstudyAL = $this->calculatePositionFormI($userId);
        $positionCreativeartsAL = $this->calculatePositionFormI($userId);
        $positionCommerceAL= $this->calculatePositionFormI($userId);
        $positionEnglishliteratureAL = $this->calculatePositionFormI($userId);
        $positionFrenchAL = $this->calculatePositionFormI($userId);
        $positionGeographyAL = $this->calculatePositionFormI($userId);
        $positionHistoryAL= $this->calculatePositionFormI($userId);
        $positionIslamicknowledgeAL = $this->calculatePositionFormI($userId);
        $positionKiswahiliAL = $this->calculatePositionFormI($userId);
        $positionLifeskillAL= $this->calculatePositionFormI($userId);
        $positionPhysicsAL = $this->calculatePositionFormI($userId);
        $positionSwimmingAL = $this->calculatePositionFormI($userId);
        $positionNutritionAL = $this->calculatePositionFormI($userId);

        $ArabiclanguageAL = $FormIAL->Arabiclanguage;
        $BasicmathematicsAL = $FormIAL->Basicmathematics;
        $BibleknowledgeAL = $FormIAL->Bibleknowledge;
        $BookkeepingAL= $FormIAL->Bookkeeping;
        $BiologyAL = $FormIAL->Biology; 
        $CivicsAL = $FormIAL->Civics;
        $ChemistryAL= $FormIAL->Chemistry;
        $ComputerstudyAL = $FormIAL->Computerstudy;
        $CreativeartsAL= $FormIAL->Creativearts;
        $CommerceAL = $FormIAL->Commerce; 
        $EnglishliteratureAL = $FormIAL->English;
        $FrenchAL = $FormIAL->French;
        $GeographyAL = $FormIAL->Geography;
        $HistoryAL= $FormIAL->History;
        $IslamicknowledgeAL = $FormIAL->Islamicknowledge; 
        $KiswahiliAL = $FormIAL->Kiswahili;
        $LifeskillAL = $FormIAL->Lifeskill;
        $PhysicsAL = $FormIAL->Physics;
        $SwimmingAL = $FormIAL->Swimming;
        $NutritionAL= $FormIAL->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageAL + $BasicmathematicsAL +$BibleknowledgeAL +$BookkeepingAL+$BiologyAL + 
        $CivicsAL +$ChemistryAL +$ComputerstudyAL +$CreativeartsAL +$CommerceAL + $EnglishliteratureAL +$FrenchAL +$GeographyAL +$HistoryAL +
        $IslamicknowledgeAL +$KiswahiliAL +$LifeskillAL +$PhysicsAL +$SwimmingAL +$NutritionAL;

        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesAL = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageAL),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsAL),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeAL),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingAL),
            'Biology' => $this->SecondarycalculateGrade($BiologyAL),
            'Civics' => $this->SecondarycalculateGrade($CivicsAL),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryAL),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyAL),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsAL),
            'Commerce' => $this->SecondarycalculateGrade($CommerceAL),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureAL),
            'French' => $this->SecondarycalculateGrade($FrenchAL),
            'Geography' => $this->SecondarycalculateGrade($GeographyAL),
            'History' => $this->SecondarycalculateGrade($HistoryAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliAL),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillAL),
            'Physics' => $this->SecondarycalculateGrade($PhysicsAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingAL),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionAL)
        ];
        
        // Pass all data to the view as a single array
        return view('FormOneSM', [
            'data' => $data,
            'grades' => $grades,
            'FormIAL' => $FormIAL,                     
    'FormIgradesAL' => $FormIgradesAL,
    'positionArabiclanguageSM' => $positionArabiclanguageSM,
    'positionBasicmathematicSM' => $positionBasicmathematicSM, 
    'positionBibleknowledgeSM' => $positionBibleknowledgeSM, 
    'positionBookkeepingSM' =>$positionBookkeepingSM,
    'positionBiologySM' => $positionBiologySM,
    'positionCivicsSM' => $positionCivicsSM,
    'positionChemistrySM' => $positionChemistrySM,
    'positionComputerstudySM' => $positionComputerstudySM, 
    'positionCreativeartSM' => $positionCreativeartSM,
    'positionCommerceSM' => $positionCommerceSM,
    'positionEnglishliteratureSM' => $positionEnglishliteratureSM, 
    'positionFrenchSM' => $positionFrenchSM, 
    'positionGeographySM' => $positionGeographySM, 
    'positionHistorySM' => $positionHistorySM, 
    'positionIslamicknowledgeSM' => $positionIslamicknowledgeSM,
    'positionKiswahiliSM' => $positionKiswahiliSM, 
    'positionLifeskillSM' => $positionLifeskillSM,
    'positionPhysicsSM' => $positionPhysicsSM,
    'positionSwimmingSM' =>$positionSwimmingSM, 
    'positionNutritionSM' => $positionNutritionSM,
    '$AverageSM'  => $AverageSM,

    'positionArabiclanguageAL' => $positionArabiclanguageAL,
    'positionBasicmathematicAL' => $positionBasicmathematicAL, 
    'positionBibleknowledgeAL' => $positionBibleknowledgeAL, 
    'positionBookkeepingAL' =>$positionBookkeepingAL,
    'positionBiologyAL' => $positionBiologyAL,
    'positionCivicsAL' => $positionCivicsAL,
    'positionChemistryAL' => $positionChemistryAL,
    'positionComputerstudyAL' => $positionComputerstudyAL, 
    'positionCreativeartsAL' => $positionCreativeartsAL,
    'positionCommerceAL' => $positionCommerceAL,
    'positionEnglishliteratureAL' => $positionEnglishliteratureAL, 
    'positionFrenchAL' => $positionFrenchAL, 
    'positionGeographyAL' => $positionGeographyAL, 
    'positionHistoryAL' => $positionHistoryAL, 
    'positionIslamicknowledgeAL' => $positionIslamicknowledgeAL,
    'positionKiswahiliAL' => $positionKiswahiliAL, 
    'positionLifeskillAL' => $positionLifeskillAL,
    'positionPhysicsAL' => $positionPhysicsAL,
    'positionSwimmingAL' =>$positionSwimmingAL, 
    'positionNutritionAL' => $positionNutritionAL,
    'AverageAL' => $AverageAL,

 ],compact('AverageSM','AverageAL'));
      
    }


    public function calculatePositionFormII ($id) {
        // Fetch all scores from the database
        $ArabiclanguageFM = formii_first_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresFM = formii_first_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresFM = formii_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresFM = formii_first_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresFM = formii_first_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresFM = formii_first_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresFM =formii_first_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresFM = formii_first_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresFM = formii_first_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresFM = formii_first_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresFM = formii_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresFM = formii_first_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresFM = formii_first_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresFM = formii_first_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresFM =formii_first_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresFM = formii_first_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresFM = formii_first_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresFM = formii_first_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresFM =formii_first_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresFM = formii_first_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresFM = formii_first_midterm::pluck('Nutrition', 'id')->toArray();

        $ArabiclanguageallScoresSA = formii_semi_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSA = formii_semi_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSA = formii_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSA= formii_semi_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSA = formii_semi_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresSA = formii_semi_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSA =formii_semi_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSA = formii_semi_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSA = formii_semi_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSA = formii_semi_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSA = formii_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSA = formii_semi_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSA = formii_semi_annual::pluck('French', 'id')->toArray();
        $GeographyScoresSA =formii_semi_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSA =formii_semi_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSA= formii_semi_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSA = formii_semi_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSA = formii_semi_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSA =formii_semi_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSA = formii_semi_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSA = formii_semi_annual::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresSM = formii_second_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSM = formii_second_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSM = formii_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSM = formii_second_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSM = formii_second_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresSM = formii_second_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSM =formii_second_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSM = formii_second_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSM = formii_second_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSM = formii_second_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSM= formii_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSM = formii_second_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSM = formii_second_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresSM =formii_second_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSM =formii_second_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSM = formii_second_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSM = formii_second_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSM = formii_second_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSM=formii_second_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSM = formii_second_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSM = formii_second_midterm::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresAL = formii_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresAL = formii_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresAL = formii_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresAL = formii_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresAL = formii_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresAL =formii_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresAL =formii_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresAL= formii_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresAL = formii_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresAL = formii_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresAL = formii_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresAL = formii_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresAL = formii_annual::pluck('French', 'id')->toArray();
        $GeographyScoresAL = formii_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresAL =formii_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresAL = formii_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresAL = formii_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresAL = formii_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresAL =formii_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresAL = formii_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresAL = formii_annual::pluck('Nutrition', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabiclanguageFM );
        arsort($BasicmathematicsallScoresFM);
        arsort($BibleknowledgeallScoresFM);
        arsort($BookkeepingallScoresFM);
        arsort($BiologyallScoresFM);
        arsort($CivicsScoresFM);
        arsort($ChemistryallScoresFM);
        arsort($ComputerstudyScoresFM);
        arsort($CreativeartsallScoresFM);
        arsort($CommerceallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($FrenchallScoresFM);
        arsort($GeographyScoresFM);
        arsort($HistoryallScoresFM);
        arsort($IslamicknowledgeScoresFM);
        arsort($KiswahiliallScoresFM);
        arsort($LifeskillScoresFM);
        arsort($PhysicsallScoresFM);
        arsort($SwimmingScoresFM);
        arsort($NutritionScoresFM);

        arsort($ArabiclanguageallScoresSM );
        arsort($BasicmathematicsallScoresSM);
        arsort($BibleknowledgeallScoresSM);
        arsort($BookkeepingallScoresSM);
        arsort($BiologyallScoresSM);
        arsort($CivicsScoresSM);
        arsort($ChemistryallScoresSM);
        arsort($ComputerstudyScoresSM);
        arsort($CreativeartsallScoresSM);
        arsort($CommerceallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($FrenchallScoresSM);
        arsort($GeographyScoresSM);
        arsort($HistoryallScoresSM);
        arsort($IslamicknowledgeScoresSM);
        arsort($KiswahiliallScoresSM);
        arsort($LifeskillScoresSM);
        arsort($PhysicsallScoresSM);
        arsort($SwimmingScoresSM);
        arsort($NutritionScoresSM);

        arsort($ArabiclanguageallScoresSA );
        arsort($BasicmathematicsallScoresSA);
        arsort($BibleknowledgeallScoresSA);
        arsort($BookkeepingallScoresSA);
        arsort($BiologyallScoresSA);
        arsort($CivicsScoresSA);
        arsort($ChemistryallScoresSA);
        arsort($ComputerstudyScoresSA);
        arsort($CreativeartsallScoresSA);
        arsort($CommerceallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($FrenchallScoresSA);
        arsort($GeographyScoresSA);
        arsort($HistoryallScoresSA);
        arsort($IslamicknowledgeScoresSA);
        arsort($KiswahiliallScoresSA);
        arsort($LifeskillScoresSA);
        arsort($PhysicsallScoresSA);
        arsort($SwimmingScoresSA);
        arsort($NutritionScoresSA);

        arsort($ArabiclanguageallScoresAL );
        arsort($BasicmathematicsallScoresAL);
        arsort($BibleknowledgeallScoresAL);
        arsort($BookkeepingallScoresAL);
        arsort($BiologyallScoresAL);
        arsort($CivicsScoresAL);
        arsort($ChemistryallScoresAL);
        arsort($ComputerstudyScoresAL);
        arsort($CreativeartsallScoresAL);
        arsort($CommerceallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($FrenchallScoresAL);
        arsort($GeographyScoresAL);
        arsort($HistoryallScoresAL);
        arsort($IslamicknowledgeScoresAL);
        arsort($KiswahiliallScoresAL);
        arsort($LifeskillScoresAL);
        arsort($PhysicsallScoresAL);
        arsort($SwimmingScoresAL);
        arsort($NutritionScoresAL);



    
        // Find the position of the user
        $positionArabiclanguageFM = array_search($id, array_keys($ArabiclanguageFM )) + 1;
        $positionBasicmathematicFM = array_search($id, array_keys($BasicmathematicsallScoresFM)) + 1;
        $positionBibleknowledgeFM = array_search($id, array_keys($BibleknowledgeallScoresFM)) + 1;
        $positionBookkeepingFM  = array_search($id, array_keys($BookkeepingallScoresFM)) + 1;
        $positionBiologyFM = array_search($id, array_keys($BiologyallScoresFM)) + 1;
        $positionCivicsFM = array_search($id, array_keys($CivicsScoresFM)) + 1;
        $positionChemistryFM = array_search($id, array_keys($ChemistryallScoresFM)) + 1;
        $positionComputerstudyFM = array_search($id, array_keys($ComputerstudyScoresFM)) + 1;
        $positionCreativeartFM = array_search($id, array_keys($CreativeartsallScoresFM )) + 1;
        $positionCommerceFM = array_search($id, array_keys($CommerceallScoresFM)) + 1;
        $positionEnglishliteratureFM = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionFrenchFM = array_search($id, array_keys($FrenchallScoresFM)) + 1;
        $positionGeographyFM = array_search($id, array_keys($GeographyScoresFM)) + 1;
        $positionHistoryFM = array_search($id, array_keys($HistoryallScoresFM)) + 1;
        $positionIslamicknowledgeFM = array_search($id, array_keys($IslamicknowledgeScoresFM)) + 1;
        $positionKiswahiliFM = array_search($id, array_keys($KiswahiliallScoresFM)) + 1;
        $positionLifeskillFM = array_search($id, array_keys($LifeskillScoresFM)) + 1;
        $positionPhysicsFM = array_search($id, array_keys($PhysicsallScoresFM)) + 1;
        $positionSwimmingFM = array_search($id, array_keys($SwimmingScoresFM)) + 1;
        $positionNutritionFM = array_search($id, array_keys($NutritionScoresFM)) + 1;

       

        $positionArabiclanguageSA = array_search($id, array_keys($ArabiclanguageallScoresSA )) + 1;
        $positionBasicmathematicSA = array_search($id, array_keys($BasicmathematicsallScoresSA)) + 1;
        $positionBibleknowledgeSA = array_search($id, array_keys($BibleknowledgeallScoresSA)) + 1;
        $positionBookkeepingSA  = array_search($id, array_keys($BookkeepingallScoresSA)) + 1;
        $positionBiologySA = array_search($id, array_keys($BiologyallScoresSA)) + 1;
        $positionCivicsSA = array_search($id, array_keys($CivicsScoresSA)) + 1;
        $positionChemistrySA = array_search($id, array_keys($ChemistryallScoresSA)) + 1;
        $positionComputerstudySA = array_search($id, array_keys($ComputerstudyScoresSA)) + 1;
        $positionCreativeartsSA = array_search($id, array_keys($CreativeartsallScoresSA)) + 1;
        $positionCommerceSA = array_search($id, array_keys($CommerceallScoresSA)) + 1;
        $positionEnglishliteratureSA = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionFrenchSA = array_search($id, array_keys($FrenchallScoresSA)) + 1;
        $positionGeographySA = array_search($id, array_keys($GeographyScoresSA)) + 1;
        $positionHistorySA = array_search($id, array_keys($HistoryallScoresSA)) + 1;
        $positionIslamicknowledgeSA = array_search($id, array_keys($IslamicknowledgeScoresSA)) + 1;
        $positionKiswahiliSA = array_search($id, array_keys($KiswahiliallScoresSA)) + 1;
        $positionLifeskillSA = array_search($id, array_keys($LifeskillScoresSA)) + 1;
        $positionPhysicsSA = array_search($id, array_keys($PhysicsallScoresSA)) + 1;
        $positionSwimmingSA = array_search($id, array_keys($SwimmingScoresSA)) + 1;
        $positionNutritionSA = array_search($id, array_keys($NutritionScoresSA)) + 1;



        $positionArabiclanguageSM = array_search($id, array_keys($ArabiclanguageallScoresSM )) + 1;
        $positionBasicmathematicSM = array_search($id, array_keys($BasicmathematicsallScoresSM)) + 1;
        $positionBibleknowledgeSM = array_search($id, array_keys($BibleknowledgeallScoresSM)) + 1;
        $positionBookkeepingSM  = array_search($id, array_keys($BookkeepingallScoresSM)) + 1;
        $positionBiologySM = array_search($id, array_keys($BiologyallScoresSM)) + 1;
        $positionCivicsSM = array_search($id, array_keys($CivicsScoresSM)) + 1;
        $positionChemistrySM = array_search($id, array_keys($ChemistryallScoresSM)) + 1;
        $positionComputerstudySM = array_search($id, array_keys($ComputerstudyScoresSM)) + 1;
        $positionCreativeartSM = array_search($id, array_keys($CreativeartsallScoresSM)) + 1;
        $positionCommerceSM = array_search($id, array_keys($CommerceallScoresSM)) + 1;
        $positionEnglishliteratureSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionFrenchSM = array_search($id, array_keys($FrenchallScoresSM)) + 1;
        $positionGeographySM = array_search($id, array_keys($GeographyScoresSM)) + 1;
        $positionHistorySM = array_search($id, array_keys($HistoryallScoresSM)) + 1;
        $positionIslamicknowledgeSM = array_search($id, array_keys($IslamicknowledgeScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliallScoresSM)) + 1;
        $positionLifeskillSM = array_search($id, array_keys($LifeskillScoresSM)) + 1;
        $positionPhysicsSM = array_search($id, array_keys($PhysicsallScoresSM)) + 1;
        $positionSwimmingSM= array_search($id, array_keys($SwimmingScoresSM)) + 1;
        $positionNutritionSM = array_search($id, array_keys($NutritionScoresSM)) + 1;

 

   
        $positionArabiclanguageAL = array_search($id, array_keys($ArabiclanguageallScoresAL )) + 1;
        $positionBasicmathematicAL = array_search($id, array_keys($BasicmathematicsallScoresAL)) + 1;
        $positionBibleknowledgeAL = array_search($id, array_keys($BibleknowledgeallScoresAL)) + 1;
        $positionBookkeepingAL  = array_search($id, array_keys($BookkeepingallScoresAL)) + 1;
        $positionBiologyAL = array_search($id, array_keys($BiologyallScoresAL)) + 1;
        $positionCivicsAL = array_search($id, array_keys($CivicsScoresAL)) + 1;
        $positionChemistryAL = array_search($id, array_keys($ChemistryallScoresAL)) + 1;
        $positionComputerstudyAL = array_search($id, array_keys($ComputerstudyScoresAL)) + 1;
        $positionCreativeartAL = array_search($id, array_keys($CreativeartsallScoresAL)) + 1;
        $positionCommerceAL = array_search($id, array_keys($CommerceallScoresAL)) + 1;
        $positionEnglishliteratureAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionFrenchAL = array_search($id, array_keys($FrenchallScoresAL)) + 1;
        $positionGeographyAL= array_search($id, array_keys($GeographyScoresAL)) + 1;
        $positionHistoryAL = array_search($id, array_keys($HistoryallScoresAL)) + 1;
        $positionIslamicknowledgeAL = array_search($id, array_keys($IslamicknowledgeScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliallScoresAL)) + 1;
        $positionLifeskillAL = array_search($id, array_keys($LifeskillScoresAL)) + 1;
        $positionPhysicsAL = array_search($id, array_keys($PhysicsallScoresAL)) + 1;
        $positionSwimmingAL = array_search($id, array_keys($SwimmingScoresAL)) + 1;
        $positionNutritionAL = array_search($id, array_keys($NutritionScoresAL)) + 1;

        return [
            'FirstMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageFM,
                'Basicmathematics' => $positionBasicmathematicFM,
                'Bibleknowledge' => $positionBibleknowledgeFM,
                'Bookkeeping' => $positionBookkeepingFM,
                'Biology' => $positionBiologyFM,
                'Civics' => $positionCivicsFM,
                'Chemistry' => $positionChemistryFM,
                'Computerstudy' => $positionComputerstudyFM,
                'Creativearts' => $positionCreativeartFM,
                'Commerce' => $positionCommerceFM,
                'Englishliterature' => $positionEnglishliteratureFM,
                'French' => $positionFrenchFM,
                'Geography' => $positionGeographyFM,
                'History' => $positionHistoryFM,
                'Islamicknowledge' => $positionIslamicknowledgeFM,
                'Kiswahili' => $positionKiswahiliFM,
                'Lifeskill' => $positionLifeskillFM,
                'Physics' => $positionPhysicsFM,
                'Swimming' => $positionSwimmingFM,
                'Nutrition' => $positionNutritionFM,

            ],
            'SemiAnnual' => [
                'Arabiclanguage' => $positionArabiclanguageSA,
                'Basicmathematics' => $positionBasicmathematicSA,
                'Bibleknowledge' => $positionBibleknowledgeSA,
                'Bookkeeping' => $positionBookkeepingSA,
                'Biology' => $positionBiologySA,
                'Civics' => $positionCivicsSA,
                'Chemistry' => $positionChemistrySA,
                'Computerstudy' => $positionComputerstudySA,
                'Creativearts' => $positionCreativeartsSA,
                'Commerce' => $positionCommerceSA,
                'Englishliterature' => $positionEnglishliteratureSA,
                'French' => $positionFrenchSA,
                'Geography' => $positionGeographySA,
                'History' => $positionHistorySA,
                'Islamicknowledge' => $positionIslamicknowledgeSA,
                'Kiswahili' => $positionKiswahiliSA,
                'Lifeskill' => $positionLifeskillSA,
                'Physics' => $positionPhysicsSA,
                'Swimming' => $positionSwimmingSA,
                'Nutrition' => $positionNutritionSA,
            ],
            'SecondMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageSM,
                'Basicmathematics' => $positionBasicmathematicSM,
                'Bibleknowledge' => $positionBibleknowledgeSM,
                'Bookkeeping' => $positionBookkeepingSM,
                'Biology' => $positionBiologySM,
                'Civics' => $positionCivicsSM,
                'Chemistry' => $positionChemistrySM,
                'Computerstudy' => $positionComputerstudySM,
                'Creativearts' => $positionCreativeartSM,
                'Commerce' => $positionCommerceSM,
                'Englishliterature' => $positionEnglishliteratureSM,
                'French' => $positionFrenchSM,
                'Geography' => $positionGeographySM,
                'History' => $positionHistorySM,
                'Islamicknowledge' => $positionIslamicknowledgeSM,
                'Kiswahili' => $positionKiswahiliSM,
                'Lifeskill' => $positionLifeskillSM,
                'Physics' => $positionPhysicsSM,
                'Swimming' => $positionSwimmingSM,
                'Nutrition' => $positionNutritionSM,
            ],
            'Annual' => [
                'Arabiclanguage' => $positionArabiclanguageAL,
                'Basicmathematics' => $positionBasicmathematicAL,
                'Bibleknowledge' => $positionBibleknowledgeAL,
                'Bookkeeping' => $positionBookkeepingAL,
                'Biology' => $positionBiologyAL,
                'Civics' => $positionCivicsAL,
                'Chemistry' => $positionChemistryAL,
                'Computerstudy' => $positionComputerstudyAL,
                'Creativearts' => $positionCreativeartAL,
                'Commerce' => $positionCommerceAL,
                'Englishliterature' => $positionEnglishliteratureAL,
                'French' => $positionFrenchAL,
                'Geography' => $positionGeographyAL,
                'History' => $positionHistoryAL,
                'Islamicknowledge' => $positionIslamicknowledgeAL,
                'Kiswahili' => $positionKiswahiliAL,
                'Lifeskill' => $positionLifeskillAL,
                'Physics' => $positionPhysicsAL,
                'Swimming' => $positionSwimmingAL,
                'Nutrition' => $positionNutritionAL,
            ],
        ];
        
    }


    public function FormTwoFM()
    {
        $userId = Auth::id();
        $data = formii_first_midterm::where('id', $userId)->first(); 

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormtwoFM', compact('errorMessage'));
        }


       $positionArabiclanguageFM = $this->calculatePositionFormII($userId);
        $positionBasicmathematicFM = $this->calculatePositionFormII($userId);
        $positionBibleknowledgeFM = $this->calculatePositionFormII($userId);
        $positionBookkeepingFM = $this->calculatePositionFormII($userId);
        $positionBiologyFM = $this->calculatePositionFormII($userId);
        $positionCivicsFM = $this->calculatePositionFormII($userId);
        $positionChemistryFM = $this->calculatePositionFormII($userId);
        $positionComputerstudyFM = $this->calculatePositionFormII($userId);
        $positionCreativeartFM = $this->calculatePositionFormII($userId);
        $positionCommerceFM = $this->calculatePositionFormII($userId);                        
        $positionEnglishliteratureFM = $this->calculatePositionFormII($userId);
        $positionFrenchFM = $this->calculatePositionFormII($userId);
        $positionGeographyFM = $this->calculatePositionFormII($userId);
        $positionHistoryFM = $this->calculatePositionFormII($userId);
        $positionIslamicknowledgeFM = $this->calculatePositionFormII($userId);
        $positionKiswahiliFM = $this->calculatePositionFormII($userId);
        $positionLifeskillFM = $this->calculatePositionFormII($userId);
        $positionPhysicsFM = $this->calculatePositionFormII($userId);
        $positionSwimmingFM = $this->calculatePositionFormII($userId);
        $positionNutritionFM = $this->calculatePositionFormII($userId);    
        
        $ArabiclanguageFM = $data->Arabiclanguage;
        $BasicmathematicsFM = $data->Basicmathematics;
        $BibleknowledgeFM = $data->Bibleknowledge;
        $BookkeepingFM= $data->Bookkeeping;
        $BiologyFM = $data->Biology; 
        $CivicsFM = $data->Civics;
        $ChemistryFM = $data->Chemistry;
        $ComputerstudyFM = $data->Computerstudy;
        $CreativeartsFM= $data->Creativearts;
        $CommerceFM = $data->Commerce; 
        $EnglishliteratureFM = $data->Englishliterature;
        $FrenchFM = $data->French;
        $GeographyFM = $data->Geography;
        $HistoryFM= $data->History;
        $IslamicknowledgeFM = $data->Islamicknowledge; 
        $KiswahiliFM = $data->Kiswahili;
        $LifeskillFM = $data->Lifeskill;
        $PhysicsFM = $data->Physics;
        $SwimmingFM = $data->Swimming;
        $NutritionFM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageFM + $BasicmathematicsFM +$BibleknowledgeFM +$BookkeepingFM +$BiologyFM + 
        $CivicsFM +$ChemistryFM +$ComputerstudyFM +$CreativeartsFM +$CommerceFM +$EnglishliteratureFM +$FrenchFM+$GeographyFM
        +$HistoryFM+ $IslamicknowledgeFM+$KiswahiliFM+$LifeskillFM+$PhysicsFM+$SwimmingFM +$NutritionFM;

        $AverageFM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageFM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsFM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeFM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingFM),
            'Biology' => $this->SecondarycalculateGrade($BiologyFM),
            'Civics' => $this->SecondarycalculateGrade($CivicsFM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryFM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyFM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsFM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceFM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureFM),
            'French' => $this->SecondarycalculateGrade($FrenchFM),
            'Geography' => $this->SecondarycalculateGrade($GeographyFM),
            'History' => $this->SecondarycalculateGrade($HistoryFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliFM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillFM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingFM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionFM)
        ];
    
       $FormISA = formii_semi_annual::where('id', $userId)->first();

       if (!$FormISA) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormtwoFM', compact('errorMessage'));
    }

       $positionArabiclanguageSA = $this->calculatePositionFormII($userId);
        $positionBasicmathematicSA= $this->calculatePositionFormII($userId);
        $positionBibleknowledgeSA = $this->calculatePositionFormII($userId);
        $positionBookkeepingSA = $this->calculatePositionFormII($userId);
        $positionBiologySA = $this->calculatePositionFormII($userId);
        $positionCivicsSA = $this->calculatePositionFormII($userId);
        $positionChemistrySA = $this->calculatePositionFormII($userId);
        $positionComputerstudySA = $this->calculatePositionFormII($userId);
        $positionCreativeartsSA = $this->calculatePositionFormII($userId);
        $positionCommerceSA= $this->calculatePositionFormII($userId);
        $positionEnglishliteratureSA = $this->calculatePositionFormII($userId);
        $positionFrenchSA = $this->calculatePositionFormII($userId);
        $positionGeographySA = $this->calculatePositionFormII($userId);
        $positionHistorySA= $this->calculatePositionFormII($userId);
        $positionIslamicknowledgeSA = $this->calculatePositionFormII($userId);
        $positionKiswahiliSA = $this->calculatePositionFormII($userId);
        $positionLifeskillSA= $this->calculatePositionFormII($userId);
        $positionPhysicsSA = $this->calculatePositionFormII($userId);
        $positionSwimmingSA = $this->calculatePositionFormII($userId);
        $positionNutritionSA = $this->calculatePositionFormII($userId);

        $ArabiclanguageSA = $FormISA->Arabiclanguage;
        $BasicmathematicsSA = $FormISA->Basicmathematics;
        $BibleknowledgeSA = $FormISA->Bibleknowledge;
        $BookkeepingSA= $FormISA->Bookkeeping;
        $BiologySA = $FormISA->Biology; 
        $CivicsSA = $FormISA->Civics;
        $ChemistrySA = $FormISA->Chemistry;
        $ComputerstudySA = $FormISA->Computerstudy;
        $CreativeartsSA= $FormISA->Creativearts;
        $CommerceSA = $FormISA->Commerce; 
        $EnglishliteratureSA = $FormISA->Englishliterature;
        $FrenchSA = $FormISA->French;
        $GeographySA = $FormISA->Geography;
        $HistorySA= $FormISA->History;
        $IslamicknowledgeSA = $FormISA->Islamicknowledge; 
        $KiswahiliSA = $FormISA->Kiswahili;
        $LifeskillSA = $FormISA->Lifeskill;
        $PhysicsSA = $FormISA->Physics;
        $SwimmingSA = $FormISA->Swimming;
        $NutritionSA = $FormISA->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSA + $BasicmathematicsSA +$BibleknowledgeSA +$BookkeepingSA+$BiologySA + 
        $CivicsSA +$ChemistrySA +$ComputerstudySA+$CreativeartsSA+$CommerceSA+$EnglishliteratureSA+$FrenchSA+$GeographySA+$HistorySA+
        $IslamicknowledgeSA+$KiswahiliSA+$LifeskillSA+$PhysicsSA+$SwimmingSA +$NutritionSA;

        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesSA = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSA),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSA),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSA),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSA),
            'Biology' => $this->SecondarycalculateGrade($BiologySA),
            'Civics' => $this->SecondarycalculateGrade($CivicsSA),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySA),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySA),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSA),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSA),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSA),
            'French' => $this->SecondarycalculateGrade($FrenchSA),
            'Geography' => $this->SecondarycalculateGrade($GeographySA),
            'History' => $this->SecondarycalculateGrade($HistorySA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSA),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSA),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSA),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSA)
        ];
        
        // Pass all data to the view as a single array
        return view('FormtwoFM', [
            'data' => $data,
            'FormISA' => $FormISA,
            'grades' => $grades,           
    'FormIgradesSA' => $FormIgradesSA,

    'positionArabiclanguageFM' => $positionArabiclanguageFM,
    'positionBasicmathematicFM' => $positionBasicmathematicFM, 
    'positionBibleknowledgeFM' => $positionBibleknowledgeFM, 
    'positionBookkeepingFM' =>$positionBookkeepingFM,
    'positionBiologyFM' => $positionBiologyFM,
    'positionCivicsFM' => $positionCivicsFM,
    'positionChemistryFM' => $positionChemistryFM,
    'positionComputerstudyFM' => $positionComputerstudyFM, 
    'positionCreativeartFM' => $positionCreativeartFM,
    'positionCommerceFM' => $positionCommerceFM,
    'positionEnglishliteratureFM' => $positionEnglishliteratureFM, 
    'positionFrenchFM' => $positionFrenchFM, 
    'positionGeographyFM' => $positionGeographyFM, 
    'positionHistoryFM' => $positionHistoryFM, 
    'positionIslamicknowledgeFM' => $positionIslamicknowledgeFM,
    'positionKiswahiliFM' => $positionKiswahiliFM, 
    'positionLifeskillFM' => $positionLifeskillFM,
    'positionPhysicsFM' => $positionPhysicsFM,
    'positionSwimmingFM' =>$positionSwimmingFM, 
    'positionNutritionFM' => $positionNutritionFM,
    '$AverageFM'  => $AverageFM,

    'positionArabiclanguageSA' => $positionArabiclanguageSA,
    'positionBasicmathematicSA' => $positionBasicmathematicSA, 
    'positionBibleknowledgeSA' => $positionBibleknowledgeSA, 
    'positionBookkeepingSA' =>$positionBookkeepingSA,
    'positionBiologySA' => $positionBiologySA,
    'positionCivicsSA' => $positionCivicsSA,
    'positionChemistrySA' => $positionChemistrySA,
    'positionComputerstudySA' => $positionComputerstudySA, 
    'positionCreativeartsSA' => $positionCreativeartsSA,
    'positionCommerceSA' => $positionCommerceSA,
    'positionEnglishliteratureSA' => $positionEnglishliteratureSA, 
    'positionFrenchSA' => $positionFrenchSA, 
    'positionGeographySA' => $positionGeographySA, 
    'positionHistorySA' => $positionHistorySA, 
    'positionIslamicknowledgeSA' => $positionIslamicknowledgeSA,
    'positionKiswahiliSA' => $positionKiswahiliSA, 
    'positionLifeskillSA' => $positionLifeskillSA,
    'positionPhysicsSA' => $positionPhysicsSA,
    'positionSwimmingSA' =>$positionSwimmingSA, 
    'positionNutritionSA' => $positionNutritionSA,
    'AverageSA' => $AverageSA,

 ],compact('AverageFM','AverageSA'));
      
    }

    public function FormTwoSM()
    {
        $userId = Auth::id();
        $data = formii_second_midterm::where('id', $userId)->first(); 

         if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormtwoSM', compact('errorMessage'));
        }

       $positionArabiclanguageSM = $this->calculatePositionFormII($userId);
        $positionBasicmathematicSM = $this->calculatePositionFormII($userId);
        $positionBibleknowledgeSM = $this->calculatePositionFormII($userId);
        $positionBookkeepingSM = $this->calculatePositionFormII($userId);
        $positionBiologySM = $this->calculatePositionFormII($userId);
        $positionCivicsSM = $this->calculatePositionFormII($userId);
        $positionChemistrySM = $this->calculatePositionFormII($userId);
        $positionComputerstudySM = $this->calculatePositionFormII($userId);
        $positionCreativeartSM = $this->calculatePositionFormII($userId);
        $positionCommerceSM = $this->calculatePositionFormII($userId);                        
        $positionEnglishliteratureSM = $this->calculatePositionFormII($userId);
        $positionFrenchSM = $this->calculatePositionFormII($userId);
        $positionGeographySM = $this->calculatePositionFormII($userId);
        $positionHistorySM = $this->calculatePositionFormII($userId);
        $positionIslamicknowledgeSM = $this->calculatePositionFormII($userId);
        $positionKiswahiliSM = $this->calculatePositionFormII($userId);
        $positionLifeskillSM = $this->calculatePositionFormII($userId);
        $positionPhysicsSM = $this->calculatePositionFormII($userId);
        $positionSwimmingSM = $this->calculatePositionFormII($userId);
        $positionNutritionSM = $this->calculatePositionFormII($userId);    
        
        $ArabiclanguageSM = $data->Arabiclanguage;
        $BasicmathematicsSM = $data->Basicmathematics;
        $BibleknowledgeSM = $data->Bibleknowledge;
        $BookkeepingSM= $data->Bookkeeping;
        $BiologySM = $data->Biology; 
        $CivicsSM = $data->Civics;
        $ChemistrySM = $data->Chemistry;
        $ComputerstudySM = $data->Computerstudy;
        $CreativeartsSM= $data->Creativearts;
        $CommerceSM = $data->Commerce; 
        $EnglishliteratureSM = $data->Englishliterature;
        $FrenchSM = $data->French;
        $GeographySM = $data->Geography;
        $HistorySM= $data->History;
        $IslamicknowledgeSM = $data->Islamicknowledge; 
        $KiswahiliSM = $data->Kiswahili;
        $LifeskillSM = $data->Lifeskill;
        $PhysicsSM = $data->Physics;
        $SwimmingSM = $data->Swimming;
        $NutritionSM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSM + $BasicmathematicsSM +$BibleknowledgeSM +$BookkeepingSM+$BiologySM + 
        $CivicsSM +$ChemistrySM+$ComputerstudySM+$CreativeartsSM+$CommerceSM+$EnglishliteratureSM+$FrenchSM+$GeographySM+$HistorySM+
        $IslamicknowledgeSM+$KiswahiliSM+$LifeskillSM+$PhysicsSM+$SwimmingSM +$NutritionSM;

        $AverageSM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSM),
            'Biology' => $this->SecondarycalculateGrade($BiologySM),
            'Civics' => $this->SecondarycalculateGrade($CivicsSM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSM),
            'French' => $this->SecondarycalculateGrade($FrenchSM),
            'Geography' => $this->SecondarycalculateGrade($GeographySM),
            'History' => $this->SecondarycalculateGrade($HistorySM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSM)
        ];
    
       $FormIAL = formii_annual::where('id', $userId)->first();

       if (!$FormIAL) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormtwoSM', compact('errorMessage'));
      }

       $positionArabiclanguageAL = $this->calculatePositionFormII($userId);
        $positionBasicmathematicAL= $this->calculatePositionFormII($userId);
        $positionBibleknowledgeAL = $this->calculatePositionFormII($userId);
        $positionBookkeepingAL = $this->calculatePositionFormII($userId);
        $positionBiologyAL = $this->calculatePositionFormII($userId);
        $positionCivicsAL = $this->calculatePositionFormII($userId);
        $positionChemistryAL = $this->calculatePositionFormII($userId);
        $positionComputerstudyAL = $this->calculatePositionFormII($userId);
        $positionCreativeartsAL = $this->calculatePositionFormII($userId);
        $positionCommerceAL= $this->calculatePositionFormII($userId);
        $positionEnglishliteratureAL = $this->calculatePositionFormII($userId);
        $positionFrenchAL = $this->calculatePositionFormII($userId);
        $positionGeographyAL = $this->calculatePositionFormII($userId);
        $positionHistoryAL= $this->calculatePositionFormII($userId);
        $positionIslamicknowledgeAL = $this->calculatePositionFormII($userId);
        $positionKiswahiliAL = $this->calculatePositionFormII($userId);
        $positionLifeskillAL= $this->calculatePositionFormII($userId);
        $positionPhysicsAL = $this->calculatePositionFormII($userId);
        $positionSwimmingAL = $this->calculatePositionFormII($userId);
        $positionNutritionAL = $this->calculatePositionFormII($userId);

        $ArabiclanguageAL = $FormIAL->Arabiclanguage;
        $BasicmathematicsAL = $FormIAL->Basicmathematics;
        $BibleknowledgeAL = $FormIAL->Bibleknowledge;
        $BookkeepingAL= $FormIAL->Bookkeeping;
        $BiologyAL = $FormIAL->Biology; 
        $CivicsAL = $FormIAL->Civics;
        $ChemistryAL= $FormIAL->Chemistry;
        $ComputerstudyAL = $FormIAL->Computerstudy;
        $CreativeartsAL= $FormIAL->Creativearts;
        $CommerceAL = $FormIAL->Commerce; 
        $EnglishliteratureAL = $FormIAL->English;
        $FrenchAL = $FormIAL->French;
        $GeographyAL = $FormIAL->Geography;
        $HistoryAL= $FormIAL->History;
        $IslamicknowledgeAL = $FormIAL->Islamicknowledge; 
        $KiswahiliAL = $FormIAL->Kiswahili;
        $LifeskillAL = $FormIAL->Lifeskill;
        $PhysicsAL = $FormIAL->Physics;
        $SwimmingAL = $FormIAL->Swimming;
        $NutritionAL= $FormIAL->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageAL + $BasicmathematicsAL +$BibleknowledgeAL +$BookkeepingAL+$BiologyAL + 
        $CivicsAL +$ChemistryAL +$ComputerstudyAL +$CreativeartsAL +$CommerceAL + $EnglishliteratureAL +$FrenchAL +$GeographyAL +$HistoryAL +
        $IslamicknowledgeAL +$KiswahiliAL +$LifeskillAL +$PhysicsAL +$SwimmingAL +$NutritionAL;

        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesAL = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageAL),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsAL),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeAL),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingAL),
            'Biology' => $this->SecondarycalculateGrade($BiologyAL),
            'Civics' => $this->SecondarycalculateGrade($CivicsAL),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryAL),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyAL),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsAL),
            'Commerce' => $this->SecondarycalculateGrade($CommerceAL),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureAL),
            'French' => $this->SecondarycalculateGrade($FrenchAL),
            'Geography' => $this->SecondarycalculateGrade($GeographyAL),
            'History' => $this->SecondarycalculateGrade($HistoryAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliAL),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillAL),
            'Physics' => $this->SecondarycalculateGrade($PhysicsAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingAL),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionAL)
        ];
        
        // Pass all data to the view as a single array
        return view('FormOneSM', [
            'data' => $data,
            'grades' => $grades,
            'FormIAL' => $FormIAL,                     
    'FormIgradesAL' => $FormIgradesAL,
    'positionArabiclanguageSM' => $positionArabiclanguageSM,
    'positionBasicmathematicSM' => $positionBasicmathematicSM, 
    'positionBibleknowledgeSM' => $positionBibleknowledgeSM, 
    'positionBookkeepingSM' =>$positionBookkeepingSM,
    'positionBiologySM' => $positionBiologySM,
    'positionCivicsSM' => $positionCivicsSM,
    'positionChemistrySM' => $positionChemistrySM,
    'positionComputerstudySM' => $positionComputerstudySM, 
    'positionCreativeartSM' => $positionCreativeartSM,
    'positionCommerceSM' => $positionCommerceSM,
    'positionEnglishliteratureSM' => $positionEnglishliteratureSM, 
    'positionFrenchSM' => $positionFrenchSM, 
    'positionGeographySM' => $positionGeographySM, 
    'positionHistorySM' => $positionHistorySM, 
    'positionIslamicknowledgeSM' => $positionIslamicknowledgeSM,
    'positionKiswahiliSM' => $positionKiswahiliSM, 
    'positionLifeskillSM' => $positionLifeskillSM,
    'positionPhysicsSM' => $positionPhysicsSM,
    'positionSwimmingSM' =>$positionSwimmingSM, 
    'positionNutritionSM' => $positionNutritionSM,
    '$AverageSM'  => $AverageSM,

    'positionArabiclanguageAL' => $positionArabiclanguageAL,
    'positionBasicmathematicAL' => $positionBasicmathematicAL, 
    'positionBibleknowledgeAL' => $positionBibleknowledgeAL, 
    'positionBookkeepingAL' =>$positionBookkeepingAL,
    'positionBiologyAL' => $positionBiologyAL,
    'positionCivicsAL' => $positionCivicsAL,
    'positionChemistryAL' => $positionChemistryAL,
    'positionComputerstudyAL' => $positionComputerstudyAL, 
    'positionCreativeartsAL' => $positionCreativeartsAL,
    'positionCommerceAL' => $positionCommerceAL,
    'positionEnglishliteratureAL' => $positionEnglishliteratureAL, 
    'positionFrenchAL' => $positionFrenchAL, 
    'positionGeographyAL' => $positionGeographyAL, 
    'positionHistoryAL' => $positionHistoryAL, 
    'positionIslamicknowledgeAL' => $positionIslamicknowledgeAL,
    'positionKiswahiliAL' => $positionKiswahiliAL, 
    'positionLifeskillAL' => $positionLifeskillAL,
    'positionPhysicsAL' => $positionPhysicsAL,
    'positionSwimmingAL' =>$positionSwimmingAL, 
    'positionNutritionAL' => $positionNutritionAL,
    'AverageAL' => $AverageAL,

 ],compact('AverageSM','AverageAL'));
      
    }


    public function calculatePositionFormIII ($id) {
        // Fetch all scores from the database
        $ArabiclanguageFM = formiii_first_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresFM = formiii_first_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresFM = formiii_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresFM = formiii_first_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresFM = formiii_first_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresFM = formiii_first_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresFM =formiii_first_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresFM = formiii_first_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresFM = formiii_first_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresFM = formiii_first_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresFM = formiii_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresFM = formiii_first_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresFM = formiii_first_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresFM = formiii_first_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresFM =formiii_first_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresFM = formiii_first_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresFM = formiii_first_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresFM = formiii_first_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresFM =formiii_first_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresFM = formiii_first_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresFM = formiii_first_midterm::pluck('Nutrition', 'id')->toArray();

        $ArabiclanguageallScoresSA = formiii_semi_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSA = formiii_semi_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSA = formiii_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSA= formiii_semi_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSA = formiii_semi_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresSA = formiii_semi_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSA =formiii_semi_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSA = formiii_semi_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSA = formiii_semi_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSA = formiii_semi_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSA = formiii_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSA = formiii_semi_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSA = formiii_semi_annual::pluck('French', 'id')->toArray();
        $GeographyScoresSA =formiii_semi_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSA =formiii_semi_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSA= formiii_semi_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSA = formiii_semi_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSA = formiii_semi_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSA =formiii_semi_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSA = formiii_semi_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSA = formiii_semi_annual::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresSM = formiii_second_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSM = formiii_second_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSM = formiii_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSM = formiii_second_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSM = formiii_second_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresSM = formiii_second_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSM =formiii_second_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSM = formiii_second_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSM = formiii_second_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSM = formiii_second_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSM= formiii_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSM = formiii_second_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSM = formiii_second_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresSM =formiii_second_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSM =formiii_second_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSM = formiii_second_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSM = formiii_second_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSM = formiii_second_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSM=formiii_second_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSM = formiii_second_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSM = formiii_second_midterm::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresAL = formiii_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresAL = formiii_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresAL = formiii_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresAL = formiii_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresAL = formiii_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresAL =formiii_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresAL =formiii_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresAL= formiii_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresAL = formiii_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresAL = formiii_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresAL = formiii_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresAL = formiii_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresAL = formiii_annual::pluck('French', 'id')->toArray();
        $GeographyScoresAL = formiii_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresAL =formiii_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresAL = formiii_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresAL = formiii_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresAL = formiii_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresAL =formiii_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresAL = formiii_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresAL = formiii_annual::pluck('Nutrition', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabiclanguageFM );
        arsort($BasicmathematicsallScoresFM);
        arsort($BibleknowledgeallScoresFM);
        arsort($BookkeepingallScoresFM);
        arsort($BiologyallScoresFM);
        arsort($CivicsScoresFM);
        arsort($ChemistryallScoresFM);
        arsort($ComputerstudyScoresFM);
        arsort($CreativeartsallScoresFM);
        arsort($CommerceallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($FrenchallScoresFM);
        arsort($GeographyScoresFM);
        arsort($HistoryallScoresFM);
        arsort($IslamicknowledgeScoresFM);
        arsort($KiswahiliallScoresFM);
        arsort($LifeskillScoresFM);
        arsort($PhysicsallScoresFM);
        arsort($SwimmingScoresFM);
        arsort($NutritionScoresFM);

        arsort($ArabiclanguageallScoresSM );
        arsort($BasicmathematicsallScoresSM);
        arsort($BibleknowledgeallScoresSM);
        arsort($BookkeepingallScoresSM);
        arsort($BiologyallScoresSM);
        arsort($CivicsScoresSM);
        arsort($ChemistryallScoresSM);
        arsort($ComputerstudyScoresSM);
        arsort($CreativeartsallScoresSM);
        arsort($CommerceallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($FrenchallScoresSM);
        arsort($GeographyScoresSM);
        arsort($HistoryallScoresSM);
        arsort($IslamicknowledgeScoresSM);
        arsort($KiswahiliallScoresSM);
        arsort($LifeskillScoresSM);
        arsort($PhysicsallScoresSM);
        arsort($SwimmingScoresSM);
        arsort($NutritionScoresSM);

        arsort($ArabiclanguageallScoresSA );
        arsort($BasicmathematicsallScoresSA);
        arsort($BibleknowledgeallScoresSA);
        arsort($BookkeepingallScoresSA);
        arsort($BiologyallScoresSA);
        arsort($CivicsScoresSA);
        arsort($ChemistryallScoresSA);
        arsort($ComputerstudyScoresSA);
        arsort($CreativeartsallScoresSA);
        arsort($CommerceallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($FrenchallScoresSA);
        arsort($GeographyScoresSA);
        arsort($HistoryallScoresSA);
        arsort($IslamicknowledgeScoresSA);
        arsort($KiswahiliallScoresSA);
        arsort($LifeskillScoresSA);
        arsort($PhysicsallScoresSA);
        arsort($SwimmingScoresSA);
        arsort($NutritionScoresSA);

        arsort($ArabiclanguageallScoresAL );
        arsort($BasicmathematicsallScoresAL);
        arsort($BibleknowledgeallScoresAL);
        arsort($BookkeepingallScoresAL);
        arsort($BiologyallScoresAL);
        arsort($CivicsScoresAL);
        arsort($ChemistryallScoresAL);
        arsort($ComputerstudyScoresAL);
        arsort($CreativeartsallScoresAL);
        arsort($CommerceallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($FrenchallScoresAL);
        arsort($GeographyScoresAL);
        arsort($HistoryallScoresAL);
        arsort($IslamicknowledgeScoresAL);
        arsort($KiswahiliallScoresAL);
        arsort($LifeskillScoresAL);
        arsort($PhysicsallScoresAL);
        arsort($SwimmingScoresAL);
        arsort($NutritionScoresAL);



    
        // Find the position of the user
        $positionArabiclanguageFM = array_search($id, array_keys($ArabiclanguageFM )) + 1;
        $positionBasicmathematicFM = array_search($id, array_keys($BasicmathematicsallScoresFM)) + 1;
        $positionBibleknowledgeFM = array_search($id, array_keys($BibleknowledgeallScoresFM)) + 1;
        $positionBookkeepingFM  = array_search($id, array_keys($BookkeepingallScoresFM)) + 1;
        $positionBiologyFM = array_search($id, array_keys($BiologyallScoresFM)) + 1;
        $positionCivicsFM = array_search($id, array_keys($CivicsScoresFM)) + 1;
        $positionChemistryFM = array_search($id, array_keys($ChemistryallScoresFM)) + 1;
        $positionComputerstudyFM = array_search($id, array_keys($ComputerstudyScoresFM)) + 1;
        $positionCreativeartFM = array_search($id, array_keys($CreativeartsallScoresFM )) + 1;
        $positionCommerceFM = array_search($id, array_keys($CommerceallScoresFM)) + 1;
        $positionEnglishliteratureFM = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionFrenchFM = array_search($id, array_keys($FrenchallScoresFM)) + 1;
        $positionGeographyFM = array_search($id, array_keys($GeographyScoresFM)) + 1;
        $positionHistoryFM = array_search($id, array_keys($HistoryallScoresFM)) + 1;
        $positionIslamicknowledgeFM = array_search($id, array_keys($IslamicknowledgeScoresFM)) + 1;
        $positionKiswahiliFM = array_search($id, array_keys($KiswahiliallScoresFM)) + 1;
        $positionLifeskillFM = array_search($id, array_keys($LifeskillScoresFM)) + 1;
        $positionPhysicsFM = array_search($id, array_keys($PhysicsallScoresFM)) + 1;
        $positionSwimmingFM = array_search($id, array_keys($SwimmingScoresFM)) + 1;
        $positionNutritionFM = array_search($id, array_keys($NutritionScoresFM)) + 1;

       

        $positionArabiclanguageSA = array_search($id, array_keys($ArabiclanguageallScoresSA )) + 1;
        $positionBasicmathematicSA = array_search($id, array_keys($BasicmathematicsallScoresSA)) + 1;
        $positionBibleknowledgeSA = array_search($id, array_keys($BibleknowledgeallScoresSA)) + 1;
        $positionBookkeepingSA  = array_search($id, array_keys($BookkeepingallScoresSA)) + 1;
        $positionBiologySA = array_search($id, array_keys($BiologyallScoresSA)) + 1;
        $positionCivicsSA = array_search($id, array_keys($CivicsScoresSA)) + 1;
        $positionChemistrySA = array_search($id, array_keys($ChemistryallScoresSA)) + 1;
        $positionComputerstudySA = array_search($id, array_keys($ComputerstudyScoresSA)) + 1;
        $positionCreativeartsSA = array_search($id, array_keys($CreativeartsallScoresSA)) + 1;
        $positionCommerceSA = array_search($id, array_keys($CommerceallScoresSA)) + 1;
        $positionEnglishliteratureSA = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionFrenchSA = array_search($id, array_keys($FrenchallScoresSA)) + 1;
        $positionGeographySA = array_search($id, array_keys($GeographyScoresSA)) + 1;
        $positionHistorySA = array_search($id, array_keys($HistoryallScoresSA)) + 1;
        $positionIslamicknowledgeSA = array_search($id, array_keys($IslamicknowledgeScoresSA)) + 1;
        $positionKiswahiliSA = array_search($id, array_keys($KiswahiliallScoresSA)) + 1;
        $positionLifeskillSA = array_search($id, array_keys($LifeskillScoresSA)) + 1;
        $positionPhysicsSA = array_search($id, array_keys($PhysicsallScoresSA)) + 1;
        $positionSwimmingSA = array_search($id, array_keys($SwimmingScoresSA)) + 1;
        $positionNutritionSA = array_search($id, array_keys($NutritionScoresSA)) + 1;



        $positionArabiclanguageSM = array_search($id, array_keys($ArabiclanguageallScoresSM )) + 1;
        $positionBasicmathematicSM = array_search($id, array_keys($BasicmathematicsallScoresSM)) + 1;
        $positionBibleknowledgeSM = array_search($id, array_keys($BibleknowledgeallScoresSM)) + 1;
        $positionBookkeepingSM  = array_search($id, array_keys($BookkeepingallScoresSM)) + 1;
        $positionBiologySM = array_search($id, array_keys($BiologyallScoresSM)) + 1;
        $positionCivicsSM = array_search($id, array_keys($CivicsScoresSM)) + 1;
        $positionChemistrySM = array_search($id, array_keys($ChemistryallScoresSM)) + 1;
        $positionComputerstudySM = array_search($id, array_keys($ComputerstudyScoresSM)) + 1;
        $positionCreativeartSM = array_search($id, array_keys($CreativeartsallScoresSM)) + 1;
        $positionCommerceSM = array_search($id, array_keys($CommerceallScoresSM)) + 1;
        $positionEnglishliteratureSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionFrenchSM = array_search($id, array_keys($FrenchallScoresSM)) + 1;
        $positionGeographySM = array_search($id, array_keys($GeographyScoresSM)) + 1;
        $positionHistorySM = array_search($id, array_keys($HistoryallScoresSM)) + 1;
        $positionIslamicknowledgeSM = array_search($id, array_keys($IslamicknowledgeScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliallScoresSM)) + 1;
        $positionLifeskillSM = array_search($id, array_keys($LifeskillScoresSM)) + 1;
        $positionPhysicsSM = array_search($id, array_keys($PhysicsallScoresSM)) + 1;
        $positionSwimmingSM= array_search($id, array_keys($SwimmingScoresSM)) + 1;
        $positionNutritionSM = array_search($id, array_keys($NutritionScoresSM)) + 1;

 

   
        $positionArabiclanguageAL = array_search($id, array_keys($ArabiclanguageallScoresAL )) + 1;
        $positionBasicmathematicAL = array_search($id, array_keys($BasicmathematicsallScoresAL)) + 1;
        $positionBibleknowledgeAL = array_search($id, array_keys($BibleknowledgeallScoresAL)) + 1;
        $positionBookkeepingAL  = array_search($id, array_keys($BookkeepingallScoresAL)) + 1;
        $positionBiologyAL = array_search($id, array_keys($BiologyallScoresAL)) + 1;
        $positionCivicsAL = array_search($id, array_keys($CivicsScoresAL)) + 1;
        $positionChemistryAL = array_search($id, array_keys($ChemistryallScoresAL)) + 1;
        $positionComputerstudyAL = array_search($id, array_keys($ComputerstudyScoresAL)) + 1;
        $positionCreativeartAL = array_search($id, array_keys($CreativeartsallScoresAL)) + 1;
        $positionCommerceAL = array_search($id, array_keys($CommerceallScoresAL)) + 1;
        $positionEnglishliteratureAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionFrenchAL = array_search($id, array_keys($FrenchallScoresAL)) + 1;
        $positionGeographyAL= array_search($id, array_keys($GeographyScoresAL)) + 1;
        $positionHistoryAL = array_search($id, array_keys($HistoryallScoresAL)) + 1;
        $positionIslamicknowledgeAL = array_search($id, array_keys($IslamicknowledgeScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliallScoresAL)) + 1;
        $positionLifeskillAL = array_search($id, array_keys($LifeskillScoresAL)) + 1;
        $positionPhysicsAL = array_search($id, array_keys($PhysicsallScoresAL)) + 1;
        $positionSwimmingAL = array_search($id, array_keys($SwimmingScoresAL)) + 1;
        $positionNutritionAL = array_search($id, array_keys($NutritionScoresAL)) + 1;

        return [
            'FirstMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageFM,
                'Basicmathematics' => $positionBasicmathematicFM,
                'Bibleknowledge' => $positionBibleknowledgeFM,
                'Bookkeeping' => $positionBookkeepingFM,
                'Biology' => $positionBiologyFM,
                'Civics' => $positionCivicsFM,
                'Chemistry' => $positionChemistryFM,
                'Computerstudy' => $positionComputerstudyFM,
                'Creativearts' => $positionCreativeartFM,
                'Commerce' => $positionCommerceFM,
                'Englishliterature' => $positionEnglishliteratureFM,
                'French' => $positionFrenchFM,
                'Geography' => $positionGeographyFM,
                'History' => $positionHistoryFM,
                'Islamicknowledge' => $positionIslamicknowledgeFM,
                'Kiswahili' => $positionKiswahiliFM,
                'Lifeskill' => $positionLifeskillFM,
                'Physics' => $positionPhysicsFM,
                'Swimming' => $positionSwimmingFM,
                'Nutrition' => $positionNutritionFM,

            ],
            'SemiAnnual' => [
                'Arabiclanguage' => $positionArabiclanguageSA,
                'Basicmathematics' => $positionBasicmathematicSA,
                'Bibleknowledge' => $positionBibleknowledgeSA,
                'Bookkeeping' => $positionBookkeepingSA,
                'Biology' => $positionBiologySA,
                'Civics' => $positionCivicsSA,
                'Chemistry' => $positionChemistrySA,
                'Computerstudy' => $positionComputerstudySA,
                'Creativearts' => $positionCreativeartsSA,
                'Commerce' => $positionCommerceSA,
                'Englishliterature' => $positionEnglishliteratureSA,
                'French' => $positionFrenchSA,
                'Geography' => $positionGeographySA,
                'History' => $positionHistorySA,
                'Islamicknowledge' => $positionIslamicknowledgeSA,
                'Kiswahili' => $positionKiswahiliSA,
                'Lifeskill' => $positionLifeskillSA,
                'Physics' => $positionPhysicsSA,
                'Swimming' => $positionSwimmingSA,
                'Nutrition' => $positionNutritionSA,
            ],
            'SecondMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageSM,
                'Basicmathematics' => $positionBasicmathematicSM,
                'Bibleknowledge' => $positionBibleknowledgeSM,
                'Bookkeeping' => $positionBookkeepingSM,
                'Biology' => $positionBiologySM,
                'Civics' => $positionCivicsSM,
                'Chemistry' => $positionChemistrySM,
                'Computerstudy' => $positionComputerstudySM,
                'Creativearts' => $positionCreativeartSM,
                'Commerce' => $positionCommerceSM,
                'Englishliterature' => $positionEnglishliteratureSM,
                'French' => $positionFrenchSM,
                'Geography' => $positionGeographySM,
                'History' => $positionHistorySM,
                'Islamicknowledge' => $positionIslamicknowledgeSM,
                'Kiswahili' => $positionKiswahiliSM,
                'Lifeskill' => $positionLifeskillSM,
                'Physics' => $positionPhysicsSM,
                'Swimming' => $positionSwimmingSM,
                'Nutrition' => $positionNutritionSM,
            ],
            'Annual' => [
                'Arabiclanguage' => $positionArabiclanguageAL,
                'Basicmathematics' => $positionBasicmathematicAL,
                'Bibleknowledge' => $positionBibleknowledgeAL,
                'Bookkeeping' => $positionBookkeepingAL,
                'Biology' => $positionBiologyAL,
                'Civics' => $positionCivicsAL,
                'Chemistry' => $positionChemistryAL,
                'Computerstudy' => $positionComputerstudyAL,
                'Creativearts' => $positionCreativeartAL,
                'Commerce' => $positionCommerceAL,
                'Englishliterature' => $positionEnglishliteratureAL,
                'French' => $positionFrenchAL,
                'Geography' => $positionGeographyAL,
                'History' => $positionHistoryAL,
                'Islamicknowledge' => $positionIslamicknowledgeAL,
                'Kiswahili' => $positionKiswahiliAL,
                'Lifeskill' => $positionLifeskillAL,
                'Physics' => $positionPhysicsAL,
                'Swimming' => $positionSwimmingAL,
                'Nutrition' => $positionNutritionAL,
            ],
        ];
        
    }

    public function FormThreeFM()
    {
        $userId = Auth::id();
        $data = formiii_first_midterm::where('id', $userId)->first(); 

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormthreeFM', compact('errorMessage'));
        }


       $positionArabiclanguageFM = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicFM = $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeFM = $this->calculatePositionFormIII($userId);
        $positionBookkeepingFM = $this->calculatePositionFormIII($userId);
        $positionBiologyFM = $this->calculatePositionFormIII($userId);
        $positionCivicsFM = $this->calculatePositionFormIII($userId);
        $positionChemistryFM = $this->calculatePositionFormIII($userId);
        $positionComputerstudyFM = $this->calculatePositionFormIII($userId);
        $positionCreativeartFM = $this->calculatePositionFormIII($userId);
        $positionCommerceFM = $this->calculatePositionFormIII($userId);                        
        $positionEnglishliteratureFM = $this->calculatePositionFormIII($userId);
        $positionFrenchFM = $this->calculatePositionFormIII($userId);
        $positionGeographyFM = $this->calculatePositionFormIII($userId);
        $positionHistoryFM = $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeFM = $this->calculatePositionFormIII($userId);
        $positionKiswahiliFM = $this->calculatePositionFormIII($userId);
        $positionLifeskillFM = $this->calculatePositionFormIII($userId);
        $positionPhysicsFM = $this->calculatePositionFormIII($userId);
        $positionSwimmingFM = $this->calculatePositionFormIII($userId);
        $positionNutritionFM = $this->calculatePositionFormIII($userId);    
        
        $ArabiclanguageFM = $data->Arabiclanguage;
        $BasicmathematicsFM = $data->Basicmathematics;
        $BibleknowledgeFM = $data->Bibleknowledge;
        $BookkeepingFM= $data->Bookkeeping;
        $BiologyFM = $data->Biology; 
        $CivicsFM = $data->Civics;
        $ChemistryFM = $data->Chemistry;
        $ComputerstudyFM = $data->Computerstudy;
        $CreativeartsFM= $data->Creativearts;
        $CommerceFM = $data->Commerce; 
        $EnglishliteratureFM = $data->Englishliterature;
        $FrenchFM = $data->French;
        $GeographyFM = $data->Geography;
        $HistoryFM= $data->History;
        $IslamicknowledgeFM = $data->Islamicknowledge; 
        $KiswahiliFM = $data->Kiswahili;
        $LifeskillFM = $data->Lifeskill;
        $PhysicsFM = $data->Physics;
        $SwimmingFM = $data->Swimming;
        $NutritionFM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageFM + $BasicmathematicsFM +$BibleknowledgeFM +$BookkeepingFM +$BiologyFM + 
        $CivicsFM +$ChemistryFM +$ComputerstudyFM +$CreativeartsFM +$CommerceFM +$EnglishliteratureFM +$FrenchFM+$GeographyFM
        +$HistoryFM+ $IslamicknowledgeFM+$KiswahiliFM+$LifeskillFM+$PhysicsFM+$SwimmingFM +$NutritionFM;

        $AverageFM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageFM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsFM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeFM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingFM),
            'Biology' => $this->SecondarycalculateGrade($BiologyFM),
            'Civics' => $this->SecondarycalculateGrade($CivicsFM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryFM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyFM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsFM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceFM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureFM),
            'French' => $this->SecondarycalculateGrade($FrenchFM),
            'Geography' => $this->SecondarycalculateGrade($GeographyFM),
            'History' => $this->SecondarycalculateGrade($HistoryFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliFM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillFM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingFM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionFM)
        ];
    
       $FormISA = formiii_semi_annual::where('id', $userId)->first();

       if (!$FormISA) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormthreeFM', compact('errorMessage'));
    }

       $positionArabiclanguageSA = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicSA= $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeSA = $this->calculatePositionFormIII($userId);
        $positionBookkeepingSA = $this->calculatePositionFormIII($userId);
        $positionBiologySA = $this->calculatePositionFormIII($userId);
        $positionCivicsSA = $this->calculatePositionFormIII($userId);
        $positionChemistrySA = $this->calculatePositionFormII($userId);
        $positionComputerstudySA = $this->calculatePositionFormIII($userId);
        $positionCreativeartsSA = $this->calculatePositionFormIII($userId);
        $positionCommerceSA= $this->calculatePositionFormIII($userId);
        $positionEnglishliteratureSA = $this->calculatePositionFormIII($userId);
        $positionFrenchSA = $this->calculatePositionFormIII($userId);
        $positionGeographySA = $this->calculatePositionFormIII($userId);
        $positionHistorySA= $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeSA = $this->calculatePositionFormIII($userId);
        $positionKiswahiliSA = $this->calculatePositionFormIII($userId);
        $positionLifeskillSA= $this->calculatePositionFormIII($userId);
        $positionPhysicsSA = $this->calculatePositionFormIII($userId);
        $positionSwimmingSA = $this->calculatePositionFormIII($userId);
        $positionNutritionSA = $this->calculatePositionFormIII($userId);

        $ArabiclanguageSA = $FormISA->Arabiclanguage;
        $BasicmathematicsSA = $FormISA->Basicmathematics;
        $BibleknowledgeSA = $FormISA->Bibleknowledge;
        $BookkeepingSA= $FormISA->Bookkeeping;
        $BiologySA = $FormISA->Biology; 
        $CivicsSA = $FormISA->Civics;
        $ChemistrySA = $FormISA->Chemistry;
        $ComputerstudySA = $FormISA->Computerstudy;
        $CreativeartsSA= $FormISA->Creativearts;
        $CommerceSA = $FormISA->Commerce; 
        $EnglishliteratureSA = $FormISA->Englishliterature;
        $FrenchSA = $FormISA->French;
        $GeographySA = $FormISA->Geography;
        $HistorySA= $FormISA->History;
        $IslamicknowledgeSA = $FormISA->Islamicknowledge; 
        $KiswahiliSA = $FormISA->Kiswahili;
        $LifeskillSA = $FormISA->Lifeskill;
        $PhysicsSA = $FormISA->Physics;
        $SwimmingSA = $FormISA->Swimming;
        $NutritionSA = $FormISA->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSA + $BasicmathematicsSA +$BibleknowledgeSA +$BookkeepingSA+$BiologySA + 
        $CivicsSA +$ChemistrySA +$ComputerstudySA+$CreativeartsSA+$CommerceSA+$EnglishliteratureSA+$FrenchSA+$GeographySA+$HistorySA+
        $IslamicknowledgeSA+$KiswahiliSA+$LifeskillSA+$PhysicsSA+$SwimmingSA +$NutritionSA;

        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesSA = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSA),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSA),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSA),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSA),
            'Biology' => $this->SecondarycalculateGrade($BiologySA),
            'Civics' => $this->SecondarycalculateGrade($CivicsSA),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySA),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySA),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSA),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSA),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSA),
            'French' => $this->SecondarycalculateGrade($FrenchSA),
            'Geography' => $this->SecondarycalculateGrade($GeographySA),
            'History' => $this->SecondarycalculateGrade($HistorySA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSA),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSA),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSA),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSA)
        ];
        
        // Pass all data to the view as a single array
        return view('FormthreeFM', [
            'data' => $data,
            'FormISA' => $FormISA,
            'grades' => $grades,           
    'FormIgradesSA' => $FormIgradesSA,

    'positionArabiclanguageFM' => $positionArabiclanguageFM,
    'positionBasicmathematicFM' => $positionBasicmathematicFM, 
    'positionBibleknowledgeFM' => $positionBibleknowledgeFM, 
    'positionBookkeepingFM' =>$positionBookkeepingFM,
    'positionBiologyFM' => $positionBiologyFM,
    'positionCivicsFM' => $positionCivicsFM,
    'positionChemistryFM' => $positionChemistryFM,
    'positionComputerstudyFM' => $positionComputerstudyFM, 
    'positionCreativeartFM' => $positionCreativeartFM,
    'positionCommerceFM' => $positionCommerceFM,
    'positionEnglishliteratureFM' => $positionEnglishliteratureFM, 
    'positionFrenchFM' => $positionFrenchFM, 
    'positionGeographyFM' => $positionGeographyFM, 
    'positionHistoryFM' => $positionHistoryFM, 
    'positionIslamicknowledgeFM' => $positionIslamicknowledgeFM,
    'positionKiswahiliFM' => $positionKiswahiliFM, 
    'positionLifeskillFM' => $positionLifeskillFM,
    'positionPhysicsFM' => $positionPhysicsFM,
    'positionSwimmingFM' =>$positionSwimmingFM, 
    'positionNutritionFM' => $positionNutritionFM,
    '$AverageFM'  => $AverageFM,

    'positionArabiclanguageSA' => $positionArabiclanguageSA,
    'positionBasicmathematicSA' => $positionBasicmathematicSA, 
    'positionBibleknowledgeSA' => $positionBibleknowledgeSA, 
    'positionBookkeepingSA' =>$positionBookkeepingSA,
    'positionBiologySA' => $positionBiologySA,
    'positionCivicsSA' => $positionCivicsSA,
    'positionChemistrySA' => $positionChemistrySA,
    'positionComputerstudySA' => $positionComputerstudySA, 
    'positionCreativeartsSA' => $positionCreativeartsSA,
    'positionCommerceSA' => $positionCommerceSA,
    'positionEnglishliteratureSA' => $positionEnglishliteratureSA, 
    'positionFrenchSA' => $positionFrenchSA, 
    'positionGeographySA' => $positionGeographySA, 
    'positionHistorySA' => $positionHistorySA, 
    'positionIslamicknowledgeSA' => $positionIslamicknowledgeSA,
    'positionKiswahiliSA' => $positionKiswahiliSA, 
    'positionLifeskillSA' => $positionLifeskillSA,
    'positionPhysicsSA' => $positionPhysicsSA,
    'positionSwimmingSA' =>$positionSwimmingSA, 
    'positionNutritionSA' => $positionNutritionSA,
    'AverageSA' => $AverageSA,

 ],compact('AverageFM','AverageSA'));
      
    }


    public function FormThreeSM()
    {
        $userId = Auth::id();
        $data = formiii_second_midterm::where('id', $userId)->first(); 

         if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormthreeSM', compact('errorMessage'));
        }

       $positionArabiclanguageSM = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicSM = $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeSM = $this->calculatePositionFormIII($userId);
        $positionBookkeepingSM = $this->calculatePositionFormIII($userId);
        $positionBiologySM = $this->calculatePositionFormIII($userId);
        $positionCivicsSM = $this->calculatePositionFormIII($userId);
        $positionChemistrySM = $this->calculatePositionFormIII($userId);
        $positionComputerstudySM = $this->calculatePositionFormIII($userId);
        $positionCreativeartSM = $this->calculatePositionFormIII($userId);
        $positionCommerceSM = $this->calculatePositionFormIII($userId);                        
        $positionEnglishliteratureSM = $this->calculatePositionFormIII($userId);
        $positionFrenchSM = $this->calculatePositionFormIII($userId);
        $positionGeographySM = $this->calculatePositionFormIII($userId);
        $positionHistorySM = $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeSM = $this->calculatePositionFormIII($userId);
        $positionKiswahiliSM = $this->calculatePositionFormIII($userId);
        $positionLifeskillSM = $this->calculatePositionFormIII($userId);
        $positionPhysicsSM = $this->calculatePositionFormIII($userId);
        $positionSwimmingSM = $this->calculatePositionFormIII($userId);
        $positionNutritionSM = $this->calculatePositionFormIII($userId);    
        
        $ArabiclanguageSM = $data->Arabiclanguage;
        $BasicmathematicsSM = $data->Basicmathematics;
        $BibleknowledgeSM = $data->Bibleknowledge;
        $BookkeepingSM= $data->Bookkeeping;
        $BiologySM = $data->Biology; 
        $CivicsSM = $data->Civics;
        $ChemistrySM = $data->Chemistry;
        $ComputerstudySM = $data->Computerstudy;
        $CreativeartsSM= $data->Creativearts;
        $CommerceSM = $data->Commerce; 
        $EnglishliteratureSM = $data->Englishliterature;
        $FrenchSM = $data->French;
        $GeographySM = $data->Geography;
        $HistorySM= $data->History;
        $IslamicknowledgeSM = $data->Islamicknowledge; 
        $KiswahiliSM = $data->Kiswahili;
        $LifeskillSM = $data->Lifeskill;
        $PhysicsSM = $data->Physics;
        $SwimmingSM = $data->Swimming;
        $NutritionSM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSM + $BasicmathematicsSM +$BibleknowledgeSM +$BookkeepingSM+$BiologySM + 
        $CivicsSM +$ChemistrySM+$ComputerstudySM+$CreativeartsSM+$CommerceSM+$EnglishliteratureSM+$FrenchSM+$GeographySM+$HistorySM+
        $IslamicknowledgeSM+$KiswahiliSM+$LifeskillSM+$PhysicsSM+$SwimmingSM +$NutritionSM;

        $AverageSM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSM),
            'Biology' => $this->SecondarycalculateGrade($BiologySM),
            'Civics' => $this->SecondarycalculateGrade($CivicsSM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSM),
            'French' => $this->SecondarycalculateGrade($FrenchSM),
            'Geography' => $this->SecondarycalculateGrade($GeographySM),
            'History' => $this->SecondarycalculateGrade($HistorySM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSM)
        ];
    
       $FormIAL = formiii_annual::where('id', $userId)->first();

       if (!$FormIAL) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormthreeSM', compact('errorMessage'));
      }

       $positionArabiclanguageAL = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicAL= $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeAL = $this->calculatePositionFormIII($userId);
        $positionBookkeepingAL = $this->calculatePositionFormIII($userId);
        $positionBiologyAL = $this->calculatePositionFormIII($userId);
        $positionCivicsAL = $this->calculatePositionFormIII($userId);
        $positionChemistryAL = $this->calculatePositionFormIII($userId);
        $positionComputerstudyAL = $this->calculatePositionFormIII($userId);
        $positionCreativeartsAL = $this->calculatePositionFormIII($userId);
        $positionCommerceAL= $this->calculatePositionFormIII($userId);
        $positionEnglishliteratureAL = $this->calculatePositionFormIII($userId);
        $positionFrenchAL = $this->calculatePositionFormIII($userId);
        $positionGeographyAL = $this->calculatePositionFormIII($userId);
        $positionHistoryAL= $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeAL = $this->calculatePositionFormIII($userId);
        $positionKiswahiliAL = $this->calculatePositionFormIII($userId);
        $positionLifeskillAL= $this->calculatePositionFormIII($userId);
        $positionPhysicsAL = $this->calculatePositionFormIII($userId);
        $positionSwimmingAL = $this->calculatePositionFormIII($userId);
        $positionNutritionAL = $this->calculatePositionFormIII($userId);

        $ArabiclanguageAL = $FormIAL->Arabiclanguage;
        $BasicmathematicsAL = $FormIAL->Basicmathematics;
        $BibleknowledgeAL = $FormIAL->Bibleknowledge;
        $BookkeepingAL= $FormIAL->Bookkeeping;
        $BiologyAL = $FormIAL->Biology; 
        $CivicsAL = $FormIAL->Civics;
        $ChemistryAL= $FormIAL->Chemistry;
        $ComputerstudyAL = $FormIAL->Computerstudy;
        $CreativeartsAL= $FormIAL->Creativearts;
        $CommerceAL = $FormIAL->Commerce; 
        $EnglishliteratureAL = $FormIAL->English;
        $FrenchAL = $FormIAL->French;
        $GeographyAL = $FormIAL->Geography;
        $HistoryAL= $FormIAL->History;
        $IslamicknowledgeAL = $FormIAL->Islamicknowledge; 
        $KiswahiliAL = $FormIAL->Kiswahili;
        $LifeskillAL = $FormIAL->Lifeskill;
        $PhysicsAL = $FormIAL->Physics;
        $SwimmingAL = $FormIAL->Swimming;
        $NutritionAL= $FormIAL->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageAL + $BasicmathematicsAL +$BibleknowledgeAL +$BookkeepingAL+$BiologyAL + 
        $CivicsAL +$ChemistryAL +$ComputerstudyAL +$CreativeartsAL +$CommerceAL + $EnglishliteratureAL +$FrenchAL +$GeographyAL +$HistoryAL +
        $IslamicknowledgeAL +$KiswahiliAL +$LifeskillAL +$PhysicsAL +$SwimmingAL +$NutritionAL;

        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesAL = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageAL),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsAL),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeAL),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingAL),
            'Biology' => $this->SecondarycalculateGrade($BiologyAL),
            'Civics' => $this->SecondarycalculateGrade($CivicsAL),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryAL),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyAL),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsAL),
            'Commerce' => $this->SecondarycalculateGrade($CommerceAL),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureAL),
            'French' => $this->SecondarycalculateGrade($FrenchAL),
            'Geography' => $this->SecondarycalculateGrade($GeographyAL),
            'History' => $this->SecondarycalculateGrade($HistoryAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliAL),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillAL),
            'Physics' => $this->SecondarycalculateGrade($PhysicsAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingAL),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionAL)
        ];
        
        // Pass all data to the view as a single array
        return view('FormthreeSM', [
            'data' => $data,
            'grades' => $grades,
            'FormIAL' => $FormIAL,                     
    'FormIgradesAL' => $FormIgradesAL,
    'positionArabiclanguageSM' => $positionArabiclanguageSM,
    'positionBasicmathematicSM' => $positionBasicmathematicSM, 
    'positionBibleknowledgeSM' => $positionBibleknowledgeSM, 
    'positionBookkeepingSM' =>$positionBookkeepingSM,
    'positionBiologySM' => $positionBiologySM,
    'positionCivicsSM' => $positionCivicsSM,
    'positionChemistrySM' => $positionChemistrySM,
    'positionComputerstudySM' => $positionComputerstudySM, 
    'positionCreativeartSM' => $positionCreativeartSM,
    'positionCommerceSM' => $positionCommerceSM,
    'positionEnglishliteratureSM' => $positionEnglishliteratureSM, 
    'positionFrenchSM' => $positionFrenchSM, 
    'positionGeographySM' => $positionGeographySM, 
    'positionHistorySM' => $positionHistorySM, 
    'positionIslamicknowledgeSM' => $positionIslamicknowledgeSM,
    'positionKiswahiliSM' => $positionKiswahiliSM, 
    'positionLifeskillSM' => $positionLifeskillSM,
    'positionPhysicsSM' => $positionPhysicsSM,
    'positionSwimmingSM' =>$positionSwimmingSM, 
    'positionNutritionSM' => $positionNutritionSM,
    '$AverageSM'  => $AverageSM,

    'positionArabiclanguageAL' => $positionArabiclanguageAL,
    'positionBasicmathematicAL' => $positionBasicmathematicAL, 
    'positionBibleknowledgeAL' => $positionBibleknowledgeAL, 
    'positionBookkeepingAL' =>$positionBookkeepingAL,
    'positionBiologyAL' => $positionBiologyAL,
    'positionCivicsAL' => $positionCivicsAL,
    'positionChemistryAL' => $positionChemistryAL,
    'positionComputerstudyAL' => $positionComputerstudyAL, 
    'positionCreativeartsAL' => $positionCreativeartsAL,
    'positionCommerceAL' => $positionCommerceAL,
    'positionEnglishliteratureAL' => $positionEnglishliteratureAL, 
    'positionFrenchAL' => $positionFrenchAL, 
    'positionGeographyAL' => $positionGeographyAL, 
    'positionHistoryAL' => $positionHistoryAL, 
    'positionIslamicknowledgeAL' => $positionIslamicknowledgeAL,
    'positionKiswahiliAL' => $positionKiswahiliAL, 
    'positionLifeskillAL' => $positionLifeskillAL,
    'positionPhysicsAL' => $positionPhysicsAL,
    'positionSwimmingAL' =>$positionSwimmingAL, 
    'positionNutritionAL' => $positionNutritionAL,
    'AverageAL' => $AverageAL,

 ],compact('AverageSM','AverageAL'));
      
    }


    public function calculatePositionFormIV ($id) {
        // Fetch all scores from the database
        $ArabiclanguageFM = formiv_first_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresFM = formiv_first_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresFM = formiv_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresFM = formiv_first_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresFM = formiv_first_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresFM = formiv_first_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresFM =formiv_first_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresFM = formiv_first_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresFM = formiv_first_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresFM = formiv_first_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresFM = formiv_first_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresFM = formiv_first_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresFM = formiv_first_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresFM = formiv_first_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresFM =formiv_first_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresFM = formiv_first_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresFM = formiv_first_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresFM = formiv_first_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresFM =formiv_first_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresFM = formiv_first_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresFM = formiv_first_midterm::pluck('Nutrition', 'id')->toArray();

        $ArabiclanguageallScoresSA = formiv_semi_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSA = formiv_semi_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSA = formiv_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSA= formiv_semi_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSA = formiv_semi_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresSA = formiv_semi_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSA =formiv_semi_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSA = formiv_semi_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSA = formiv_semi_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSA = formiv_semi_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSA = formiv_semi_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSA = formiv_semi_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSA = formiv_semi_annual::pluck('French', 'id')->toArray();
        $GeographyScoresSA =formiv_semi_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSA =formiv_semi_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSA= formiv_semi_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSA = formiv_semi_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSA = formiv_semi_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSA =formiv_semi_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSA = formiv_semi_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSA = formiv_semi_annual::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresSM = formiv_second_midterm::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresSM = formiv_second_midterm::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresSM = formiv_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresSM = formiv_second_midterm::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresSM = formiv_second_midterm::pluck('Biology', 'id')->toArray();
        $CivicsScoresSM = formiv_second_midterm::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresSM =formiv_second_midterm::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresSM = formiv_second_midterm::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresSM = formiv_second_midterm::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresSM = formiv_second_midterm::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresSM= formiv_second_midterm::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresSM = formiv_second_midterm::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresSM = formiv_second_midterm::pluck('French', 'id')->toArray();
        $GeographyScoresSM =formiv_second_midterm::pluck('Geography', 'id')->toArray();
        $HistoryallScoresSM =formiv_second_midterm::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresSM = formiv_second_midterm::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresSM = formiv_second_midterm::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresSM = formiv_second_midterm::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresSM=formiv_second_midterm::pluck('Physics', 'id')->toArray();
        $SwimmingScoresSM = formiv_second_midterm::pluck('Swimming', 'id')->toArray();
        $NutritionScoresSM = formiv_second_midterm::pluck('Nutrition', 'id')->toArray();


        $ArabiclanguageallScoresAL = formiv_annual::pluck('Arabiclanguage', 'id')->toArray();
        $BasicmathematicsallScoresAL = formiv_annual::pluck('Basicmathematics', 'id')->toArray();
        $BibleknowledgeallScoresAL = formiv_annual::pluck('Bibleknowledge', 'id')->toArray();
        $BookkeepingallScoresAL = formiv_annual::pluck('Bookkeeping', 'id')->toArray();
        $BiologyallScoresAL = formiv_annual::pluck('Biology', 'id')->toArray();
        $CivicsScoresAL =formiv_annual::pluck('Civics', 'id')->toArray();
        $ChemistryallScoresAL =formiv_annual::pluck('Chemistry', 'id')->toArray();
        $ComputerstudyScoresAL= formiv_annual::pluck('Computerstudy', 'id')->toArray();
        $CreativeartsallScoresAL = formiv_annual::pluck('Creativearts', 'id')->toArray();
        $CommerceallScoresAL = formiv_annual::pluck('Commerce', 'id')->toArray();
        $EnglishallScoresAL = formiv_annual::pluck('Bibleknowledge', 'id')->toArray();
        $EnglishliteratureallScoresAL = formiv_annual::pluck('Englishliterature', 'id')->toArray();
        $FrenchallScoresAL = formiv_annual::pluck('French', 'id')->toArray();
        $GeographyScoresAL = formiv_annual::pluck('Geography', 'id')->toArray();
        $HistoryallScoresAL =formiv_annual::pluck('History', 'id')->toArray();
        $IslamicknowledgeScoresAL = formiv_annual::pluck('Islamicknowledge', 'id')->toArray();
        $KiswahiliallScoresAL = formiv_annual::pluck('Kiswahili', 'id')->toArray();
        $LifeskillScoresAL = formiv_annual::pluck('Lifeskill', 'id')->toArray();
        $PhysicsallScoresAL =formiv_annual::pluck('Physics', 'id')->toArray();
        $SwimmingScoresAL = formiv_annual::pluck('Swimming', 'id')->toArray();
        $NutritionScoresAL = formiv_annual::pluck('Nutrition', 'id')->toArray();

        // Sort the scores in descending order
        arsort($ArabiclanguageFM );
        arsort($BasicmathematicsallScoresFM);
        arsort($BibleknowledgeallScoresFM);
        arsort($BookkeepingallScoresFM);
        arsort($BiologyallScoresFM);
        arsort($CivicsScoresFM);
        arsort($ChemistryallScoresFM);
        arsort($ComputerstudyScoresFM);
        arsort($CreativeartsallScoresFM);
        arsort($CommerceallScoresFM);
        arsort($EnglishallScoresFM);
        arsort($FrenchallScoresFM);
        arsort($GeographyScoresFM);
        arsort($HistoryallScoresFM);
        arsort($IslamicknowledgeScoresFM);
        arsort($KiswahiliallScoresFM);
        arsort($LifeskillScoresFM);
        arsort($PhysicsallScoresFM);
        arsort($SwimmingScoresFM);
        arsort($NutritionScoresFM);

        arsort($ArabiclanguageallScoresSM );
        arsort($BasicmathematicsallScoresSM);
        arsort($BibleknowledgeallScoresSM);
        arsort($BookkeepingallScoresSM);
        arsort($BiologyallScoresSM);
        arsort($CivicsScoresSM);
        arsort($ChemistryallScoresSM);
        arsort($ComputerstudyScoresSM);
        arsort($CreativeartsallScoresSM);
        arsort($CommerceallScoresSM);
        arsort($EnglishallScoresSM);
        arsort($FrenchallScoresSM);
        arsort($GeographyScoresSM);
        arsort($HistoryallScoresSM);
        arsort($IslamicknowledgeScoresSM);
        arsort($KiswahiliallScoresSM);
        arsort($LifeskillScoresSM);
        arsort($PhysicsallScoresSM);
        arsort($SwimmingScoresSM);
        arsort($NutritionScoresSM);

        arsort($ArabiclanguageallScoresSA );
        arsort($BasicmathematicsallScoresSA);
        arsort($BibleknowledgeallScoresSA);
        arsort($BookkeepingallScoresSA);
        arsort($BiologyallScoresSA);
        arsort($CivicsScoresSA);
        arsort($ChemistryallScoresSA);
        arsort($ComputerstudyScoresSA);
        arsort($CreativeartsallScoresSA);
        arsort($CommerceallScoresSA);
        arsort($EnglishallScoresSA);
        arsort($FrenchallScoresSA);
        arsort($GeographyScoresSA);
        arsort($HistoryallScoresSA);
        arsort($IslamicknowledgeScoresSA);
        arsort($KiswahiliallScoresSA);
        arsort($LifeskillScoresSA);
        arsort($PhysicsallScoresSA);
        arsort($SwimmingScoresSA);
        arsort($NutritionScoresSA);

        arsort($ArabiclanguageallScoresAL );
        arsort($BasicmathematicsallScoresAL);
        arsort($BibleknowledgeallScoresAL);
        arsort($BookkeepingallScoresAL);
        arsort($BiologyallScoresAL);
        arsort($CivicsScoresAL);
        arsort($ChemistryallScoresAL);
        arsort($ComputerstudyScoresAL);
        arsort($CreativeartsallScoresAL);
        arsort($CommerceallScoresAL);
        arsort($EnglishallScoresAL);
        arsort($FrenchallScoresAL);
        arsort($GeographyScoresAL);
        arsort($HistoryallScoresAL);
        arsort($IslamicknowledgeScoresAL);
        arsort($KiswahiliallScoresAL);
        arsort($LifeskillScoresAL);
        arsort($PhysicsallScoresAL);
        arsort($SwimmingScoresAL);
        arsort($NutritionScoresAL);



    
        // Find the position of the user
        $positionArabiclanguageFM = array_search($id, array_keys($ArabiclanguageFM )) + 1;
        $positionBasicmathematicFM = array_search($id, array_keys($BasicmathematicsallScoresFM)) + 1;
        $positionBibleknowledgeFM = array_search($id, array_keys($BibleknowledgeallScoresFM)) + 1;
        $positionBookkeepingFM  = array_search($id, array_keys($BookkeepingallScoresFM)) + 1;
        $positionBiologyFM = array_search($id, array_keys($BiologyallScoresFM)) + 1;
        $positionCivicsFM = array_search($id, array_keys($CivicsScoresFM)) + 1;
        $positionChemistryFM = array_search($id, array_keys($ChemistryallScoresFM)) + 1;
        $positionComputerstudyFM = array_search($id, array_keys($ComputerstudyScoresFM)) + 1;
        $positionCreativeartFM = array_search($id, array_keys($CreativeartsallScoresFM )) + 1;
        $positionCommerceFM = array_search($id, array_keys($CommerceallScoresFM)) + 1;
        $positionEnglishliteratureFM = array_search($id, array_keys($EnglishallScoresFM)) + 1;
        $positionFrenchFM = array_search($id, array_keys($FrenchallScoresFM)) + 1;
        $positionGeographyFM = array_search($id, array_keys($GeographyScoresFM)) + 1;
        $positionHistoryFM = array_search($id, array_keys($HistoryallScoresFM)) + 1;
        $positionIslamicknowledgeFM = array_search($id, array_keys($IslamicknowledgeScoresFM)) + 1;
        $positionKiswahiliFM = array_search($id, array_keys($KiswahiliallScoresFM)) + 1;
        $positionLifeskillFM = array_search($id, array_keys($LifeskillScoresFM)) + 1;
        $positionPhysicsFM = array_search($id, array_keys($PhysicsallScoresFM)) + 1;
        $positionSwimmingFM = array_search($id, array_keys($SwimmingScoresFM)) + 1;
        $positionNutritionFM = array_search($id, array_keys($NutritionScoresFM)) + 1;

       

        $positionArabiclanguageSA = array_search($id, array_keys($ArabiclanguageallScoresSA )) + 1;
        $positionBasicmathematicSA = array_search($id, array_keys($BasicmathematicsallScoresSA)) + 1;
        $positionBibleknowledgeSA = array_search($id, array_keys($BibleknowledgeallScoresSA)) + 1;
        $positionBookkeepingSA  = array_search($id, array_keys($BookkeepingallScoresSA)) + 1;
        $positionBiologySA = array_search($id, array_keys($BiologyallScoresSA)) + 1;
        $positionCivicsSA = array_search($id, array_keys($CivicsScoresSA)) + 1;
        $positionChemistrySA = array_search($id, array_keys($ChemistryallScoresSA)) + 1;
        $positionComputerstudySA = array_search($id, array_keys($ComputerstudyScoresSA)) + 1;
        $positionCreativeartsSA = array_search($id, array_keys($CreativeartsallScoresSA)) + 1;
        $positionCommerceSA = array_search($id, array_keys($CommerceallScoresSA)) + 1;
        $positionEnglishliteratureSA = array_search($id, array_keys($EnglishallScoresSA)) + 1;
        $positionFrenchSA = array_search($id, array_keys($FrenchallScoresSA)) + 1;
        $positionGeographySA = array_search($id, array_keys($GeographyScoresSA)) + 1;
        $positionHistorySA = array_search($id, array_keys($HistoryallScoresSA)) + 1;
        $positionIslamicknowledgeSA = array_search($id, array_keys($IslamicknowledgeScoresSA)) + 1;
        $positionKiswahiliSA = array_search($id, array_keys($KiswahiliallScoresSA)) + 1;
        $positionLifeskillSA = array_search($id, array_keys($LifeskillScoresSA)) + 1;
        $positionPhysicsSA = array_search($id, array_keys($PhysicsallScoresSA)) + 1;
        $positionSwimmingSA = array_search($id, array_keys($SwimmingScoresSA)) + 1;
        $positionNutritionSA = array_search($id, array_keys($NutritionScoresSA)) + 1;



        $positionArabiclanguageSM = array_search($id, array_keys($ArabiclanguageallScoresSM )) + 1;
        $positionBasicmathematicSM = array_search($id, array_keys($BasicmathematicsallScoresSM)) + 1;
        $positionBibleknowledgeSM = array_search($id, array_keys($BibleknowledgeallScoresSM)) + 1;
        $positionBookkeepingSM  = array_search($id, array_keys($BookkeepingallScoresSM)) + 1;
        $positionBiologySM = array_search($id, array_keys($BiologyallScoresSM)) + 1;
        $positionCivicsSM = array_search($id, array_keys($CivicsScoresSM)) + 1;
        $positionChemistrySM = array_search($id, array_keys($ChemistryallScoresSM)) + 1;
        $positionComputerstudySM = array_search($id, array_keys($ComputerstudyScoresSM)) + 1;
        $positionCreativeartSM = array_search($id, array_keys($CreativeartsallScoresSM)) + 1;
        $positionCommerceSM = array_search($id, array_keys($CommerceallScoresSM)) + 1;
        $positionEnglishliteratureSM = array_search($id, array_keys($EnglishallScoresSM)) + 1;
        $positionFrenchSM = array_search($id, array_keys($FrenchallScoresSM)) + 1;
        $positionGeographySM = array_search($id, array_keys($GeographyScoresSM)) + 1;
        $positionHistorySM = array_search($id, array_keys($HistoryallScoresSM)) + 1;
        $positionIslamicknowledgeSM = array_search($id, array_keys($IslamicknowledgeScoresSM)) + 1;
        $positionKiswahiliSM = array_search($id, array_keys($KiswahiliallScoresSM)) + 1;
        $positionLifeskillSM = array_search($id, array_keys($LifeskillScoresSM)) + 1;
        $positionPhysicsSM = array_search($id, array_keys($PhysicsallScoresSM)) + 1;
        $positionSwimmingSM= array_search($id, array_keys($SwimmingScoresSM)) + 1;
        $positionNutritionSM = array_search($id, array_keys($NutritionScoresSM)) + 1;

 

   
        $positionArabiclanguageAL = array_search($id, array_keys($ArabiclanguageallScoresAL )) + 1;
        $positionBasicmathematicAL = array_search($id, array_keys($BasicmathematicsallScoresAL)) + 1;
        $positionBibleknowledgeAL = array_search($id, array_keys($BibleknowledgeallScoresAL)) + 1;
        $positionBookkeepingAL  = array_search($id, array_keys($BookkeepingallScoresAL)) + 1;
        $positionBiologyAL = array_search($id, array_keys($BiologyallScoresAL)) + 1;
        $positionCivicsAL = array_search($id, array_keys($CivicsScoresAL)) + 1;
        $positionChemistryAL = array_search($id, array_keys($ChemistryallScoresAL)) + 1;
        $positionComputerstudyAL = array_search($id, array_keys($ComputerstudyScoresAL)) + 1;
        $positionCreativeartAL = array_search($id, array_keys($CreativeartsallScoresAL)) + 1;
        $positionCommerceAL = array_search($id, array_keys($CommerceallScoresAL)) + 1;
        $positionEnglishliteratureAL = array_search($id, array_keys($EnglishallScoresAL)) + 1;
        $positionFrenchAL = array_search($id, array_keys($FrenchallScoresAL)) + 1;
        $positionGeographyAL= array_search($id, array_keys($GeographyScoresAL)) + 1;
        $positionHistoryAL = array_search($id, array_keys($HistoryallScoresAL)) + 1;
        $positionIslamicknowledgeAL = array_search($id, array_keys($IslamicknowledgeScoresAL)) + 1;
        $positionKiswahiliAL = array_search($id, array_keys($KiswahiliallScoresAL)) + 1;
        $positionLifeskillAL = array_search($id, array_keys($LifeskillScoresAL)) + 1;
        $positionPhysicsAL = array_search($id, array_keys($PhysicsallScoresAL)) + 1;
        $positionSwimmingAL = array_search($id, array_keys($SwimmingScoresAL)) + 1;
        $positionNutritionAL = array_search($id, array_keys($NutritionScoresAL)) + 1;

        return [
            'FirstMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageFM,
                'Basicmathematics' => $positionBasicmathematicFM,
                'Bibleknowledge' => $positionBibleknowledgeFM,
                'Bookkeeping' => $positionBookkeepingFM,
                'Biology' => $positionBiologyFM,
                'Civics' => $positionCivicsFM,
                'Chemistry' => $positionChemistryFM,
                'Computerstudy' => $positionComputerstudyFM,
                'Creativearts' => $positionCreativeartFM,
                'Commerce' => $positionCommerceFM,
                'Englishliterature' => $positionEnglishliteratureFM,
                'French' => $positionFrenchFM,
                'Geography' => $positionGeographyFM,
                'History' => $positionHistoryFM,
                'Islamicknowledge' => $positionIslamicknowledgeFM,
                'Kiswahili' => $positionKiswahiliFM,
                'Lifeskill' => $positionLifeskillFM,
                'Physics' => $positionPhysicsFM,
                'Swimming' => $positionSwimmingFM,
                'Nutrition' => $positionNutritionFM,

            ],
            'SemiAnnual' => [
                'Arabiclanguage' => $positionArabiclanguageSA,
                'Basicmathematics' => $positionBasicmathematicSA,
                'Bibleknowledge' => $positionBibleknowledgeSA,
                'Bookkeeping' => $positionBookkeepingSA,
                'Biology' => $positionBiologySA,
                'Civics' => $positionCivicsSA,
                'Chemistry' => $positionChemistrySA,
                'Computerstudy' => $positionComputerstudySA,
                'Creativearts' => $positionCreativeartsSA,
                'Commerce' => $positionCommerceSA,
                'Englishliterature' => $positionEnglishliteratureSA,
                'French' => $positionFrenchSA,
                'Geography' => $positionGeographySA,
                'History' => $positionHistorySA,
                'Islamicknowledge' => $positionIslamicknowledgeSA,
                'Kiswahili' => $positionKiswahiliSA,
                'Lifeskill' => $positionLifeskillSA,
                'Physics' => $positionPhysicsSA,
                'Swimming' => $positionSwimmingSA,
                'Nutrition' => $positionNutritionSA,
            ],
            'SecondMidterm' => [
                'Arabiclanguage' => $positionArabiclanguageSM,
                'Basicmathematics' => $positionBasicmathematicSM,
                'Bibleknowledge' => $positionBibleknowledgeSM,
                'Bookkeeping' => $positionBookkeepingSM,
                'Biology' => $positionBiologySM,
                'Civics' => $positionCivicsSM,
                'Chemistry' => $positionChemistrySM,
                'Computerstudy' => $positionComputerstudySM,
                'Creativearts' => $positionCreativeartSM,
                'Commerce' => $positionCommerceSM,
                'Englishliterature' => $positionEnglishliteratureSM,
                'French' => $positionFrenchSM,
                'Geography' => $positionGeographySM,
                'History' => $positionHistorySM,
                'Islamicknowledge' => $positionIslamicknowledgeSM,
                'Kiswahili' => $positionKiswahiliSM,
                'Lifeskill' => $positionLifeskillSM,
                'Physics' => $positionPhysicsSM,
                'Swimming' => $positionSwimmingSM,
                'Nutrition' => $positionNutritionSM,
            ],
            'Annual' => [
                'Arabiclanguage' => $positionArabiclanguageAL,
                'Basicmathematics' => $positionBasicmathematicAL,
                'Bibleknowledge' => $positionBibleknowledgeAL,
                'Bookkeeping' => $positionBookkeepingAL,
                'Biology' => $positionBiologyAL,
                'Civics' => $positionCivicsAL,
                'Chemistry' => $positionChemistryAL,
                'Computerstudy' => $positionComputerstudyAL,
                'Creativearts' => $positionCreativeartAL,
                'Commerce' => $positionCommerceAL,
                'Englishliterature' => $positionEnglishliteratureAL,
                'French' => $positionFrenchAL,
                'Geography' => $positionGeographyAL,
                'History' => $positionHistoryAL,
                'Islamicknowledge' => $positionIslamicknowledgeAL,
                'Kiswahili' => $positionKiswahiliAL,
                'Lifeskill' => $positionLifeskillAL,
                'Physics' => $positionPhysicsAL,
                'Swimming' => $positionSwimmingAL,
                'Nutrition' => $positionNutritionAL,
            ],
        ];
        
    }

    public function FormfourFM()
    {
        $userId = Auth::id();
        $data = formiv_first_midterm::where('id', $userId)->first(); 

        if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormfourFM', compact('errorMessage'));
        }


       $positionArabiclanguageFM = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicFM = $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeFM = $this->calculatePositionFormIII($userId);
        $positionBookkeepingFM = $this->calculatePositionFormIII($userId);
        $positionBiologyFM = $this->calculatePositionFormIII($userId);
        $positionCivicsFM = $this->calculatePositionFormIII($userId);
        $positionChemistryFM = $this->calculatePositionFormIII($userId);
        $positionComputerstudyFM = $this->calculatePositionFormIII($userId);
        $positionCreativeartFM = $this->calculatePositionFormIII($userId);
        $positionCommerceFM = $this->calculatePositionFormIII($userId);                        
        $positionEnglishliteratureFM = $this->calculatePositionFormIII($userId);
        $positionFrenchFM = $this->calculatePositionFormIII($userId);
        $positionGeographyFM = $this->calculatePositionFormIII($userId);
        $positionHistoryFM = $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeFM = $this->calculatePositionFormIII($userId);
        $positionKiswahiliFM = $this->calculatePositionFormIII($userId);
        $positionLifeskillFM = $this->calculatePositionFormIII($userId);
        $positionPhysicsFM = $this->calculatePositionFormIII($userId);
        $positionSwimmingFM = $this->calculatePositionFormIII($userId);
        $positionNutritionFM = $this->calculatePositionFormIII($userId);    
        
        $ArabiclanguageFM = $data->Arabiclanguage;
        $BasicmathematicsFM = $data->Basicmathematics;
        $BibleknowledgeFM = $data->Bibleknowledge;
        $BookkeepingFM= $data->Bookkeeping;
        $BiologyFM = $data->Biology; 
        $CivicsFM = $data->Civics;
        $ChemistryFM = $data->Chemistry;
        $ComputerstudyFM = $data->Computerstudy;
        $CreativeartsFM= $data->Creativearts;
        $CommerceFM = $data->Commerce; 
        $EnglishliteratureFM = $data->Englishliterature;
        $FrenchFM = $data->French;
        $GeographyFM = $data->Geography;
        $HistoryFM= $data->History;
        $IslamicknowledgeFM = $data->Islamicknowledge; 
        $KiswahiliFM = $data->Kiswahili;
        $LifeskillFM = $data->Lifeskill;
        $PhysicsFM = $data->Physics;
        $SwimmingFM = $data->Swimming;
        $NutritionFM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageFM + $BasicmathematicsFM +$BibleknowledgeFM +$BookkeepingFM +$BiologyFM + 
        $CivicsFM +$ChemistryFM +$ComputerstudyFM +$CreativeartsFM +$CommerceFM +$EnglishliteratureFM +$FrenchFM+$GeographyFM
        +$HistoryFM+ $IslamicknowledgeFM+$KiswahiliFM+$LifeskillFM+$PhysicsFM+$SwimmingFM +$NutritionFM;

        $AverageFM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageFM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsFM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeFM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingFM),
            'Biology' => $this->SecondarycalculateGrade($BiologyFM),
            'Civics' => $this->SecondarycalculateGrade($CivicsFM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryFM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyFM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsFM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceFM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureFM),
            'French' => $this->SecondarycalculateGrade($FrenchFM),
            'Geography' => $this->SecondarycalculateGrade($GeographyFM),
            'History' => $this->SecondarycalculateGrade($HistoryFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliFM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillFM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsFM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeFM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingFM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionFM)
        ];
    
       $FormISA = formiv_semi_annual::where('id', $userId)->first();

       if (!$FormISA) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormfourFM', compact('errorMessage'));
    }

       $positionArabiclanguageSA = $this->calculatePositionFormIII($userId);
        $positionBasicmathematicSA= $this->calculatePositionFormIII($userId);
        $positionBibleknowledgeSA = $this->calculatePositionFormIII($userId);
        $positionBookkeepingSA = $this->calculatePositionFormIII($userId);
        $positionBiologySA = $this->calculatePositionFormIII($userId);
        $positionCivicsSA = $this->calculatePositionFormIII($userId);
        $positionChemistrySA = $this->calculatePositionFormII($userId);
        $positionComputerstudySA = $this->calculatePositionFormIII($userId);
        $positionCreativeartsSA = $this->calculatePositionFormIII($userId);
        $positionCommerceSA= $this->calculatePositionFormIII($userId);
        $positionEnglishliteratureSA = $this->calculatePositionFormIII($userId);
        $positionFrenchSA = $this->calculatePositionFormIII($userId);
        $positionGeographySA = $this->calculatePositionFormIII($userId);
        $positionHistorySA= $this->calculatePositionFormIII($userId);
        $positionIslamicknowledgeSA = $this->calculatePositionFormIII($userId);
        $positionKiswahiliSA = $this->calculatePositionFormIII($userId);
        $positionLifeskillSA= $this->calculatePositionFormIII($userId);
        $positionPhysicsSA = $this->calculatePositionFormIII($userId);
        $positionSwimmingSA = $this->calculatePositionFormIII($userId);
        $positionNutritionSA = $this->calculatePositionFormIII($userId);

        $ArabiclanguageSA = $FormISA->Arabiclanguage;
        $BasicmathematicsSA = $FormISA->Basicmathematics;
        $BibleknowledgeSA = $FormISA->Bibleknowledge;
        $BookkeepingSA= $FormISA->Bookkeeping;
        $BiologySA = $FormISA->Biology; 
        $CivicsSA = $FormISA->Civics;
        $ChemistrySA = $FormISA->Chemistry;
        $ComputerstudySA = $FormISA->Computerstudy;
        $CreativeartsSA= $FormISA->Creativearts;
        $CommerceSA = $FormISA->Commerce; 
        $EnglishliteratureSA = $FormISA->Englishliterature;
        $FrenchSA = $FormISA->French;
        $GeographySA = $FormISA->Geography;
        $HistorySA= $FormISA->History;
        $IslamicknowledgeSA = $FormISA->Islamicknowledge; 
        $KiswahiliSA = $FormISA->Kiswahili;
        $LifeskillSA = $FormISA->Lifeskill;
        $PhysicsSA = $FormISA->Physics;
        $SwimmingSA = $FormISA->Swimming;
        $NutritionSA = $FormISA->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSA + $BasicmathematicsSA +$BibleknowledgeSA +$BookkeepingSA+$BiologySA + 
        $CivicsSA +$ChemistrySA +$ComputerstudySA+$CreativeartsSA+$CommerceSA+$EnglishliteratureSA+$FrenchSA+$GeographySA+$HistorySA+
        $IslamicknowledgeSA+$KiswahiliSA+$LifeskillSA+$PhysicsSA+$SwimmingSA +$NutritionSA;

        $AverageSA = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesSA = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSA),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSA),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSA),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSA),
            'Biology' => $this->SecondarycalculateGrade($BiologySA),
            'Civics' => $this->SecondarycalculateGrade($CivicsSA),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySA),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySA),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSA),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSA),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSA),
            'French' => $this->SecondarycalculateGrade($FrenchSA),
            'Geography' => $this->SecondarycalculateGrade($GeographySA),
            'History' => $this->SecondarycalculateGrade($HistorySA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSA),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSA),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSA),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSA),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSA),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSA)
        ];
        
        // Pass all data to the view as a single array
        return view('FormfourFM', [
            'data' => $data,
            'FormISA' => $FormISA,
            'grades' => $grades,           
    'FormIgradesSA' => $FormIgradesSA,

    'positionArabiclanguageFM' => $positionArabiclanguageFM,
    'positionBasicmathematicFM' => $positionBasicmathematicFM, 
    'positionBibleknowledgeFM' => $positionBibleknowledgeFM, 
    'positionBookkeepingFM' =>$positionBookkeepingFM,
    'positionBiologyFM' => $positionBiologyFM,
    'positionCivicsFM' => $positionCivicsFM,
    'positionChemistryFM' => $positionChemistryFM,
    'positionComputerstudyFM' => $positionComputerstudyFM, 
    'positionCreativeartFM' => $positionCreativeartFM,
    'positionCommerceFM' => $positionCommerceFM,
    'positionEnglishliteratureFM' => $positionEnglishliteratureFM, 
    'positionFrenchFM' => $positionFrenchFM, 
    'positionGeographyFM' => $positionGeographyFM, 
    'positionHistoryFM' => $positionHistoryFM, 
    'positionIslamicknowledgeFM' => $positionIslamicknowledgeFM,
    'positionKiswahiliFM' => $positionKiswahiliFM, 
    'positionLifeskillFM' => $positionLifeskillFM,
    'positionPhysicsFM' => $positionPhysicsFM,
    'positionSwimmingFM' =>$positionSwimmingFM, 
    'positionNutritionFM' => $positionNutritionFM,
    '$AverageFM'  => $AverageFM,

    'positionArabiclanguageSA' => $positionArabiclanguageSA,
    'positionBasicmathematicSA' => $positionBasicmathematicSA, 
    'positionBibleknowledgeSA' => $positionBibleknowledgeSA, 
    'positionBookkeepingSA' =>$positionBookkeepingSA,
    'positionBiologySA' => $positionBiologySA,
    'positionCivicsSA' => $positionCivicsSA,
    'positionChemistrySA' => $positionChemistrySA,
    'positionComputerstudySA' => $positionComputerstudySA, 
    'positionCreativeartsSA' => $positionCreativeartsSA,
    'positionCommerceSA' => $positionCommerceSA,
    'positionEnglishliteratureSA' => $positionEnglishliteratureSA, 
    'positionFrenchSA' => $positionFrenchSA, 
    'positionGeographySA' => $positionGeographySA, 
    'positionHistorySA' => $positionHistorySA, 
    'positionIslamicknowledgeSA' => $positionIslamicknowledgeSA,
    'positionKiswahiliSA' => $positionKiswahiliSA, 
    'positionLifeskillSA' => $positionLifeskillSA,
    'positionPhysicsSA' => $positionPhysicsSA,
    'positionSwimmingSA' =>$positionSwimmingSA, 
    'positionNutritionSA' => $positionNutritionSA,
    'AverageSA' => $AverageSA,

 ],compact('AverageFM','AverageSA'));
      
    }


    public function FormFourSM()
    {
        $userId = Auth::id();
        $data = formiv_second_midterm::where('id', $userId)->first(); 

         if (!$data) {
            $errorMessage = "No data found for the authenticated user.";
            return view('FormfourSM', compact('errorMessage'));
        }

       $positionArabiclanguageSM = $this->calculatePositionFormIV($userId);
        $positionBasicmathematicSM = $this->calculatePositionFormIV($userId);
        $positionBibleknowledgeSM = $this->calculatePositionFormIV($userId);
        $positionBookkeepingSM = $this->calculatePositionFormIV($userId);
        $positionBiologySM = $this->calculatePositionFormIV($userId);
        $positionCivicsSM = $this->calculatePositionFormIV($userId);
        $positionChemistrySM = $this->calculatePositionFormIV($userId);
        $positionComputerstudySM = $this->calculatePositionFormIV($userId);
        $positionCreativeartSM = $this->calculatePositionFormIV($userId);
        $positionCommerceSM = $this->calculatePositionFormIV($userId);                        
        $positionEnglishliteratureSM = $this->calculatePositionFormIV($userId);
        $positionFrenchSM = $this->calculatePositionFormIV($userId);
        $positionGeographySM = $this->calculatePositionFormIV($userId);
        $positionHistorySM = $this->calculatePositionFormIV($userId);
        $positionIslamicknowledgeSM = $this->calculatePositionFormIV($userId);
        $positionKiswahiliSM = $this->calculatePositionFormIV($userId);
        $positionLifeskillSM = $this->calculatePositionFormIV($userId);
        $positionPhysicsSM = $this->calculatePositionFormIV($userId);
        $positionSwimmingSM = $this->calculatePositionFormIV($userId);
        $positionNutritionSM = $this->calculatePositionFormIV($userId);    
        
        $ArabiclanguageSM = $data->Arabiclanguage;
        $BasicmathematicsSM = $data->Basicmathematics;
        $BibleknowledgeSM = $data->Bibleknowledge;
        $BookkeepingSM= $data->Bookkeeping;
        $BiologySM = $data->Biology; 
        $CivicsSM = $data->Civics;
        $ChemistrySM = $data->Chemistry;
        $ComputerstudySM = $data->Computerstudy;
        $CreativeartsSM= $data->Creativearts;
        $CommerceSM = $data->Commerce; 
        $EnglishliteratureSM = $data->Englishliterature;
        $FrenchSM = $data->French;
        $GeographySM = $data->Geography;
        $HistorySM= $data->History;
        $IslamicknowledgeSM = $data->Islamicknowledge; 
        $KiswahiliSM = $data->Kiswahili;
        $LifeskillSM = $data->Lifeskill;
        $PhysicsSM = $data->Physics;
        $SwimmingSM = $data->Swimming;
        $NutritionSM = $data->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageSM + $BasicmathematicsSM +$BibleknowledgeSM +$BookkeepingSM+$BiologySM + 
        $CivicsSM +$ChemistrySM+$ComputerstudySM+$CreativeartsSM+$CommerceSM+$EnglishliteratureSM+$FrenchSM+$GeographySM+$HistorySM+
        $IslamicknowledgeSM+$KiswahiliSM+$LifeskillSM+$PhysicsSM+$SwimmingSM +$NutritionSM;

        $AverageSM = $TotalSubjectMarks/$TotalSubject;
        

        
    
        // Calculating grades
       $grades = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageSM),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsSM),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeSM),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingSM),
            'Biology' => $this->SecondarycalculateGrade($BiologySM),
            'Civics' => $this->SecondarycalculateGrade($CivicsSM),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistrySM),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudySM),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsSM),
            'Commerce' => $this->SecondarycalculateGrade($CommerceSM),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureSM),
            'French' => $this->SecondarycalculateGrade($FrenchSM),
            'Geography' => $this->SecondarycalculateGrade($GeographySM),
            'History' => $this->SecondarycalculateGrade($HistorySM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliSM),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillSM),
            'Physics' => $this->SecondarycalculateGrade($PhysicsSM),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeSM),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingSM),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionSM)
        ];
    
       $FormIAL = formiv_annual::where('id', $userId)->first();

       if (!$FormIAL) {
        $errorMessage = "No data found for the authenticated user.";
        return view('FormfourSM', compact('errorMessage'));
      }

       $positionArabiclanguageAL = $this->calculatePositionFormIV($userId);
        $positionBasicmathematicAL= $this->calculatePositionFormIV($userId);
        $positionBibleknowledgeAL = $this->calculatePositionFormIV($userId);
        $positionBookkeepingAL = $this->calculatePositionFormIV($userId);
        $positionBiologyAL = $this->calculatePositionFormIV($userId);
        $positionCivicsAL = $this->calculatePositionFormIV($userId);
        $positionChemistryAL = $this->calculatePositionFormIV($userId);
        $positionComputerstudyAL = $this->calculatePositionFormIV($userId);
        $positionCreativeartsAL = $this->calculatePositionFormIV($userId);
        $positionCommerceAL= $this->calculatePositionFormIV($userId);
        $positionEnglishliteratureAL = $this->calculatePositionFormIV($userId);
        $positionFrenchAL = $this->calculatePositionFormIV($userId);
        $positionGeographyAL = $this->calculatePositionFormIV($userId);
        $positionHistoryAL= $this->calculatePositionFormIV($userId);
        $positionIslamicknowledgeAL = $this->calculatePositionFormIV($userId);
        $positionKiswahiliAL = $this->calculatePositionFormIV($userId);
        $positionLifeskillAL= $this->calculatePositionFormIV($userId);
        $positionPhysicsAL = $this->calculatePositionFormIV($userId);
        $positionSwimmingAL = $this->calculatePositionFormIV($userId);
        $positionNutritionAL = $this->calculatePositionFormIV($userId);

        $ArabiclanguageAL = $FormIAL->Arabiclanguage;
        $BasicmathematicsAL = $FormIAL->Basicmathematics;
        $BibleknowledgeAL = $FormIAL->Bibleknowledge;
        $BookkeepingAL= $FormIAL->Bookkeeping;
        $BiologyAL = $FormIAL->Biology; 
        $CivicsAL = $FormIAL->Civics;
        $ChemistryAL= $FormIAL->Chemistry;
        $ComputerstudyAL = $FormIAL->Computerstudy;
        $CreativeartsAL= $FormIAL->Creativearts;
        $CommerceAL = $FormIAL->Commerce; 
        $EnglishliteratureAL = $FormIAL->English;
        $FrenchAL = $FormIAL->French;
        $GeographyAL = $FormIAL->Geography;
        $HistoryAL= $FormIAL->History;
        $IslamicknowledgeAL = $FormIAL->Islamicknowledge; 
        $KiswahiliAL = $FormIAL->Kiswahili;
        $LifeskillAL = $FormIAL->Lifeskill;
        $PhysicsAL = $FormIAL->Physics;
        $SwimmingAL = $FormIAL->Swimming;
        $NutritionAL= $FormIAL->Nutrition;

        $TotalSubject = 8;
        $TotalSubjectMarks = $ArabiclanguageAL + $BasicmathematicsAL +$BibleknowledgeAL +$BookkeepingAL+$BiologyAL + 
        $CivicsAL +$ChemistryAL +$ComputerstudyAL +$CreativeartsAL +$CommerceAL + $EnglishliteratureAL +$FrenchAL +$GeographyAL +$HistoryAL +
        $IslamicknowledgeAL +$KiswahiliAL +$LifeskillAL +$PhysicsAL +$SwimmingAL +$NutritionAL;

        $AverageAL = $TotalSubjectMarks/$TotalSubject;
    
        // Calculating grades
        $FormIgradesAL = [
            'Arabiclanguage' => $this->SecondarycalculateGrade($ArabiclanguageAL),
            'Basicmathematics' => $this->SecondarycalculateGrade($BasicmathematicsAL),
            'Bibleknowledge' => $this->SecondarycalculateGrade($BibleknowledgeAL),
            'Bookkeeping' => $this->SecondarycalculateGrade($BookkeepingAL),
            'Biology' => $this->SecondarycalculateGrade($BiologyAL),
            'Civics' => $this->SecondarycalculateGrade($CivicsAL),
            'Chemistry' => $this->SecondarycalculateGrade($ChemistryAL),
            'Computerstudy' => $this->SecondarycalculateGrade($ComputerstudyAL),
            'Creativearts' => $this->SecondarycalculateGrade($CreativeartsAL),
            'Commerce' => $this->SecondarycalculateGrade($CommerceAL),
            'Englishliterature' => $this->SecondarycalculateGrade($EnglishliteratureAL),
            'French' => $this->SecondarycalculateGrade($FrenchAL),
            'Geography' => $this->SecondarycalculateGrade($GeographyAL),
            'History' => $this->SecondarycalculateGrade($HistoryAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Kiswahili' => $this->SecondarycalculateGrade($KiswahiliAL),
            'Lifeskill' => $this->SecondarycalculateGrade($LifeskillAL),
            'Physics' => $this->SecondarycalculateGrade($PhysicsAL),
            'Islamicknowledge' => $this->SecondarycalculateGrade($IslamicknowledgeAL),
            'Swimming' => $this->SecondarycalculateGrade($SwimmingAL),
            'Nutrition' => $this->SecondarycalculateGrade($NutritionAL)
        ];
        
        // Pass all data to the view as a single array
        return view('FormfourSM', [
            'data' => $data,
            'grades' => $grades,
            'FormIAL' => $FormIAL,                     
    'FormIgradesAL' => $FormIgradesAL,
    'positionArabiclanguageSM' => $positionArabiclanguageSM,
    'positionBasicmathematicSM' => $positionBasicmathematicSM, 
    'positionBibleknowledgeSM' => $positionBibleknowledgeSM, 
    'positionBookkeepingSM' =>$positionBookkeepingSM,
    'positionBiologySM' => $positionBiologySM,
    'positionCivicsSM' => $positionCivicsSM,
    'positionChemistrySM' => $positionChemistrySM,
    'positionComputerstudySM' => $positionComputerstudySM, 
    'positionCreativeartSM' => $positionCreativeartSM,
    'positionCommerceSM' => $positionCommerceSM,
    'positionEnglishliteratureSM' => $positionEnglishliteratureSM, 
    'positionFrenchSM' => $positionFrenchSM, 
    'positionGeographySM' => $positionGeographySM, 
    'positionHistorySM' => $positionHistorySM, 
    'positionIslamicknowledgeSM' => $positionIslamicknowledgeSM,
    'positionKiswahiliSM' => $positionKiswahiliSM, 
    'positionLifeskillSM' => $positionLifeskillSM,
    'positionPhysicsSM' => $positionPhysicsSM,
    'positionSwimmingSM' =>$positionSwimmingSM, 
    'positionNutritionSM' => $positionNutritionSM,
    '$AverageSM'  => $AverageSM,

    'positionArabiclanguageAL' => $positionArabiclanguageAL,
    'positionBasicmathematicAL' => $positionBasicmathematicAL, 
    'positionBibleknowledgeAL' => $positionBibleknowledgeAL, 
    'positionBookkeepingAL' =>$positionBookkeepingAL,
    'positionBiologyAL' => $positionBiologyAL,
    'positionCivicsAL' => $positionCivicsAL,
    'positionChemistryAL' => $positionChemistryAL,
    'positionComputerstudyAL' => $positionComputerstudyAL, 
    'positionCreativeartsAL' => $positionCreativeartsAL,
    'positionCommerceAL' => $positionCommerceAL,
    'positionEnglishliteratureAL' => $positionEnglishliteratureAL, 
    'positionFrenchAL' => $positionFrenchAL, 
    'positionGeographyAL' => $positionGeographyAL, 
    'positionHistoryAL' => $positionHistoryAL, 
    'positionIslamicknowledgeAL' => $positionIslamicknowledgeAL,
    'positionKiswahiliAL' => $positionKiswahiliAL, 
    'positionLifeskillAL' => $positionLifeskillAL,
    'positionPhysicsAL' => $positionPhysicsAL,
    'positionSwimmingAL' =>$positionSwimmingAL, 
    'positionNutritionAL' => $positionNutritionAL,
    'AverageAL' => $AverageAL,

 ],compact('AverageSM','AverageAL'));
      
    }



    
    Public function Uploadresult()
    {
        return view('Uploadresult');
    }

    Public function studentList()
    {
        if(Auth::check())
        {           
            $userId = Auth::id(); 

            $User = \DB::table('users')
            ->where('id', $userId)
            ->first();
        
            $NameofSchool = $User->nameofschool;

          $studentlist = user::where("Role",'LIKE',"Student")
                     -> where("nameofschool",'LIKE',$NameofSchool)           
                     ->get(); 
          return view('studentList',['studentlist'=>$studentlist]);
        }
        return redirect()->route('login'); 
    }
    

    Public function searchuser( Request $request){
      if(Auth::check()) 
     {
      $search = $request['query'] ?? "";  

      $searchuser=user::where('Lname','LIKE',"%$search%")
                       ->get(); 

      return view('Admin',['searchuser'=>$searchuser]);
    }
    return redirect()->route('login'); 
    }

    public function EditSchoolInformationPage(Request $request){

        if(Auth::check()) 
        {
         $search = $request['query'] ?? "";  
   
         $searchuser=schoolinformation::where('SchoolName','LIKE',"%$search%")
                          ->get(); 
   
         return view('EditSchoolInformationPage',['searchuser'=>$searchuser]);
       }
       return redirect()->route('login'); 
       }

       public function EditSchoolInformationPg($id)
       {
           $schoolinformation = schoolinformation::findOrFail($id);
           return view('UpdateSchoolInformationPg', compact('schoolinformation'));
       }
       public function  UpdateSchoolInformationPg(Request $request,$id){

        $data = schoolinformation::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('EditSchoolInformationPage')->with('success', 'Data updated successfully.');

       }
    

    Public function Studentresult()
    {
        if(Auth::check())
        {       
         $standardseven = standard_seven::all();
         return view('Studentresult')->with('standardseven', $standardseven);;
        }
        return redirect()->route('login'); 
    } 



    public function updateuserinfo($id)
    {
        $data = user::findOrFail($id);
        return view('user-update-form', compact('data'));
    }

    public function updateuser(Request $request, $id)
    {
        $data = user::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('searchuser')->with('success', 'Data updated successfully.');
    }
   

    //update  Admin standard four
    public function AdminStudentFirstMidtermresult()
    {
        $data = standard_four_first_midterm::all();
        $standardfour_semi_annual = standard_four_semi_annual::all();
        
        return view('Admin_standard_four_first_midterm', compact('data'), compact('standardfour_semi_annual'));
    }

    public function AdminStudentSecondMidtermresult()
    {
        $standardfoursecondsemester = standard_four_second_midterm::all();
        $standardfourannual = standard_four_annual::all();
        return view('Admin_standard_four_second_midterm', compact('standardfoursecondsemester'), compact('standardfourannual'));
    }



     public function StudentFirstMidtermresult($id)
    {
        $data = standard_four_first_midterm::findOrFail($id);
        return view('UpdateAdminStudentFirstMidtermresult', compact('data'));
    }

    public function UpdateAdminStudentFirstMidtermresult(Request $request, $id)
    {
        $data = standard_four_first_midterm::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('AdminStudentFirstMidtermresult')->with('success', 'Data updated successfully.');
    }

    public function AdminStudentsemiannual($id)
    {
        $standardfour_semi_annual = standard_four_semi_annual::findOrFail($id);
        return view('UpdateAdminStudentsemiannualresult', compact('standardfour_semi_annual'));
    }

    public function UpdateAdminStudentsemiannualresult(Request $request, $id)
    {
        $standardfour_semi_annual = standard_four_semi_annual::findOrFail($id);
        $standardfour_semi_annual->update($request->all());
        return redirect()->route('AdminStudentFirstMidtermresult')->with('success', 'Data updated successfully.');
    }



    public function StudentsecondMidtermresult($id)
    {
        $data = standard_four_second_midterm::findOrFail($id);
        return view('UpdateAdminStudentsecondMidtermresult', compact('data'));
    }

    public function UpdateAdminStudentsecondMidtermresult(Request $request, $id)
    {
        $data = standard_four_second_midterm::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('AdminStudentSecondMidtermresult')->with('success', 'Data updated successfully.');
    }

    public function Studentannualresult($id)
    {
        $standardfourannual= standard_four_annual::findOrFail($id);
        return view('UpdateAdminStudentannualresult', compact('standardfourannual'));
    }

    public function UpdateAdminStudentannualresult(Request $request, $id)
    {
        $standardfourannual= standard_four_annual::findOrFail($id);
        $standardfourannual->update($request->all());
        return redirect()->route('AdminStudentSecondMidtermresult')->with('success', 'Data updated successfully.');
    }




//update  Admin standard five

 public function AdminstandardfiveFM()
{
    $data = standard_five_first_midterm::all();
    $standardfive_semi_annual = standard_five_semi_annual::all();
    
    return view('Admin_standard_five_first_midterm', compact('data'), compact('standardfive_semi_annual'));
}

public function StudentfivefirstMidtermresult($id)
{
    $data = standard_five_first_midterm::findOrFail($id);
    return view('UpdateAdminStudentfivefirstMidtermresult', compact('data'));
}

public function UpdateAdminStudentfivefirstMidtermresult(Request $request, $id)
{
    $data = standard_five_first_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardfiveFM')->with('success', 'Data updated successfully.');
}



public function Studentfivesemiannualresult($id)
{
    $standardfivesemiannual = standard_five_semi_annual::findOrFail($id);
    return view('UpdateAdminStudentsemiannualresul', compact('standardfivesemiannual'));
}

public function UpdateAdminStudentfivesemiannualresult(Request $request, $id)
{
    $standardfivesemiannual = standard_five_semi_annual::findOrFail($id);
    $standardfivesemiannual->update($request->all());
    return redirect()->route('AdminstandardfiveFM')->with('success', 'Data updated successfully.');
}


public function AdminstandardfiveSM()
{
    $data = standard_five_second_midterm::all();
    $standardfive_annual = standard_five_annual::all();
    
    return view('Admin_standard_five_second_midterm', compact('data'), compact('standardfive_annual'));
}


public function StudentfiveSMresult($id)
{
    $data = standard_five_second_midterm::findOrFail($id);
    return view('UpdateAdminStudentfiveSMresult', compact('data'));
}

public function UpdateAdminStudentfiveSMresult(Request $request, $id)
{
    $data = standard_five_second_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardfiveSM')->with('success', 'Data updated successfully.');
}

public function StudentfiveANresult($id)
{
    $standardfive_annual = standard_five_annual::findOrFail($id);
    return view('UpdateAdminStudentfiveANresult', compact('standardfive_annual'));
}

public function UpdateAdminStudentfiveANresult(Request $request, $id)
{
    $data = standard_five_annual::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardfiveSM')->with('success', 'Data updated successfully.');
}
   

    //update  Admin standard six

    public function AdminstandardsixFM()
    {
        $data = standard_six_first_midterm::all();
        $standardsix_semi_annual = standard_six_semi_annual::all();
        
        return view('Admin_standard_six_first_midterm', compact('data'), compact('standardsix_semi_annual'));
    }

    public function StudentsixfirstMidtermresult($id)
    {
        $data = standard_six_first_midterm::findOrFail($id);
        return view('UpdateAdminStudentsixFMresult', compact('data'));
    }
    
    public function UpdateAdminStudentsixfirstMidtermresult(Request $request, $id)
{
    $data = standard_six_first_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardsixFM')->with('success', 'Data updated successfully.');
}

    public function Studentsixsemiannualresult($id)
    {
        $standardsemisix_annual = standard_six_semi_annual::findOrFail($id);
        return view('UpdateAdminStudentsixSAresult', compact('standardsemisix_annual'));
    }

    public function UpdateAdminStudentsixsemiannualresult(Request $request, $id)
{
    $standardsemisix = standard_six_semi_annual::findOrFail($id);
    $standardsemisix->update($request->all());
    return redirect()->route('AdminstandardsixFM')->with('success', 'Data updated successfully.');
}
  
      public function AdminstandardsixSM()
    {
        $data = standard_six_second_midterm::all();
        $standardsix_annual = standard_six_annual::all();
        
        return view('Admin_standard_six_second_midterm', compact('data'), compact('standardsix_annual'));
    }
    

    public function StudentsixSMresult($id)
    {
        $data = standard_six_second_midterm::findOrFail($id);
        return view('UpdateAdminStudentsixSMresult', compact('data'));
    }
    

    public function UpdateAdminStudentsixSMresult(Request $request, $id)
{
    $data= standard_six_second_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardsixSM')->with('success', 'Data updated successfully.');
}

    public function StudentsixANresult($id)
    {
        $standardsix_annual = standard_six_annual::findOrFail($id);
        return view('UpdateAdminStudentsixANresult', compact('standardsix_annual'));
    }

  
    public function UpdateAdminStudentsixANresult(Request $request, $id)
{
    $standardsix_annual = standard_six_annual::findOrFail($id);
    $standardsix_annual->update($request->all());
    return redirect()->route('AdminstandardsixSM')->with('success', 'Data updated successfully.');
}


    //update  Admin standard seven

    public function AdminstandardsevenFM()
    {
        $data = standard_seven_first_midterm::all();
        $standardseven_semi_annual = standard_seven_semi_annual::all();
        
        return view('Admin_standard_seven_first_midterm', compact('data'), compact('standardseven_semi_annual'));
    }

    public function StudentsevenfirstMidtermresult($id)
    {
        $data = standard_seven_first_midterm::findOrFail($id);
        return view('UpdateAdminStudentsevenFMresult', compact('data'));
    }
    
    public function UpdateAdminStudentsevenfirstMidtermresult(Request $request, $id)
{
    $data = standard_seven_first_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardsevenFM')->with('success', 'Data updated successfully.');
}

    public function Studentsevensemiannualresult($id)
    {
        $standardsemiseven_annual = standard_seven_semi_annual::findOrFail($id);
        return view('UpdateAdminStudentsevenSAresult', compact('standardsemiseven_annual'));
    }

    public function UpdateAdminStudentsevensemiannualresult(Request $request, $id)
{
    $standardsemiseven = standard_seven_semi_annual::findOrFail($id);
    $standardsemiseven->update($request->all());
    return redirect()->route('AdminstandardsevenFM')->with('success', 'Data updated successfully.');
}



    
      public function AdminstandardsevenSM()
    {
        $data = standard_seven_second_midterm::all();
        $standardseven_annual = standard_seven_annual::all();
        
        return view('Admin_standard_seven_second_midterm', compact('data'), compact('standardseven_annual'));
    }

    public function StudentsevensecondMidtermresult($id)
    {
        $data = standard_seven_second_midterm::findOrFail($id);
        return view('UpdateAdminStudentsevenSMresult', compact('data'));
    }
    
    public function UpdateAdminStudentsevensecondMidtermresult(Request $request, $id)
{
    $data = standard_seven_second_midterm::findOrFail($id);
    $data->update($request->all());
    return redirect()->route('AdminstandardsevenSM')->with('success', 'Data updated successfully.');
}

    public function StudentsevenANresult($id)
    {
        $standardseven_annual = standard_seven_annual::findOrFail($id);
        return view('UpdateAdminStudentsevenANresult', compact('standardseven_annual'));
    }

    public function UpdateAdminStudentsevenANresult(Request $request, $id)
{
    $standardsemiseven = standard_seven_annual::findOrFail($id);
    $standardsemiseven->update($request->all());
    return redirect()->route('AdminstandardsevenSM')->with('success', 'Data updated successfully.');
}
    
   
    //Payment Records 
 
public function StudentPaymentRecords()
{
    $userId = Auth::id();

    $data = student_payment_fee::with('user')->where('id', $userId)->get();

    return view('StudentPaymentRecords', compact('data'));
}

  
   public function STDVPaymentRecords(){
    $userId = Auth::id();

    $data = stdv_payment_fee::with('user')->where('id', $userId)->get();

    return view('STDVPaymentRecords', compact('data'));
  
   }

   public function STDVIPaymentRecords(){
  
    $userId = Auth::id();
    $data = stdvi_payment_fee::with('user')->where('id', $userId)->get();
    return view('STDVIPaymentRecords', compact('data'));
   }

   public function STDVIIVPaymentRecords(){
    $userId = Auth::id();
    $data = stdvii_payment_fee::with('user')->where('id', $userId)->get();

    return view('STDVIIPaymentRecords', compact('data'));
   }

   public function  PaymentRecord (Request $request,$id){
    $user = user::findOrFail($id);
    return view('PaymentRecord',compact('user'));
   }

   Public function RecordPayment(Request $request)
   {
        $id=$request->id;
        $TotalFeeAmount =$request->TotalFeeAmount;
        $AmountPaid=$request->AmountPaid; 
        $AmountNotPaid = $request->TotalFeeAmount - $request->AmountPaid;

    $existingRecord = \DB::table('student_payment_fee')
     ->where('id',$id)
     ->first();

     if($existingRecord){

        $feeRecord = \DB::table('student_payment_fee')
        ->where('id', $id)
        ->first();
     if ($feeRecord) {

        $TotalFeeAmountt = $feeRecord->TotalFeeAmount;
        $AmountPaidd = $feeRecord->AmountPaid;
        $AmountNotPaidd = $feeRecord->AmountNotPaid;
        $Statuss = $feeRecord->Status;
        $OverPaymentt = $feeRecord->OverPayment; 

        if ($AmountPaid > $AmountNotPaidd ){
            $ExceedAmountPaid = $AmountPaid - $AmountNotPaidd;
            $CalulateAmountPaid = $AmountPaid + $AmountPaidd ; 
            $AmountNotPaid = $AmountNotPaidd + $ExceedAmountPaid - $AmountPaid;
            $Status = 'OverPayment';
            \DB::table('student_payment_fee')
            ->where('id', $id)            
            ->update(['OverPayment' => $ExceedAmountPaid ,'AmountPaid' => $CalulateAmountPaid,'Status' => $Status, 'AmountNotPaid' => $AmountNotPaid]);
                         
       }elseif( $TotalFeeAmountt > $AmountPaidd )
       {
        $remainingAmountt = $AmountPaidd + $AmountPaid; 
        $remainingAmounttNotPaid = $AmountNotPaidd-$AmountPaid;      
        \DB::table('student_payment_fee')
            ->where('id', $id)                
            ->update(['AmountPaid' => $remainingAmountt,'AmountNotPaid' => $remainingAmounttNotPaid]);

       } elseif ($TotalFeeAmountt == $AmountPaidd){
        // If TotalFeeAmount equals AmountPaid, update status to "Complete" and decrement AmountNotPaid
        $Status = 'OverPayment';
        $OverPaymentt  += $AmountPaid;

        \DB::table('student_payment_fee')
            ->where('id', $id)
            ->update([
                'Status' => $Status,
                'OverPayment' => $OverPaymentt
            ]);

    }

}}
       else
       {
        if($TotalFeeAmount === $AmountPaid){  
          $status = 'Complete';
          $student_payment_fee = student_payment_fee::create(
        [     
             'id'=>$id,
             'TotalFeeAmount'=>$TotalFeeAmount,
             'AmountPaid'=> $AmountPaid,
             'AmountNotPaid'=> $AmountNotPaid,
             'Status' =>$status,            
         ]
            );
        }elseif($TotalFeeAmount < $AmountPaid)
        {
           $OverPayment = $AmountPaid - $TotalFeeAmount;
           $Status = 'OverPayment';
           $student_payment_fee = student_payment_fee::create(
            [     
                 'id'=>$id,
                 'TotalFeeAmount'=>$TotalFeeAmount,
                 'AmountPaid'=> $AmountPaid,
                 'Status' =>$Status,    
                 'OverPayment'=> $OverPayment,        
             ]
                );
        }
        else{ 
                $status = 'InComplete';
                $student_payment_fee = student_payment_fee::create(
              [     
                   'id'=>$id,
                   'TotalFeeAmount'=>$TotalFeeAmount,
                   'AmountPaid'=> $AmountPaid,
                   'AmountNotPaid'=> $AmountNotPaid,
                   'Status' =>$status,            
               ]
                  );
  
          } 
       

   }
   return redirect()->back()->with('message','student registration succesful');
}


Public function RecordPaymentV(Request $request)
{
     $id=$request->id;
     $TotalFeeAmount =$request->TotalFeeAmount;
     $AmountPaid=$request->AmountPaid; 
     $AmountNotPaid = $request->TotalFeeAmount - $request->AmountPaid;

 $existingRecord = \DB::table('stdv_payment_fee')
  ->where('id',$id)
  ->first();

  if($existingRecord){

     $feeRecord = \DB::table('stdv_payment_fee')
     ->where('id', $id)
     ->first();
  if ($feeRecord) {

     $TotalFeeAmountt = $feeRecord->TotalFeeAmount;
     $AmountPaidd = $feeRecord->AmountPaid;
     $AmountNotPaidd = $feeRecord->AmountNotPaid;
     $Statuss = $feeRecord->Status;
     $OverPaymentt = $feeRecord->OverPayment; 

     if ($AmountPaid > $AmountNotPaidd ){
         $ExceedAmountPaid = $AmountPaid - $AmountNotPaidd;
         $CalulateAmountPaid = $AmountPaid + $AmountPaidd ; 
         $AmountNotPaid = $AmountNotPaidd + $ExceedAmountPaid - $AmountPaid;
         $Status = 'OverPayment';
         \DB::table('stdv_payment_fee')
         ->where('id', $id)            
         ->update(['OverPayment' => $ExceedAmountPaid ,'AmountPaid' => $CalulateAmountPaid,'Status' => $Status, 'AmountNotPaid' => $AmountNotPaid]);
                      
    }elseif( $TotalFeeAmountt > $AmountPaidd )
    {
     $remainingAmountt = $AmountPaidd + $AmountPaid; 
     $remainingAmounttNotPaid = $AmountNotPaidd-$AmountPaid;      
     \DB::table('stdv_payment_fee')
         ->where('id', $id)                
         ->update(['AmountPaid' => $remainingAmountt,'AmountNotPaid' => $remainingAmounttNotPaid]);

    } elseif ($TotalFeeAmountt == $AmountPaidd){
     // If TotalFeeAmount equals AmountPaid, update status to "Complete" and decrement AmountNotPaid
     $Status = 'OverPayment';
     $OverPaymentt  += $AmountPaid;

     \DB::table('stdv_payment_fee')
         ->where('id', $id)
         ->update([
             'Status' => $Status,
             'OverPayment' => $OverPaymentt
         ]);

 }

}}
    else
    {
     if($TotalFeeAmount === $AmountPaid){  
       $status = 'Complete';
       $student_payment_fee = stdv_payment_fee::create(
     [     
          'id'=>$id,
          'TotalFeeAmount'=>$TotalFeeAmount,
          'AmountPaid'=> $AmountPaid,
          'AmountNotPaid'=> $AmountNotPaid,
          'Status' =>$status,            
      ]
         );
     }elseif($TotalFeeAmount < $AmountPaid)
     {
        $OverPayment = $AmountPaid - $TotalFeeAmount;
        $Status = 'OverPayment';
        $student_payment_fee = stdv_payment_fee::create(
         [     
              'id'=>$id,
              'TotalFeeAmount'=>$TotalFeeAmount,
              'AmountPaid'=> $AmountPaid,
              'Status' =>$Status,    
              'OverPayment'=> $OverPayment,        
          ]
             );
     }
     else{ 
             $status = 'InComplete';
             $student_payment_fee = stdv_payment_fee::create(
           [     
                'id'=>$id,
                'TotalFeeAmount'=>$TotalFeeAmount,
                'AmountPaid'=> $AmountPaid,
                'AmountNotPaid'=> $AmountNotPaid,
                'Status' =>$status,            
            ]
               );

       } 
    

}
return redirect()->back()->with('message','student registration succesful');
}


Public function RecordPaymentVI(Request $request)
{
     $id=$request->id;
     $TotalFeeAmount =$request->TotalFeeAmount;
     $AmountPaid=$request->AmountPaid; 
     $AmountNotPaid = $request->TotalFeeAmount - $request->AmountPaid;

 $existingRecord = \DB::table('stdvi_payment_fee')
  ->where('id',$id)
  ->first();

  if($existingRecord){

     $feeRecord = \DB::table('stdvi_payment_fee')
     ->where('id', $id)
     ->first();
  if ($feeRecord) {

     $TotalFeeAmountt = $feeRecord->TotalFeeAmount;
     $AmountPaidd = $feeRecord->AmountPaid;
     $AmountNotPaidd = $feeRecord->AmountNotPaid;
     $Statuss = $feeRecord->Status;
     $OverPaymentt = $feeRecord->OverPayment; 

     if ($AmountPaid > $AmountNotPaidd ){
         $ExceedAmountPaid = $AmountPaid - $AmountNotPaidd;
         $CalulateAmountPaid = $AmountPaid + $AmountPaidd ; 
         $AmountNotPaid = $AmountNotPaidd + $ExceedAmountPaid - $AmountPaid;
         $Status = 'OverPayment';
         \DB::table('stdvi_payment_fee')
         ->where('id', $id)            
         ->update(['OverPayment' => $ExceedAmountPaid ,'AmountPaid' => $CalulateAmountPaid,'Status' => $Status, 'AmountNotPaid' => $AmountNotPaid]);
                      
    }elseif( $TotalFeeAmountt > $AmountPaidd )
    {
     $remainingAmountt = $AmountPaidd + $AmountPaid; 
     $remainingAmounttNotPaid = $AmountNotPaidd-$AmountPaid;      
     \DB::table('stdvi_payment_fee')
         ->where('id', $id)                
         ->update(['AmountPaid' => $remainingAmountt,'AmountNotPaid' => $remainingAmounttNotPaid]);

    } elseif ($TotalFeeAmountt == $AmountPaidd){
     // If TotalFeeAmount equals AmountPaid, update status to "Complete" and decrement AmountNotPaid
     $Status = 'OverPayment';
     $OverPaymentt  += $AmountPaid;

     \DB::table('stdvi_payment_fee')
         ->where('id', $id)
         ->update([
             'Status' => $Status,
             'OverPayment' => $OverPaymentt
         ]);

 }

}}
    else
    {
     if($TotalFeeAmount === $AmountPaid){  
       $status = 'Complete';
       $student_payment_fee = stdvi_payment_fee::create(
     [     
          'id'=>$id,
          'TotalFeeAmount'=>$TotalFeeAmount,
          'AmountPaid'=> $AmountPaid,
          'AmountNotPaid'=> $AmountNotPaid,
          'Status' =>$status,            
      ]
         );
     }elseif($TotalFeeAmount < $AmountPaid)
     {
        $OverPayment = $AmountPaid - $TotalFeeAmount;
        $Status = 'OverPayment';
        $student_payment_fee = stdvi_payment_fee::create(
         [     
              'id'=>$id,
              'TotalFeeAmount'=>$TotalFeeAmount,
              'AmountPaid'=> $AmountPaid,
              'Status' =>$Status,    
              'OverPayment'=> $OverPayment,        
          ]
             );
     }
     else{ 
             $status = 'InComplete';
             $student_payment_fee = stdvi_payment_fee::create(
           [     
                'id'=>$id,
                'TotalFeeAmount'=>$TotalFeeAmount,
                'AmountPaid'=> $AmountPaid,
                'AmountNotPaid'=> $AmountNotPaid,
                'Status' =>$status,            
            ]
               );

       } 
    

}
return redirect()->back()->with('message','student registration succesful');
}

Public function RecordPaymentVII(Request $request)
{
     $id=$request->id;
     $TotalFeeAmount =$request->TotalFeeAmount;
     $AmountPaid=$request->AmountPaid; 
     $AmountNotPaid = $request->TotalFeeAmount - $request->AmountPaid;

 $existingRecord = \DB::table('stdvii_payment_fee')
  ->where('id',$id)
  ->first();

  if($existingRecord){

     $feeRecord = \DB::table('stdvii_payment_fee')
     ->where('id', $id)
     ->first();
  if ($feeRecord) {

     $TotalFeeAmountt = $feeRecord->TotalFeeAmount;
     $AmountPaidd = $feeRecord->AmountPaid;
     $AmountNotPaidd = $feeRecord->AmountNotPaid;
     $Statuss = $feeRecord->Status;
     $OverPaymentt = $feeRecord->OverPayment; 

     if ($AmountPaid > $AmountNotPaidd ){
         $ExceedAmountPaid = $AmountPaid - $AmountNotPaidd;
         $CalulateAmountPaid = $AmountPaid + $AmountPaidd ; 
         $AmountNotPaid = $AmountNotPaidd + $ExceedAmountPaid - $AmountPaid;
         $Status = 'OverPayment';
         \DB::table('stdvii_payment_fee')
         ->where('id', $id)            
         ->update(['OverPayment' => $ExceedAmountPaid ,'AmountPaid' => $CalulateAmountPaid,'Status' => $Status, 'AmountNotPaid' => $AmountNotPaid]);
                      
    }elseif( $TotalFeeAmountt > $AmountPaidd )
    {
     $remainingAmountt = $AmountPaidd + $AmountPaid; 
     $remainingAmounttNotPaid = $AmountNotPaidd-$AmountPaid;      
     \DB::table('stdvii_payment_fee')
         ->where('id', $id)                
         ->update(['AmountPaid' => $remainingAmountt,'AmountNotPaid' => $remainingAmounttNotPaid]);

    } elseif ($TotalFeeAmountt == $AmountPaidd){
     // If TotalFeeAmount equals AmountPaid, update status to "Complete" and decrement AmountNotPaid
     $Status = 'OverPayment';
     $OverPaymentt  += $AmountPaid;

     \DB::table('stdvii_payment_fee')
         ->where('id', $id)
         ->update([
             'Status' => $Status,
             'OverPayment' => $OverPaymentt
         ]);

 }

}}
    else
    {
     if($TotalFeeAmount === $AmountPaid){  
       $status = 'Complete';
       $student_payment_fee = stdvii_payment_fee::create(
     [     
          'id'=>$id,
          'TotalFeeAmount'=>$TotalFeeAmount,
          'AmountPaid'=> $AmountPaid,
          'AmountNotPaid'=> $AmountNotPaid,
          'Status' =>$status,            
      ]
         );
     }elseif($TotalFeeAmount < $AmountPaid)
     {
        $OverPayment = $AmountPaid - $TotalFeeAmount;
        $Status = 'OverPayment';
        $student_payment_fee = stdvii_payment_fee::create(
         [     
              'id'=>$id,
              'TotalFeeAmount'=>$TotalFeeAmount,
              'AmountPaid'=> $AmountPaid,
              'Status' =>$Status,    
              'OverPayment'=> $OverPayment,        
          ]
             );
     }
     else{ 
             $status = 'InComplete';
             $student_payment_fee = stdvii_payment_fee::create(
           [     
                'id'=>$id,
                'TotalFeeAmount'=>$TotalFeeAmount,
                'AmountPaid'=> $AmountPaid,
                'AmountNotPaid'=> $AmountNotPaid,
                'Status' =>$status,            
            ]
               );

       } 
}
return redirect()->back()->with('message','student registration succesful');
}


 
   Public function BurserPage(Request $request){
   if(Auth::check()){  
    $search = $request['query'] ?? "";  
    $userId = Auth::id(); 

    $User = \DB::table('users')
    ->where('id', $userId)
    ->first();

    $NameofSchool = $User->nameofschool;

    $searchuser=user::where('Role', 'student')
                      -> where('Lname','LIKE',"%$search%")
                      ->where('nameofschool',$NameofSchool)
                     ->get(); 

    return view('BurserPage',compact('searchuser')); 
   }
    return redirect()->route('login');
   }


   public function SearchstudentInfo(Request $request){
    if(Auth::check()){ 

    $userId = Auth::id(); 

    $Search = $request['query'] ?? "";

    $User = \DB::table('users')
    ->where('id', $userId)
    ->first();

    $NameofSchool = $User->nameofschool;

    $searchuser=user::where('Role','student')
                     ->where('Lname','LIKE',"%$Search%")
                     ->where('nameofschool',$NameofSchool)
                     ->get();
    return view('SearchstudentInfo',compact('searchuser'));
     }
     return redirect()->route('login');
   }

   public function updatestudentinfoPage($id)
   {
       $data = user::findOrFail($id);
       return view('updatestudentinfoPage', compact('data'));
   }
   public function updatestudentinfo(Request $request, $id)
   {
       $data = user::findOrFail($id);
       $data->update($request->all());
       return redirect()->route('SearchstudentInfo')->with('success', 'Data updated successfully.');
   }


   Public function StudentPaymentStatus (Request $request)
   {
    if(Auth::check()){  
        $search = $request['query'] ?? ""; 
        $searchuser = student_payment_fee::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('Lname', 'LIKE', "%$search%");
        })
        
        ->get();      
        return view ('StudentPaymentStatus',compact('searchuser'));
    }
    return redirect()->route('login');  
   }

   Public function StdVPaymentStatus ()
   {
    if(Auth::check()){   
        $search = $request['query'] ?? ""; 
        $searchuser = stdv_payment_fee::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('Lname', 'LIKE', "%$search%");
        })  
        ->get();  

        //$searchuser = stdv_payment_fee::with('user')->get();      
        return view ('StdVPaymentStatus',compact('searchuser'));
    }
    return redirect()->route('login');  
   }

   Public function StdVIPaymentStatus ()
   {
    if(Auth::check()){  
        $search = $request['query'] ?? ""; 
        $searchuser = stdvi_payment_fee::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('Lname', 'LIKE', "%$search%");
        })  
        ->get(); 
        //$searchuser = stdvi_payment_fee::with('user')->get();      
        return view ('StdVIPaymentStatus',compact('searchuser'));
    }
    return redirect()->route('login');  
   }

   Public function StdVIIPaymentStatus ()
   {
    if(Auth::check()){  
        $search = $request['query'] ?? ""; 
        $searchuser = stdvii_payment_fee::with('user')
        ->whereHas('user', function ($query) use ($search) {
            $query->where('Lname', 'LIKE', "%$search%");
        })  
        ->get(); 
        
        //$searchuser = stdvii_payment_fee::with('user')->get();      
        return view ('StdVIIPaymentStatus',compact('searchuser'));
    }
    return redirect()->route('login');  
   }

   //Export reseipt 
   public function StdIVPrintReceipt($id)
   {
       return Excel::download(new StdIVPrintReceipt($id), 'payment_receipt.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
   }

   public function StdVPrintReceipt($id)
   {
       return Excel::download(new StdVPrintReceipt($id), 'payment_receipt.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
   }

   public function StdVIPrintReceipt($id)
   {
       return Excel::download(new StdVIPrintReceipt($id), 'payment_receipt.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
   }

   public function StdVIIPrintReceipt($id)
   {
       return Excel::download(new StdVIIPrintReceipt($id), 'payment_receipt.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
   }

     Public function CommentPage(){
        $userId = Auth::id();
        return view('Comment')->with('userId', $userId);
     }

    Public function Comment(Request $request){

        if(Auth::check()){ 
            
        $request ->validate([
            'id'=>['required','string','max:255'],
            'Comment'=>['required','string','max:255'],
        ]);

        $Comment = comment::create([
              'id'=> $request->id,
             'Comment'=>$request->Comment,
        ]);

  return redirect()->back()->with('message','Succesfull sent');

    }return redirect()->route('login');


    }

     Public function NewComment(){

        if(Auth::check()){  
            $user = Auth::user();
            $schoolName = $user->nameofschool;

            $comments = Comment::whereHas('user', function ($query) use ($schoolName) {
                $query->where('nameofschool', $schoolName);
            })->with('user')->get();

           return view('NewComment', compact('comments'));

        }
        return redirect()->route('login');
     }

     Public function SendyourMessagePage(){
        if(Auth::check()){
            $userId = Auth::id();
            return view('SendyourMessagePage')->with('userId', $userId);
        }
        return redirect()->route('login');
     }

     Public function SendyourMessage(Request $request){
        
        $data = new message();
        $file = $request ->file;
         
        $filename = time().'.'.$file ->getClientOriginalExtension();
        $file->move('assets',$filename);
        $data->file_path=$filename;


        $data->id = $request->id;
        $data->Subject =$request->Subject;
        $data->Department =$request->Department;
        $data->Message =$request->Message;

        $data->save();
       
     return redirect()->back()->with('message','Succesfull sent');
        
     }

     public function SchoolInformationPage(){
        return view ('SchoolInformation');
     }
    

     Public function SchoolInformation(Request $request){
        $data = new schoolinformation();
        $data->SchoolName =$request->SchoolName;
        $data->Country =$request->Country;
        $data->Region =$request->Region;
        $data->District =$request->District;
        $data->POBOX =$request->POBOX;

        $file = $request->Emblem;
        $filename = time().'.'.$file ->getClientOriginalExtension();
        $file->move('assets',$filename);
        $data->Emblem=$filename;

        $data->BankAccount =$request->BankAccount;
        $data->FirstContact =$request->FirstContact;
        $data->SecondContact =$request->SecondContact;
        $data->Studentfees =$request->Studentfees;
        $data->Studentamount =$request->Studentamount;

        $data->save();
        return redirect()->back()->with('message','Succesfull sent');
        
     }

     public function GetyourMessage(){
        $userId = Auth::id();
        $data = message::where('id', $userId)->get();
        return view('yourMessagePage',compact('data'));
     }


     public function ReceiveMessage(){
        $userId = Auth::id();
        $User = \DB::table('users')->where('id', $userId)->first();
        $Role = $User->Role;
        $nameofSchool = $User->nameofschool;   
        
        // Fetch messages based on Department and nameofschool
        $Receivemessage = message::where('Department', $Role)
            ->whereHas('user', function ($query) use ($nameofSchool) {
                $query->where('nameofschool', $nameofSchool);
            })
            ->get();
            
        return view('ReceiveMessage', compact('Receivemessage'));
    }


     public function downloadFile($file_path) {
        $filePath = public_path('assets/' . $file_path);
    
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            // Handle file not found scenario
            abort(404);
        }
    }


    public function view($file_path) {
        $filePath = public_path('assets/' . $file_path);

        if (file_exists($filePath)) {
            // Read the file content
            $fileContent = message::get($filePath);

            // Return the file content as response
            return response($fileContent, 200)
                ->header('Content-Type', 'text/plain'); // Set appropriate content type
        } else {
            // Handle file not found scenario
            abort(404);
        }
    }
    

     public function ViewFile($id){
        $userId = Auth::id();
        $data = message::where('id', $userId)->find($id); 
        return view('viewFile',compact('data'));
     }

     
    
     
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

     /**
     * Deactivate user.
     */


     public function deactivate($roleName)
{
    // Find the role by its name
    $role = schoolinformation::findByName($roleName);

    if (!$role) {
        return redirect()->back()->with('error', 'Role not found.');
    }

    // Deactivate all users with this role
    $users = User::role($roleName)->update(['is_active' => false]);

    return view('DeactivateAccount')->with('success', 'All users with the role ' . $roleName . ' have been deactivated successfully.')->compact('role');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    
}

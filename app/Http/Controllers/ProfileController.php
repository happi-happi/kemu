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
use App\Exports\Exportuserimport;
use App\Exports\StdIVPrintReceipt;
use App\Exports\StdVPrintReceipt;
use App\Exports\StdVIPrintReceipt;
use App\Exports\StdVIIPrintReceipt;
use App\Exports\STDIVstudentlist;
use App\Exports\STDVstudentlist;
use App\Exports\STDVIstudentlist;
use App\Exports\STDVIIstudentlist;

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
        return view('Teacher');
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

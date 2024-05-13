<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('teacher', [ProfileController::class, 'teacher'])->name('teacher');
    Route::post('teacher', [RegisteredUserController::class, 'store']);  
    Route::get('studentList', [ProfileController::class, 'studentList'])->name('studentList'); 
    Route::get('Uploadresult', [ProfileController::class, 'Uploadresult'])->name('Uploadresult');
    
       //SchoolInformation
       Route::get('SchoolInformationPage',[ProfileController::class,'SchoolInformationPage'])->name('SchoolInformationPage');
       Route::post('SchoolInformation',[ProfileController::class,'SchoolInformation'])->name('SchoolInformation');

       //Update SChool Information
       Route::get('EditSchoolInformationPage',[ProfileController::class,'EditSchoolInformationPage'])->name('EditSchoolInformationPage');

       Route::get('EditSchoolInformationPg/{id}',[ProfileController::class,'EditSchoolInformationPg'])->name('EditSchoolInformationPg');
       Route::post('UpdateSchoolInformationPg/{id}',[ProfileController::class,'UpdateSchoolInformationPg'])->name('UpdateSchoolInformationPg');

       //Search Student
       Route::get('SearchstudentInfo',[ProfileController::class,'SearchstudentInfo'])->name('SearchstudentInfo');

       Route::get('updatestudentinfoPage/{id}',[ProfileController::class,'updatestudentinfoPage'])->name('updatestudentinfoPage');
       Route::post('updatestudentinfo/{id}',[ProfileController::class,'updatestudentinfo'])->name('updatestudentinfo');

       //Export user information
       Route::get('export',[ProfileController::class,'exportUsers'])->name('export');
       Route::get('STDIVstudentlist',[ProfileController::class,'STDIVstudentlist'])->name('STDIVstudentlist');
       Route::get('STDVstudentlist',[ProfileController::class,'STDVstudentlist'])->name('STDVstudentlist');
       Route::get('STDVIstudentlist',[ProfileController::class,'STDVIstudentlist'])->name('STDVIstudentlist');
       Route::get('STDVIIstudentlist',[ProfileController::class,'STDVIIstudentlist'])->name('STDVIIstudentlist');
       Route::get('FormI',[ProfileController::class,'FormI'])->name('FormI');
       Route::get('FormII',[ProfileController::class,'FormII'])->name('FormII');
       Route::get('FormIII',[ProfileController::class,'FormIII'])->name('FormIII');
       Route::get('FormIV',[ProfileController::class,'FormIV'])->name('FormIV');

       //import student standard four result
    Route::get('/import-excel',[ProfileController::class, 'importexcel'])->name('import-excel');  
    Route::post('/import-excel', [ProfileController::class, 'import'])->name('import');   
    Route::post('standardfourfirstmidterm',[ProfileController::class,'standardfourfirstmidterm'])->name('standardfourfirstmidterm');
    Route::post('standardfourSemiAnnual',[ProfileController::class,'standardfourSemiAnnual'])->name('standardfourSemiAnnual');
    Route::post('standard_four_second_midterm',[ProfileController::class,'standard_four_second_midterm'])->name('standard_four_second_midterm');
    Route::post('standard_four_annual',[ProfileController::class,'standard_four_annual'])->name('standard_four_annual');

    
    //import student standard five  result
    Route::get('/standardfiveimport',[ProfileController::class, 'standardfiveimport'])->name('standardfiveimport');
    Route::post('standardfivefirstmidterm',[ProfileController::class,'standardfivefirstmidterm'])->name('standardfivefirstmidterm');
    Route::post('standardfivesecondmidterm',[ProfileController::class,'standardfivesecondmidterm'])->name('standardfivesecondmidterm');
    Route::post('standardfiveSemiAnnual',[ProfileController::class,'standardfiveSemiAnnual'])->name('standardfiveSemiAnnual');
    Route::post('standardfiveAnnual',[ProfileController::class,'standardfiveAnnual'])->name('standardfiveAnnual');

     //import student standard six  result
    Route::get('/standardsiximport',[ProfileController::class, 'standardsiximport'])->name('standardsiximport');
    Route::post('standardsixfirstmidterm',[ProfileController::class,'standardsixfirstmidterm'])->name('standardsixfirstmidterm');
    Route::post('standardsixsecondmidterm',[ProfileController::class,'standardsixsecondmidterm'])->name('standardsixsecondmidterm');
    Route::post('standardsixSemiAnnual',[ProfileController::class,'standardsixSemiAnnual'])->name('standardsixSemiAnnual');
    Route::post('standardsixAnnual',[ProfileController::class,'standardsixAnnual'])->name('standardsixAnnual');

    //import student standard seven  result
    Route::get('/standardsevenimport',[ProfileController::class, 'standardsevenimport'])->name('standardsevenimport');
    Route::post('standardsevenfirstmidterm',[ProfileController::class,'standardsevenfirstmidterm'])->name('standardsevenfirstmidterm');
    Route::post('standardsevensecondmidterm',[ProfileController::class,'standardsevensecondmidterm'])->name('standardsevensecondmidterm');
    Route::post('standardsevenSemiAnnual',[ProfileController::class,'standardsevenSemiAnnual'])->name('standardsevenSemiAnnual');
    Route::post('standardsevenAnnual',[ProfileController::class,'standardsevenAnnual'])->name('standardsevenAnnual');


   //import student formone  result
   Route::get('/standardformoneimport',[ProfileController::class, 'standardformoneimport'])->name('standardformoneimport');
   Route::post('standardformonefirstmidterm',[ProfileController::class,'standardformonefirstmidterm'])->name('standardformonefirstmidterm');
   Route::post('standardformonesecondmidterm',[ProfileController::class,'standardformonesecondmidterm'])->name('standardformonesecondmidterm');
   Route::post('standardformoneSemiAnnual',[ProfileController::class,'standardformoneSemiAnnual'])->name('standardformoneSemiAnnual');
   Route::post('standardformoneAnnual',[ProfileController::class,'standardformoneAnnual'])->name('standardformoneAnnual');

  //import student formtwo  result
      Route::get('/standardformtwoimport',[ProfileController::class, 'standardformtwoimport'])->name('standardformtwoimport');
      Route::post('standardformtwofirstmidterm',[ProfileController::class,'standardformtwofirstmidterm'])->name('standardformtwofirstmidterm');
      Route::post('standardformtwosecondmidterm',[ProfileController::class,'standardformtwosecondmidterm'])->name('standardformtwosecondmidterm');
      Route::post('standardformtwoSemiAnnual',[ProfileController::class,'standardformtwoSemiAnnual'])->name('standardformtwoSemiAnnual');
      Route::post('standardformtwoAnnual',[ProfileController::class,'standardformtwoAnnual'])->name('standardformtwoAnnual');

 
      
 //import student formthree  result
 Route::get('/standardformthreeimport',[ProfileController::class, 'standardformthreeimport'])->name('standardformthreeimport');
 Route::post('standardformthreefirstmidterm',[ProfileController::class,'standardformthreefirstmidterm'])->name('standardformthreefirstmidterm');
 Route::post('standardformthreesecondmidterm',[ProfileController::class,'standardformthreesecondmidterm'])->name('standardformthreesecondmidterm');
 Route::post('standardformthreeSemiAnnual',[ProfileController::class,'standardformthreeSemiAnnual'])->name('standardformthreeSemiAnnual');
 Route::post('standardformthreeAnnual',[ProfileController::class,'standardformthreeAnnual'])->name('standardformthreeAnnual');

  //import student formfour  result
  Route::get('/standardformfourimport',[ProfileController::class, 'standardformfourimport'])->name('standardformfourimport');
  Route::post('standardformfourfirstmidterm',[ProfileController::class,'standardformfourfirstmidterm'])->name('standardformfourfirstmidterm');
  Route::post('standardformfoursecondmidterm',[ProfileController::class,'standardformfoursecondmidterm'])->name('standardformfoursecondmidterm');
  Route::post('standardformfourSemiAnnual',[ProfileController::class,'standardformfourSemiAnnual'])->name('standardformfourSemiAnnual');
  Route::post('standardformfourAnnual',[ProfileController::class,'standardformfourAnnual'])->name('standardformfourAnnual');

  

    // Student page result
    //1.Standard four 
    Route::get('student', [ProfileController::class, 'student'])->name('student');
    Route::get('standardfourSM', [ProfileController::class, 'standardfourSM'])->name('standardfourSM');
    //2.Standard five
    Route::get('standardfiverFM', [ProfileController::class, 'standardfiverFM'])->name('standardfiverFM');
    Route::get('standardfiverSM', [ProfileController::class, 'standardfiverSM'])->name('standardfiverSM');

    //3.Standard six 
    Route::get('standardsixFM', [ProfileController::class, 'standardsixFM'])->name('standardsixFM');                  
    Route::get('standardsixSM', [ProfileController::class, 'standardsixSM'])->name('standardsixSM');

    //4.Standard seven 
    Route::get('standardsevenFM', [ProfileController::class, 'standardsevenFM'])->name('standardsevenFM');
    Route::get('standardsevenSM', [ProfileController::class, 'standardsevenSM'])->name('standardsevenSM');

   //F1.FormOne 
   Route::get('FormOneFM', [ProfileController::class, 'FormOneFM'])->name('FormOneFM');
   Route::get('FormOneSM', [ProfileController::class, 'FormOneSM'])->name('FormOneSM');

 //F2.FormTwo 
   Route::get('FormTwoFM', [ProfileController::class, 'FormTwoFM'])->name('FormTwoFM');
   Route::get('FormTwoSM', [ProfileController::class, 'FormTwoSM'])->name('FormTwoSM');

//F3.FormThree
   Route::get('FormThreeFM', [ProfileController::class, 'FormThreeFM'])->name('FormThreeFM');
   Route::get('FormThreeSM', [ProfileController::class, 'FormThreeSM'])->name('FormThreeSM');


  //F4.FormFour
Route::get('FormFourFM', [ProfileController::class, 'FormFourFM'])->name('FormFourFM');
Route::get('FormFourSM', [ProfileController::class, 'FormFourSM'])->name('FormFourSM');


   //PaymentRecords
      //1. Student
   Route::get('StudentPaymentRecords', [ProfileController::class, 'StudentPaymentRecords'])->name('StudentPaymentRecords');
   Route::get('StdVPaymentRecords', [ProfileController::class, 'STDVPaymentRecords'])->name('StdVPaymentRecords');
   Route::get('StdVIPaymentRecords', [ProfileController::class, 'STDVIPaymentRecords'])->name('StdVIPaymentRecords');
   Route::get('StdVIIVPaymentRecords', [ProfileController::class, 'STDVIIVPaymentRecords'])->name('StdVIIVPaymentRecords');


   //2.Burser
   Route::get('BurserPage', [ProfileController::class, 'BurserPage'])->name('BurserPage');
   Route::get('PaymentRecord/{id}', [ProfileController::class, 'PaymentRecord'])->name('PaymentRecord');

   Route::get('StudentPaymentStatus',[ProfileController::class,'StudentPaymentStatus'])->name('StudentPaymentStatus');
   Route::get('StdIVPrintReceipt/{id}',[ProfileController::class,'StdIVPrintReceipt'])->name('StdIVPrintReceipt');

   Route::get('StdVPaymentStatus',[ProfileController::class,'StdVPaymentStatus'])->name('StdVPaymentStatus');
   Route::get('StdVPrintReceipt/{id}',[ProfileController::class,'StdVPrintReceipt'])->name('StdVPrintReceipt');

   Route::get('StdVIPaymentStatus',[ProfileController::class,'StdVIPaymentStatus'])->name('StdVIPaymentStatus');
   Route::get('StdVIPrintReceipt/{id}',[ProfileController::class,'StdVIPrintReceipt'])->name('StdVIPrintReceipt');

   Route::get('StdVIIPaymentStatus',[ProfileController::class,'StdVIIPaymentStatus'])->name('StdVIIPaymentStatus');
   Route::get('StdVIIPrintReceipt/{id}',[ProfileController::class,'StdVIIPrintReceipt'])->name('StdVIIPrintReceipt');

   Route::post('RecordPayment',[ProfileController::class,'RecordPayment'])->name('RecordPayment');
   Route::post('RecordPaymentV',[ProfileController::class,'RecordPaymentV'])->name('RecordPaymentV');
   Route::post('RecordPaymentVI',[ProfileController::class,'RecordPaymentVI'])->name('RecordPaymentVI');
   Route::post('RecordPaymentVII',[ProfileController::class,'RecordPaymentVII'])->name('RecordPaymentVII');
   

    // AdminPage
    //1.Search Data
    Route::get('/searchuser' ,[ProfileController::class,'searchuser'])->name('searchuser');
    

    // 2. update user
    Route::get('updateuserinfo/{id}',[ProfileController::class,'updateuserinfo'])->name('updateuserinfo');
    Route::post('updateuserinfo/{id}',[ProfileController::class,'updateuser'])->name('updateuser');

     // 3. get studentresult
     Route::get('/Studentresult' ,[ProfileController::class,'Studentresult'])->name('Studentresult');
     Route::get('updateviewresult',[ProfileController::class,'updateviewresult'])->name('updateviewresult');
     Route::get('updatestandardfive',[ProfileController::class,'updatestandardfive'])->name('updatestandardfive');
     Route::get('updatestandardsix',[ProfileController::class,'updatestandardsix'])->name('updatestandardsix');

     //4.update studentresult
       //4(A) Update standard four result   

       //Get standard four result first  midterm and semi annual 
     Route::get('AdminStudentFirstMidtermresult' ,[ProfileController::class,'AdminStudentFirstMidtermresult'])->name('AdminStudentFirstMidtermresult');
      
        //Update standard four result first semester
     Route::get('AdminStudentFirstMidtermresult/{id}' ,[ProfileController::class,'StudentFirstMidtermresult'])->name('StudentFirstMidtermresult');
     Route::post('AdminStudentFirstMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentFirstMidtermresult'])->name('UpdateAdminStudentFirstMidtermresult');

       //Update standard four result semi annual 

    Route::get('AdminStudentsemiannualresult/{id}' ,[ProfileController::class,'AdminStudentsemiannual'])->name('AdminStudentsemiannual');
    Route::post('AdminStudentsemiannualresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsemiannualresult'])->name('UpdateAdminStudentsemiannualresult');
      
     //Get standard four result second  midterm and  annual 
     Route::get('AdminStudentSecondMidtermresult' ,[ProfileController::class,'AdminStudentSecondMidtermresult'])->name('AdminStudentSecondMidtermresult');

      //Update standard four result second  midterm
      Route::get('AdminStudentsecondMidtermresult/{id}' ,[ProfileController::class,'StudentsecondMidtermresult'])->name('AdminStudentsecondMidtermresult');
      Route::post('AdminStudentsecondMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsecondMidtermresult'])->name('UpdateAdminStudentsecondMidtermresult');

      //Update standard four result  annual 
      Route::get('AdminStudentannualresult/{id}' ,[ProfileController::class,'Studentannualresult'])->name('AdminStudentannualresult');
      Route::post('AdminStudentannualresult/{id}' ,[ProfileController::class,'UpdateAdminStudentannualresult'])->name('UpdateAdminStudentannualresult');
     
     //4(A) Update standard five result
     //Get standard four result first  midterm and semi annual 
      Route::get('AdminstandardfiveFM',[ProfileController::class,'AdminstandardfiveFM'])->name('AdminstandardfiveFM');    

     //Update standard five result first  midterm 
     Route::get('UpdateAdminStudentfivefirstMidtermresult/{id}' ,[ProfileController::class,'StudentfivefirstMidtermresult'])->name('UpdateAdminStudentfivefirstMidtermresult');
     Route::post('AdminStudentfivefirstMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentfivefirstMidtermresult'])->name('AdminStudentfivefirstMidtermresult');

     //Update standard five result semiannual 
     Route::get('AdminStudentfivesemiannualresult/{id}' ,[ProfileController::class,'Studentfivesemiannualresult'])->name('AdminStudentfivesemiannualresult');
     Route::post('AdminStudentfivesemiannualresult/{id}' ,[ProfileController::class,'UpdateAdminStudentfivesemiannualresult'])->name('UpdateAdminStudentfivesemiannualresult');

     Route::get('AdminstandardfiveSM',[ProfileController::class,'AdminstandardfiveSM'])->name('AdminstandardfiveSM');  

    //Update standard five result second   midterm 
     Route::get('UpdateAdminStudentfiveSMresult/{id}' ,[ProfileController::class,'StudentfiveSMresult'])->name('UpdateAdminStudentfiveSMresult');
     Route::post('AdminStudentfiveSMresult/{id}' ,[ProfileController::class,'UpdateAdminStudentfiveSMresult'])->name('AdminStudentfiveSMresult');
    
     //Update standard five result  annual
     Route::get('UpdateAdminStudentfiveANresult/{id}' ,[ProfileController::class,'StudentfiveANresult'])->name('UpdateAdminStudentfiveANresult');
     Route::post('AdminStudentfiveANresult/{id}' ,[ProfileController::class,'UpdateAdminStudentfiveANresult'])->name('AdminStudentfiveANresult');
         
        //4(A) Update standard six result
              
     //Get standard six result first  midterm and   semi annaul  
    Route::get('AdminstandardsixFM',[ProfileController::class,'AdminstandardsixFM'])->name('AdminstandardsixFM');  
    
    
    //Update standard six  result first  midterm 
    Route::get('UpdateAdminStudentsixfirstMidtermresult/{id}' ,[ProfileController::class,'StudentsixfirstMidtermresult'])->name('UpdateAdminStudentsixfirstMidtermresult');
    Route::post('AdminStudentsixfirstMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsixfirstMidtermresult'])->name('AdminStudentsixfirstMidtermresult');
 //Update standard six  result semi annaul 
    Route::get('AdminStudentsixsemiannualresult/{id}' ,[ProfileController::class,'Studentsixsemiannualresult'])->name('AdminStudentsixsemiannualresult');
    Route::post('AdminStudentsixsemiannualresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsixsemiannualresult'])->name('UpdateAdminStudentsixsemiannualresult');

    //Get standard six result  second  midterm and   annaul  
    Route::get('AdminstandardsixSM',[ProfileController::class,'AdminstandardsixSM'])->name('AdminstandardsixSM'); 
    
     //Update standard six result second   midterm 
     Route::get('UpdateAdminStudentsixSMresult/{id}' ,[ProfileController::class,'StudentsixSMresult'])->name('UpdateAdminStudentsixSMresult');
     Route::post('AdminStudentsixSMresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsixSMresult'])->name('AdminStudentsixSMresult');

   //Update standard six result  annual
   Route::get('UpdateAdminStudentsixANresult/{id}' ,[ProfileController::class,'StudentsixANresult'])->name('UpdateAdminStudentsixANresult');
   Route::post('AdminStudentsixANresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsixANresult'])->name('AdminStudentsixANresult');

   

     //4(A) Update standard seven result
     Route::get('AdminstandardsevenFM', [ProfileController::class, 'AdminstandardsevenFM'])->name('AdminstandardsevenFM');

       //Update standard seven  result first  midterm 
    Route::get('UpdateAdminStudentsevenfirstMidtermresult/{id}' ,[ProfileController::class,'StudentsevenfirstMidtermresult'])->name('UpdateAdminStudentsevenfirstMidtermresult');
    Route::post('AdminStudentsevenfirstMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsevenfirstMidtermresult'])->name('AdminStudentsevenfirstMidtermresult');
     //Update standard seven  result semi annaul 
    Route::get('AdminStudentsevensemiannualresult/{id}' ,[ProfileController::class,'Studentsevensemiannualresult'])->name('AdminStudentsevensemiannualresult');
    Route::post('AdminStudentsevensemiannualresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsevensemiannualresult'])->name('UpdateAdminStudentsevensemiannualresult');



     Route::get('AdminstandardsevenSM', [ProfileController::class, 'AdminstandardsevenSM'])->name('AdminstandardsevenSM');

    //Update standard seven  result second  midterm 
    Route::get('UpdateAdminStudentsevensecondMidtermresult/{id}' ,[ProfileController::class,'StudentsevensecondMidtermresult'])->name('UpdateAdminStudentsevensecondMidtermresult');
    Route::post('AdminStudentsevensecondMidtermresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsevensecondMidtermresult'])->name('AdminStudentsevensecondMidtermresult');
     //Update standard seven  result  annaul 
    Route::get('AdminStudentsevenANresult/{id}' ,[ProfileController::class,'StudentsevenANresult'])->name('AdminStudentsevenANresult');
    Route::post('AdminStudentsevenANresult/{id}' ,[ProfileController::class,'UpdateAdminStudentsevenANresult'])->name('UpdateAdminStudentsevenANresult');


     //Comment
     Route::get('CommentPage', [ProfileController::class, 'CommentPage'])->name('CommentPage');
     Route::post('Comment', [ProfileController::class, 'Comment'])->name('Comment');

     Route::get('NewCommentPage', [ProfileController::class, 'NewComment'])->name('NewCommentPage');
     Route::post('NewCommenthere', [ProfileController::class, 'NewCommenhere'])->name('NewCommenthere');
     
     Route::get('SendyourMessagePage', [ProfileController::class, 'SendyourMessagePage'])->name('SendyourMessagePage');
     Route::post('SendyourMessage', [ProfileController::class, 'SendyourMessage'])->name('SendyourMessage');

     Route::get('GetyourMessage',[ProfileController::class,'GetyourMessage'])->name('GetyourMessage');
     Route::get('ReceiveMessage',[ProfileController::class,'ReceiveMessage'])->name('ReceiveMessage');

     Route::get('view/{file_path}', [ProfileController::class, 'view'])->name('view');
     Route::get('download/{file_path}', [ProfileController::class, 'downloadFile'])->name('download');
});

require __DIR__.'/auth.php';

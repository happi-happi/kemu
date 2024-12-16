<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentRegisterNotification;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\staff;
use App\Models\guardian;
use App\Models\subjects;
use App\Models\results;
use App\Models\timetable;
use App\Models\teacher_subject;
use App\Models\lessonplannurserytostdii;
use App\Models\lessonplanstdiiitostdvi;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\schoolinformation;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $SchoolName = schoolinformation::all();
        return view('auth.register',compact('SchoolName'));
    }

   
  public function viewregisterstaff()
  {
    $SchoolName = schoolinformation::all(); 
    return view('registerStaff', compact('SchoolName'));
  }


    
  public function viewregisterguardian()
  {
    return view('registerguardian');
  }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'Fname' => ['required', 'string', 'max:255'],
            'Mname' => ['required', 'string', 'max:255'],
            'Lname' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'DateofBirth'   => ['required', 'string', 'max:255'],
            'PlaceofBirth'   => ['required', 'string', 'max:255'],
            'Nationality'  => ['required', 'string', 'max:255'],
            'Region'  => ['required', 'string', 'max:255'],
            'District'  => ['required', 'string', 'max:255'],
            'Currentresidence'  => ['required', 'string', 'max:255'],
            'SchoolName' => ['required', 'string', 'max:255'],
            'Role' => ['required', 'string', 'max:255'],
            'PreviousSchool'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['confirmed', Rules\Password::defaults()],
            

        ]);

        $user = User::create([
            'Fname' => $request->Fname,
            'Mname' => $request->Mname,
            'Lname' => $request->Lname,
            'class' => $request->class,
            'DateofBirth' => $request->DateofBirth,
            'PlaceofBirth' => $request->PlaceofBirth,
            'Nationality' => $request->Nationality,
            'Region' => $request->Region,
            'District' => $request->District,
            'Currentresidence' => $request->Currentresidence,
            'SchoolName' => $request->SchoolName,
            'Role' => $request-> Role,
            'PreviousSchool' => $request->PreviousSchool,
            'email' => $request->email,
            'password' => Hash::make($request->password),          
            
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        // Send the email
        Mail::to($user->email)->send(new StudentRegisterNotification());

        return redirect()->back()->with('message','student registration succesful');
    }


    public function Guardian(Request $request): RedirectResponse
    {
          // Dump all request data and stop execution
    //dd($request->all());
    $request->validate([
        'FatherFullName' => ['required', 'string', 'max:255'],
        'Fatherfirstphonenumber' => ['required', 'string', 'max:10'],
        'Fathersecondphonenumber' => ['required', 'string', 'max:10'],
        'FatherOccupation' => ['nullable', 'string', 'max:255'],
        'Fatheremail' => ['required', 'string', 'email', 'max:255', 'unique:guardian,Fatheremail'],
        'FatherPhysicalAddress' => ['required', 'string', 'max:255'],
        'MotherFullName' => ['required', 'string', 'max:255'],
        'Motherfirstphonenumber' => ['required', 'string', 'max:15'],          
        'Mothersecondphonenumber' => ['required', 'string', 'max:15'],
        'MotherOccupation' => ['required', 'string', 'max:255'],
        'Motheremail' => ['required', 'string', 'email', 'max:255', 'unique:guardian,Motheremail'],
        'MotherPhysicalAddress' => ['required', 'string', 'max:255'],
        'GuardianFullName' => ['required', 'string', 'max:255'],
        'Relationtostudent' => ['required', 'string', 'max:255'],
        'Guardianfirstphonenumber' => ['required', 'string', 'max:10'],
        'Guardiansecondphonenumber' => ['required', 'string', 'max:10'],
        'password' => ['confirmed', Rules\Password::defaults()],
    ]);
    
        $guardian = guardian::create([
            'FatherFullName' => $request->FatherFullName,
            'Fatherfirstphonenumber' => $request->Fatherfirstphonenumber,
            'Fathersecondphonenumber' => $request->Fathersecondphonenumber,
            'FatherOccupation' => $request->FatherOccupation,
            'Fatheremail'=> $request->Fatheremail,
            'FatherPhysicalAddress' => $request->FatherPhysicalAddress,
            'MotherFullName' => $request->MotherFullName,   
            'Motherfirstphonenumber' => $request->Motherfirstphonenumber,       
            'Mothersecondphonenumber' => $request->Mothersecondphonenumber,
            'MotherOccupation' =>$request->MotherOccupation,
            'Motheremail' => $request->Motheremail,
            'GuardianFullName'   => $request->GuardianFullName,
            'Relationtostudent'   => $request->Relationtostudent,
            'Guardianfirstphonenumber' => $request->Guardianfirstphonenumber,
            'Guardiansecondphonenumber'  => $request->Guardiansecondphonenumber,
            'password' => Hash::make($request->password),
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','Guardian registration succesful');
    }

    public function registerstaff (Request $request): RedirectResponse
    {
        $request->validate([
            'staffFname' => ['required', 'string', 'max:255'],
            'staffMname' => ['required', 'string', 'max:255'],
            'staffLname' => ['required', 'string', 'max:255'],
            'staffDateofBirth' => ['string', 'max:255'],
            'staffPlaceofBirth' => ['required', 'string', 'max:255'],
            'staffNationality' => ['string', 'max:255'],
            'staffRegion' => ['required', 'string', 'max:255'],
            'staffDistrict' => ['required', 'string', 'max:255'],
            'staffCurrentresidence' => ['required', 'string', 'max:255'],
            'staffPreviousSchool' => ['required', 'string', 'max:255'],
            'staffnameofschool'   => ['required', 'string', 'max:255'],
            'email' =>  ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.staff::class],
            'class'   => ['required', 'string', 'max:255'],
            'staffRole'  => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'school_id' => ['required'],
           
        ]);
        
        $staff = staff::create([
            'staffFname' => $request->staffFname,
            'staffMname' => $request->staffMname,
            'staffLname' => $request->staffLname,
            'staffDateofBirth' => $request->staffDateofBirth,
            'staffPlaceofBirth' => $request->staffPlaceofBirth,
            'staffNationality' => $request->staffNationality,          
            'staffRegion' => $request->staffRegion,
            'staffDistrict' =>$request->staffDistrict,
            'staffCurrentresidence' => $request->staffCurrentresidence,
            'staffPreviousSchool'  => $request->staffPreviousSchool,
            'staffnameofschool'   => $request->staffnameofschool,
            'email'=> $request->email,
            'class'  => $request->class,
            'staffRole'  => $request->staffRole,
            'password' => Hash::make($request->password),
            'school_id' => $request->school_id,
        ]);

         /*event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);*/

        return redirect()->back()->with('message','staff registration succesful');
    }

    public function viewregistersubjects()
    {

      return view('viewregistersubject');
    }

    public function  storesubjects (Request $request): Redirectresponse
    {
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        $subjects = subjects::create([
            'name' =>$request->name,
        ]);
        return redirect()->back()->with('message','subject register succesful');

    }
    
    public function viewRegisterSubjectTeacher() {
        $staff = staff::all();
        //$getuser = user::all();
        $subjects = subjects::all();
        //$getschooolinformation = schoolinformation::all();
        
// Check the data in $getuser
    
        return view('RegisterSubjectTeacher', compact('subjects', 'staff'));
    }

  

    public function storeRegisterSubjectTeacher(Request $request): Redirectresponse
    {
         // Validate the input
    $request->validate([
        'staff_id' => 'required|exists:staff,id',
        'subjects_id' => 'required|exists:subjects,id',
    ]);

    \DB::table('teacher_subject')->insert([
        'staff_id' => $request->staff_id,
        'subjects_id' => $request->subjects_id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

        
        return redirect()->back()->with('message','register succefull');
    }


    public function createresult()
    {
        $staff = auth()->guard('staff')->user(); // Get the currently authenticated staff member using 'staff' guard
    
        // Ensure the authenticated user is a staff member and has one of the allowed roles
        $allowedRoles = ['Teacher', 'HeadTeacher', 'SecondHeadTeacher', 'Admin'];
        if (!$staff || !in_array($staff->staffRole, $allowedRoles)) {
            abort(403, 'Unauthorized action.');
        }
    
        // Fetch subjects associated with the staff member (assuming a relationship exists in the Staff model)
        $subjects = $staff->subjects;
    
        // Fetch students in the same school and class as the authenticated staff member
        $students = User::where('school_id', $staff->school_id)
                        ->where('class', $staff->class)
                        ->get();
    
        // Fetch all schools (assuming Schoolinformation model represents schools)
        $schools = Schoolinformation::all();
        $staff = staff::all();
    
        // Return the view with the fetched data
        return view('Testuploadresults', compact('subjects', 'students', 'schools' , 'staff'));
    }
    

    public function storeresult(Request $request)
{
    // Validate the incoming request data as arrays
    $request->validate([
        'user_id' => 'required|array',
        'user_id.*' => 'exists:users,id',
        'subject_id' => 'required|array',
        'subject_id.*' => 'exists:subjects,id',
        'staff_id' => 'required|exists:staff,id', // Ensure this checks for a valid staff ID
        'schoolinformation_id' => 'required|exists:staff,school_id', // Validate against school_id in the staff table
        'term' => 'required|array',
        'term.*' => 'in:first_midterm,semi_annual,second_midterm,annual',
        'academic_year' => 'required|array',
        'academic_year.*' => 'integer',
        'score' => 'required|array',
        'score.*' => 'integer|min:0|max:100',
    ]);

    // Loop through each entry in the array and create individual results
    foreach ($request->user_id as $index => $userId) {
        results::create([
            'users_id' => $userId,
            'subjects_id' => $request->subject_id[$index],
            'staff_id' => $request->staff_id,
            'schoolinformation_id' => $request->schoolinformation_id, // Use this value as the foreign key
            'term' => $request->term[$index],
            'academic_year' => $request->academic_year[$index],
            'score' => $request->score[$index],
        ]);
    }

    // Return a response or redirect
    return redirect()->back()->with('success', 'Results uploaded successfully!');
}


//show result 

public function showResults(Request $request)
{
    // Get the filtering criteria from the request
    $class = $request->input('class');
    $term = $request->input('term');
    $academicYear = $request->input('academic_year');

    // Get the authenticated student's ID
    $userId = auth()->user()->id;

    // Fetch results with school and class information, applying all filters
    $results = results::where('users_id', $userId)
                      ->whereHas('staff', function($query) use ($class) {
                          $query->where('class', $class); // Filter by class through staff relationship
                      })
                      ->where('term', $term)
                      ->where('academic_year', $academicYear)
                      ->with(['subject', 'schoolinformation'])
                      ->get();


                      // Calculate the average score for the filtered results
    $averageScore = results::where('users_id', $userId)
    ->whereHas('staff', function($query) use ($class) {
        $query->where('class', $class);
    })
    ->where('term', $term)
    ->where('academic_year', $academicYear)
    ->avg('score');

    // Pass results to the view
    return view('studentresults', compact('results', 'averageScore'));
}

public function resultreport(Request $request)
{
    // Get the authenticated teacher from the 'staff' guard
    $staff = Auth::guard('staff')->user();

    // Ensure the staff member is authenticated
    if (!$staff) {
        abort(403, 'Unauthorized action.');
    }

    // Get the school ID from the authenticated staff
    $schoolId = $staff->school_id;

    // Retrieve input values for filtering
    $class = $request->input('class');
    $term = $request->input('term');
    $academicYear = $request->input('academic_year');
    $positionType = $request->input('position_type');

    // Fetch student results from the same school
    $students = results::where('schoolinformation_id', $schoolId)
        ->with(['user', 'subject']) // Load related data
        ->when($class, function ($query) use ($class) {
            return $query->whereHas('user', function ($q) use ($class) {
                $q->where('class', $class);
            });
        })
        ->when($term, function ($query) use ($term) {
            return $query->where('term', $term);
        })
        ->when($academicYear, function ($query) use ($academicYear) {
            return $query->where('academic_year', $academicYear);
        })
        ->get();

    // Check if students exist
    if ($students->isEmpty()) {
        return response()->json(['message' => 'No data found'], 404);
    }

    // Calculate the average score for each student and include academic year
$studentsWithAverage = $students->groupBy('users_id')->map(function ($studentResults) {
    $averageScore = $studentResults->avg('score');
    $student = $studentResults->first()->user;
    $academicYear = $studentResults->first()->academic_year; // Get academic year from the results

    return [
        'user' => [
            'id' => $student->id,
            'name' => $student->Fname . ' ' . $student->Mname . ' ' . $student->Lname,
            'email' => $student->email,
            'class' => $student->class,
        ],
        'average_score' => $averageScore,
        'academic_year' => $academicYear, // Add academic year
        'subject_scores' => $studentResults->map(function ($result) {
            return [
                'subject' => $result->subject->name ?? 'N/A',
                'score' => $result->score,
            ];
        }),
    ];
});

// Group by class and academic year, sort, and assign positions
$studentsWithAverage = $studentsWithAverage->groupBy(function ($studentData) {
    return $studentData['user']['class'] . '_' . $studentData['academic_year']; // Combine class and academic year as key
})->map(function ($studentsInClassYear) {
    $position = 1;
    return $studentsInClassYear->sortByDesc('average_score')->values()->map(function ($studentData) use (&$position) {
        $studentData['position'] = $position++;
        return $studentData;
    });
})->flatten(1); // Flatten the collection to make it a single-level array

// Return the processed data in JSON format with positions included
//return response()->json($studentsWithAverage);
return view('resultreport', ['students' => $studentsWithAverage]);
}


public function createTimetable()
{
    // Get the school_id of the authenticated user
    $schoolId = auth()->guard('staff')->user()->school_id;

    // Fetch subjects and teachers belonging to the authenticated user's school
    $subjects = subjects::all(); // Ensure the Subject model has a school_id if needed
    $teachers = staff::where('school_id', $schoolId)->get(); 

    // Return the view with subjects and teachers data
    return view('timetable', compact('subjects', 'teachers'));
}

public function storeTimetable (Request $request)
{
    $request->validate([
        'schoolinformation_id' => 'required',
        'class_name' => 'required',
        'subject_id' => 'required|exists:subjects,id',
        'staff_id' => 'required|exists:staff,id', // New validation
        'day' => 'required|string',
        'start_time' => 'required|date_format:H:i',
        'end_time' => 'required|date_format:H:i|after:start_time',
    ]);

    //timetable::create
    
    timetable::create([
        'schoolinformation_id' => $request->input('schoolinformation_id'),
        'class_name' => $request->input('class_name'),
        'subject_id' => $request->input('subject_id'),
        'staff_id' => $request->input('staff_id'), // Store teacher ID
        'day' => $request->input('day'),
        'start_time' => $request->input('start_time'),
        'end_time' => $request->input('end_time'),
    ]);

    return redirect()->route('createTimetable')->with('success', 'Timetable created successfully.');
}

public function viewtimetable(Request $request)
{
    $schoolId = auth()->guard('staff')->user()->school_id;

    // Start query
    $query = timetable::where('schoolinformation_id', $schoolId);

    $staff = staff::where('school_id', $schoolId)->get();

    // Filter by class_name
    if ($request->has('class_name') && !empty($request->class_name)) {
        $query->where('class_name', $request->class_name);
    }

    // Filter by staff
    if ($request->has('staff_id') && !empty($request->staff_id)) {
        $query->where('staff_id', $request->staff_id);
    }

    // Filter by day (convert input to date format if provided)
    if ($request->has('day') && !empty($request->day)) {
        $query->whereDate('day', Carbon::parse($request->day)->format('Y-m-d'));
    }

    // Filter by subject
    if ($request->has('subject_id') && !empty($request->subject_id)) {
        $query->where('subject_id', $request->subject_id);
    }

    // Execute query and get results
    $timetable = $query->get();

    // Pass additional data for dropdown filters (staff and subjects)
  //  $staff = \App\Models\staff::all();

    $subjects = \App\Models\subjects::all();

    return view('viewtimetable', compact('timetable', 'staff', 'subjects'));
}


public function exportPdf(Request $request)
{
    $schoolId = auth()->guard('staff')->user()->school_id;

    // Start query
    $query = timetable::where('schoolinformation_id', $schoolId);

    $schoolName = \App\Models\schoolinformation::where('id', $schoolId)->value('SchoolName');

    // Apply filters
    if ($request->has('class_name') && !empty($request->class_name)) {
        $query->where('class_name', $request->class_name);
    }

    if ($request->has('staff_id') && !empty($request->staff_id)) {
        $query->where('staff_id', $request->staff_id);
    }

    if ($request->has('day') && !empty($request->day)) {
        $query->whereDate('day', Carbon::parse($request->day)->format('Y-m-d'));
    }

    if ($request->has('subject_id') && !empty($request->subject_id)) {
        $query->where('subject_id', $request->subject_id);
    }

    // Fetch the filtered timetable
    $timetable = $query->get();

    // Generate PDF
    $pdf = Pdf::loadView('timetable-pdf', compact('timetable','schoolName'));

    // Download the PDF
    return $pdf->download('timetable.pdf');
}


public function edit($id)
{
    $schoolId = auth()->guard('staff')->user()->school_id;
    $timetable = timetable::findOrFail($id);
    $staff = staff::where('school_id', $schoolId)->get(); 
    $subjects = \App\Models\subjects::all();

    return view('edit_timetable', compact('timetable', 'staff', 'subjects'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'class_name' => 'required',
        'subject_id' => 'required',
        'staff_id' => 'required',
        'day' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    $timetable = timetable::findOrFail($id);
    $timetable->class_name = $request->class_name;
    $timetable->subject_id = $request->subject_id;
    $timetable->staff_id = $request->staff_id;
    $timetable->day = $request->day;
    $timetable->start_time = $request->start_time;
    $timetable->end_time = $request->end_time;
    $timetable->save();

    return redirect()->route('viewtimetable')->with('success', 'Timetable updated successfully!');
}

//lesson plan 

public function lessonplanview()
{
    $staff = auth()->guard('staff')->user();
    $subjects = subjects::all();
    $school_id = auth()->guard('staff')->user()->school_id;


    return view('lessonplanview', [
        'staff' => $staff,
        'subjects' => $subjects,
        'school_id' => $school_id,
    ]);
}


 // Check the class to determine which table to use
 public function lessonplan(Request $request)
{
    // Check incoming data
    // Validate the incoming data
    $validatedData = $request->validate([
        'staff_id' => 'required|exists:staff,id',
        'school_id'=> 'required|exists:staff,school_id',
        'class' => 'required|string|max:255',
        'date' => ['required', 'regex:/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/'],
        'subject_id' => 'required|exists:subjects,id',
        'registeredgirls' => 'required|integer',
        'registeredboys' => 'required|integer',
        'presentgirls' => 'required|integer',
        'presentboys' => 'required|integer',
        'maincompetence' => 'required|string',
        'specificcompetence' => 'required|string',
        'mainactivity' => 'required|string',
        'specificactivity' => 'required|string',
        'teachingandlearningresources' => 'required|string',
        'references' => 'required|string',
        'IntroductionTime' => 'required|string',
        'IntroductionTeachingActivities' => 'required|string',
        'IntroductionLearningActivities' => 'required|string',
        'IntroductionAssessmentCriteria' => 'required|string',
        'CompetenceDevelopementTime' => 'required|string',
        'CompetenceDevelopementTeachingActivities' => 'required|string',
        'CompetenceDevelopementLearningActivities' => 'required|string',
        'CompetenceDevelopementAssessmentCriteria' => 'required|string',
        'DesignTime' => 'required|string',
        'DesignTeachingActivities' => 'required|string',
        'DesignLearningActivities' => 'required|string',
        'DesignAssessmentCriteria' => 'required|string',
        'RealisationTime' => 'required|string',
        'RealisationTeachingActivities' => 'required|string',
        'RealisationLearningActivities' => 'required|string',
        'RealisationAssessmentCriteria' => 'required|string',
        'Remarks' => 'nullable|string',
    ]);

    lessonplanstdiiitostdvi::create([
        'staff_id' => $request->input('staff_id'),
        'school_id' => $request->input('school_id'),
        'class' => $request->input('class'),
        'date' => $request->input('date'),
        'subject_id' => $request->input('subject_id'),
        'registeredgirls' => $request->input('registeredgirls'),
        'registeredboys' => $request->input('registeredboys'),
        'presentgirls' => $request->input('presentgirls'),
        'presentboys' => $request->input('presentboys'),
        'maincompetence' => $request->input('maincompetence'),
        'specificcompetence' => $request->input('specificcompetence'),
        'mainactivity' => $request->input('mainactivity'),
        'specificactivity' => $request->input('specificactivity'),
        'teachingandlearningresources' => $request->input('teachingandlearningresources'),
        'references' => $request->input('references'),
        'IntroductionTime' => $request->input('IntroductionTime'),
        'IntroductionTeachingActivities' => $request->input('IntroductionTeachingActivities'),
        'IntroductionLearningActivities' => $request->input('IntroductionLearningActivities'),
        'IntroductionAssessmentCriteria' => $request->input('IntroductionAssessmentCriteria'),
        'CompetenceDevelopementTime' => $request->input('CompetenceDevelopementTime'),
        'CompetenceDevelopementTeachingActivities' => $request->input('CompetenceDevelopementTeachingActivities'),
        'CompetenceDevelopementLearningActivities' => $request->input('CompetenceDevelopementLearningActivities'),
        'CompetenceDevelopementAssessmentCriteria' => $request->input('CompetenceDevelopementAssessmentCriteria'),
        'DesignTime' => $request->input('DesignTime'),
        'DesignTeachingActivities' => $request->input('DesignTeachingActivities'),
        'DesignLearningActivities' => $request->input('DesignLearningActivities'),
        'DesignAssessmentCriteria' => $request->input('DesignAssessmentCriteria'),
        'RealisationTime' => $request->input('RealisationTime'),
        'RealisationTeachingActivities' => $request->input('RealisationTeachingActivities'),
        'RealisationLearningActivities' => $request->input('RealisationLearningActivities'),
        'RealisationAssessmentCriteria' => $request->input('RealisationAssessmentCriteria'),
        'Remarks' => $request->input('Remarks'),
    ]);
    

   // Debugging output: This will show the validated data (if validation passes)
   //dd($validatedData);

   // Insert the filtered data into the lessonplanstdiiitostdvi table
  // lessonplanstdiiitostdvi::create($validatedData);

   return redirect()->route('lessonplanview')->with('success', 'Lesson plan stored successfully!');
}


    public function reportlessonplanview()
    {
        // Initialize an empty collection to avoid undefined variable issues
        $lessonPlans = collect();

        return view('reportlessonplan', compact('lessonPlans'));
    }

    public function searchLessonPlans(Request $request)
    {
        // Get the authenticated user's school_id
        $school_id = auth()->guard('staff')->user()->school_id;
    
        // Retrieve all subjects to populate the dropdown
        $getallsubjects = subjects::all();
    
        // Validate the search inputs
        $request->validate([
            'staffFname' => 'nullable|string|max:255',
            'staffMname' => 'nullable|string|max:255',
            'staffLname' => 'nullable|string|max:255',
            'date' => 'nullable|date',
            'class' => 'nullable|string|max:255',
            'subject_id' => 'nullable|integer|exists:subjects,id',
        ]);
    
        // Retrieve the search inputs
        $staffFname = $request->input('staffFname');
        $staffMname = $request->input('staffMname');
        $staffLname = $request->input('staffLname');
        $date = $request->input('date');
        $class = $request->input('class');
        $subject_id = $request->input('subject_id');
    
        // Perform the query with conditions
        $lessonPlans = DB::table('lessonplanstdiiitostdvi')
            ->join('staff', 'lessonplanstdiiitostdvi.staff_id', '=', 'staff.id')
            ->join('subjects', 'lessonplanstdiiitostdvi.subject_id', '=', 'subjects.id')
            ->select('lessonplanstdiiitostdvi.*', 'staff.staffFname', 'staff.staffMname', 'staff.staffLname', 'subjects.name as subject_name')
            ->where('lessonplanstdiiitostdvi.school_id', $school_id)
            ->when($staffFname, function ($query, $staffFname) {
                return $query->where('staff.staffFname', 'LIKE', "%{$staffFname}%");
            })
            ->when($staffMname, function ($query, $staffMname) {
                return $query->where('staff.staffMname', 'LIKE', "%{$staffMname}%");
            })
            ->when($staffLname, function ($query, $staffLname) {
                return $query->where('staff.staffLname', 'LIKE', "%{$staffLname}%");
            })
            ->when($date, function ($query, $date) {
                return $query->whereDate('lessonplanstdiiitostdvi.date', $date);
            })
            ->when($class, function ($query, $class) {
                return $query->where('lessonplanstdiiitostdvi.class', 'LIKE', "%{$class}%");
            })
            ->when($subject_id, function ($query, $subject_id) {
                return $query->where('lessonplanstdiiitostdvi.subject_id', $subject_id);
            })
            ->get();

    
        // Return the results to the view, including subjects
        return view('reportlessonplan',['lessonPlans' => $lessonPlans,
                                        'getallsubjects' => $getallsubjects
                                      ]); 

    }}



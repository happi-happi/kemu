<x-app-layout>
<div class="container">
    <h2 class="my-4">Search Lesson Plans</h2>

    <!-- Search Form -->
    <form method="POST" action="{{ route('searchLessonPlans') }}">
    @csrf
    <!-- Existing fields -->
    <div class="form-group col-md-12">
        <label for="staffFname">First Name:</label>
        <input type="text" name="staffFname" id="staffFname" class="form-control" placeholder="Enter first name" value="{{ old('staffFname') }}">
    </div>

    <div class="form-group col-md-12">
        <label for="staffMname">Middle Name:</label>
        <input type="text" name="staffMname" id="staffMname" class="form-control" placeholder="Enter middle name" value="{{ old('staffMname') }}">
    </div>

    <div class="form-group col-md-12">
        <label for="staffLname">Last Name:</label>
        <input type="text" name="staffLname" id="staffLname" class="form-control" placeholder="Enter last name" value="{{ old('staffLname') }}">
    </div>

    <!-- New Fields for Searching by Date, Class, and Subject -->
    <div class="form-group col-md-12">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ old('date') }}">
    </div>

    <div class="form-group col-md-12">
        <label for="class">Class:</label>
        <select name="class" id="class" class="form-control" required>
                    <option value="">Select Class</option>
                    <option value="Kindegerten">Kindergarten</option>
                    <option value="Nursery">Nursery</option>
                    <option value="Standardone">Standard One</option>
                    <option value="Standardtwo">Standard Two</option>
                    <option value="Standardthree">Standard Three</option>
                    <option value="Standardfour">Standard Four</option>
                    <option value="Standardfive">Standard Five</option>
                    <option value="Standardsix">Standard Six</option>
                    <option value="Standardseven">Standard Seven</option>
                    <option value="Formone">Form One</option>
                    <option value="Formtwo">Form Two</option>
                    <option value="Formthree">Form Three</option>
                    <option value="Formfour">Form Four</option>
                    <option value="Formfive">Form Five</option>
                    <option value="Formsix">Form Six</option>
                </select>
    </div>
    <br>

    <select name="subjects_id" id="subjects_id" class="form-control">
        <option value="">Select a Subject</option>
        @foreach ($getallsubjects as $getallsubjects)
            <option value="{{ $getallsubjects->id }}">{{ $getallsubjects->name }}</option>
        @endforeach
    </select>
   


    <button type="submit" class="btn btn-primary mt-3">Search</button>
</form>



    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Search Results -->
    <div class="mt-5">
        <h3>Lesson Plans</h3>

        @if($lessonPlans->isEmpty())
            <p class="text-muted">No lesson plans found for the specified criteria.</p>
        @else
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Subject</th>
                        <th>Staff Names</th>
                        <th>School ID</th>
                        <th>Subjectname</th>
                        <th>Registered Girls</th>
                        <th>Registered Boys</th>
                        <th>Present Girls</th>
                        <th>Present Boys</th>
                        <th>Main Competence</th>
                        <th>Specific Competence</th>
                        <th>Main Activity</th>
                        <th>Specific Activity</th>
                        <th>Teaching & Learning Resources</th>
                        <th>References</th>
                        <th>Introduction Time</th>
                        <th>Introduction Teaching Activities</th>
                        <th>Introduction Learning Activities</th>
                        <th>Introduction Assessment Criteria</th>
                        <th>Competence Development Time</th>
                        <th>Competence Development Teaching Activities</th>
                        <th>Competence Development Learning Activities</th>
                        <th>Competence Development Assessment Criteria</th>
                        <th>Design Time</th>
                        <th>Design Teaching Activities</th>
                        <th>Design Learning Activities</th>
                        <th>Design Assessment Criteria</th>
                        <th>Realisation Time</th>
                        <th>Realisation Teaching Activities</th>
                        <th>Realisation Learning Activities</th>
                        <th>Realisation Assessment Criteria</th>
                        <th>Remarks</th>
                        <th>Total periods</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($lessonPlans as $plan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $plan->class }}</td>
                            <td>{{ $plan->date }}</td>
                            <td>{{ $plan->subject_id }}</td>
                            <td>{{ $plan->staffFname }} {{ $plan->staffMname }} {{ $plan->staffLname }}</td>
                            <td>{{ $plan->school_id }}</td>
                            <td>{{ $plan->subject_name }}</td>
                            <td>{{ $plan->registeredgirls }}</td>
                            <td>{{ $plan->registeredboys }}</td>
                            <td>{{ $plan->presentgirls }}</td>
                            <td>{{ $plan->presentboys }}</td>
                            <td>{{ $plan->maincompetence }}</td>
                            <td>{{ $plan->specificcompetence }}</td>
                            <td>{{ $plan->mainactivity }}</td>
                            <td>{{ $plan->specificactivity }}</td>
                            <td>{{ $plan->teachingandlearningresources }}</td>
                            <td>{{ $plan->references }}</td>
                            <td>{{ $plan->IntroductionTime }}</td>
                            <td>{{ $plan->IntroductionTeachingActivities }}</td>
                            <td>{{ $plan->IntroductionLearningActivities }}</td>
                            <td>{{ $plan->IntroductionAssessmentCriteria }}</td>
                            <td>{{ $plan->CompetenceDevelopementTime }}</td>
                            <td>{{ $plan->CompetenceDevelopementTeachingActivities }}</td>
                            <td>{{ $plan->CompetenceDevelopementLearningActivities }}</td>
                            <td>{{ $plan->CompetenceDevelopementAssessmentCriteria }}</td>
                            <td>{{ $plan->DesignTime }}</td>
                            <td>{{ $plan->DesignTeachingActivities }}</td>
                            <td>{{ $plan->DesignLearningActivities }}</td>
                            <td>{{ $plan->DesignAssessmentCriteria }}</td>
                            <td>{{ $plan->RealisationTime }}</td>
                            <td>{{ $plan->RealisationTeachingActivities }}</td>
                            <td>{{ $plan->RealisationLearningActivities }}</td>
                            <td>{{ $plan->RealisationAssessmentCriteria }}</td>
                            <td>{{ $plan->Remarks }}</td>
                            <td>{{$staffCount}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</x-app-layout>

<x-app-layout>
<x-guest-layout>
    <div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <h2 class="text-center">Lesson Plan Submission</h2>
        <form method="POST" action="{{ route('lessonplan') }}" >
        @csrf
            <!-- Staff ID (Auto-filled from authentication) -->
            <input type="hidden" name="staff_id" value="{{ $staff->id }}">
            <input type="hidden" name="school_id" value="{{ $school_id }}">

            <!-- Class -->
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
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

            <!-- Date -->
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="time" name="date" id="date" class="form-control" required>
            </div>

            <!-- Subject -->
            <div class="mb-3">
                <label for="subject_id" class="form-label">Subject</label>
                <select name="subject_id" id="subject_id" class="form-control" required>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Registered Girls -->
            <div class="mb-3">
                <label for="registeredgirls" class="form-label">Registered Girls</label>
                <input type="number" name="registeredgirls" id="registeredgirls" class="form-control" required>
            </div>

            <!-- Registered Boys -->
            <div class="mb-3">
                <label for="registeredboys" class="form-label">Registered Boys</label>
                <input type="number" name="registeredboys" id="registeredboys" class="form-control" required>
            </div>

            <!-- Present Girls -->
            <div class="mb-3">
                <label for="presentgirls" class="form-label">Present Girls</label>
                <input type="number" name="presentgirls" id="presentgirls" class="form-control" required>
            </div>

            <!-- Present Boys -->
            <div class="mb-3">
                <label for="presentboys" class="form-label">Present Boys</label>
                <input type="number" name="presentboys" id="presentboys" class="form-control" required>
            </div>

            <!-- Main Competence -->
            <div class="mb-3">
                <label for="maincompetence" class="form-l abel">Main Competence</label>
                <textarea name="maincompetence" id="maincompetence" class="form-control" required></textarea>
            </div>

            <!-- Specific Competence -->
            <div class="mb-3">
                <label for="specificcompetence" class="form-label">Specific Competence</label>
                <textarea name="specificcompetence" id="specificcompetence" class="form-control" required></textarea>
            </div>

            <!-- Main Activity -->
            <div class="mb-3">
                <label for="mainactivity" class="form-label">Main Activity</label>
                <textarea name="mainactivity" id="mainactivity" class="form-control" required></textarea>
            </div>

            <!-- Specific Activity -->
            <div class="mb-3">
                <label for="specificactivity" class="form-label">Specific Activity</label>
                <textarea name="specificactivity" id="specificactivity" class="form-control" required></textarea>
            </div>

            <!-- Teaching and Learning Resources -->
            <div class="mb-3">
                <label for="teachingandlearningresources" class="form-label">Teaching and Learning Resources</label>
                <textarea name="teachingandlearningresources" id="teachingandlearningresources" class="form-control" required></textarea>
            </div>

            <!-- References -->
            <div class="mb-3">
                <label for="references" class="form-label">References</label>
                <textarea name="references" id="references" class="form-control" required></textarea>
            </div>

                  <!-- IntroductionTime -->
            <div class="mb-3">
                <label for="IntroductionTime" class="form-label">Introduction Time</label>
                <textarea name="IntroductionTime" id="IntroductionTime" class="form-control" required></textarea>
            </div>

                  <!-- IntroductionTime -->
                <div class="mb-3">
                <label for="IntroductionTeachingActivities" class="form-label">Introduction Teaching Activities</label>
                <textarea name="IntroductionTeachingActivities" id="IntroductionTeachingActivities" class="form-control" required></textarea>
            </div>

                 <!-- IntroductionLearningActivities-->
               <div class="mb-3">
             <label for="IntroductionLearningActivities" class="form-label">Introduction Learning Activities</label>
               <textarea name="IntroductionLearningActivities" id="IntroductionLearningActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="IntroductionAssessmentCriteria" class="form-label">Introduction Assessment Criteria</label>
               <textarea name="IntroductionAssessmentCriteria" id="IntroductionAssessmentCriteria" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="CompetenceDevelopementTime" class="form-label">Competence Developement Time</label>
               <textarea name="CompetenceDevelopementTime" id="CompetenceDevelopementTime" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="CompetenceDevelopementTeachingActivities" class="form-label">Competence Developement Teaching Activities</label>
               <textarea name="CompetenceDevelopementTeachingActivities" id="CompetenceDevelopementTeachingActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="CompetenceDevelopementLearningActivities" class="form-label">Competence Developement Learning Activities</label>
               <textarea name="CompetenceDevelopementLearningActivities" id="CompetenceDevelopementLearningActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="CompetenceDevelopementLearningActivities" class="form-label">Competence Developement Learning Activities</label>
               <textarea name="CompetenceDevelopementLearningActivities" id="CompetenceDevelopementLearningActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="CompetenceDevelopementAssessmentCriteria" class="form-label">Competence Developement Assessment Criteria</label>
               <textarea name="CompetenceDevelopementAssessmentCriteria" id="CompetenceDevelopementAssessmentCriteria" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="DesignTime" class="form-label">DesignTime</label>
               <textarea name="DesignTime" id="DesignTime" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="DesignTeachingActivities" class="form-label">DesignTime</label>
               <textarea name="DesignTeachingActivities" id="DesignTeachingActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="DesignLearningActivities" class="form-label">Design Learning Activities</label>
               <textarea name="DesignLearningActivities" id="DesignLearningActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="DesignAssessmentCriteria" class="form-label">Design Assessment Criteria</label>
               <textarea name="DesignAssessmentCriteria" id="DesignAssessmentCriteria" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="RealisationTime" class="form-label">Realisation Time</label>
               <textarea name="RealisationTime" id="RealisationTime" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="RealisationTeachingActivities" class="form-label">Realisation Teaching Activities</label>
               <textarea name="RealisationTeachingActivities" id="RealisationTeachingActivities" class="form-control" required></textarea>
            </div>
            
            <div class="mb-3">
             <label for="RealisationLearningActivities" class="form-label">Realisation Learning Activities</label>
               <textarea name="RealisationLearningActivities" id="RealisationLearningActivities" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
             <label for="RealisationAssessmentCriteria" class="form-label">RealisationAssessmentCriteria</label>
               <textarea name="RealisationAssessmentCriteria" id="RealisationAssessmentCriteria" class="form-control" required></textarea>
            </div>
<!--  -->

            <!-- Remarks -->
            <div class="mb-3">
                <label for="Remarks" class="form-label">Remarks</label>
                <textarea name="Remarks" id="Remarks" class="form-control"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit Lesson Plan</button>
            </div>
        </form>
    </div>
</x-app-layout>
</x-guest-layout>

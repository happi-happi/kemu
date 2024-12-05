<x-app-layout>
    <x-guest-layout>

<form method="POST" action="{{ route('storeTimetable') }}">
    @csrf
    <div class="form-group">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <input type="hidden" name="schoolinformation_id" value="{{ auth()->guard('staff')->user()->school_id }}">

    <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" name="class_name" id="class" aria-label="Default select example">
                    <option value="">Select Class</option>
                    <option value="Kindegerten">Kindergarten</option>
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
                    <option value="FinanceDepartment">Finance Department</option>
                    <option value="TeacherDepartment">Teacher Department</option>
                </select>
            </div>
    </div>

    <div class="form-group">
        <label for="subject_id">Subject</label>
        <select name="subject_id" id="subject_id" class="form-control" required>
            <option value="">Select Subject</option>
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="teacher_id">Teacher</label>
        <select name="staff_id" id="staff_id" class="form-control" required>
            <option value="">Select Teacher</option>
            @foreach($teachers as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->staffFname }} {{ $teacher->staffMname }} {{ $teacher->staffLname }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="day">Day</label>
        <input type="date" name="day" id="day" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="start_time">Start Time</label>
        <input type="time" name="start_time" id="start_time" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="end_time">End Time</label>
        <input type="time" name="end_time" id="end_time" class="form-control" required>
    </div>
    <br>

    <button type="submit" class="btn btn-secondary">Create Timetable</button>
</form>
</x-guest-layout>
</x-app-layout>
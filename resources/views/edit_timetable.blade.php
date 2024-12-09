
<x-app-layout>
<x-guest-layout>
    <h2>Edit Timetable</h2>

    <form action="{{ route('timetable.update', $timetable->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="col-md-3">
    <label for="class" class="form-label">Class</label>
    <select class="form-select" name="class_name" id="class" required>
        <option value="">Select Class</option>
        <option value="Kindegerten" {{ $timetable->class_name == 'Kindegerten' ? 'selected' : '' }}>Kindergarten</option>
        <option value="Standardone" {{ $timetable->class_name == 'Standardone' ? 'selected' : '' }}>Standard One</option>
        <option value="Standardtwo" {{ $timetable->class_name == 'Standardtwo' ? 'selected' : '' }}>Standard Two</option>
        <option value="Standardthree" {{ $timetable->class_name == 'Standardthree' ? 'selected' : '' }}>Standard Three</option>
        <option value="Standardfour" {{ $timetable->class_name == 'Standardfour' ? 'selected' : '' }}>Standard Four</option>
        <option value="Standardfive" {{ $timetable->class_name == 'Standardfive' ? 'selected' : '' }}>Standard Five</option>
        <option value="Standardsix" {{ $timetable->class_name == 'Standardsix' ? 'selected' : '' }}>Standard Six</option>
        <option value="Standardseven" {{ $timetable->class_name == 'Standardseven' ? 'selected' : '' }}>Standard Seven</option>
        <option value="Formone" {{ $timetable->class_name == 'Formone' ? 'selected' : '' }}>Form One</option>
        <option value="Formtwo" {{ $timetable->class_name == 'Formtwo' ? 'selected' : '' }}>Form Two</option>
        <option value="Formthree" {{ $timetable->class_name == 'Formthree' ? 'selected' : '' }}>Form Three</option>
        <option value="Formfour" {{ $timetable->class_name == 'Formfour' ? 'selected' : '' }}>Form Four</option>
        <option value="Formfive" {{ $timetable->class_name == 'Formfive' ? 'selected' : '' }}>Form Five</option>
        <option value="Formsix" {{ $timetable->class_name == 'Formsix' ? 'selected' : '' }}>Form Six</option>
        <option value="FinanceDepartment" {{ $timetable->class_name == 'FinanceDepartment' ? 'selected' : '' }}>Finance Department</option>
        <option value="TeacherDepartment" {{ $timetable->class_name == 'TeacherDepartment' ? 'selected' : '' }}>Teacher Department</option>
    </select>
</div>
<br>

        <label for="subject_id">Subject:</label>
        <select name="subject_id" id="subject_id">
            @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $timetable->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select><br><br>

        <label for="staff_id">Teacher:</label>
        <select name="staff_id" id="staff_id">
            @foreach($staff as $teacher)
                <option value="{{ $teacher->id }}" {{ $timetable->staff_id == $teacher->id ? 'selected' : '' }}>
                    {{ $teacher->staffFname }} {{ $teacher->staffLname }}
                </option>
            @endforeach
        </select><br><br>

        <label for="day">Day:</label>
        <input type="date" name="day" id="day" value="{{ $timetable->day }}"><br><br>

        <label for="start_time">Start Time:</label>
        <input type="time" name="start_time" id="start_time" value="{{ $timetable->start_time }}" required><br><br>

        <label for="end_time">End Time:</label>
        <input type="time" name="end_time" id="end_time" value="{{ $timetable->end_time }}" required><br><br>

        <button type="submit" class="btn btn-primary ">Update</button>
    </form>

</x-guest-layout>
</x-app-layout>

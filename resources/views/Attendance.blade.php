<x-app-layout>
    <form action="{{ route('Attendance') }}" method="POST">
        @csrf
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Fname</th>
                    <th>Mname</th>
                    <th>Lname</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentAttendance as $student)
                <tr>
                    <!-- Hidden field for student_id -->
                    <input type="hidden" name="student_id[]" value="{{ $student->id }}">

                    <!-- Hidden field for teacher_id -->
                    <input type="hidden" name="teacher_id[]" value="{{ auth()->guard('staff')->user()->id }}">

                    <!-- Hidden field for schoolinformation_id -->
                    <input type="hidden" name="schoolinformation_id[]" value="{{ auth()->guard('staff')->user()->school_id }}">

                    <!-- Hidden field for current date -->
                    <input type="hidden" name="date[]" id="current-date" value="">

                    <!-- Display student information -->
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->Fname }}</td>
                    <td>{{ $student->Mname }}</td>
                    <td>{{ $student->Lname }}</td>

                    <!-- Radio buttons for status (only one can be selected per student) -->
                    <td>
                        <label>Present</label>
                        <input type="radio" name="status[{{ $student->id }}]" value="present" class="attendance-checkbox">

                        <label>Absent</label>
                        <input type="radio" name="status[{{ $student->id }}]" value="absent" class="attendance-checkbox">

                        <label>Late</label>
                        <input type="radio" name="status[{{ $student->id }}]" value="late" class="attendance-checkbox">
                    </td>
                </tr>
                @endforeach
            </tbody>
              
            <button type="submit" class="btn btn-success">Submit</button>
        </table>
    </form>

<script>
    // Set the current date to the hidden input field
    document.addEventListener("DOMContentLoaded", function() {
        // Get the current date in the format YYYY-MM-DD
        const currentDate = new Date().toISOString().split('T')[0]; // Format to YYYY-MM-DD
        document.querySelectorAll('input[name="date[]"]').forEach(function(input) {
            input.value = currentDate; // Set the current date as the value of the hidden input
        });
    });
</script>

</x-app-layout>

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
                <!-- Hidden field for teacher_id -->
                <input type="hidden" name="teacher_id[]" value="{{ $userId }}">

                <!-- Hidden field for user_id -->
                <input type="hidden" name="user_id[]" value="{{ $student->id }}">

                <!-- Display student information -->
                <td>{{ $student->id }}</td>
                <td>{{ $student->Fname }}</td>
                <td>{{ $student->Mname }}</td>
                <td>{{ $student->Lname }}</td>

                <!-- Status checkboxes -->
                <td>
                    <label>Present</label>
                    <input type="checkbox" name="status[{{ $student->id }}][]" value="present">

                    <label>Absent</label>
                    <input type="checkbox" name="status[{{ $student->id }}][]" value="absent">

                    <label>Late</label>
                    <input type="checkbox" name="status[{{ $student->id }}][]" value="late">
                </td>

                <!-- Hidden field for nameofschool -->
                <input type="hidden" name="nameofschool[]" value="{{ Auth::user()->nameofschool }}">
            </tr>
        @endforeach
        </tbody>
          
            <button type="submit" class="btn btn-success">Submit</button>
     
    </table>
</form>


<script>
    document.querySelectorAll('.attendance-checkbox').forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Uncheck all checkboxes in the same row
            const row = this.closest('tr');
            row.querySelectorAll('.attendance-checkbox').forEach(function(cb) {
                if (cb !== checkbox) {
                    cb.checked = false;
                }
            });
        });
    });
</script>
</x-app-layout>


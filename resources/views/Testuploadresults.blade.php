<x-app-layout>
      <!-- Registration Form -->
      @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <x-guest-layout>
  
        <div class="container">

        
            <h2>Upload Results</h2>

            <!-- Form to submit the data -->
            <form action="{{ route('storeresult') }}" method="POST">
                @csrf

                <!-- Hidden fields for staff_id and schoolinformation_id (outside loop) -->
                <input type="hidden" name="staff_id" value="{{ auth()->guard('staff')->user()->id }}">
                <input type="hidden" name="schoolinformation_id" value="{{ auth()->guard('staff')->user()->school_id }}">

                <!-- Table to display Students, Subjects, and other form elements -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Subject</th>
                            <th>Term</th>
                            <th>Academic Year</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->Fname }} {{ $student->Mname }} {{ $student->Lname }}</td>

                                <!-- Array format for user_id to match with controller validation -->
                                <td><input type="hidden" name="user_id[]" value="{{ $student->id }}">
                                    {{ $student->id }}
                                </td>

                                <td>
                                    <select name="subject_id[]" class="form-control" required>
                                        @foreach($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <select name="term[]" class="form-control" required>
                                        <option value="first_midterm">First Midterm</option>
                                        <option value="semi_annual">Semi Annual</option>
                                        <option value="second_midterm">Second Midterm</option>
                                        <option value="annual">Annual</option>
                                    </select>
                                </td>

                                <td>
                                    <input type="number" name="academic_year[]" class="form-control academic-year" required readonly>
                                </td>

                                <td>
                                    <input type="number" name="score[]" class="form-control" required min="0" max="100">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Submit Results</button>
            </form>
        </div>

        <script>
            // Set current year in each academic year input field
            const currentYear = new Date().getFullYear();
            document.querySelectorAll('.academic-year').forEach(input => {
                input.value = currentYear;
            });
        </script>

    </x-guest-layout>
</x-app-layout>

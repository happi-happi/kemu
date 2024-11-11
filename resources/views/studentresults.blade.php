<x-app-layout>
<x-guest-layout>
    <div class="container">
        <h2>Your Results</h2>

        <!-- Form for filtering -->
        <form method="GET" action="{{ route('showresults') }}">
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" name="class" id="class" aria-label="Default select example">
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

            <div class="mb-3">
                <label for="term" class="form-label">Term</label>
                <select name="term" class="form-control" id="term">
                    <option value="">Select Term</option>
                    <option value="first_midterm">First Midterm</option>
                    <option value="semi_annual">Semi Annual</option>
                    <option value="second_midterm">Second Midterm</option>
                    <option value="annual">Annual</option>
                </select>
            </div>

            <div>
        <input type="month" id="academicYear" name="academic_year" class="form-control" placeholder="Select Academic Year">
    </div>
        <br>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        @if(isset($averageScore))
            <p><strong>Average Score:</strong> {{ number_format($averageScore, 2) }}</p>
        @endif

        @if($results->isEmpty())
            <p>No results found.</p>
        @else
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Term</th>
                        <th>Academic Year</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $result)
                        <tr>
                            <td>{{ $result->subject->name }}</td>
                            <td>{{ ucfirst($result->term) }}</td>
                            <td>{{ $result->academic_year }}</td>
                            <td>{{ $result->score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
<script>
    document.getElementById('academicYear').addEventListener('change', function () {
    const year = this.value.split('-')[0]; // Extracts only the year part
    console.log('Selected Year:', year);
});
</script>

</x-guest-layout>
</x-app-layout>

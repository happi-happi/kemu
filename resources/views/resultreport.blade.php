<x-app-layout>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="container">
        <h2>Students from Your School and Their Results</h2> <br>
 <button>
 <select class="form-select" name="class"  aria-label="Default select example">
  <option selected>Filter position </option>
  <option value="Kindegerten">Student position</option>
  <option value="Standardone">Subject position</option>
</select>
</button>
<br><br>

        <form method="GET" action="{{ route('resultreport') }}"> <!-- Update the route name accordingly -->
            <div class="row mb-3">
                <div class="col">
                 <!--   <input type="text" name="class" class="form-control" placeholder="Class" value="{{ request('class') }}"> -->
                        
 <select class="form-select" name="class"  aria-label="Default select example">
  <option selected>Select Class</option>
  <option value="NotClassTeacher">Not Class Teacher</option>
  <option value="Kindegerten">Kindegerten</option>
  <option value="Standardone">Standard one</option>
  <option value="Standardtwo">Standard two</option>
  <option value="Standardthree">Standard three</option>
  <option value="Standardfour">Standard four</option>
  <option value="Standardfive">Standard five</option>
  <option value="Standardsix">Standard six</option>
  <option value="Standardseven">Standard seven</option>
  <option value="Formone">Form one</option>
  <option value="Formtwo">Form two</option>
  <option value="Formthree">Form three</option>
  <option value="Formfour">Form four</option>
  <option value="Formfive">Form five</option>
  <option value="Formsix">Form six</option>
  <option value="FinanceDepartment">Finance Department</option>
  <option value="TeacherDepartment">TeacherDepartment</option>
  <option value="TeacherDepartment">Academic Teacher</option>
  <option value="HeadTeacher">HeadTeacher</option>
  <option value="SecondHeadTeacher">Second HeadTeacher</option>
</select>
                </div>
    <div class="col">
     <select name="term" class="form-control" required>
     <option selected>Select Term </option>
       <option value="first_midterm">First Midterm</option>
     <option value="semi_annual">Semi Annual</option>
        <option value="second_midterm">Second Midterm</option>
     <option value="annual">Annual</option>
                                    </select>
                </div>
                <div class="col">
                    <input type="text" name="academic_year" class="form-control" placeholder="Academic Year" value="{{ request('academic_year') }}">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <h2>Student Results</h2>
<table class="table">
    <thead>
        <tr>
            <th>Class</th>
            <th>Academic Year</th>
            <th>Name</th>
            <th>Email</th>
            <th>Average Score</th>
            <th>Position</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student['user']['class'] }}</td>
                <td>{{ $student['academic_year'] }}</td>
                <td>{{ $student['user']['name'] }}</td>
                <td>{{ $student['user']['email'] }}</td>
                <td>{{ $student['average_score'] }}</td>
                <td>{{ $student['position'] }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalScores{{ $loop->index }}">
                        Student Subject Scores
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="modalScores{{ $loop->index }}" tabindex="-1" aria-labelledby="modalScoresLabel{{ $loop->index }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalScoresLabel{{ $loop->index }}">{{ $student['user']['name'] }} - Subject Scores</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h6>Subject Scores:</h6>
                            <ul>
                                @foreach ($student['subject_scores'] as $subjectScore)
                                    <li>{{ $subjectScore['subject'] }}: {{ $subjectScore['score'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>

</div>

    </div>
</x-app-layout>

<x-app-layout>
   
    <form method="GET" action="{{ route('viewtimetable') }}">
        <div class="row mb-3">
            <!-- Class Name Filter -->
            <div class="col-md-3">
                <label for="class" class="form-label">Class</label>
                <select class="form-select" name="class_name" id="class">
                    <option value="">Select Class</option>
                    <option value="Kindegerten" {{ request('class_name') == 'Kindegerten' ? 'selected' : '' }}>Kindergarten</option>
                    <option value="Standardone" {{ request('class_name') == 'Standardone' ? 'selected' : '' }}>Standard One</option>
                    <option value="Standardtwo" {{ request('class_name') == 'Standardtwo' ? 'selected' : '' }}>Standard Two</option>
                    <option value="Standardthree" {{ request('class_name') == 'Standardthree' ? 'selected' : '' }}>Standard Three</option>
                    <option value="Standardfour" {{ request('class_name') == 'Standardfour' ? 'selected' : '' }}>Standard Four</option>
                    <option value="Standardfive" {{ request('class_name') == 'Standardfive' ? 'selected' : '' }}>Standard Five</option>
                    <option value="Standardsix" {{ request('class_name') == 'Standardsix' ? 'selected' : '' }}>Standard Six</option>
                    <option value="Standardseven" {{ request('class_name') == 'Standardseven' ? 'selected' : '' }}>Standard Seven</option>
                    <option value="Formone" {{ request('class_name') == 'Formone' ? 'selected' : '' }}>Form One</option>
                    <option value="Formtwo" {{ request('class_name') == 'Formtwo' ? 'selected' : '' }}>Form Two</option>
                    <option value="Formthree" {{ request('class_name') == 'Formthree' ? 'selected' : '' }}>Form Three</option>
                    <option value="Formfour" {{ request('class_name') == 'Formfour' ? 'selected' : '' }}>Form Four</option>
                    <option value="Formfive" {{ request('class_name') == 'Formfive' ? 'selected' : '' }}>Form Five</option>
                    <option value="Formsix" {{ request('class_name') == 'Formsix' ? 'selected' : '' }}>Form Six</option>
                    <option value="FinanceDepartment" {{ request('class_name') == 'FinanceDepartment' ? 'selected' : '' }}>Finance Department</option>
                    <option value="TeacherDepartment" {{ request('class_name') == 'TeacherDepartment' ? 'selected' : '' }}>Teacher Department</option>
                </select>
            </div>

            <!-- Other Filters -->
            <div class="col-md-3">
                <label for="staff" class="form-label">Teacher</label>
                <select class="form-select" name="staff_id" id="staff">
                    <option value="">Select Teacher</option>
                    @foreach($staff as $teacher)
                        <option value="{{ $teacher->id }}" {{ request('staff_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->staffFname }} {{ $teacher->staffMname }} {{ $teacher->staffLname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <label for="day" class="form-label">Day</label>
                <input type="date" name="day" class="form-control" value="{{ request('day') }}">
            </div>

            <div class="col-md-2">
                <label for="subject" class="form-label">Subject</label>
                <select class="form-select" name="subject_id" id="subject">
                    <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ request('subject_id') == $subject->id ? 'selected' : '' }}>
                            {{ $subject->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary mt-4">Filter</button>
            </div>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Class</th>
                <th>Subject</th>
                <th>Teacher</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            @forelse($timetable as $entry)
                <tr>
                    <td>{{ $entry->class_name }}</td>
                    <td>{{ $entry->subject->name }}</td>
                    <td>{{ $entry->staff->staffFname }} {{ $entry->staff->staffMname }} {{ $entry->staff->staffLname }}</td>
                    <td>{{ \Carbon\Carbon::parse($entry->day)->format('l, F j, Y') }}</td>
                    <td>{{ $entry->start_time }}</td>
                    <td>{{ $entry->end_time }}</td>
                    <td>
                    <a href="{{ route('timetable.edit', $entry->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No timetable entries found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

 <form method="GET" action="{{ route('timetable.export-pdf') }}">
    <input type="hidden" name="class_name" value="{{ request('class_name') }}">
    <input type="hidden" name="staff_id" value="{{ request('staff_id') }}">
    <input type="hidden" name="day" value="{{ request('day') }}">
    <input type="hidden" name="subject_id" value="{{ request('subject_id') }}">
    <button type="submit" class="btn btn-primary">Export as PDF</button>
</form>

</x-app-layout>

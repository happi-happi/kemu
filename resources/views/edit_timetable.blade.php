<!DOCTYPE html>
<html>
<head>
    <title>Edit Timetable</title>
</head>
<body>
    <h2>Edit Timetable</h2>

    <form action="{{ route('timetable.update', $timetable->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="class_name">Class:</label>
        <input type="text" name="class_name" id="class_name" value="{{ $timetable->class_name }}" required><br><br>

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

        <button type="submit">Update</button>
    </form>
</body>
</html>

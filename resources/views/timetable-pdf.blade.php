<!DOCTYPE html>
<html>
<head>
  
    <title>Timetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
            <!-- Banner -->
            <div style="text-align: center; margin-bottom: 20px;">
        <img src="{{ public_path('images/banner.jpg') }}" alt="School Banner" style="width: 50%; height: auto;">
        <h1 style="margin: 0;">{{ $schoolName}} Secondary school</h1>
        <p> Official Timetable</p>
    </div>
   
</div>

    <table>
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
            @foreach($timetable as $entry)
                <tr>
                    <td>{{ $entry->class_name }}</td>
                    <td>{{ $entry->subject->name }}</td>
                    <td>{{ $entry->staff->staffFname }} {{ $entry->staff->staffMname }} {{ $entry->staff->staffLname }}</td>
                    <td>{{ \Carbon\Carbon::parse($entry->day)->format('l, F j, Y') }}</td>
                    <td>{{ $entry->start_time }}</td>
                    <td>{{ $entry->end_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

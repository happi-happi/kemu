<!DOCTYPE html>
<x-app-layout>
<div class="container mt-6">
    <div class="row">
      <div class="col-md-10">
<html>
<head>
    <title>Standard Four First Midterm Data</title>
</head>
<body>

<p>Your Comments</p>
<table class="table   table-striped table-bordered">
    <thead>
        <tr>
            <th>Parent of</th>
            <th>Mycomment</th>
           
        </tr>
    </thead>
    <tbody>
@foreach($comments as $comment)
<tr>
    <td>{{ $comment->user->Fname }} {{ $comment->user->Mname }} {{ $comment->user->Lname }}</td>
    <td>{{ $comment->Comment }}</td>
</tr>
@endforeach
</tbody>
</table>

</body>
</html>
</div></div></div>
</x-app-layout>
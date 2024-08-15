<x-app-layout>

<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('AdminStudentFirstMidtermresult')}}">Admin Student first Midtermresult</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardfiveFM')}}">Admin standard five FirstMidterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardfiveSM')}}">Admin standard five  Second Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsixFM')}}">Admin standard six  first  Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsixSM')}}">Admin standard  six   second  Midterm </a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenFM')}}">Admin standard seven  first  Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenSM')}}">Admin standard  seven   second  Midterm </a></li>
  </ul>
</div> 

<table class="table table-hover  table-bordered table-striped">
    <p>Standard four second midterm   table</p>
<thead >
  <tr>
      <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>Arabic</th> 
      <th>CivicsandMorals</th>
      <th>English</th>
      <th>EDK</th> 
      <th>Mathematics</th>
      <th>Science</th>
      <th>Socialsstudies</th>
      <th>Kiswahili</th>
      <th>Action</th>

  </tr>
  </thead>
  <tbody>
@foreach ($standardfoursecondsemester as $standardfoursecondsemester )
<tr>
<td>{{$standardfoursecondsemester ->Fname}}</td>
<td>{{$standardfoursecondsemester ->Mname }}</td>
<td>{{$standardfoursecondsemester->Lname}}</td>
<td>{{$standardfoursecondsemester->Arabic}}</td>
<td>{{$standardfoursecondsemester ->CivicsandMorals}}</td>
<td>{{$standardfoursecondsemester->English}}</td>
<td>{{$standardfoursecondsemester->EDK}}</td>
<td>{{$standardfoursecondsemester->Mathematics}}</td>
<td>{{$standardfoursecondsemester ->Science}}</td>
<td>{{$standardfoursecondsemester ->Socialsstudies}}</td>
<td>{{$standardfoursecondsemester->Kiswahili}}</td>
<td><a href="{{ route('AdminStudentsecondMidtermresult', ['id' => $standardfoursecondsemester ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>

<table class="table table-hover  table-bordered table-striped">
    <p>Standard four annual   table</p>
<thead >
  <tr>
      <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>Arabic</th> 
      <th>CivicsandMorals</th>
      <th>English</th>
      <th>EDK</th> 
      <th>Mathematics</th>
      <th>Science</th>
      <th>Socialsstudies</th>
      <th>Kiswahili</th>
      <th>Action</th>

  </tr>
  </thead>
  <tbody>
@foreach ($standardfourannual as $standardfourannual )
<tr>
<td>{{$standardfourannual ->Fname}}</td>
<td>{{$standardfourannual ->Mname }}</td>
<td>{{$standardfourannual->Lname}}</td>
<td>{{$standardfourannual->Arabic}}</td>
<td>{{$standardfourannual ->CivicsandMorals}}</td>
<td>{{$standardfourannual->English}}</td>
<td>{{$standardfourannual->EDK}}</td>
<td>{{$standardfourannual->Mathematics}}</td>
<td>{{$standardfourannual->Science}}</td>
<td>{{$standardfourannual ->Socialsstudies}}</td>
<td>{{$standardfourannual->Kiswahili}}</td>
<td><a href="{{ route('AdminStudentannualresult', ['id' => $standardfourannual ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
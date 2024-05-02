<x-app-layout>

<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('AdminStudentFirstMidtermresult')}}">Admin Student first Midtermresult</a></li>
    <li><a class="dropdown-item" href="{{route('AdminStudentSecondMidtermresult')}}">Admin Student Second Midtermresult</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardfiveFM')}}">Admin standard five FirstMidterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardfiveSM')}}">Admin standard five  Second Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsixSM')}}">Admin standard  six   second  Midterm </a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenFM')}}">Admin standard seven  first  Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenSM')}}">Admin standard  seven   second  Midterm </a></li>
  </ul>
</div> 

<table class="table table-hover  table-bordered table-striped">
    <p>Standard six  firt midterm   table</p>
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
@foreach ($data  as $data  )
<tr>
<td>{{$data  ->Fname}}</td>
<td>{{$data  ->Mname }}</td>
<td>{{$data ->Lname}}</td>
<td>{{$data ->Arabic}}</td>
<td>{{$data  ->CivicsandMorals}}</td>
<td>{{$data ->English}}</td>
<td>{{$data ->EDK}}</td>
<td>{{$data ->Mathematics}}</td>
<td>{{$data  ->Science}}</td>
<td>{{$data  ->Socialsstudies}}</td>
<td>{{$data ->Kiswahili}}</td>
<td><a href="{{ route('UpdateAdminStudentsixfirstMidtermresult', ['id' => $data ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>

<table class="table table-hover  table-bordered table-striped">
    <p>Standard six  semi  annual   table</p>
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
@foreach ($standardsix_semi_annual as $standardsix_semi_annual)
<tr>
<td>{{$standardsix_semi_annual ->Fname}}</td>
<td>{{$standardsix_semi_annual ->Mname }}</td>
<td>{{$standardsix_semi_annual->Lname}}</td>
<td>{{$standardsix_semi_annual->Arabic}}</td>
<td>{{$standardsix_semi_annual->CivicsandMorals}}</td>
<td>{{$standardsix_semi_annual->English}}</td>
<td>{{$standardsix_semi_annual->EDK}}</td>
<td>{{$standardsix_semi_annual->Mathematics}}</td>
<td>{{$standardsix_semi_annual->Science}}</td>
<td>{{$standardsix_semi_annual ->Socialsstudies}}</td>
<td>{{$standardsix_semi_annual->Kiswahili}}</td>
<td><a href="{{ route('AdminStudentsixsemiannualresult', ['id' => $standardsix_semi_annual ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
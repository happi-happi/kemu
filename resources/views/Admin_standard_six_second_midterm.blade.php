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
    <li><a class="dropdown-item" href="{{route('AdminstandardsixFM')}}">Admin standard six  first  Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenFM')}}">Admin standard seven  first  Midterm</a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenSM')}}">Admin standard  seven   second  Midterm </a></li>
  </ul>
</div> 
<table class="table">
    <p>Standard six  second midterm   table</p>
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
<td><a href="{{ route('UpdateAdminStudentsixSMresult', ['id' => $data ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>

<table class="table">
    <p>Standard six  annual   table</p>
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
@foreach ($standardsix_annual as $standardsix_annual )
<tr>
<td>{{$standardsix_annual ->Fname}}</td>
<td>{{$standardsix_annual ->Mname }}</td>
<td>{{$standardsix_annual->Lname}}</td>
<td>{{$standardsix_annual->Arabic}}</td>
<td>{{$standardsix_annual->CivicsandMorals}}</td>
<td>{{$standardsix_annual->English}}</td>
<td>{{$standardsix_annual->EDK}}</td>
<td>{{$standardsix_annual->Mathematics}}</td>
<td>{{$standardsix_annual->Science}}</td>
<td>{{$standardsix_annual ->Socialsstudies}}</td>
<td>{{$standardsix_annual->Kiswahili}}</td>
<td><a href="{{ route('UpdateAdminStudentsixANresult', ['id' => $standardsix_annual->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
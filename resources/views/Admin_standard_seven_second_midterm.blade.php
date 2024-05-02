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
    <li><a class="dropdown-item" href="{{route('AdminstandardsixSM')}}">Admin standard  six   second  Midterm </a></li>
    <li><a class="dropdown-item" href="{{route('AdminstandardsevenFM')}}">Admin standard seven  first  Midterm</a></li>
   
  </ul>
</div> 


<table class="table">
    <p>Standard seven  second midterm   table</p>
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
<td><a href="{{ route('UpdateAdminStudentsevensecondMidtermresult', ['id' => $data ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>

<table class="table">
    <p>Standard seven  annual   table</p>
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
@foreach ($standardseven_annual as $standardseven_annual )
<tr>
<td>{{$standardseven_annual ->Fname}}</td>
<td>{{$standardseven_annual ->Mname }}</td>
<td>{{$standardseven_annual->Lname}}</td>
<td>{{$standardseven_annual->Arabic}}</td>
<td>{{$standardseven_annual->CivicsandMorals}}</td>
<td>{{$standardseven_annual->English}}</td>
<td>{{$standardseven_annual->EDK}}</td>
<td>{{$standardseven_annual->Mathematics}}</td>
<td>{{$standardseven_annual->Science}}</td>
<td>{{$standardseven_annual->Socialsstudies}}</td>
<td>{{$standardseven_annual->Kiswahili}}</td>
<td><a href="{{ route('AdminStudentsevenANresult', ['id' => $data ->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
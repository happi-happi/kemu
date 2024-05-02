

<button type="button" class="btn btn-primary"><a href="{{ route('searchuser') }}">User record</a></button>   
<button type="button" class="btn btn-primary"><a href="{{ route('updatestandardsix') }}">Standard six</a></button>
<button type="button" class="btn btn-primary"> <a href="{{ route('updatestandardfive') }}">Standard five</a></button>
<button type="button" class="btn btn-primary"><a href="{{ route('Studentresult') }}">Standard seven</a></button>


<table class="table">
<p>Standard four table</p>
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
@foreach ($updateviewresult as $updateviewresult)
<tr>
<td>{{$updateviewresult->Fname}}</td>
<td>{{$updateviewresult->Mname }}</td>
<td>{{$updateviewresult->Lname}}</td>
<td>{{$updateviewresult->Arabic}}</td>
<td>{{$updateviewresult->CivicsandMorals}}</td>
<td>{{$updateviewresult->English}}</td>
<td>{{$updateviewresult->EDK}}</td>
<td>{{$updateviewresult->Mathematics}}</td>
<td>{{$updateviewresult->Science}}</td>
<td>{{$updateviewresult->Socialsstudies}}</td>
<td>{{$updateviewresult->Kiswahili}}</td>
<td><a href="{{ route('AdminStudentresult', ['id' => $updateviewresult->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>

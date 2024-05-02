    
<button type="button" class="btn btn-primary"><a href="{{ route('searchuser') }}">User record</a></button>
<button type="button" class="btn btn-primary"> <a href="{{ route('updatestandardfive') }}">Standard five</a></button>
<button type="button" class="btn btn-primary"><a href="{{ route('updateviewresult') }}">Standard four</a></button>
<button type="button" class="btn btn-primary">  <a href="{{ route('Studentresult') }}">Standard seven </a></button>

<table class="table">
<p>Standard six table</p>
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
@foreach ($updatestandardsix as $updatestandardsix)
<tr>
<td>{{$updatestandardsix->Fname}}</td>
<td>{{$updatestandardsix->Mname }}</td>
<td>{{$updatestandardsix->Lname}}</td>
<td>{{$updatestandardsix->Arabic}}</td>
<td>{{$updatestandardsix->CivicsandMorals}}</td>
<td>{{$updatestandardsix->English}}</td>
<td>{{$updatestandardsix->EDK}}</td>
<td>{{$updatestandardsix->Mathematics}}</td>
<td>{{$updatestandardsix->Science}}</td>
<td>{{$updatestandardsix->Socialsstudies}}</td>
<td>{{$updatestandardsix->Kiswahili}}</td>
<td><a href="{{ route('Adminupdatestandardsix', ['id' => $updatestandardsix->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table
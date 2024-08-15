    
<button type="button" class="btn btn-primary"><a href="{{ route('updatestandardsix') }}">Standard six</a></button>
<button type="button" class="btn btn-primary"><a href="{{ route('searchuser') }}">User record</a></button>
<button type="button" class="btn btn-primary"><a href="{{ route('updateviewresult') }}">Standard four</a></button>
<button type="button" class="btn btn-primary">  <a href="{{ route('Studentresult') }}">Standard seven</a></button>


<table class="table">
<p>Standard five table</p>
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
@foreach ($updatestandardfive as $updatestandardfive)
<tr>
<td>{{$updatestandardfive->Fname}}</td>
<td>{{$updatestandardfive->Mname }}</td>
<td>{{$updatestandardfive->Lname}}</td>
<td>{{$updatestandardfive->Arabic}}</td>
<td>{{$updatestandardfive->CivicsandMorals}}</td>
<td>{{$updatestandardfive->English}}</td>
<td>{{$updatestandardfive->EDK}}</td>
<td>{{$updatestandardfive->Mathematics}}</td>
<td>{{$updatestandardfive->Science}}</td>
<td>{{$updatestandardfive->Socialsstudies}}</td>
<td>{{$updatestandardfive->Kiswahili}}</td>
<td><a href="{{ route('Adminupdatestandardfive', ['id' => $updatestandardfive->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table
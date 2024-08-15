<button type="button" class="btn btn-primary"><a href="{{ route('updatestandardsix') }}">Standard six</a></button>
    <button type="button" class="btn btn-primary"> <a href="{{ route('updatestandardfive') }}">Standard five</a></button>
    <button type="button" class="btn btn-primary"><a href="{{ route('updateviewresult') }}">Standard four</a></button>
    <button type="button" class="btn btn-primary"><a href="{{ route('searchuser') }}">User record</a></button>

<table class="table">
    <p>Standard seven table</p>
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
@foreach ($standardseven as $standardseven)
<tr>
<td>{{$standardseven->Fname}}</td>
<td>{{$standardseven->Mname }}</td>
<td>{{$standardseven->Lname}}</td>
<td>{{$standardseven->Arabic}}</td>
<td>{{$standardseven->CivicsandMorals}}</td>
<td>{{$standardseven->English}}</td>
<td>{{$standardseven->EDK}}</td>
<td>{{$standardseven->Mathematics}}</td>
<td>{{$standardseven->Science}}</td>
<td>{{$standardseven->Socialsstudies}}</td>
<td>{{$standardseven->Kiswahili}}</td>
<td><a href="{{ route('Adminupdatestandardseven', ['id' => $standardseven->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
<x-app-layout>

    
    <button type="button" class="btn btn-primary"><a href="{{ route('standardsix') }}">Standard six</a></button>
    <button type="button" class="btn btn-primary"> <a href="{{ route('standardfive') }}">Standard five</a></button>
    <button type="button" class="btn btn-primary">  <a href="{{ route('standardseven') }}">Standard seven</a></button>
    <button type="button" class="btn btn-primary">  <a href="{{ route('searchuser') }}">Studentresult</a></button>


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
@foreach ($standardfour as $standardfour)
<tr>
<td>{{$standardfour->Fname}}</td>
<td>{{$standardfour->Mname }}</td>
<td>{{$standardfour->Lname}}</td>
<td>{{$standardfour->Arabic}}</td>
<td>{{$standardfour->CivicsandMorals}}</td>
<td>{{$standardfour->English}}</td>
<td>{{$standardfour->EDK}}</td>
<td>{{$standardfour->Mathematics}}</td>
<td>{{$standardfour->Science}}</td>
<td>{{$standardfour->Socialsstudies}}</td>
<td>{{$standardfour->Kiswahili}}</td>
<td><a href="{{ route('Adminupdatestandardsix', ['id' => $updatestandardsix->id]) }}">Update</a></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
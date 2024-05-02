<x-app-layout>
    <button type="button" class="btn btn-primary"><a href="{{ route('standardsix') }}">Standard six</a></button>
    <button type="button" class="btn btn-primary"><a href="{{ route('viewresult') }}">Standard four</a></button>
    <button type="button" class="btn btn-primary">  <a href="{{ route('standardseven') }}">Standard seven</a></button>

<table class="table">
    <p>Standard Five table</p>
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
      <th>View Detail</th>

  </tr>
  </thead>
  <tbody>
@foreach ($standardfive as $standardfive)
<tr>
<td>{{$standardfive->Fname}}</td>
<td>{{$standardfive->Mname }}</td>
<td>{{$standardfive->Lname}}</td>
<td>{{$standardfive->Arabic}}</td>
<td>{{$standardfive->CivicsandMorals}}</td>
<td>{{$standardfive->English}}</td>
<td>{{$standardfive->EDK}}</td>
<td>{{$standardfive->Mathematics}}</td>
<td>{{$standardfive->Science}}</td>
<td>{{$standardfive->Socialsstudies}}</td>
<td>{{$standardfive->Kiswahili}}</td>
<td><button  type="button" class=" btn btn-primary">View Detail</button></td>
</tr>   

@endforeach
</tbody>
</table>
</x-app-layout>
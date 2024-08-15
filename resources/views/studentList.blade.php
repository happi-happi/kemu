<x-app-layout>

<br><br>

<table class="table     table-bordered table-striped">
<thead >
  <tr>
      <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>Role</th> 
      <th>email</th>
      <th>View Detail</th>
    
  </tr>
  </thead>
  <tbody>
@foreach ($studentlist as $studentlist)
<tr>
<td>{{$studentlist->Fname}}</td>
<td>{{$studentlist->Mname }}</td>
<td>{{$studentlist->Lname}}</td>
<td>{{$studentlist->Role}}</td>
<td>{{$studentlist->email}}</td>
<td><button  type="button" class=" btn btn-primary">View Detail</button></td>
</tr>  
@endforeach
</tbody>
</table>

</x-app-layout>
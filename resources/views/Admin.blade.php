<x-app-layout>
<div class="container mt-1">
    <div class="row">
      <div class="col-md-4">
<form action=""  >
   <input type="search"  class="form-control"  aria-label="Default select example" name="query"  placeholder="Last Name "/><br>
  <button type="submit"  class="btn btn-primary">Search</button>
</form>
<button type="button" class="btn btn-primary">  <a href="{{ route('Studentresult') }}">Studentresult</a></button>

    <table class="table table-hover  table-bordered table-striped">
    <p>User list</p>
        <tr>
       <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>Role</th> 
      <th> class </th>
      <th>email</th>
      <th>firstphonenumber</th>
      <th>secondphonenumber</th>
      <th>class </th>
      <th>nameofschool</th>
      <th>password </th>
      <th>Action</th>
        </tr>

    @foreach ($searchuser as $searchuser)
<tr>
<td>{{$searchuser->Fname}}</td>
<td>{{$searchuser->Mname }}</td>
<td>{{$searchuser->Lname}}</td>
<td>{{$searchuser->Role}}</td>
<td>{{$searchuser->class }}</td>
<td>{{$searchuser->email}}</td>
<td>{{$searchuser->firstphonenumber}}</td>
<td>{{$searchuser->secondphonenumber}}</td>
<td>{{$searchuser->class}}</td>
<td>{{$searchuser->nameofschool}}</td>
<td></td>
<td><a href="{{ route('updateuser', ['id' => $searchuser->id]) }}">Update</a></td>
<td><button  type="button" class=" btn btn-primary">Deactivate</button></td>
</tr>
    
@endforeach
        
</table>
</div></div></div>

</x-app-layout>
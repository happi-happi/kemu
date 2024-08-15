<x-app-layout>
<div class="container mt-1">
    <div class="row">
      <div class="col-md-4">
<form action=""  >
   <input type="search"  class="form-control"  aria-label="Default select example" name="query"  placeholder="Name of School"/><br>
  <button type="submit"  class="btn btn-primary">Search</button>
</form>
<button type="button" class="btn btn-primary">  <a href="{{ route('Studentresult') }}">Studentresult</a></button>

    <table class="table table-hover  table-bordered table-striped">
    <p>School Information </p>
        <tr>
       <th>SchoolName</th>
      <th>Country</th>
      <th>Region </th>
      <th>District</th> 
      <th>POBOX </th>
      <th>Emblem</th>
      <th>BankAccount</th>
      <th> FirstContact</th>
      <th>SecondContact</th>
    
      <th>Action</th>
        </tr>

    @foreach ($searchuser as $searchuser)
<tr>
<td>{{$searchuser->SchoolName}}</td>
<td>{{$searchuser->Country}}</td>
<td>{{$searchuser->Region}}</td>
<td>{{$searchuser->District}}</td>
<td>{{$searchuser->POBOX}}</td>
<td>{{$searchuser->Emblem}}</td>
<td>{{$searchuser->BankAccount}}</td>
<td>{{$searchuser->FirstContact}}</td>
<td>{{$searchuser->SecondContact}}</td>

<td><a href="{{ route('EditSchoolInformationPg', ['id' => $searchuser->id]) }}">Update</a></td>
</tr>
    
@endforeach
        
</table>
</div></div></div>

</x-app-layout>
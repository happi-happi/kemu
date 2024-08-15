<x-app-layout>
<div class="container mt-1">
    <div class="row">
      <div class="col-md-4">
<form action="" method="GET"  >   
<div class="form-group">
   <input type="search"  class="form-control form-control-sm "  aria-label="Default select example" name="query"  placeholder="Last Name "/><br>
  <button type="submit"  class="btn btn-warning">Search</button>
</div >
</form>

             
 <table class="table table-hover  table-bordered table-striped">
                    
    <p>Student Details list</p>
        <tr>
        <th>Student Identificaion</th> 
       <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>email</th>
      <th>Status</th>
      <th>Record Payment </th>
        </tr>
    @foreach($searchuser as $user)
     <tr>
 <td>{{$user->id}}</td>
<td>{{$user->Fname}}</td>
<td>{{$user->Mname }}</td>
<td>{{$user->Lname}}</td>
<td>{{$user->FirstPhoneNUmber }}</td>
<td>{{$user->SecondPhoneNUmber }}</td>
<td>{{$user->email}}</td>
<td>{{$user->Status }}</td>

<td><a href="{{ route('PaymentRecord', ['id' => $user->id]) }}"><button  type="button" class=" btn btn-warning">Payment Record </button></a></td>
   @endforeach

     
                
</div ></div ></div >
</x-app-layout>
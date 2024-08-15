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
<br>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Level Payment Status
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('StudentPaymentStatus')}}">Standard four</a></li>
    <li><a class="dropdown-item" href="{{route('StdVIPaymentStatus')}}">Standard six</a></li>
    <li><a class="dropdown-item" href="{{route('StdVPaymentStatus')}}">Standard five </a></li>
  </ul>
</div> 


<table>             
  <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard seven Payment Status</p>
        <tr>
        <th>Student Identificaion</th> 
       <th>Fname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>email</th>
      <th>TotalFeeAmount </th>
      <th>AmountPaid </th>
      <th>AmountNotPaid  </th>
      <th> OverPayment </th>
      <th>Status</th>
    
        </tr>
 
        @foreach($searchuser as $user)
     <tr>
    <td>{{$user->user->id}}</td>
    <td>{{$user->user->Fname}}</td>
    <td>{{$user->user->Mname}}</td>
   <td>{{$user->user->Lname}}</td>
   <td>{{$user->user->firstphonenumber}}</td>
   <td>{{$user->user->secondphonenumber}}</td>
   <td>{{$user->user->email}}</td>
  <td>{{$user->TotalFeeAmount}}</td>
  <td>{{$user->AmountPaid  }}</td>
  <td>{{$user->AmountNotPaid }}</td>
  <td>{{$user->OverPayment}}</td>
  <td>{{$user->Status}}</td>
  <td><div class="container">
  <a class="btn btn-warning" href="{{ route('StdVIIPrintReceipt', ['id' => $user->user->id]) }}">
            Print Receipt
        </a>
</div></td>
   @endforeach
</table>
               
</div ></div ></div >
</x-app-layout>

<x-app-layout>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Level Payment Status
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('StdVIIVPaymentRecords')}}">Standard Seven</a></li>
    <li><a class="dropdown-item" href="{{route('StdVIPaymentRecords')}}">Standard six</a></li>
    <li><a class="dropdown-item" href="{{route('StdVPaymentRecords')}}">Standard five </a></li>
  </ul>
</div> 

<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Secondary Level Payment Status
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="">Form One</a></li>
    <li><a class="dropdown-item" href="">Form Two</a></li>
    <li><a class="dropdown-item" href="">Form  Three </a></li>
    <li><a class="dropdown-item" href="">Form  Four </a></li>
  </ul>
</div> 

<table>             
  <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard four Payment Status</p>
        <tr>
     
      <th>TotalFeeAmount </th>
      <th>AmountPaid </th>
      <th>AmountNotPaid  </th>
      <th> OverPayment </th>
      <th>Status</th>
    
        </tr>
 
        @foreach($data as $user)
     <tr>
    
  <td>{{$user->TotalFeeAmount}}</td>
  <td>{{$user->AmountPaid  }}</td>
  <td>{{$user->AmountNotPaid }}</td>
  <td>{{$user->OverPayment}}</td>
  <td>{{$user->Status}}</td>
   @endforeach
</table>
</x-app-layout>
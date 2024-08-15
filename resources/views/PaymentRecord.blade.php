<x-app-layout>
<div class="container mt-3">
    <div class="row">
      <div class="col-md-19">

               
                        <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard Four</p>
</br>
        <tr>
        <th>Student Id</th> 
       <th>Firstname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>Fees</th>
      <th>Amount Paid</th>
      <th>Amount not Paid</th>
    
     
        </tr>
 
     <tr>
     <form method="POST" action="{{route('RecordPayment')}}">
     @csrf
    @method('POST')
<td><x-text-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{ $user->id}}" required autofocus autocomplete="id"  readonly/></td>
<td><x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" value="{{ $user->Fname}}" required autofocus autocomplete="Fname" readonly/></td>
<td> <x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname"  value="{{ $user->Mname}}" required autofocus autocomplete="Mname" readonly/></td>
<td><x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname"  value="{{ $user->Lname}}" required autofocus autocomplete="Lname" readonly/></td>
<td><x-text-input id="firstphonenumber" class="block mt-1 w-full" type="text" name="firstphonenumber"  value="{{ $user->firstphonenumber}}" required autofocus autocomplete="firstphonenumber" readonly  /></td>
<td><x-text-input id="secondphonenumber" class="block mt-1 w-full" type="text" name="secondphonenumber"  value="{{ $user->secondphonenumber}}" required autofocus autocomplete="secondphonenumber" readonly/></td>
<td>        
<div><select class="form-select" name="TotalFeeAmount" aria-label="Default select example">
  <option selected>Select  school your Payment  fees below</option>
  <option value="{{ env('FIRSTSCHOOLFEES') }}">{{ env('FIRSTSCHOOLFEES') }}</option>
 
</select></td>
<td><x-text-input id="AmountPaid" class="block mt-1 w-full" type="text" name="AmountPaid"  value="{{ $user->AmountPaid}}" required autofocus autocomplete="AmountPaid" /></td>



<td><button type="submit">Submit</button></td>
</form>
     
                
</div ></div ></div >

<div class="container mt-6">
    <div class="row">
      <div class="col-md-19">

               
                        <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard Five </p>
</br>
        <tr>
        <th>Student Id</th> 
       <th>Firstname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>Fees</th>
      <th>Amount Paid</th>
      <th>Amount not Paid</th>
    
     
        </tr>
 
     <tr>
     <form method="POST" action="{{route('RecordPaymentV')}}">
     @csrf
    @method('POST')
<td><x-text-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{ $user->id}}" required autofocus autocomplete="id"  readonly/></td>
<td><x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" value="{{ $user->Fname}}" required autofocus autocomplete="Fname" readonly/></td>
<td> <x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname"  value="{{ $user->Mname}}" required autofocus autocomplete="Mname" readonly/></td>
<td><x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname"  value="{{ $user->Lname}}" required autofocus autocomplete="Lname" readonly/></td>
<td><x-text-input id="firstphonenumber" class="block mt-1 w-full" type="text" name="firstphonenumber"  value="{{ $user->firstphonenumber}}" required autofocus autocomplete="firstphonenumber" readonly  /></td>
<td><x-text-input id="secondphonenumber" class="block mt-1 w-full" type="text" name="secondphonenumber"  value="{{ $user->secondphonenumber}}" required autofocus autocomplete="secondphonenumber" readonly/></td>
<td>        
<div><select class="form-select" name="TotalFeeAmount" aria-label="Default select example">
  <option selected>Select  school your Payment  fees below</option>
  <option value="{{ env('FIRSTSCHOOLFEES') }}">{{ env('FIRSTSCHOOLFEES') }}</option>
 
</select></td>
<td><x-text-input id="AmountPaid" class="block mt-1 w-full" type="text" name="AmountPaid"  value="{{ $user->AmountPaid}}" required autofocus autocomplete="AmountPaid" /></td>



<td><button type="submit">Submit</button></td>
</form>
     
                
</div ></div ></div >
<div class="container mt-6">
    <div class="row">
      <div class="col-md-19">

               
                        <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard six</p>

        <tr>
        <th>Student Id</th> 
       <th>Firstname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>Fees</th>
      <th>Amount Paid</th>
      <th>Amount not Paid</th>
    
     
        </tr>
 
     <tr>
     <form method="POST" action="{{route('RecordPaymentVI')}}">
     @csrf
    @method('POST')
<td><x-text-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{ $user->id}}" required autofocus autocomplete="id"  readonly/></td>
<td><x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" value="{{ $user->Fname}}" required autofocus autocomplete="Fname" readonly/></td>
<td> <x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname"  value="{{ $user->Mname}}" required autofocus autocomplete="Mname" readonly/></td>
<td><x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname"  value="{{ $user->Lname}}" required autofocus autocomplete="Lname" readonly/></td>
<td><x-text-input id="firstphonenumber" class="block mt-1 w-full" type="text" name="firstphonenumber"  value="{{ $user->firstphonenumber}}" required autofocus autocomplete="firstphonenumber" readonly  /></td>
<td><x-text-input id="secondphonenumber" class="block mt-1 w-full" type="text" name="secondphonenumber"  value="{{ $user->secondphonenumber}}" required autofocus autocomplete="secondphonenumber" readonly/></td>
<td>        
<div><select class="form-select" name="TotalFeeAmount" aria-label="Default select example">
  <option selected>Select  school your Payment  fees below</option>
  <option value="{{ env('FIRSTSCHOOLFEES') }}">{{ env('FIRSTSCHOOLFEES') }}</option>
 
</select></td>
<td><x-text-input id="AmountPaid" class="block mt-1 w-full" type="text" name="AmountPaid"  value="{{ $user->AmountPaid}}" required autofocus autocomplete="AmountPaid" /></td>



<td><button type="submit">Submit</button></td>
</form>
     
                
</div ></div ></div >
<div class="container mt-6">
    <div class="row">
      <div class="col-md-19">

               
                        <table class="table table-hover  table-bordered table-striped">
                    
    <p>Standard seven</p>
</br>
        <tr>
        <th>Student Id</th> 
       <th>Firstname</th>
      <th>Mname</th>
      <th>Lname</th>
      <th>First PhoneNUmber</th> 
      <th>Second PhoneNUmber</th> 
      <th>Fees</th>
      <th>Amount Paid</th>
      <th>Amount not Paid</th>
    
     
        </tr>
 
     <tr>
     <form method="POST" action="{{route('RecordPaymentVII')}}">
     @csrf
    @method('POST')
<td><x-text-input id="id" class="block mt-1 w-full" type="text" name="id" value="{{ $user->id}}" required autofocus autocomplete="id"  readonly/></td>
<td><x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" value="{{ $user->Fname}}" required autofocus autocomplete="Fname" readonly/></td>
<td><x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname"  value="{{ $user->Mname}}" required autofocus autocomplete="Mname" readonly/></td>
<td><x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname"  value="{{ $user->Lname}}" required autofocus autocomplete="Lname" readonly/></td>
<td><x-text-input id="firstphonenumber" class="block mt-1 w-full" type="text" name="firstphonenumber"  value="{{ $user->firstphonenumber}}" required autofocus autocomplete="firstphonenumber" readonly  /></td>
<td><x-text-input id="secondphonenumber" class="block mt-1 w-full" type="text" name="secondphonenumber"  value="{{ $user->secondphonenumber}}" required autofocus autocomplete="secondphonenumber" readonly/></td>
<td>        
<div><select class="form-select" name="TotalFeeAmount" aria-label="Default select example">
  <option selected>Select  school your Payment  fees below</option>
  <option value="{{ env('FIRSTSCHOOLFEES') }}">{{ env('FIRSTSCHOOLFEES') }}</option>
 
</select></td>
<td><x-text-input id="AmountPaid" class="block mt-1 w-full" type="text" name="AmountPaid"  value="{{ $user->AmountPaid}}" required autofocus autocomplete="AmountPaid" /></td>

<td><button type="submit">Submit</button></td>
</form>
               
</div ></div ></div >

</x-app-layout>


<x-app-layout>
<x-guest-layout>  
@if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<form method="POST" action="{{ route('updateuserinfo', ['id' => $data->id]) }}">
    @csrf
    @method('POST') <!-- Use PUT or PATCH method -->
    <!-- Include input fields for updating the data -->
          <div>
            <x-input-label for="Fname" :value="__('Fname')" />
            <x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" value="{{ $data->Fname}}" required autofocus autocomplete="Fname" />
            </div>
 

            <div>
            <x-input-label for="Mname" :value="__('Mname')" />
            <x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname"  value="{{ $data->Mname}}" required autofocus autocomplete="Mname" />
            </div>

            <div>
            <x-input-label for="Lname" :value="__('Lname')" />
            <x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname"  value="{{ $data->Lname}}" required autofocus autocomplete="Lname" />
            </div>
  

            <div>
            <x-input-label for="Role" :value="__('Role')" />
            <x-text-input id="Role" class="block mt-1 w-full" type="text" name="Role"  value="{{ $data->Role}}" required autofocus autocomplete="Role" />
            </div>

            <div>
            <x-input-label for="firstphonenumber" :value="__('firstphonenumber')" />
            <x-text-input id="firstphonenumber" class="block mt-1 w-full" type="text" name="firstphonenumber"  value="{{ $data->firstphonenumber}}" required autofocus autocomplete="firstphonenumber" />
            </div>

            <div>
            <x-input-label for="secondphonenumber" :value="__('secondphonenumber')" />
            <x-text-input id="secondphonenumber" class="block mt-1 w-full" type="text" name="secondphonenumber"  value="{{ $data->secondphonenumber}}" required autofocus autocomplete="secondphonenumber" />
            </div>

           

            <div>      
 <select class="form-select" name="class" type="text" value="{{ $data->class}}" aria-label="Default select example">
  <option selected>Class</option>
  <option value="Kindegerten">Kindegerten</option>
  <option value="Standardone">Standard one</option>
  <option value="Standardtwo">Standard two</option>
  <option value="Standardthree">Standard three</option>
  <option value="Standardfour">Standard four</option>
  <option value="Standardfive">Standard five</option>
  <option value="Standardsix">Standard six</option>
  <option value="Standardseven">Standard seven</option>
  <option value="Formone">Form one</option>
  <option value="Formtwo">Form two</option>
  <option value="Formthree">Form three</option>
  <option value="Formfour">Form four</option>
  <option value="Formfive">Form five</option>
  <option value="Formsix">Form six</option>
  <option value="FinanceDepartment">Finance Department</option>
  <option value="TeacherDepartment">TeacherDepartment</option>
  <option value="HeadTeacher">HeadTeacher</option>
  <option value="SecondHeadTeacher">SecondHeadTeacher</option>
</select>
</div>

            <div>
            <x-input-label for="nameofschool" :value="__('nameofschool')" />
            <x-text-input id="nameofschool" class="block mt-1 w-full" type="text" name="nameofschool"  value="{{ $data->nameofschool}}" required autofocus autocomplete="nameofschool" />
            </div>

           
    <br>
    <div>
            <x-input-label for="password" :value="__('password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"  value="{{ $data->password}}" required autofocus autocomplete="password" />
            </div>

   
 
    <input type="text" name="email" value="{{ $data->email}}">
    <!-- Add other fields as needed -->
    <button type="submit"  >Update</button>
</form>
</x-guest-layout>
</x-app-layout>

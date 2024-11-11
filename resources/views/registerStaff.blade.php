<x-app-layout>
<x-guest-layout>

        <!-- Registration Form -->
        @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif

        <form method="POST" action="{{ route('registerstaff') }}" style="width: 100%;">
          @csrf
          <p>staff Details</p>

          <!-- Fname -->
          <div>
            <x-input-label for="Fname" :value="__('Fname')" />
            <x-text-input id="staffFname" class="block mt-1 w-full" type="text" name="staffFname" :value="old('staffFname')" required autofocus autocomplete="staffFname" />
            <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
          </div>

          <!-- Mname -->
          <div>
            <x-input-label for="Mname" :value="__('Mname')" />
            <x-text-input id="staffMname" class="block mt-1 w-full" type="text" name="staffMname" :value="old('staffMname')" required autofocus autocomplete="staffMname" />
            <x-input-error :messages="$errors->get('Mname')" class="mt-2" />
          </div>

          <!-- Lname -->
          <div>
            <x-input-label for="Lname" :value="__('Lname')" />
            <x-text-input id="staffLname" class="block mt-1 w-full" type="text" name="staffLname" :value="old('staffLname')" required autofocus autocomplete="staffLname" />
            <x-input-error :messages="$errors->get('Lname')" class="mt-2" />
          </div>

          <div>
            <x-input-label for="Date of Birth" :value="__('Date of Birth' )" />
            <x-text-input id="staffDateofBirth" class="block mt-1 w-full" type="date" name="staffDateofBirth" :value="old('staffDateofBirth')" required autofocus autocomplete="staffDateofBirth" />
            <x-input-error :messages="$errors->get('DateofBirth')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Place of Birth" :value="__('Place of Birth' )" />
            <x-text-input id="staffPlaceofBirth" class="block mt-1 w-full" type="text" name="staffPlaceofBirth" :value="old('staffPlaceofBirth')" required autofocus autocomplete="staffPlaceofBirth" />
            <x-input-error :messages="$errors->get('PlaceofBirth')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Nationality" :value="__('Nationality' )" />
            <x-text-input id="staffNationality" class="block mt-1 w-full" type="text" name="staffNationality" :value="old('staffNationality')" required autofocus autocomplete="staffNationality" />
            <x-input-error :messages="$errors->get('Nationality')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="Region" :value="__('Region')" />
            <x-text-input id="staffRegion" class="block mt-1 w-full" type="text" name="staffRegion" :value="old('staffRegion')" required autofocus autocomplete="staffRegion" />
            <x-input-error :messages="$errors->get('Region')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="District" :value="__('District')" />
            <x-text-input id="staffDistrict" class="block mt-1 w-full" type="text" name="staffDistrict" :value="old('staffDistrict')" required autofocus autocomplete="staffDistrict" />
            <x-input-error :messages="$errors->get('District')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Current residence" :value="__('Current residence')" />
            <x-text-input id="staffCurrent residence" class="block mt-1 w-full" type="text" name="staffCurrentresidence" :value="old('staffCurrentresidence')" required autofocus autocomplete="staffCurrentresidence" />
            <x-input-error :messages="$errors->get('Currentresidence')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Previous School" :value="__('Previous School')" />
            <x-text-input id="staffPreviousSchool" class="block mt-1 w-full" type="text" name="staffPreviousSchool" :value="old('staffPreviousSchool')" required autofocus autocomplete="staffPreviousSchool" />
            <x-input-error :messages="$errors->get('Previous School')" class="mt-2" />
        </div>

        <div>
        <x-input-label for="SchoolName" :value="__('School Name')" />
         <select id="staffSchoolName" name="staffnameofschool" class="block mt-1 w-full">
        <option value="">Select School</option>
        @foreach($SchoolName as $school)
            <option value="{{ $school->SchoolName}}">{{ $school->SchoolName }}</option>
        @endforeach
       </select>
    <x-input-error :messages="$errors->get('SchoolName')" class="mt-2" />
       </div>


          <!-- Email -->
          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <br>
        <!-- class-->
        <div>      
 <select class="form-select" name="class"  aria-label="Default select example">
  <option selected>Class Teacher</option>
  <option value="NotClassTeacher">Not Class Teacher</option>
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
  <option value="TeacherDepartment">Academic Teacher</option>
  <option value="HeadTeacher">HeadTeacher</option>
  <option value="SecondHeadTeacher">Second HeadTeacher</option>
</select>
</div>

<br>
       <!-- Role-->
        <div>      
 <select class="form-select" name="staffRole"  aria-label="Default select example">
  <option selected>Role</option>
  <option value="Student">Student</option>
  <option value="Teacher">Teacher</option>
  <option value="HeadTeacher">HeadTeacher</option>
  <option value="SecondHeadTeacher">SecondHeadTeacher</option>
  <option value="DiscplineMaster">DiscplineMaster</option>
  <option value="Burser">Burser</option>
  <option value="Admin">Admin</option>
  <option value="Admin">Super Admin</option>
</select>
</div>

      <br>
          <!-- Password -->
          <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Confirm Password -->
          <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
          <br>

          <div>
        <x-input-label for="SchoolName ID" :value="__('School Name ID')" />
         <select id="school_id" name="school_id" class="block mt-1 w-full">
        <option value="">Select School</option>
        @foreach($SchoolName as $school)
            <option value="{{ $school->id }}">{{ $school->SchoolName }}</option>
        @endforeach
       </select>
    <x-input-error :messages="$errors->get('SchoolName')" class="mt-2" />
       </div>
<br><br>


          <!-- Submit Button -->
          <x-primary-button class="ms-4">
            {{ __('Register') }}
          </x-primary-button>

</x-guest-layout>
</x-app-layout>

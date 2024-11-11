<x-app-layout>
<x-guest-layout>

    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
  
    <p>REGISTRATION FORM FOR STUDENT</p>
    <form method="POST" action="{{ route('register') }}" style="width: 100%;">
        @csrf
        <p>Student  Details</p>

        <!-- Fname -->
        <div>
            <x-input-label for="Fname" :value="__('Fname')" />
            <x-text-input id="Fname" class="block mt-1 w-full" type="text" name="Fname" :value="old('Fname')" required autofocus autocomplete="Fname" />
            <x-input-error :messages="$errors->get('Fname')" class="mt-2" />
        </div>

           <!-- Mname -->
           <div>
            <x-input-label for="Mname" :value="__('Mname')" />
            <x-text-input id="Mname" class="block mt-1 w-full" type="text" name="Mname" :value="old('Mname')" required autofocus autocomplete="Mname" />
            <x-input-error :messages="$errors->get('Mname')" class="mt-2" />
        </div>

           <!-- Lname-->
           <div>
            <x-input-label for="Lname" :value="__('Lname')" />
            <x-text-input id="Lname" class="block mt-1 w-full" type="text" name="Lname" :value="old('Lname')" required autofocus autocomplete="Lname" />
            <x-input-error :messages="$errors->get('Lname')" class="mt-2" />
           </div>
<br>
           <div>      
 <select class="form-select" name="class"  aria-label="Default select example">
  <option selected>Student Class</option>
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
</select>
</div>

<br>
        <div>
            <x-input-label for="Date of Birth" :value="__('Date of Birth' )" />
            <x-text-input id="DateofBirth" class="block mt-1 w-full" type="date" name="DateofBirth" :value="old('DateofBirth')" required autofocus autocomplete="DateofBirth" />
            <x-input-error :messages="$errors->get('DateofBirth')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Place of Birth" :value="__('Place of Birth' )" />
            <x-text-input id="PlaceofBirth" class="block mt-1 w-full" type="text" name="PlaceofBirth" :value="old('PlaceofBirth')" required autofocus autocomplete="PlaceofBirth" />
            <x-input-error :messages="$errors->get('PlaceofBirth')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Nationality" :value="__('Nationality' )" />
            <x-text-input id="Nationality" class="block mt-1 w-full" type="text" name="Nationality" :value="old('Nationality')" required autofocus autocomplete="Nationality" />
            <x-input-error :messages="$errors->get('Nationality')" class="mt-2" />
        </div>


        <div>
            <x-input-label for="Region" :value="__('Region')" />
            <x-text-input id="Region" class="block mt-1 w-full" type="text" name="Region" :value="old('Region')" required autofocus autocomplete="Region" />
            <x-input-error :messages="$errors->get('Region')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="District" :value="__('District')" />
            <x-text-input id="District" class="block mt-1 w-full" type="text" name="District" :value="old('District')" required autofocus autocomplete="District" />
            <x-input-error :messages="$errors->get('District')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Current residence" :value="__('Current residence')" />
            <x-text-input id="Current residence" class="block mt-1 w-full" type="text" name="Currentresidence" :value="old('Currentresidence')" required autofocus autocomplete="Currentresidence" />
            <x-input-error :messages="$errors->get('Currentresidence')" class="mt-2" />
        </div>
        <br>
        <div>
    <x-input-label for="SchoolName" :value="__('School Name ')" />
    <select id="SchoolName" name="SchoolName" class="block mt-1 w-full">
        <option value="">Select School</option>
        @foreach($SchoolName as $school)
            <option value="{{ $school->SchoolName}}">{{ $school->SchoolName }}</option>
        @endforeach
    </select>

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

    <x-input-error :messages="$errors->get('SchoolName')" class="mt-2" />
</div>
  <br><br>
      <!-- Role-->
    <select class="form-select" name="Role"  aria-label="Default select example">
  <option selected>Role</option>
  <option value="Student">Student</option>
</select>

        <div>
            <x-input-label for="Previous School" :value="__('Previous School')" />
            <x-text-input id="PreviousSchool" class="block mt-1 w-full" type="text" name="PreviousSchool" :value="old('PreviousSchool')" required autofocus autocomplete="PreviousSchool" />
            <x-input-error :messages="$errors->get('Previous School')" class="mt-2" />
        </div>

         <!-- Email Address -->
         <div class="mt-4">
            <x-input-label for="email" :value="__('email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>




        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <br>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>     
    </form>

     
</x-guest-layout>
</x-app-layout>

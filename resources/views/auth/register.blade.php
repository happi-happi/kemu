<x-app-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

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
        <!-- class-->
        <div>      
 <select class="form-select" name="class"  aria-label="Default select example">
  <option selected>Class Teacher</option>
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
       <!-- Role-->
        <div>      
 <select class="form-select" name="Role"  aria-label="Default select example">
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

         <!-- subject-->

         <br>
        <div>      
 <select class="form-select" name="subject"  aria-label="Default select example">
  <option selected>subject</option>
  <option value="Arabic">Arabic</option>
  <option value="CivicsandMorals">CivicsandMorals</option>
  <option value="English">English</option>
  <option value="EDK">EDK</option>
  <option value="Mathematics">Mathematics</option>
  <option value="Science">Science</option>
  <option value="Socialsstudies">Socialsstudies</option>
  <option value="Kiswahili">Kiswahili</option>
</select>
</div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="firstphonenumber" :value="__('firstphonenumber')" />
            <x-text-input id="firstphonenumber" class="block mt-1 w-full" type="firstphonenumber" name="firstphonenumber" :value="old('firstphonenumber')" required autocomplete="firstphonenumber" />
            <x-input-error :messages="$errors->get('firstphonenumber')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="secondphonenumber" :value="__('secondphonenumber')" />
            <x-text-input id="secondphonenumber" class="block mt-1 w-full" type="secondphonenumber" name="secondphonenumber" :value="old('secondphonenumber')" required autocomplete="secondphonenumber" />
            <x-input-error :messages="$errors->get('secondphonenumber')" class="mt-2" />
        </div>
       
        <br><br>

        <select class="form-select mt-4" aria-label="Default select example">
         <option selected>Select School</option>
         @foreach($SchoolName as $school)
        <option value="{{ $school->id }}">{{ $school->SchoolName}}</option>
       @endforeach
      </select>

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

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        
    </form>
</x-guest-layout>
</x-app-layout>

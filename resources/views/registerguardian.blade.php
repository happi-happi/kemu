<x-app-layout>
<x-guest-layout>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
        <!-- Registration Form -->
        <form method="POST" action="{{ route('Guardian') }}" style="width: 100%;">
          @csrf
          <p><b>Parent Details</b></p><br>
           <p><b>Father Detail</b><p>

          <div>
            <x-input-label for="Full Name" :value="__(' Full Name')" />
            <x-text-input id="FullName" class="block mt-1 w-full" type="text" name="FatherFullName" :value="old('FatherFullName')" required autofocus autocomplete="FatherFullName" />
            <x-input-error :messages="$errors->get('FullName')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="firstphonenumber" :value="__('first  phonenumber')" />
            <x-text-input id="firstphonenumber" class="block mt-1 w-full"  type="tel" name="Fatherfirstphonenumber" :value="old('Fatherfirstphonenumber')" required autocomplete="Fatherfirstphonenumber" />
            <x-input-error :messages="$errors->get('firstphonenumber')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="secondphonenumber" :value="__('second  phonenumber')" />
            <x-text-input id="secondphonenumber" class="block mt-1 w-full"  type="tel" name="Fathersecondphonenumber" :value="old('Fathersecondphonenumber')" required autocomplete="Fathersecondphonenumber" />
            <x-input-error :messages="$errors->get('secondphonenumber')" class="mt-2" />
        </div>

          <!-- Occupation -->
          <div class="mt-4">
            <x-input-label for="Occupation" :value="__(' Occupation')" />
            <x-text-input id="Occupation" class="block mt-1 w-full" type="text" name="FatherOccupation" :value="old('FatherOccupation')" required autocomplete="FatherOccupation" />
            <x-input-error :messages="$errors->get('Occupation')" class="mt-2" />
        </div>

          <!-- Email Address -->
          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="Fatheremail" :value="old('Fatheremail')" required autocomplete="Fatheremail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

           <!-- Email Address -->
           <div class="mt-4">
            <x-input-label for="Physical Address " :value="__('Physical Address ')" />
            <x-text-input id="PhysicalAddress " class="block mt-1 w-full" type="text" name="FatherPhysicalAddress" :value="old('FatherPhysicalAddress')" required autocomplete="FatherPhysicalAddress" />
            <x-input-error :messages="$errors->get('PhysicalAddress' )" class="mt-2" />
        </div>
        <br>

        <p><b>Mother Detail</b><p>

          <div>
            <x-input-label for="Full Name" :value="__(' Full Name')" />
            <x-text-input id="FullName" class="block mt-1 w-full" type="text" name="MotherFullName" :value="old('MotherFullName')" required autofocus autocomplete="MotherFullName" />
            <x-input-error :messages="$errors->get('FullName')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="firstphonenumber" :value="__('first  phonenumber')" />
            <x-text-input id="firstphonenumber" class="block mt-1 w-full"  type="tel"  name="Motherfirstphonenumber" :value="old('Motherfirstphonenumber')" required autocomplete="Motherfirstphonenumber" />
            <x-input-error :messages="$errors->get('firstphonenumber')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="secondphonenumber" :value="__('second  phonenumber')" />
            <x-text-input id="secondphonenumber" class="block mt-1 w-full"  type="tel"  name="Mothersecondphonenumber" :value="old('Mothersecondphonenumber')" required autocomplete="Mothersecondphonenumber" />
            <x-input-error :messages="$errors->get('secondphonenumber')" class="mt-2" />
        </div>

          <!-- Occupation -->
          <div class="mt-4">
            <x-input-label for="Occupation" :value="__(' Occupation')" />
            <x-text-input id="Occupation" class="block mt-1 w-full" type="text" name="MotherOccupation" :value="old('MotherOccupation')" required autocomplete="MotherOccupation" />
            <x-input-error :messages="$errors->get('Occupation')" class="mt-2" />
        </div>

          <!-- Email Address -->
          <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="Motheremail" :value="old('Motheremail')" required autocomplete="Motheremail" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

           <!-- Email Address -->
           <div class="mt-4">
            <x-input-label for="Physical Address " :value="__('Physical Address ')" />
            <x-text-input id="PhysicalAddress " class="block mt-1 w-full" type="text" name="MotherPhysicalAddress" :value="old('MotherPhysicalAddress')" required autocomplete="MotherPhysicalAddress" />
            <x-input-error :messages="$errors->get('PhysicalAddress' )" class="mt-2" />
        </div>
        <br>

        <p><b>Guardian Details</b></p>
        <br>
        <div>
            <x-input-label for="Full Name" :value="__(' Full Name')" />
            <x-text-input id="FullName" class="block mt-1 w-full" type="text" name="GuardianFullName" :value="old('GuardianFullName')" required autofocus autocomplete="GuardianFullName" />
            <x-input-error :messages="$errors->get('FullName')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="Relation to student " :value="__('Relation to student ')" />
            <x-text-input id="Relationtostudent " class="block mt-1 w-full" type="text" name="Relationtostudent" :value="old('Relationtostudent')" required autofocus autocomplete="Relationtostudent" />
            <x-input-error :messages="$errors->get('Relationtostudent')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="firstphonenumber" :value="__('first  phonenumber')" />
            <x-text-input id="firstphonenumber" class="block mt-1 w-full" type="tel"  name="Guardianfirstphonenumber" :value="old('Guardianfirstphonenumber')" required autocomplete="Guardianfirstphonenumber" />
            <x-input-error :messages="$errors->get('firstphonenumber')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="secondphonenumber" :value="__('second  phonenumber')" />
            <x-text-input id="secondphonenumber" class="block mt-1 w-full" type="tel"  name="Guardiansecondphonenumber" :value="old('Guardiansecondphonenumber')" required autocomplete="Guardiansecondphonenumber" />
            <x-input-error :messages="$errors->get('secondphonenumber')" class="mt-2" />
        </div>
        <br>

  
          <!-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

         
          <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>
          <br>  -->

          <!-- Submit Button -->
          <x-primary-button class="ms-4">
            {{ __('Register') }}
          </x-primary-button>
        </form>
    
</x-guest-layout>
</x-app-layout>
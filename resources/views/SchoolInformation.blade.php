<x-app-layout>
<x-guest-layout>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <form method="POST" enctype="multipart/form-data" action="{{ route('SchoolInformation') }}">
        @csrf

        <!-- SchoolName -->
        <div>
            <x-input-label for="SchoolName" :value="__('SchoolName')" />
            <x-text-input id="SchoolName" class="block mt-1 w-full" type="text" name="SchoolName" :value="old('SchoolName')" required autofocus autocomplete="SchoolName" />
            <x-input-error :messages="$errors->get('SchoolName')" class="mt-2" />
        </div>

           <!-- Country -->
           <div>
            <x-input-label for="Country" :value="__('Country')" />
            <x-text-input id="Country" class="block mt-1 w-full" type="text" name="Country" :value="old('Country')" required autofocus autocomplete="Country" />
            <x-input-error :messages="$errors->get('Country')" class="mt-2" />
        </div>

           <!-- Region-->
           <div>
            <x-input-label for="Region" :value="__('Region')" />
            <x-text-input id="Region" class="block mt-1 w-full" type="text" name="Region" :value="old('Region')" required autofocus autocomplete="Region" />
            <x-input-error :messages="$errors->get('Region')" class="mt-2" />
        </div>

        <!-- District -->
        <div class="mt-4">
            <x-input-label for="District" :value="__('District')" />
            <x-text-input id="District" class="block mt-1 w-full" type="text" name="District" :value="old('District')" required autocomplete="District" />
            <x-input-error :messages="$errors->get('District')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="P.O.BOX" :value="__('P.O.BOX')" />
            <x-text-input id="P.O.BOX" class="block mt-1 w-full" type="text" name="POBOX" :value="old('P.O.BOX')" required autocomplete="P.O.BOX" />
            <x-input-error :messages="$errors->get('P.O.BOX')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Emblem" :value="__('Emblem')" />
            <x-text-input id="Emblem" class="block mt-1 w-full" type="file" name="Emblem" :value="old('Emblem')" required autocomplete="Emblem" />
            <x-input-error :messages="$errors->get('Emblem')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="BankAccount" :value="__('BankAccount')" />
            <x-text-input id="BankAccount" class="block mt-1 w-full" type="text" name="BankAccount" :value="old('BankAccount')" required autocomplete="BankAccount" />
            <x-input-error :messages="$errors->get('BankAccount')" class="mt-2" />
        </div>
        
        <div class="mt-4">
            <x-input-label for="FirstContact" :value="__('FirstContact')" />
            <x-text-input id="FirstContact" class="block mt-1 w-full" type="text" name="FirstContact" :value="old('FirstContact')" required autocomplete="FirstContact" />
            <x-input-error :messages="$errors->get('FirstContact')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="SecondContact" :value="__('SecondContact')" />
            <x-text-input id="SecondContact" class="block mt-1 w-full" type="text" name="SecondContact" :value="old('SecondContact')" required autocomplete="SecondContact" />
            <x-input-error :messages="$errors->get('SecondContact')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Studentfees" :value="__('Studentfees')" />
            <x-text-input id="Studentfees" class="block mt-1 w-full" type="text" name="Studentfees" :value="old('Studentfees')" required autocomplete="Studentfees" />
            <x-input-error :messages="$errors->get('Studentfees')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="Studentamount" :value="__('Studentamount')" />
            <x-text-input id="Studentamount" class="block mt-1 w-full" type="text" name="Studentamount" :value="old('Studentamount')" required autocomplete="Studentamount" />
            <x-input-error :messages="$errors->get('Studentamount')" class="mt-2" />
        </div>
        <br><br>
            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
        
    </form>
</x-guest-layout>
</x-app-layout>
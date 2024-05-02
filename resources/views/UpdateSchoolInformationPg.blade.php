<x-app-layout>
<x-guest-layout>

@if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<form method="POST" action="{{ route('UpdateSchoolInformationPg', ['id' => $schoolinformation->id]) }}">
    @csrf
    @method('POST') <!-- Use PUT or PATCH method -->
    <!-- Include input fields for updating the data -->
    <div>
            <x-input-label for="SchoolName" :value="__('SchoolName')" />
            <x-text-input id="SchoolName" class="block mt-1 w-full" type="text" name="SchoolName" value="{{ $schoolinformation->SchoolName}}" required autofocus autocomplete="SchoolName" />
            </div>

            <div>
            <x-input-label for="Country" :value="__('Country')" />
            <x-text-input id="Country" class="block mt-1 w-full" type="text" name="Country"  value="{{ $schoolinformation->Country}}" required autofocus autocomplete="Country" />
            </div>

            <div>
            <x-input-label for="Region" :value="__('Region')" />
            <x-text-input id="Region" class="block mt-1 w-full" type="text" name="Region"  value="{{ $schoolinformation->Region}}" required autofocus autocomplete="Region" />
            </div>

            <div>
            <x-input-label for="District" :value="__('District')" />
            <x-text-input id="District" class="block mt-1 w-full" type="text" name="District"  value="{{ $schoolinformation->District}}" required autofocus autocomplete="District" />
            </div>

            <div>
            <x-input-label for="POBOX" :value="__('POBOX')" />
            <x-text-input id="POBOX" class="block mt-1 w-full" type="text" name="POBOX"  value="{{ $schoolinformation->POBOX}}" required autofocus autocomplete="POBOX" />
            </div>


            <div>
            <x-input-label for="Emblem" :value="__('Emblem')" />
            <x-text-input id="Emblem" class="block mt-1 w-full" type="text" name="Emblem"  value="{{ $schoolinformation->Emblem}}" required autofocus autocomplete="Emblem" />
            </div>

            <div>
            <x-input-label for="BankAccount" :value="__('BankAccount')" />
            <x-text-input id="BankAccount" class="block mt-1 w-full" type="text" name="BankAccount"  value="{{ $schoolinformation->BankAccount}}" required autofocus autocomplete="BankAccount" />
            </div>

            <div>
            <x-input-label for="FirstContact" :value="__('FirstContact')" />
            <x-text-input id="FirstContact" class="block mt-1 w-full" type="text" name="FirstContact"  value="{{ $schoolinformation->FirstContact}}" required autofocus autocomplete="FirstContact" />
            </div>

            <div>
            <x-input-label for="SecondContact" :value="__('SecondContact')" />
            <x-text-input id="SecondContact" class="block mt-1 w-full" type="text" name="SecondContact"  value="{{ $schoolinformation->SecondContact}}" required autofocus autocomplete="SecondContact" />
            </div>

   
    
    <!-- Add other fields as needed -->
    <button type="submit">Update</button>
</form>
</x-guest-layout>
</x-app-layout>
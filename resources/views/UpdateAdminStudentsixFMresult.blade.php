<x-app-layout>
<x-guest-layout>

@if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<form method="POST" action="{{ route('AdminStudentsixfirstMidtermresult', ['id' => $data->id]) }}">
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
            <x-input-label for="Arabic" :value="__('Arabic')" />
            <x-text-input id="Arabic" class="block mt-1 w-full" type="text" name="Arabic"  value="{{ $data->Arabic}}" required autofocus autocomplete="Arabic" />
            </div>

            <div>
            <x-input-label for="CivicsandMorals" :value="__('CivicsandMorals')" />
            <x-text-input id="CivicsandMorals" class="block mt-1 w-full" type="text" name="CivicsandMorals"  value="{{ $data->CivicsandMorals}}" required autofocus autocomplete="CivicsandMorals" />
            </div>


            <div>
            <x-input-label for="English" :value="__('English')" />
            <x-text-input id="English" class="block mt-1 w-full" type="text" name="English"  value="{{ $data->English}}" required autofocus autocomplete="English" />
            </div>

            <div>
            <x-input-label for="EDK" :value="__('EDK')" />
            <x-text-input id="EDK" class="block mt-1 w-full" type="text" name="EDK"  value="{{ $data->EDK}}" required autofocus autocomplete="EDK" />
            </div>

            <div>
            <x-input-label for="Mathematics" :value="__('Mathematics')" />
            <x-text-input id="Mathematics" class="block mt-1 w-full" type="text" name="Mathematics"  value="{{ $data->Mathematics}}" required autofocus autocomplete="Mathematics" />
            </div>

            <div>
            <x-input-label for="Science" :value="__('Science')" />
            <x-text-input id="Science" class="block mt-1 w-full" type="text" name="Science"  value="{{ $data->Science}}" required autofocus autocomplete="Science" />
            </div>

            <div>
            <x-input-label for="Socialsstudies" :value="__('Socialsstudies')" />
            <x-text-input id="Socialsstudies" class="block mt-1 w-full" type="text" name="Socialsstudies"  value="{{ $data->Socialsstudies}}" required autofocus autocomplete="Socialsstudies" />
            </div>

            <div>
            <x-input-label for="Kiswahili" :value="__('Kiswahili')" />
            <x-text-input id="Kiswahili" class="block mt-1 w-full" type="text" name="Kiswahili"  value="{{ $data->Kiswahili}}" required autofocus autocomplete="Kiswahili" />
            </div>
   
    
    <!-- Add other fields as needed -->
    <button type="submit">Update</button>
</form>
</x-guest-layout>
</x-app-layout>
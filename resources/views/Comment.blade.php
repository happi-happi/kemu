<x-app-layout>
<x-guest-layout>
    <form method="POST" action="{{ route('Comment') }}">
        @csrf
        <!-- ID -->
        <div>
        <input type="text" name="id" class="block mt-1 w-full" value="{{ $userId }}" readonly style="display: none;"   >
        </div>

           <!-- Mname -->
           <div>
            <x-input-label for="comment" :value="__('comment')" />
            <x-text-input id="comment" class="block mt-1 w-full" type="text" name="Comment"  required autofocus autocomplete="comment" />
            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
        </div>

        <button type="submit">Submit</button>
</form>
        </x-guest-layout>
</x-app-layout>   
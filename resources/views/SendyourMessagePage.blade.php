<x-app-layout>
<x-guest-layout>
    <form method="POST"   enctype="multipart/form-data"  action="{{ route('SendyourMessage') }}">
        @csrf
        <div>
        <input type="text" name="id" class="block mt-1 w-full" value="{{ $userId }}" readonly style="display: none;"   >
        </div>
        
        <div>
            <x-input-label for="Subject" :value="__('Subject')" />
            <x-text-input id="Subject" class="block mt-1 w-full" type="text" name="Subject" :value="old('Subject')" required autofocus autocomplete="Subject" />
            <x-input-error :messages="$errors->get('Subject')" class="mt-2" />
        </div>
        <br>
        <div>      
 <select class="form-select" name="Department"  aria-label="Default select example">
  <option selected>Choose Department</option>
  <option value="FinanceDepartment">Finance Department</option>
  <option value="TeacherDepartment">TeacherDepartment</option>
  <option value="HeadTeacher">HeadTeacher</option>
  <option value="SecondHeadTeacher">SecondHeadTeacher</option>
  <option value="DiscplineMaster">DiscplineMaster</option>
  <option value="Burser">Burser</option>
</select>
</div>
<br>
           <!-- Mname -->
           <div>
            <textarea name="Message"></textarea>
        </div>

        <div>
            <x-input-label for="file" :value="__('Submit your document')" />
            <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" autofocus autocomplete="file" />
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>

<button type="submit">Submit</button>
</form>



</x-guest-layout>


</x-app-layout>
@if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
        @endif

<form method="POST" action="{{ route('AdminStudentresult', ['id' => $data->id]) }}">
    @csrf
    @method('POST') <!-- Use PUT or PATCH method -->
    <!-- Include input fields for updating the data -->
    <input type="text" name="Fname" value="{{ $data->Fname}}">
    <input type="text" name="Mname" value="{{ $data->Mname}}">
    <input type="text" name="Lname" value="{{ $data->Lname}}">
    <input type="text" name="Arabic" value="{{ $data->Fname}}">
    <input type="text" name="CivicsandMorals" value="{{ $data->CivicsandMorals}}">
    <input type="text" name="English" value="{{ $data->English}}">
    <input type="text" name="EDK" value="{{ $data->EDK}}">
    <input type="text" name="Mathematics" value="{{ $data->Mathematics}}">
    <input type="text" name="Science" value="{{ $data->Science}}">
    <input type="text" name="Socialsstudies" value="{{ $data->Socialsstudies}}">
    <input type="text" name="Kiswahili" value="{{ $data->Kiswahili}}">
    <!-- Add other fields as needed -->
    <button type="submit">Update</button>
</form>
<form action="{{ route('storeRegisterSubjectTeacher') }}" method="POST">
    @csrf

    <label for="subjects_id">Register Teacher to Subject</label>
    <select name="staff_id" id="staff_id" class="form-control">
        <option value="">Select a Subject</option>
        @foreach ($staff as $staff)
            <option value="{{ $staff->id }}">{{ $staff->staffFname }} {{ $staff->staffMname}} {{ $staff->staffLname}} </option>
        @endforeach
    </select>

    <label for="subjects_id">Register Teacher to Subject</label>
    <select name="subjects_id" id="subjects_id" class="form-control">
        <option value="">Select a Subject</option>
        @foreach ($subjects as $subject)
            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
        @endforeach
    </select>

 
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
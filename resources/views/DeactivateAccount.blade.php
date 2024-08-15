<x-app-layout>
    
    <div class="container mt-3">
    <p>Deactivate Account</p>
        <div class="row">
            <div class="col-md-3">
                <form action="{{ route('deactivate') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <select class="form-select" name="SchoolName" aria-label="Default select example">
                        <option selected>Select School</option>
                        @foreach($SchoolName as $school)
                            <option value="{{ $school->id }}">{{ $school->SchoolName }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Deactivate Users with Role</button>
                </form>
                <br>
                <form action="{{ route('deactivate') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <select class="form-select" name="UserName" aria-label="Default select example">
                        <option selected>Select User</option>
                        @foreach($UserName as $user)
                            <option value="{{ $user->id }}">{{ $user->Fname }} {{ $user->Mname }} {{ $user->Lname }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Deactivate Users with Role</button>
                </form>
            </div>
        </div>
    </div>
    <br><br>

   
    <div class="container mt-3">
    <p>Activate Account</p>
        <div class="row">
            <div class="col-md-3">
                <form action="{{ route('activate') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <select class="form-select" name="SchoolName" aria-label="Default select example">
                        <option selected>Select School</option>
                        @foreach($SchoolName as $school)
                            <option value="{{ $school->id }}">{{ $school->SchoolName }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Activate Users with Role</button>
                </form>
                <br>
                <form action="{{ route('activate') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <select class="form-select" name="UserName" aria-label="Default select example">
                        <option selected>Select User</option>
                        @foreach($UserName as $user)
                            <option value="{{ $user->id }}">{{ $user->Fname }} {{ $user->Mname }} {{ $user->Lname }}</option>
                        @endforeach
                    </select>
                    <button type="submit">Activate Users with Role</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
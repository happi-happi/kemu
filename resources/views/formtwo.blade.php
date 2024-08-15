<x-app-layout>
<br><br>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('import-excel')}}"> Standard four</a></li>
    <li><a class="dropdown-item" href="{{route('standardsiximport')}}">Standard six</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenimport')}}"> Standard seven</a></li>
  </ul>
</div>
<br>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Secondary Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('standardformoneimport')}}">Form one</a></li>
    <li><a class="dropdown-item" href="{{route('standardformthreeimport')}}"> Form three</a></li>
    <li><a class="dropdown-item" href="{{route('standardformfourimport')}}"> Form four</a></li>
  </ul>
</div>

<br>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Advance Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('standardfiveimport')}}">Form five</a></li>
    <li><a class="dropdown-item" href="{{route('standardsiximport')}}">Form six</a></li>
  </ul>
</div>

<br>
<div class="container">
    <a class="btn btn-warning"
                       href="{{ route('FormII') }}">
                       Export Form two 
                      </a>
</div>
 <br><br>
<div class="container">
    
@if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
        @endif
 
    <form action="{{ route('standardformtwofirstmidterm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form two First Midterm</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>

    <br><br>


    <div class="container">
@if (session('Alert'))
                    <div class="alert alert-success">{{ session('Alert') }}</div>
        @endif
 
    <form action="{{ route('standardformtwoSemiAnnual') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form two Semi Annual</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>

<br><br>



<div class="container">
@if (session('Alert'))
                    <div class="alert alert-success">{{ session('notifications') }}</div>
        @endif
 
    <form action="{{ route('standardformtwosecondmidterm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form two second midterm</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>

<br><br>
<div class="container">
@if (session('notification'))
                    <div class="alert alert-success">{{ session('notification') }}</div>
        @endif
 
    <form action="{{ route('standardformtwoAnnual') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form two  annual</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>

<br><br>

</div>
</x-app-layout>
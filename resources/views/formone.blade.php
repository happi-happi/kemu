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
    <li><a class="dropdown-item" href="{{route('standardformtwoimport')}}">Form two</a></li>
    <li><a class="dropdown-item" href="{{route('standardformthreeimport')}}">Form three</a></li>
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
                       href="{{ route('FormI') }}">
                       Export Form One 
                      </a>
</div>
 <br><br>
<div class="container">
    
@if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
        @endif
 
    <form action="{{ route('standardformonefirstmidterm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form one First Midterm</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>

    <br><br>


    <div class="container">
@if (session('Alert'))
                    <div class="alert alert-success">{{ session('Alert') }}</div>
        @endif
 
    <form action="{{ route('standardformoneSemiAnnual') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form one Semi Annual</label>
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
 
    <form action="{{ route('standardformonesecondmidterm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form one second midterm</label>
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
 
    <form action="{{ route('standardformoneAnnual') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="file" >Form one  annual</label>
            <input type="file" name="import_file"id="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
</div>

<br><br>

</div>
</x-app-layout>
<form action="{{ route('storesubjects') }}" method="POST">
    @csrf
     <label>Register subject</label>
    <input type="text" name="name" value="">

 


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
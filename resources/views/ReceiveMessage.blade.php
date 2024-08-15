<x-app-layout>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Message
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('GetyourMessage')}}"> SENT</a></li>
  </ul>
</div> 
<table class="table">
    <p>Received Message</p>
<thead >
  <tr>
      <th>Subject</th>
      <th>Department</th>
      <th>Message</th>
      <th>file</th> 
      <th>Date and Time</th> 
      <th>action</th> 
     

  </tr>
  </thead>
  <tbody>
  
@foreach ($Receivemessage  as $message)
<tr>
<td>{{$message->Subject}}</td>
<td>{{$message->Department }}</td>
<td>{{$message->Message}}</td>
<td>{{$message->file_path }}</td>
<td>{{$message->created_at }}</td>
<td><a href="{{route('download',$message->file_path)}}">Downloads</a></td>
</tr>   
@endforeach

</tbody>
</table>
</x-app-layout>

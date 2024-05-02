<x-app-layout>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
  Message
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('ReceiveMessage')}}">RECEIVED</a></li>
  </ul>
</div> 
<table class="table">
    <p>Sent</p>
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
@foreach ($data  as $data)
<tr>
<td>{{$data->Subject}}</td>
<td>{{$data->Department }}</td>
<td>{{$data->Message}}</td>
<td>{{$data->file_path }}</td>
<td>{{$data->created_at }}</td>
<td><a href="{{route('download',$data->file_path)}}">Downloads</a></td>
</tr>   

@endforeach
</tbody>
</table>


</x-app-layout>


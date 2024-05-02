<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Standard Four First Midterm Data</title>
</head>
<body>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
    Primary Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('student')}}"> Standard Four first  midterm  And semi  annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfourSM')}}">Standard Four second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverFM')}}">Standard Five first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverSM')}}"> Standard Five second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsixFM')}}">Standard six  first  midterm  And semi  annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsixSM')}}">Standard six  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
  </ul>
</div> 
 

<p>Standard Seven  second Midterm Data</p>
@if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

    @if($data)
    <table class="table   table-striped table-bordered">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Arabic</th>
                <th>Civics and Morals</th>
                <th>English</th>
                <th>EDK</th>
                <th>Mathematics</th>
                <th>Science</th>
                <th>Social Studies</th>
                <th>Kiswahili</th>
                <th>Average</th>
            </tr>
        </thead>
        <tbody>
        <tr>
             <td>{{ $data->user->Fname }} {{ $data->user->Mname }} {{ $data->user->Lname }}</td>
            <td>{{ $data->Arabic }} {{ $grades['Arabic']}}{{ $positionArabicSM['Annual']['Arabic'] }}</td>
            <td>{{ $data->CivicsandMorals }} {{ $grades['CivicsandMorals'] }}{{ $positionCivicsandMoralsSM['Annual']['CivicsandMorals'] }}</td>
            <td>{{ $data->English }} {{ $grades['English'] }}{{ $positionEnglishSM['Annual']['English'] }}</td>
            <td>{{ $data->EDK }} {{ $grades['EDK'] }}{{ $positionEDKSM['Annual']['EDK'] }}</td>
            <td>{{ $data->Mathematics }} {{ $grades['Mathematics'] }}{{ $positionMathematicsSM['Annual']['Mathematics'] }}</td>
            <td>{{ $data->Science }} {{ $grades['Science'] }}{{ $positionScienceSM['Annual']['Science'] }}</td>
            <td>{{ $data->Socialsstudies }} {{ $grades['Socialsstudies'] }}{{ $positionScienceSM['Annual']['Socialsstudies'] }}</td>
            <td>{{ $data->Kiswahili }} {{ $grades['Kiswahili'] }}{{ $positionKiswahiliSM['Annual']['Kiswahili'] }}</td>
            <td>{{$AverageSM}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>No data found for the authenticated user.</p>
    @endif
    @endif

    <p>Standard Seven  annual Data</p>
    @if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

@if($StandardsevenSM)
<table class="table   table-striped table-bordered">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Arabic</th>
            <th>Civics and Morals</th>
            <th>English</th>
            <th>EDK</th>
            <th>Mathematics</th>
            <th>Science</th>
            <th>Social Studies</th>
            <th>Kiswahili</th>
            <th>Average</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $StandardsevenSM->user->Fname }} {{ $StandardsevenSM->user->Mname }} {{ $StandardsevenSM->user->Lname }}</td>
            <td>{{ $StandardsevenSM->Arabic }} {{  $STDVIIgrades['Arabic']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->CivicsandMorals }} {{  $STDVIIgrades['CivicsandMorals']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->English }} {{  $STDVIIgrades['English']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->EDK }} {{  $STDVIIgrades['EDK']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->Mathematics }} {{  $STDVIIgrades['Mathematics']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->Science }} {{ $STDVIIgrades['Science']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->Socialsstudies }} {{ $STDVIIgrades['Socialsstudies']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{ $StandardsevenSM->Kiswahili }} {{ $STDVIIgrades['Kiswahili']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{$AverageAL}}</td>
        </tr>
    </tbody>
</table>
@else
<p>No data found for the authenticated user.</p>
@endif
@endif



    </body>
</html>

</x-app-layout>
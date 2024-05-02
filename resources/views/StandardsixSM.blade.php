
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
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenSM')}}">Standard seven  second midterm  And annual result</a></li>
  </ul>
</div> 

    <p>Standard Six Second Midterm Data</p>
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
            <td>{{ $data->Arabic }} {{ $grades['Arabic']}}{{ $positionArabicSM['SecondMidterm']['Arabic'] }}</td>
            <td>{{ $data->CivicsandMorals }} {{ $grades['CivicsandMorals'] }}{{ $positionArabicSM['SecondMidterm']['CivicsandMorals'] }}</td>
            <td>{{ $data->English }} {{ $grades['English'] }}{{ $positionArabicSM['SecondMidterm']['English'] }}</td>
            <td>{{ $data->EDK }} {{ $grades['EDK'] }}{{ $positionEDKSM['SecondMidterm']['EDK'] }}</td>
            <td>{{ $data->Mathematics }} {{ $grades['Mathematics'] }}{{ $positionArabicSM['SecondMidterm']['Mathematics'] }}</td>
            <td>{{ $data->Science }} {{ $grades['Science'] }}{{ $positionArabicSM['SecondMidterm']['Science'] }}</td>
            <td>{{ $data->Socialsstudies }} {{ $grades['Socialsstudies'] }}{{ $positionArabicSM['SecondMidterm']['Socialsstudies'] }}</td>
            <td>{{ $data->Kiswahili }} {{ $grades['Kiswahili'] }}{{ $positionArabicSM['SecondMidterm']['Kiswahili'] }}</td>
            <td>{{$AverageSM}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>No data found for the authenticated user.</p>
    @endif
    @endif

    <p>Standard Six  annual Data</p>
    @if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

@if($standardsixSM)
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
            <td>{{ $standardsixSM->user->Fname }} {{ $standardsixSM->user->Mname }} {{ $standardsixSM->user->Lname }}</td>
            <td>{{ $standardsixSM->Arabic }}{{ $STDVIAnnualgrades['Arabic']}}{{ $positionArabicAL['Annual']['Arabic'] }}</td>
            <td>{{ $standardsixSM->CivicsandMorals }}{{ $STDVIAnnualgrades['CivicsandMorals']}}{{ $positionCivicsandMoralsAL['Annual']['CivicsandMorals'] }}</td>
            <td>{{ $standardsixSM->English }}{{ $STDVIAnnualgrades['English']}}{{ $positionEnglishAL['Annual']['English'] }}</td>
            <td>{{ $standardsixSM->EDK }}{{ $STDVIAnnualgrades['EDK']}}{{ $positionEDKAL['Annual']['EDK'] }}</td>
            <td>{{ $standardsixSM->Mathematics }}{{ $STDVIAnnualgrades['Mathematics']}}{{ $positionMathematicsAL['Annual']['Mathematics'] }}</td>
            <td>{{ $standardsixSM->Science }}{{ $STDVIAnnualgrades['Science']}}{{ $positionScienceAL['Annual']['Science'] }}</td>
            <td>{{ $standardsixSM->Socialsstudies }}{{ $STDVIAnnualgrades['Socialsstudies']}}{{ $positionScienceAL['Annual']['Socialsstudies'] }}</td>
            <td>{{ $standardsixSM->Kiswahili }}{{ $STDVIAnnualgrades['Kiswahili']}}{{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
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
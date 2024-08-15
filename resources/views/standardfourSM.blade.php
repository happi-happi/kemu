<x-app-layout>
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
    <li><a class="dropdown-item" href="{{route('standardfiverFM')}}">Standard Five first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverSM')}}"> Standard Five second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsixFM')}}">Standard six  first  midterm  And semi  annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsixSM')}}">Standard six  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenSM')}}">Standard seven  second midterm  And annual result</a></li>
  </ul>
</div> 

    <p>Standard Four second midterm Data</p>

@if($standardfourSM)
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
            <td>{{ $standardfourSM->user->Fname }} {{ $standardfourSM->user->Mname }} {{ $standardfourSM->user->Lname }}</td>
            <td>{{ $standardfourSM->Arabic }} {{ $StdIVSMgrades['Arabic']}} {{ $positionArabicSM['SecondMidterm']['Arabic'] }}</td>
            <td>{{ $standardfourSM->CivicsandMorals }} {{ $StdIVSMgrades['CivicsandMorals']}} {{ $positionArabicSM['SecondMidterm']['CivicsandMorals'] }}</td>
            <td>{{ $standardfourSM->English }} {{ $StdIVSMgrades['English']}} {{ $positionArabicSM['SecondMidterm']['English'] }}</td>
            <td>{{ $standardfourSM->EDK }} {{ $StdIVSMgrades['EDK']}} {{ $positionEDKSM['SecondMidterm']['EDK'] }}</td>
            <td>{{ $standardfourSM->Mathematics }} {{ $StdIVSMgrades['Mathematics']}} {{ $positionArabicSM['SecondMidterm']['Mathematics'] }}</td>
            <td>{{ $standardfourSM->Science }} {{ $StdIVSMgrades['Science']}} {{ $positionArabicSM['SecondMidterm']['Science'] }}</td>
            <td>{{ $standardfourSM->Socialsstudies }} {{ $StdIVSMgrades['Socialsstudies']}} {{ $positionArabicSM['SecondMidterm']['Socialsstudies'] }}</td>
            <td>{{ $standardfourSM->Kiswahili }} {{ $StdIVSMgrades['Kiswahili']}} {{ $positionArabicSM['SecondMidterm']['Kiswahili'] }}</td>
            <td>{{$AverageSM}}</td>
        </tr>
    </tbody>
</table>
@else
<p>No data found for the authenticated user.</p>
@endif

<p>Standard Four Annual Data</p>

@if($standardfourAnnual)
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
            <td>{{ $standardfourAnnual->user->Fname }} {{ $standardfourAnnual->user->Mname }} {{ $standardfourAnnual->user->Lname }}</td>
            <td>{{ $standardfourAnnual->Arabic }} {{ $StdAnnualgrades['Arabic']}}  {{ $positionArabicAL['Annual']['Arabic'] }}</td>
            <td>{{ $standardfourAnnual->CivicsandMorals }}{{ $StdAnnualgrades['CivicsandMorals']}} {{ $positionCivicsandMoralsAL['Annual']['CivicsandMorals'] }} </td>
            <td>{{ $standardfourAnnual->English }} {{$StdAnnualgrades['English']}} {{ $positionEnglishAL['Annual']['English'] }}</td>
            <td>{{ $standardfourAnnual->EDK }} {{ $StdAnnualgrades['EDK']}} {{ $positionEDKAL['Annual']['EDK'] }}</td>
            <td>{{ $standardfourAnnual->Mathematics }} {{ $StdAnnualgrades['Mathematics']}} {{ $positionMathematicsAL['Annual']['Mathematics'] }}</td>
            <td>{{ $standardfourAnnual->Science }} {{ $StdAnnualgrades['Science']}} {{ $positionScienceAL['Annual']['Science'] }}</td>
            <td>{{ $standardfourAnnual->Science }}{{ $StdAnnualgrades['Socialsstudies']}} {{ $positionScienceAL['Annual']['Socialsstudies'] }} </td>
            <td>{{ $standardfourAnnual->Kiswahili }}{{$StdAnnualgrades['Kiswahili']}}  {{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
            <td>{{$AverageAL}}</td>
        </tr>
    </tbody>
</table>
@else
<p>No data found for the authenticated user.</p>
@endif

</body>
</html>

</x-app-layout>
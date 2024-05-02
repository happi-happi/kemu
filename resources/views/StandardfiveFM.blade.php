<!DOCTYPE html>
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
    <li><a class="dropdown-item" href="{{route('standardfourSM')}}">Standard Four second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverSM')}}"> Standard Five second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsixFM')}}">Standard six  first  midterm  And semi  annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsixSM')}}">Standard six  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenSM')}}">Standard seven  second midterm  And annual result</a></li>
  </ul>
</div> 

   

    <p>Standard Five First Midterm Data</p>
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
             <td>{{ $data->Arabic }} {{ $grades['Arabic']}}{{ $positionArabic['FirstMidterm']['Arabic'] }}</td>
            <td>{{ $data->CivicsandMorals }} {{ $grades['CivicsandMorals'] }}{{ $positionCivicsandMorals['FirstMidterm']['CivicsandMorals'] }}</td>
            <td>{{ $data->English }} {{ $grades['English'] }} {{ $positionEnglish['FirstMidterm']['English'] }}</td>
            <td>{{ $data->EDK }} {{ $grades['EDK'] }}{{ $positionEDK['FirstMidterm']['EDK'] }}</td>
            <td>{{ $data->Mathematics }} {{ $grades['Mathematics'] }} {{ $positionMathematics['FirstMidterm']['Mathematics'] }}</td>
            <td>{{ $data->Science }} {{ $grades['Science'] }} {{ $positionScience['FirstMidterm']['Science'] }}</td>
            <td>{{ $data->Socialsstudies }} {{ $grades['Socialsstudies'] }} {{ $positionSocialsstudies['FirstMidterm']['Socialsstudies'] }}</td>
            <td>{{ $data->Kiswahili }} {{ $grades['Kiswahili'] }} {{ $positionKiswahili['FirstMidterm']['Kiswahili'] }}</td>
            <td>{{$AverageFM}}</td>
          
            </tr>
        </tbody>
    </table>
    @else
    <p>No data found for the authenticated user.</p>
    @endif

    <p>Standard Five Semi annual Data</p>

    @endif
    @if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

@if($standardfiveFM)
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
            <td>{{ $standardfiveFM->user->Fname }} {{ $standardfiveFM->user->Mname }} {{ $standardfiveFM->user->Lname }}</td>
            <td>{{ $standardfiveFM->Arabic }} {{ $STDVFMgrades['Arabic']}}{{ $positionArabicSA['SemiAnnual']['Arabic'] }}</td>
            <td>{{ $standardfiveFM->CivicsandMorals }}{{ $STDVFMgrades['CivicsandMorals']}} {{ $positionCivicsandMoralsSA['SemiAnnual']['CivicsandMorals'] }}</td>
            <td>{{ $standardfiveFM->English }} {{ $STDVFMgrades['English']}} {{ $positionEnglishSA['SemiAnnual']['English'] }}</td>
            <td>{{ $standardfiveFM->EDK }} {{ $STDVFMgrades['EDK']}}{{ $positionEDKSA['SemiAnnual']['EDK'] }}</td>
            <td>{{ $standardfiveFM->Mathematics }}{{ $STDVFMgrades['Mathematics']}}{{ $positionMathematicsSA['SemiAnnual']['Mathematics'] }} </td>
            <td>{{ $standardfiveFM->Science }} {{ $STDVFMgrades['Science']}}{{ $positionScienceSA['SemiAnnual']['Science'] }}</td>
            <td>{{ $standardfiveFM->Socialsstudies }} {{ $STDVFMgrades['Socialsstudies']}}{{ $positionSocialsstudiesSA['SemiAnnual']['Socialsstudies'] }}</td>
            <td>{{ $standardfiveFM->Kiswahili }} {{ $STDVFMgrades['Kiswahili']}}{{ $positionKiswahiliSA['SemiAnnual']['Kiswahili'] }}</td>
            <td>{{$AverageSA}}</td>
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
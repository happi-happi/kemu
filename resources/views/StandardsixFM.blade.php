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
    <li><a class="dropdown-item" href="{{route('standardsixSM')}}">Standard six  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenSM')}}">Standard seven  second midterm  And annual result</a></li>
  </ul>
</div> 
   
   

    <p>Standard Six First Midterm Data</p>
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
            <td>{{ $data->English }} {{ $grades['English'] }}{{ $positionEnglish['FirstMidterm']['English'] }}</td>
            <td>{{ $data->EDK }} {{ $grades['EDK'] }}{{ $positionEDK['FirstMidterm']['EDK'] }}</td>
            <td>{{ $data->Mathematics }} {{ $grades['Mathematics'] }}{{ $positionMathematics['FirstMidterm']['Mathematics'] }}</td>
            <td>{{ $data->Science }} {{ $grades['Science'] }}{{ $positionScience['FirstMidterm']['Science'] }}</td>
            <td>{{ $data->Socialsstudies }} {{ $grades['Socialsstudies'] }}{{ $positionSocialsstudies['FirstMidterm']['Socialsstudies'] }}</td>
            <td>{{ $data->Kiswahili }} {{ $grades['Kiswahili'] }}{{ $positionKiswahili['FirstMidterm']['Kiswahili'] }}</td>
            <td>{{$AverageFM}}</td>
            </tr>
        </tbody>
    </table>
    @else
    <p>No data found for the authenticated user.</p>
    @endif
    @endif

    <p>Standard Six Semi annual Data</p>
    @if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

@if($standardsixFM)
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
            <td>{{ $standardsixFM->user->Fname }} {{ $standardsixFM->user->Mname }} {{ $standardsixFM->user->Lname }}</td>
            <td>{{ $standardsixFM->Arabic }} {{ $StdVIFMgrades['Arabic'] }}{{ $positionArabicSA['SemiAnnual']['Arabic'] }}</td>
            <td>{{ $standardsixFM->CivicsandMorals }} {{ $StdVIFMgrades['CivicsandMorals'] }}{{ $positionCivicsandMoralsSA['SemiAnnual']['CivicsandMorals'] }}</td>
            <td>{{ $standardsixFM->English }} {{ $StdVIFMgrades['English'] }}{{ $positionEnglishSA['SemiAnnual']['English'] }}</td>
            <td>{{ $standardsixFM->EDK }} {{ $StdVIFMgrades['EDK'] }}{{ $positionEDKSA['SemiAnnual']['EDK'] }}</td>
            <td>{{ $standardsixFM->Mathematics }} {{ $StdVIFMgrades['Mathematics'] }}{{ $positionMathematicsSA['SemiAnnual']['Mathematics'] }} </td>
            <td>{{ $standardsixFM->Science }} {{ $StdVIFMgrades['Science'] }}{{ $positionScienceSA['SemiAnnual']['Science'] }}</td>
            <td>{{ $standardsixFM->Socialsstudies }} {{ $StdVIFMgrades['Socialsstudies'] }}{{ $positionSocialsstudiesSA['SemiAnnual']['Socialsstudies'] }}</td>
            <td>{{ $standardsixFM->Kiswahili }} {{ $StdVIFMgrades['Kiswahili'] }}{{ $positionKiswahiliSA['SemiAnnual']['Kiswahili'] }}</td>
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
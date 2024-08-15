<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Form Three </title>
</head>
<body>
<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
   Primary  Semester
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="{{route('standardfourSM')}}">Standard Four second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverFM')}}">Standard Five first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardfiverSM')}}"> Standard Five second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsixFM')}}">Standard six  first  midterm  And semi  annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsixSM')}}">Standard six  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenFM')}}">Standard seven  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('standardsevenSM')}}">Standard seven  second midterm  And annual result</a></li>
  </ul>
</div> 
<br>

<div class="dropdown">
  <button type="button" class="btn btn-warning dropdown-toggle" data-bs-toggle="dropdown">
   Secondary   Semester
  </button>
  <ul class="dropdown-menu">
     <li><a class="dropdown-item" href="{{route('FormOneFM')}}">Form One  first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('FormOneSM')}}">Form one  second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('FormTwoSM')}}"> Form two  second midterm  And annual result</a></li>
    <li><a class="dropdown-item" href="{{route('FormThreeSM')}}">Form Three  second midterm  And annual result </a></li>
    <li><a class="dropdown-item" href="{{route('FormFourFM')}}">Form four first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('FormFourSM')}}">Form four  second midterm  And annual result</a></li>
  </ul>
</div>
  
@if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

    @if($data)
    <table class="table table-striped table-bordered">
    <p>Form three First Midterm Data</p>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Arabiclanguage</th>
                <th>Basicmathematics</th>
                <th>Bibleknowledge</th>
                <th>Bookkeeping</th>
                <th>Biology</th>
                <th>Civics</th>
                <th>Chemistry</th>
                <th>Computerstudy</th>
                <th>Creativearts</th>
                <th>Commerce</th>
                <th>Englishliterature</th>
                <th>French</th>
                <th>History</th>
                <th>Islamicknowledge</th>
                <th>Kiswahili</th>
                <th>Lifeskill</th>
                <th>Physics</th>
                <th>Swimming</th>
                <th>Nutrition</th>
                <th>Average</th>
                
            </tr>
        </thead>
        <tbody>
        <tr>
    <td>{{ $data->user->Fname }} {{ $data->user->Mname }} {{ $data->user->Lname }}</td>
    <td>{{ $data->Arabiclanguage }}{{ $grades['Arabiclanguage'] }} {{ $positionArabiclanguageFM['FirstMidterm']['Arabiclanguage'] }} </td>
    <td>{{ $data->Basicmathematics }} {{ $grades['Basicmathematics'] }} {{ $positionBasicmathematicFM['FirstMidterm']['Basicmathematics'] }}</td>
    <td>{{ $data->Bibleknowledge }} {{ $grades['Bibleknowledge'] }} {{ $positionBibleknowledgeFM['FirstMidterm']['Bibleknowledge'] }}</td>
    <td>{{ $data->Bookkeeping}}{{ $grades['Bookkeeping'] }} {{ $positionBookkeepingFM['FirstMidterm']['Bookkeeping'] }} </td>
    <td>{{ $data->Biology }}{{ $grades['Biology'] }} {{ $positionBiologyFM['FirstMidterm']['Biology'] }} </td>
    <td>{{ $data->Civics}} {{ $grades['Civics'] }} {{ $positionCivicsFM['FirstMidterm']['Civics'] }}</td>
    <td>{{ $data->Chemistry }}{{ $grades['Chemistry'] }} {{ $positionChemistryFM['FirstMidterm']['Chemistry'] }} </td>
    <td>{{ $data->Computerstudy }}{{ $grades['Computerstudy'] }} {{ $positionComputerstudyFM['FirstMidterm']['Computerstudy'] }}</td>
    <td>{{ $data->Creativearts }} '{{ $grades['Creativearts'] }}' {{ $positionCreativeartFM['FirstMidterm']['Creativearts'] }}</td>
    <td>{{ $data->Commerce }} {{ $grades['Commerce'] }} {{ $positionCommerceFM['FirstMidterm']['Commerce'] }}</td>
    <td>{{ $data->Englishliterature }}{{ $grades['Englishliterature'] }} {{ $positionEnglishliteratureFM['FirstMidterm']['Englishliterature'] }}</td>
    <td>{{ $data->French}} {{ $grades['French'] }} {{ $positionFrenchFM['FirstMidterm']['French'] }} </td>
    <td>{{ $data->History}} {{ $grades['History'] }} {{ $positionHistoryFM['FirstMidterm']['History'] }}</td>
    <td>{{ $data->Islamicknowledge }} {{ $grades['Islamicknowledge'] }} {{ $positionIslamicknowledgeFM['FirstMidterm']['Islamicknowledge'] }}</td>
    <td>{{ $data->Kiswahili}} {{ $grades['Kiswahili'] }} {{ $positionKiswahiliFM['FirstMidterm']['Kiswahili'] }}</td>
    <td>{{ $data->Lifeskill}}{{ $grades['Lifeskill'] }} {{ $positionLifeskillFM['FirstMidterm']['Lifeskill'] }}</td>
    <td>{{ $data->Physics}} {{ $grades['Physics'] }} {{ $positionPhysicsFM['FirstMidterm']['Physics'] }} </td>
    <td>{{ $data->Swimming }}{{ $grades['Swimming'] }} {{ $positionSwimmingFM['FirstMidterm']['Swimming'] }}</td>
    <td>{{ $data->Nutrition}}{{ $grades['Nutrition'] }} {{ $positionNutritionFM['FirstMidterm']['Nutrition'] }} </td>
    <td>{{$AverageFM}}</td>
</tr>

        </tbody>
    </table>
    @else
    <p>{{ $errorMessage }}</p>
    @endif
    @endif

    @if(isset($errorMessage))
    <p>{{ $errorMessage }}</p>
@else

   @if($FormISA)
    <table class="table   table-striped table-bordered">

 <p>Form three  semi annual Data</p>
 <thead>
            <tr>
                <th>Full Name</th>
                <th>Arabiclanguage</th>
                <th>Basicmathematics</th>
                <th>Bibleknowledge</th>
                <th>Bookkeeping</th>
                <th>Biology</th>
                <th>Civics</th>
                <th>Chemistry</th>
                <th>Computerstudy</th>
                <th>Creativearts</th>
                <th>Commerce</th>
                <th>Englishliterature</th>
                <th>French</th>
                <th>History</th>
                <th>Islamicknowledge</th>
                <th>Kiswahili</th>
                <th>Lifeskill</th>
                <th>Physics</th>
                <th>Swimming</th>
                <th>Nutrition</th>
                <th>Average</th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
    <td>{{ $FormISA->user->Fname }} {{ $data->user->Mname }} {{ $data->user->Lname }}</td>
    <td>{{ $FormISA->Arabiclanguage }} '{{ $FormIgradesSA['Arabiclanguage'] }}' {{ $positionArabiclanguageSA['SemiAnnual']['Arabiclanguage'] }}</td>
    <td>{{ $FormISA->Basicmathematics }} {{ $FormIgradesSA['Basicmathematics'] }} {{ $positionBasicmathematicSA['SemiAnnual']['Basicmathematics'] }}</td>
    <td>{{ $FormISA->Bibleknowledge }} {{ $FormIgradesSA['Bibleknowledge'] }} {{ $positionBibleknowledgeSA['SemiAnnual']['Bibleknowledge'] }}</td>
    <td>{{ $FormISA->Bookkeeping }} {{ $FormIgradesSA['Bookkeeping'] }} {{ $positionBookkeepingSA['SemiAnnual']['Bookkeeping'] }}</td>
    <td>{{ $FormISA->Biology }} {{ $FormIgradesSA['Biology'] }} {{ $positionBiologySA['SemiAnnual']['Biology'] }}</td>
    <td>{{ $FormISA->Civics}} {{ $FormIgradesSA['Civics'] }} {{ $positionCivicsSA['SemiAnnual']['Civics'] }}</td>
    <td>{{ $FormISA->Chemistry }} {{ $FormIgradesSA['Chemistry'] }} {{ $positionChemistrySA['SemiAnnual']['Chemistry'] }}</td>
    <td>{{ $FormISA->Computerstudy }} {{ $FormIgradesSA['Computerstudy'] }} {{ $positionComputerstudySA['SemiAnnual']['Computerstudy'] }}</td>
    <td>{{ $FormISA->Creativearts }} '{{ $FormIgradesSA['Creativearts'] }}' {{ $positionCreativeartsSA['SemiAnnual']['Creativearts'] }}</td>
    <td>{{ $FormISA->Commerce }} {{ $FormIgradesSA['Commerce'] }} {{ $positionCommerceSA['SemiAnnual']['Commerce'] }}</td>
    <td>{{ $FormISA->Englishliterature }} {{ $FormIgradesSA['Englishliterature'] }} {{ $positionEnglishliteratureSA['SemiAnnual']['Englishliterature'] }}</td>
    <td>{{ $FormISA->French}} {{ $FormIgradesSA['French'] }} {{ $positionFrenchSA['SemiAnnual']['French'] }}</td>
    <td>{{ $FormISA->History}} {{ $FormIgradesSA['History'] }} {{ $positionHistorySA['SemiAnnual']['History'] }}</td>
    <td>{{ $FormISA->Islamicknowledge }} {{ $FormIgradesSA['Islamicknowledge'] }} {{ $positionIslamicknowledgeSA['SemiAnnual']['Islamicknowledge'] }}</td>
    <td>{{ $FormISA->Kiswahili}} {{ $FormIgradesSA['Kiswahili'] }} {{ $positionKiswahiliSA['SemiAnnual']['Kiswahili'] }}</td>
    <td>{{ $FormISA->Lifeskill}} {{ $FormIgradesSA['Lifeskill'] }} {{ $positionLifeskillSA['SemiAnnual']['Lifeskill'] }}</td>
    <td>{{ $FormISA->Physics}} {{ $FormIgradesSA['Physics'] }} {{ $positionPhysicsSA['SemiAnnual']['Physics'] }}</td>
    <td>{{ $FormISA->Swimming }} {{ $FormIgradesSA['Swimming'] }} {{ $positionSwimmingSA['SemiAnnual']['Swimming'] }}</td>
    <td>{{ $FormISA->Nutrition}} {{ $FormIgradesSA['Nutrition'] }} {{ $positionNutritionSA['SemiAnnual']['Nutrition'] }}</td>
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
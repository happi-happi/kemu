<x-app-layout>
<!DOCTYPE html>
<html>
<head>
    <title>Form Two  </title>
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
    <li><a class="dropdown-item" href="{{route('FormTwoFM')}}">Form two first midterm  And semi annual result</a></li>
    <li><a class="dropdown-item" href="{{route('FormThreeFM')}}">Form Three first  midterm  And semi  annual result </a></li>
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
    <p>Form one Second Midterm  Data</p>
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
    <td>{{ $data->Arabiclanguage }}'{{ $grades['Arabiclanguage'] }}' {{ $positionArabiclanguageSM['SecondMidterm']['Arabiclanguage'] }} </td>
    <td>{{ $data->Basicmathematics }} {{ $grades['Basicmathematics'] }} {{ $positionBasicmathematicSM['SecondMidterm']['Basicmathematics'] }}</td>
    <td>{{ $data->Bibleknowledge }} {{ $grades['Bibleknowledge'] }} {{ $positionBibleknowledgeSM['SecondMidterm']['Bibleknowledge'] }}</td>
    <td>{{ $data->Bookkeeping}}{{ $grades['Bookkeeping'] }} {{ $positionBookkeepingSM['SecondMidterm']['Bookkeeping'] }} </td>
    <td>{{ $data->Biology }}{{ $grades['Biology'] }} {{ $positionBiologySM['SecondMidterm']['Biology'] }} </td>
    <td>{{ $data->Civics}} {{ $grades['Civics'] }} {{ $positionCivicsSM['SecondMidterm']['Civics'] }}</td>
    <td>{{ $data->Chemistry }}{{ $grades['Chemistry'] }} {{ $positionChemistrySM['SecondMidterm']['Chemistry'] }} </td>
    <td>{{ $data->Computerstudy }}{{ $grades['Computerstudy'] }} {{ $positionComputerstudySM['SecondMidterm']['Computerstudy'] }}</td>
    <td>{{ $data->Creativearts }} '{{ $grades['Creativearts'] }}' {{ $positionCreativeartSM['SecondMidterm']['Creativearts'] }}</td>
    <td>{{ $data->Commerce }} {{ $grades['Commerce'] }} {{ $positionCommerceSM['SecondMidterm']['Commerce'] }}</td>
    <td>{{ $data->Englishliterature }}{{ $grades['Englishliterature'] }} {{ $positionEnglishliteratureSM['SecondMidterm']['Englishliterature'] }}</td>
    <td>{{ $data->French}} {{ $grades['French'] }} {{ $positionFrenchSM['SecondMidterm']['French'] }} </td>
    <td>{{ $data->History}} {{ $grades['History'] }} {{ $positionHistorySM['SecondMidterm']['History'] }}</td>
    <td>{{ $data->Islamicknowledge }} {{ $grades['Islamicknowledge'] }} {{ $positionIslamicknowledgeSM['SecondMidterm']['Islamicknowledge'] }}</td>
    <td>{{ $data->Kiswahili}} {{ $grades['Kiswahili'] }} {{ $positionKiswahiliSM['SecondMidterm']['Kiswahili'] }}</td>
    <td>{{ $data->Lifeskill}}{{ $grades['Lifeskill'] }} {{ $positionLifeskillSM['SecondMidterm']['Lifeskill'] }}</td>
    <td>{{ $data->Physics}} {{ $grades['Physics'] }} {{ $positionPhysicsSM['SecondMidterm']['Physics'] }} </td>
    <td>{{ $data->Swimming }}{{ $grades['Swimming'] }} {{ $positionSwimmingSM['SecondMidterm']['Swimming'] }}</td>
    <td>{{ $data->Nutrition}}{{ $grades['Nutrition'] }} {{ $positionNutritionSM['SecondMidterm']['Nutrition'] }} </td>
    <td>{{$AverageSM}}</td>
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

   @if($FormIAL)
    <table class="table   table-striped table-bordered">

 <p>Form one   annual Data</p>
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
    <td>{{ $FormIAL->user->Fname }} {{ $data->user->Mname }} {{ $data->user->Lname }}</td>
    <td>{{ $FormIAL->Arabiclanguage }} '{{ $FormIgradesAL['Arabiclanguage'] }}' {{ $positionArabiclanguageAL ['Annual']['Arabiclanguage'] }}</td>
    <td>{{ $FormIAL->Basicmathematics }} {{ $FormIgradesAL['Basicmathematics'] }} {{ $positionBasicmathematicAL ['Annual']['Basicmathematics'] }}</td>
    <td>{{ $FormIAL->Bibleknowledge }} {{ $FormIgradesAL['Bibleknowledge'] }} {{ $positionBibleknowledgeAL ['Annual']['Bibleknowledge'] }}</td>
    <td>{{ $FormIAL->Bookkeeping }} {{ $FormIgradesAL['Bookkeeping'] }} {{ $positionBookkeepingAL['Annual']['Bookkeeping'] }}</td>
    <td>{{ $FormIAL->Biology }} {{ $FormIgradesAL['Biology'] }} {{ $positionBiologyAL['Annual']['Biology'] }}</td>
    <td>{{ $FormIAL->Civics}} {{ $FormIgradesAL['Civics'] }} {{ $positionCivicsAL['Annual']['Civics'] }}</td>
    <td>{{ $FormIAL->Chemistry }} {{ $FormIgradesAL['Chemistry'] }} {{ $positionChemistryAL['Annual']['Chemistry'] }}</td>
    <td>{{ $FormIAL->Computerstudy }} {{ $FormIgradesAL['Computerstudy'] }} {{ $positionComputerstudyAL['Annual']['Computerstudy'] }}</td>
    <td>{{ $FormIAL->Creativearts }} '{{ $FormIgradesAL['Creativearts'] }}' {{ $positionCreativeartsAL['Annual']['Creativearts'] }}</td>
    <td>{{ $FormIAL->Commerce }} {{ $FormIgradesAL['Commerce'] }} {{ $positionCommerceAL['Annual']['Commerce'] }}</td>
    <td>{{ $FormIAL->Englishliterature }} {{ $FormIgradesAL['Englishliterature'] }} {{ $positionEnglishliteratureAL['Annual']['Englishliterature'] }}</td>
    <td>{{ $FormIAL->French}} {{ $FormIgradesAL['French'] }} {{ $positionFrenchAL['Annual']['French'] }}</td>
    <td>{{ $FormIAL->History}} {{ $FormIgradesAL['History'] }} {{ $positionHistoryAL['Annual']['History'] }}</td>
    <td>{{ $FormIAL->Islamicknowledge }} {{ $FormIgradesAL['Islamicknowledge'] }} {{ $positionIslamicknowledgeAL['Annual']['Islamicknowledge'] }}</td>
    <td>{{ $FormIAL->Kiswahili}} {{ $FormIgradesAL['Kiswahili'] }} {{ $positionKiswahiliAL['Annual']['Kiswahili'] }}</td>
    <td>{{ $FormIAL->Lifeskill}} {{ $FormIgradesAL['Lifeskill'] }} {{ $positionLifeskillAL['Annual']['Lifeskill'] }}</td>
    <td>{{ $FormIAL->Physics}} {{ $FormIgradesAL['Physics'] }} {{ $positionPhysicsAL['Annual']['Physics'] }}</td>
    <td>{{ $FormIAL->Swimming }} {{ $FormIgradesAL['Swimming'] }} {{ $positionSwimmingAL['Annual']['Swimming'] }}</td>
    <td>{{ $FormIAL->Nutrition}} {{ $FormIgradesAL['Nutrition'] }} {{ $positionNutritionAL['Annual']['Nutrition'] }}</td>
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
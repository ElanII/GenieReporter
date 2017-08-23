<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/{{$clinic}}"><!--<img src="{{URL::asset('img/bhgpsc-icon.png')}}">-->Genie Reporter</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        {{-- <li class="active">
          <a href="/report1">50 YO Not Seen<span class="sr-only">(current)</span></a>
        </li>
        <li>
          <a href="report2">Hypertension NOT Seen</a>
        </li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ready Made Reports <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/report3/{{$clinic}}">Care Plan but Not Renewed (SLOW)</a></li>
            <li><a href="/report4/{{$clinic}}">3 to 5 YO HA</a></li>
            <li><a href="/report6/{{$clinic}}">75 YO HA</a></li>
            <li><a href="/report7/{{$clinic}}">45 to 49 YO HA</a></li>
            <li><a href="/report12/{{$clinic}}">45 to 49 YO CP</a></li>
            <li><a href="/report8/{{$clinic}}">Asthma No SPYRO (SLOW)</a></li>
            <li><a href="/report9/{{$clinic}}">Hypertension No ECG (SLOW)</a></li>
            <li><a href="/report10/{{$clinic}}">Diabetes No ABI (SLOW)</a></li>
            <li><a href="/report11/{{$clinic}}">CP Not reviewed</a></li>
            <li><a href="/report1/{{$clinic}}">50 YO Not Seen</a></li>
            <li><a href="/report2/{{$clinic}}">Hypertension NOT Seen in 12months</a></li>
            <li><a href="/report0/{{$clinic}}">Test Mouse (Testing Connectivity)</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/allergy/{{$clinic}}">Allergy Stats</a></li>
            <li><a href="/familyHistory/{{$clinic}}">Family History Stats</a></li>
            <li><a href="/riskFactors/{{$clinic}}">Alcohol Information Stats</a></li>
            <li><a href="/smoking/{{$clinic}}">Smoking Information Stats</a></li>
            <li><a href="/culture/{{$clinic}}">Ethnicity Information Stats</a></li>
            <li><a href="/pastHistory/{{$clinic}}">Past History Information Stats</a></li>
            <li><a href="/currentProblem/{{$clinic}}">Current Problem Information Stats</a></li>
            <li><a href="/currentMedications/{{$clinic}}">Current Medications Information Stats</a></li>
            <li><a href="/vaccinations/{{$clinic}}">Vaccination Information Stats</a></li>
            <li><a href="/drugReaction/{{$clinic}}">Drug Reactions for Allergies recorded</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/activepts/{{$clinic}}">RACGP Active Patient Stats</a></li>
            <li><a href="/myhr/{{$clinic}}">My Health Record</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="mailto:d.manu@bhgpsc.com.au?Subject=Report%20Request:">Request for additional Reports</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Today <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/todayAll/{{$clinic}}">Patients with Appointments today</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/myhrYES/{{$clinic}}">My Health Record available</a></li>
            <li><a href="/myhrNO/{{$clinic}}">My Health Record NOT available</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="mailto:d.manu@bhgpsc.com.au?Subject=Report%20Request:">Request for additional Reports</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">eHealth <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/myhr/{{$clinic}}">All My Health Record patients</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/myhrYES/{{$clinic}}">Today's appointments</a></li>
            <li><a href="/apptSearch/{{$clinic}}">Search by Provider (Patients with MyHR)</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/shsSearch/{{$clinic}}">Shared Health Summary Search</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Diabetes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/diabAll/{{$clinic}}">All diabetic patients</a></li>
            <li><a href="/diabToday/{{$clinic}}">Today's appointments</a></li>
            <li><a href="/diabSearch/{{$clinic}}">Search by Provider</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Health Assessments <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/ha4549_searchbyprovider/{{$clinic}}">45-49 year olds by Provider Appt</a></li>
            <li><a href="/ha70_searchbyprovider/{{$clinic}}">75+ year olds by Provider Appt</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/ha4549/{{$clinic}}">45-49 year olds</a></li>
            <li><a href="/ha75/{{$clinic}}">75+ year olds</a></li>
            <li><a href="/haATSI/{{$clinic}}">Aboriginal & Torres Strait Islanders</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Staying Healthy <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/smokers_StayHealthy/{{$clinic}}">Smokers without CP</a></li>
            <li><a href="/bmi_StayHealthy/{{$clinic}}">High BMI without CP</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/shSmoker_searchbyprovider/{{$clinic}}">Smokers without CP by Appt</a></li>
            <li><a href="/shBMI_searchbyprovider/{{$clinic}}">High BMI without CP by Appt</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">AUSDRISK <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/ausdrisk_searchbyprovider/{{$clinic}}">AUSDRISK needed patients by Provider Appt</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Care Plans <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/cp_providerSearch/{{$clinic}}">Care Plans due by Provider Appt</a></li>
          </ul>
        </li>
        {{-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bone Density <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/bd70/{{$clinic}}">70+ not billed</a></li>
          </ul>
        </li> --}}
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DEXA <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/dexa24/BHGPSC">DEXA 24 months</a></li>
            <li><a href="/dexa12/BHGPSC">DEXA 12 months</a></li>
            <li><a href="/bd70/BHGPSC">70+ never billed</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="dexa24apptSearch/BHGPSC">DEXA 24 Appt Search</a></li>
            <li><a href="bd70apptSearch/BHGPSC">BD 70+ Appt Search</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">HMR <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/hmrSearch/{{$clinic}}">HMR Search</a></li>
          </ul>
        </li>
      </ul>
      {{-- <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> --}}
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Connected: {{$clinic}}</a></li>
        <li><a href="#">Help</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Support <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="mailto:d.manu@bhgpsc.com.au?Subject=Report%20Request:">Request for additional Reports</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


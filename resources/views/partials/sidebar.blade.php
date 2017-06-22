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
      <a class="navbar-brand" href="/{{$clinic}}">Genie Reporter</a>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Search <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/apptSearch/{{$clinic}}">Appointments (Patients with MyHR)</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Health Record <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/myhrYES/{{$clinic}}">Today's appointments</a></li>
            <li><a href="/apptSearch/{{$clinic}}">Search by Provider (Patients with MyHR)</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SHS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/shsSearch/{{$clinic}}">Shared Health Summary Search</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Diabetes <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="/diabToday/{{$clinic}}">Today's appointments</a></li>
            <li><a href="/diabSearch/{{$clinic}}">Search by Provider</a></li>
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


<div class="modal fade" id="patientModal" 
     tabindex="-1" role="dialog" 
     aria-labelledby="patientModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="patientModalLabel">Patient Summary</h4>
      </div>
      <div class="modal-body">
        <p>
        Patient details
        <b><span id="fav-title">Searching...</span></b>
        </p>
        {{-- PHP Section for Query --}}
    <?php

      $dsn = Config::get('constants.dsn');
      $user = Config::get('constants.user');
      $pass = Config::get('constants.pass');
      $ptId = 1227;

      // Connection to the server
      $db = new PDO($dsn,$user,$pass);

      // Creating the SQL statement
      // 50 Year olds who have not been seen in the past 12 months.
      $YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
      $sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive FROM Patient WHERE Id =".$ptId." ";
      //echo $sql1;
      //$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
      try {
        $stmt = $db->prepare($sql1);
        $stmt->execute();
      } catch (PDOException $e) {
        echo 'Database Error:'.$e;
      }
      $db = null;

    $results_array = $stmt->fetchAll();
    $patient = $results_array[0];
    $DOB = substr($patient['DOB'], 0,strrpos($patient['DOB'], ' '));
    $LSD = substr($patient['LASTSEENDATE'], 0,strrpos($patient['LASTSEENDATE'], '.'));
    $DOB = date('d-m-Y',strtotime($DOB));
    $LSD = date('d-m-Y',strtotime($LSD));

    ?>
        <div class="container-fluid table-responsive">
        <table class="table table-striped table-bordered"  id="mytable">
          <tbody>
            <tr>
              <td>Surname</td>
              <td>{{$patient['SURNAME']}}</td>
            </tr>
            <tr>
              <td>First name</td>
              <td>{{$patient['FIRSTNAME']}}</td>
            </tr>
            <tr>
              <td>Date of Birth</td>
              <td>{{$DOB}}</td>
            </tr>
            <tr>
              <td>Mobile phone</td>
              <td>{{$patient['MOBILEPHONE']}}</td>
            </tr>
            <tr>
              <td>Home phone</td>
              <td>{{$patient['HOMEPHONE']}}</td>
            </tr>
            <tr>
              <td>Last seen date</td>
              <td>{{$LSD}}</td>
            </tr>
            <tr>
              <td>Chart No</td>
              <td>{{$patient['CHARTORNHS']}}</td>
            </tr>
            <tr>
              <td>Age</td>
              <td>{{$patient['AGE']}}</td>
            </tr>
          </tbody>
        </table>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" 
           class="btn btn-default" 
           data-dismiss="modal">Close</button>
        {{-- <span class="pull-right">
          <button type="button" class="btn btn-primary">
            Add to Favorites
          </button>
        </span> --}}
      </div>
    </div>
  </div>
</div>
<?php
//Include database connection
if(isset($_GET['id'])) {
    $id = $_GET['id']; //escape string
    
    // Run the Query
    
    

      $dsn = Config::get('constants.dsn');
      $user = Config::get('constants.user');
      $pass = Config::get('constants.pass');
      $ptId = $id;

      // Connection to the server
      $db = new PDO($dsn,$user,$pass);

      // Creating the SQL statement
      date_default_timezone_set('Australia/Darwin');
      $YearAgo = date("Y-m-d H:i:s",strtotime('-13 month'));
      $today = date("Y-m-d");
      $sql1 = "SELECT Id,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS,Age,Inactive,EmailAddress FROM Patient WHERE Id =".$ptId."";
      //echo $sql1;
      //$sql = 'SELECT FullName,FirstName,Surname,HomePhone,MobilePhone,LastSeenDate,DOB,ChartOrNHS FROM Patient WHERE Surname=\'mouse\'';
      try {
        $stmt = $db->prepare($sql1);
        $stmt->execute();
      } catch (PDOException $e) {
        echo 'Database Error:'.$e;
      }

      $sql2 = "SELECT StartDate,ProviderName,StartTime FROM Appt WHERE StartDate >= :today AND PT_Id_Fk=".$ptId." ORDER BY 1";
      try {
          $stmt2 = $db->prepare($sql2);
          $stmt2->execute([':today'=> $today]);
        } catch (PDOException $e) {
          echo 'Database Error:'.$e;
        }
      $appts = $stmt2->fetchAll();
      
      if (count($appts)==0) {
        $STD = "NO FUTURE APPTS";
        $PNAME = "NO FUTURE APPTS";
        $ATIME = "NO FUTURE APPTS";
      } else {
        $appt = $appts[0];
        $STD = substr($appt['STARTDATE'], 0,strrpos($appt['STARTDATE'], ' '));
        $STD = date('d-m-Y',strtotime($STD));
        $PNAME = $appt['PROVIDERNAME'];

        date_default_timezone_set('Australia/Darwin');
        $ATIME = gmdate('H:i', $appt['STARTTIME']/1000);
        //$ATIME = $appt['STARTTIME']/1000;
      }

      // Grabbing Sale Items from BHMCSales table.
      $bhmcSales = DB::connection('mysql')->select("SELECT patientID,ITEMNUM,SERVICEDATE FROM bhmcSales WHERE ITEMNUM IN ('12323','12306','12315','12312','12321') AND patientID =:ptId", ['ptId'=>$ptId]);

      // Grabbing Sale Items from BHGPSC
      $sql3 = "SELECT PT_Id_Fk,ItemNum,ServiceDate FROM Sale WHERE ItemNum IN ('12323','12306','12315','12312','12321') AND PT_Id_Fk=".$ptId." ORDER BY 1";
      try {
          $stmt3 = $db->prepare($sql3);
          $stmt3->execute();
        } catch (PDOException $e) {
          echo 'Database Error Sales Query:'.$e;
        }
      $gpscSales = $stmt3->fetchAll();
      
      
      
      
      


      $db = null;

    $results_array = $stmt->fetchAll();
    $patient = $results_array[0];
    $DOB = substr($patient['DOB'], 0,strrpos($patient['DOB'], ' '));
    $LSD = substr($patient['LASTSEENDATE'], 0,strrpos($patient['LASTSEENDATE'], '.'));
    $DOB = date('d-m-Y',strtotime($DOB));
    $LSD = date('d-m-Y',strtotime($LSD));
    // Fetch Records
 }
?>
<div class='container-fluid table-responsive'>
  <table class='table table-striped table-bordered'  id='mytable'>
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
      <tr>
        <td>Email</td>
        <td><a href='mailto:{{$patient['EMAILADDRESS']}}' target='_top'>{{$patient['EMAILADDRESS']}}</a></td>
      </tr>
      <tr>
        <td>Appt Provider</td>
        <td>{{$PNAME}}</td>
      </tr>
      <tr>
        <td>Appt Time (24HOUR)</td>
        <td>{{$ATIME}}</td>
      </tr>
      <tr>
        <td>Appt Date</td>
        <td>{{$STD}}</td>
      </tr>
    </tbody>
  </table>
  <table class='table table-striped table-bordered'  id='mytable'>
    <thead>
      <tr>
        <td>BHMC Sales</td>
      </tr>
      <tr>
        <td>PatientID</td>
        <td>Item Number</td>
        <td>Service Date</td>
      </tr>
      @foreach ($bhmcSales as $element)
        <tr>
        <td>{{$element->patientID}}</td>
        <td>{{$element->ITEMNUM}}</td>
        <td>{{$element->SERVICEDATE}}</td>
      </tr>
      @endforeach
    </thead>
  </table>
  <table class='table table-striped table-bordered'  id='mytable'>
    <thead>
      <tr>
        <td>GPSC Sales</td>
      </tr>
      <tr>
        <td>PatientID</td>
        <td>Item Number</td>
        <td>Service Date</td>
      </tr>
      @foreach ($gpscSales as $element)
        <tr>
        <td>{{$element['PT_ID_FK']}}</td>
        <td>{{$element['ITEMNUM']}}</td>
        <td>{{date('d-m-Y',strtotime($element['SERVICEDATE']))}}</td>
      </tr>
      @endforeach
    </thead>
  </table>
</div>


<!DOCTYPE html>
<html>
<head>
	<title>Column Copy</title>
</head>
<body>
@php
	$dsn = '4D:host=10.10.10.153;port=19812;charset=UTF-8';
	$user = '';
	$pass = '';
	$db = new PDO($dsn,$user,$pass);
	$idNumber = 7;


	//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql1 = "UPDATE Patient SET FirstName= 'MIKE' WHERE Id=55";
	try {
		$stmt1 = $db->prepare($sql1);
		// $stmt1->bindValue(':columnOrder',$columnOrder,PDO::PARAM_STR);
		// $stmt1->bindValue(':idNumber',$idNumber,PDO::PARAM_INT);
		$db->beginTransaction();
		$stmt1->execute();
		$db->commit();
	} catch (PDOException $e1) {
		//$db->rollBack();
		echo "Problem with UPDATE query:</br>".$e1->getMessage()."</br>";
	}





	


	$sql0 = "SELECT ApptProviderDisplay AS CO FROM Preference WHERE Username = 'Duminda Manuwickrama'";
	try {
		$stmt0 = $db->prepare($sql0);
		$stmt0->execute();
	} catch (PDOException $e0) {
		echo "Problem with initial database query:".$e0;
	}
	$results_array0 = $stmt0->fetchAll();
	$columnOrder = (string)$results_array0[0]['CO'];

	echo 'OLD:  '.$columnOrder.'</br>';



	




	$sql2 = "SELECT ApptProviderDisplay AS CO FROM Preference WHERE Id = 7";
	try {
		$stmt2 = $db->prepare($sql2);
		$stmt2->execute();
	} catch (PDOException $e2) {
		echo "Problem with third database query:".$e2;
	}
	$results_array2 = $stmt2->fetchAll();
@endphp

 NEW    : {{$results_array2[0]['CO']}}
</body>
</html>
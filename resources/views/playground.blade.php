@php
	if (!empty($_GET['location'])) {
		$maps_url = 'https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($_GET['location']);
		$maps_json = file_get_contents($maps_url);
		$maps_array = json_decode($maps_json, true);
		$lat = $maps_array['results'][0]['geometry']['location']['lat'];
		$lng = $maps_array['results'][0]['geometry']['location']['lng'];

		$instagram_url = 'https://api.instagram.com/v1/media/search?lat='.$lat.'&lng='.$lng.'&access_token=5887651869.da71622.1cdccd9b279c4ba1b0b162dd0d50f3e4';
		echo $instagram_url;
		//exit;
		$instagram_json = file_get_contents($instagram_url);
		$instagram_array = json_decode($instagram_json, true);
	}
@endphp


<!DOCTYPE html>
<html>
<head>
	<title>PlayGround</title>
</head>
<body>
<form action="" method="GET">
	<input type="text" name="location">
	<button type="submit" value="submit">Submit</button>
</form>
</body>
</html>
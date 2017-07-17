<!DOCTYPE html>
<html>
<head>
	@include('newpartials/head',['title'=>"BHMC Sales Lookup"])
	@php
		$ITEM = $_GET['item'];
	@endphp
</head>
<body>
	{{-- Sidebar --}}
	@include('partials/sidebar')

	{{-- PHP Section for Query --}}
	@php
		$bhmcSales = DB::connection('mysql')->select('SELECT DISTINCT ITEMNUM,SERVICEDATE,FIRSTNAME,SURNAME,DOB FROM bhmcSales WHERE ITEMNUM=:ITEM',['ITEM'=>$ITEM]);
	@endphp

	{{-- Table Section --}}
	@include('newpartials/bhmcLookupTable',['title'=>'BHMC Sales Lookup'])

	{{-- Footer --}}
	@include('newpartials/footer')
</body>
</html>
<html>
	<head>
		<title>PERKIRAAN CUACA</title>
		<link href='images/cuaca.png' rel='shortcut icon'>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<style type="text/css">
			header, section, footer, aside, nav, article, figure, figcaption {
				display: block;}
			body {
				color: #666666;
				background-color: #f9f8f6;
				background-image: url("images/pink.jpg");
				background-position: center;
				font-family: Georgia, Times, serif;
				line-height: 1.4em;
				margin-left: 10%; margin-right: 10%;}
			.wrapper {
				width: 940px;
				margin: 20px auto 20px auto;
				border: 2px solid #000000;
				background-color: #ffffff;}
			header {
				height: 160px;
				background-image: url(images/pink2.jpg);}
			h1 {
				text-indent: -9999px;
				width: 940px;
				height: 130px;
				margin: 0px;}
			nav, footer {
				clear: both;
				color: #ffffff;
				background-color: #DC143C;
				height: 30px;}
			nav ul {
				margin: 0px;
				padding: 5px 0px 5px 30px;}
			nav li {
				display: inline;
				margin-right: 40px;}
			nav li a {
				color: #ffffff;}
			nav li a:hover, nav li a.current {
				color: #000000;}
			section.courses {
				float: left;
				width: 659px;
				border-right: 1px solid #eeeeee;}
			article {
				clear: both;
				overflow: auto;
				width: 100%;}
			hgroup {
				margin-top: 40px;}
			figure {
				float: left;
				width: 290px;
				height: 220px;
				padding: 5px;
				margin: 20px;
				border: 1px solid #eeeeee;}
			figcaption {
				font-size: 90%;
				text-align: left;}
			aside {
				width: 230px;
				float: left;
				padding: 0px 0px 0px 20px;}
			aside section a {
				display: block;
				padding: 10px;
				border-bottom: 1px solid #eeeeee;}
			aside section a:hover {
				color: #985d6a;
				background-color: #efefef;}
			a {
				color: #de6581;
				text-decoration: none;}
			h1, h2, h3 {
				font-weight: normal;}
			h2 {
				margin: 10px 0px 5px 0px;
				padding: 0px;}
			h3 {
				margin: 0px 0px 10px 0px;
				color: #de6581;}
			aside h2 {
				padding: 30px 0px 10px 0px;
				color: #de6581;}
			footer {
				font-size: 80%;
				padding: 7px 0px 0px 20px;}
			.banner{width:940px; height:540px; margin-left:0px; margin:0 auto; margin-bottom:0px; background:url(images/Banner.jpg) no-repeat; position:relative;}
			.banner h1{ padding:10px; float:right; background:#C11B17; text-transform:uppercase; color:#ffffff;  font-size:30px; font-weight:normal; font-family: 'Blade Runner Movie Font'; position:absolute; top:130px; right:0;}
			.banner h2{ padding:10px; float:right; background:#ffffff; text-transform:uppercase; color:#1a202c;  font-size:22px; font-weight:normal; font-family: 'Baccarat'; position:absolute; top:195px; right:0;}
					
		</style>
		

		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
	
		<div class="wrapper">
			<header>
				<h1>PERKIRAAN CUACA</h1>
				<nav>
					<ul>
						<li><a href="latih1.php">Minggu</a></li>
						<li><a href="latih2.php">Senin</a></li>
						<li><a href="latih3.php">Selasa</a></li>
						<li><a href="latih4.php">Rabu</a></li>
						<li><a href="latih5.php">Kamis</a></li>
						<li><a href="latih6.php">Jumat</a></li>
						<li><a href="latih7.php">Sabtu</a></li>
						
					</ul>
				</nav>
			</header>

<?php
  $json_string = file_get_contents("http://api.wunderground.com/api/bcda6a43d721358a/conditions/q/ID/Lempongsari.json");
  $parsed_json = json_decode($json_string);
  $location = $parsed_json->{'current_observation'}->{'display_location'}->{'city'};
  
  echo "Kita berada di : ${location} \n";
  echo ' <br>';
  
  echo ' <br>';
  $json_string1 = file_get_contents("http://api.wunderground.com/api/bcda6a43d721358a/forecast10day/q/ID/Lempongsari.json");
  $parsed_json1 = json_decode($json_string1);
  $temperatur = $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'high'}->{'celsius'};
  $temperatur1 = $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'low'}->{'celsius'};
  $wind_mph= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'avewind'}->{'mph'};
  $wind_dir= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'avewind'}->{'dir'};
  $weekday= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'date'}->{'weekday'};
  $day= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'date'}->{'day'};
  $month= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'date'}->{'monthname'};
  $year= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'date'}->{'year'};
  $weather= $parsed_json1->{'forecast'}->{'simpleforecast'}->forecastday[5]->{'conditions'};
  echo "Suhu Maksimum: ${temperatur} \n";
  echo ' <br>';
  echo "Suhu Minimum: ${temperatur1} \n";
  echo ' <br>';
  echo "Kecepatan Angin: ${wind_mph} \n";
  echo ' <br>';
  echo "Arah Angin : ${wind_dir} \n"; 
  echo ' <br>';
  echo "${weekday} ${day}  ${month} ${year}\n";
  echo ' <br>';
  echo "Cuaca  : ${weather}\n";
  echo ' <br>';
  
?>

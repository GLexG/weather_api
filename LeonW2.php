

<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Leon Weather App</title>
			<style>
				body{
					width: 960px;
					margins: 0 auto;
				}
				.userform{
					padding-top:50px;
				}
			</style>


		</head>

		<body>
		<!--fkyeaaa-->
				<form class ="userForm" name="weatherForm" action="LeonW2.php" method = "GET">
					<h1> Vreme u vasem gradu! </h1>
					City: <input type="text" name="city" placeholder = "Grad" /></br>
					Country: <input type="text" name="country" placeholder = "drzava" /></br></br>
					<input type="submit" name="submit" value="Submit" />

				</form>
				</br></br>
		</body>



	</html>




<?php
	if(isset($_GET)){
		//hnjo hnjo
		$city = $_GET['city'];
		$country = $_GET['country'];

		//api.openweathermap.org/data/2.5/weather?q={city name},{country code}
		$api_url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city . "," . $country;
		//if (isset $api_url){ echo "hnjooo"; }
		$weather_data = file_get_contents($api_url);
		//echo $weather_data . "</br>";

		$json = json_decode($weather_data, TRUE);
		//print_r($json);


		//$pom = $json[''][''];
		$temp = $json['main']['temp']; $temp -=  273.15; //temperatura
		$humidity = $json['main']['humidity'];//vlaznost u %
		$pressure = $json['main']['pressure'];
		$wind = $json['wind']['speed'];// brzina vetra m/s
		$icon = $json['weather']["0"]['icon'];
	
		$icon2= "http://openweathermap.org/img/w/" . $icon . ".png";
		echo "<img src=\"".$icon2."\"></br>";
		echo "<strong>Temperatura: </strong>" . $temp . "°C</br>";
		echo "<strong>Vlaznost vazduha: </strong>" .$humidity . "%</br>";
		echo "<strong>Pritisak: </strong>" .$pressure . " milibara</br>";
		echo "<strong>Brzina vetra: </strong>" .$wind . " m/s</br>";
		
		//echo "<strong>Ime ikonice: </strong>" .$icon2 . "</br>";
		
		 
	}
?>
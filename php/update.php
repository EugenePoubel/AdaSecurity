<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- I use the Meta statement to refresh the data from the MySql database -->
<!-- <Meta HTTP-EQUIV="Refresh" Content="5; URL=http://adasecurity.fr/update.php"> -->
<html>
<head>
	<title>update MySql data</title>
</head>

<body>
<!-- ---------------------------------------------------------------------- -->
<?php

  $serveur="localhost";
  $utilisateur="u200939947_eqyp";
  $pass="*qfym6*55";
  $bd="u200939947_eqyp";

  //$connection = mysql_connect($server, $user, $pass);
    $link= mysqli_connect($serveur, $utilisateur, $pass,$bd);
  mysqli_select_db($link,$bd) or die("Impossibile to select the database.");

  $temperature_query="SELECT temperature FROM templog WHERE timeStamp IN (SELECT max(timeStamp) FROM templog)";
  $temperatureTabl= mysqli_query($link,$temperature_query);
  $rowtemp = mysqli_fetch_row($temperatureTabl);
  $tempM=$rowtemp[0];
  //Valeurs humidité messurée en temps réel
  $humidity_query="SELECT humidity FROM templog WHERE timeStamp IN (SELECT max(timeStamp) FROM templog)";
  $humidityTabl=  mysqli_query($link,$humidity_query);
  $rowhum = mysqli_fetch_row($humidityTabl);
  $humM =$rowhum[0];
  //Valeurs C02 messurée en temps réel
  $Co2_query="SELECT CO2 FROM templog WHERE timeStamp IN (SELECT max(timeStamp)FROM templog)";
  $Co2Tabl= mysqli_query($link,$Co2_query);
  $rowCo2=mysqli_fetch_row($Co2Tabl);
  $Co2M =$rowCo2[0];

	$timestamp_query="SELECT temps FROM templog WHERE timeStamp IN (SELECT max(timeStamp) FROM templog)";
	$timestampTabl= mysqli_query($link,$timestamp_query);
	$rowtime = mysqli_fetch_row($timestampTabl);
	$timeM=$rowtime[0];



 mysqli_close($link);
 /*Display the Data table*/
 echo $tempM;
 echo $humM;
 echo $Co2M;
 echo $time;

 ?>
 <script> var tempR = <?php echo $tempM ?>;
 					var humR  = <?php echo $humM  ?>;
					var co2R  = <?php echo $Co2M  ?>;
					var tempsR ="<?php echo $timeM?>";
  </script>
 </body>
</html>

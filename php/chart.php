
<?php
header('Content-Type: application/json');
  $serveur="localhost";
  $utilisateur="u200939947_eqyp";
  $pass="*qfym6*55";
  $bd="u200939947_eqyp";

  $link= mysqli_connect($serveur, $utilisateur, $pass,$bd);
  $query =sprintf('SELECT temps, temperature, humidity, CO2 FROM templog ORDER BY timeStamp DESC LIMIT 10'); //DESC",$link);
  $result = mysqli_query($link,$query);

  $data = array();
foreach ($result as $row) {
	$data[] = $row;
}

print json_encode($data);
?>

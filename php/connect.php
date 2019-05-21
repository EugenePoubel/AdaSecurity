<?php

	function Connection(){
		$serveur="localhost";
		$utilisateur="u200939947_eqyp";
		$pass="*qfym6*55";
		$bd="u200939947_eqyp";

		//$connection = mysql_connect($server, $user, $pass);
      $link= mysqli_connect($serveur, $utilisateur, $pass,$bd);

		if (!$link) {
	    	die('MySQL ERROR: ' . mysqli_error(connection));
		}

		mysqli_select_db($link,$bd) or die( 'MySQL ERROR: '. mysqli_error() );

		return $link;
	}
?>

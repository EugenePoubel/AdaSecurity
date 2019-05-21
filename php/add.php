<?php
date_default_timezone_set("Europe/Paris");
echo date_default_timezone_get();
$server="localhost";
$user="u200939947_eqyp";
$pass="*qfym6*55";
$db="u200939947_eqyp";
?>

<html>
<head>
<title>Page d'envoie des donnée</title>
</head>
<body>

<?php
if(isset($_POST['temp1']))
{
  $temp1=$_POST['temp1'];
  $hum1=$_POST['hum1'];
  $co21=$_POST['co21'];
  $time= date('Y-m-d H:i:s');
  $link=mysqli_connect($server, $user, $pass,$db );
  if(!$link)
    {echo mysqli_error();
     echo "<br>ça marche pas des masse (connexion)<br>";
    }

  if(!mysqli_select_db($link,$db))
    {echo mysql_error();
     echo "<brça marche pas des masse (Base de donnée)><br>";
    }


$query = "INSERT INTO templog(temperature,humidity,CO2,CO2T,temps,timeparis) VALUES ($temp1,$hum1,$co21,$co21,'".date('H:i:s')."','".date('Y-m-d H:i:s')."')";

 if(!mysqli_query($link,$query))
    {echo mysqli_error();
     echo "<br><br>";
   }
}
/*if($co21 == -1)
{
  $co2t="Moin de 400 ppm";
  $queryt = "INSERT INTO templog(temperature,humidity,CO2,CO2T) VALUES ($temp1,$hum1,$co21,"Moins de 400 ppm")";
  mysqli_query($link,$queryt)
}
else {
  {
    mysqli_query($link,$query)
  }
}*/
echo date('Y-m-d H:i:s');
?>
</body>
</html>

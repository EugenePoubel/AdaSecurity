<?php
$server="localhost";
$user="id9486133_root";
$pass="*qfym6*55";
$db="id9486133_ada";
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
  $link=mysqli_connect($server, $user, $pass,$db );
  if(!$link)
    {echo mysqli_error();
     echo "<br><br>";
    }

  if(!mysqli_select_db($link,$db))
    {echo mysql_error();
     echo "<br><br>";
    }


$query = "INSERT INTO templog(temperature,humidity,CO2,CO2T) VALUES ($temp1,$hum1,$co21,$co21)";

/*  if(!mysqli_query($link,$query))
    {echo mysqli_error();
     echo "<br><br>";
   }*/
}
if($co21 == -1)
{
  $co2t="Moin de 400 ppm";
  $queryt = "INSERT INTO templog(temperature,humidity,CO2,CO2T) VALUES ($temp1,$hum1,$co21,"Moins de 400 ppm")";
  mysqli_query($link,$queryt)
}
else {
  {
    mysqli_query($link,$query)
  }
}

?>
</body>
</html>

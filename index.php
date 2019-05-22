<!DOCTYPE html>
<html lang="en">
<script>
//Ici pous vouvez changer les température minimal de l'IHM
var humMin  = 35;
var tempMin = 22;
var co2max =  800;
var tempmax = 30;
var hummax =  80;
var init = false;

</script>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>AdaSecurity</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo-mini.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
          <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo_site.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">

        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Tableau de Bord</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://docs.google.com/document/d/1d3IyaJtsYLWANcrYfLyFpBNgW4FEjS3jwaaKHrKI2Z0/edit?usp=sharing">
              <i class="mdi mdi-file-document-box-outline menu-icon"></i>
              <span class="menu-title">Sources et documentation</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="d-flex align-items-end flex-wrap">
                  <div class="mr-md-3 mr-xl-5">
                    <h2>AdaSecurity</h2>
                    <p class="mb-md-0">Bienvenue sur le Tableau de bord d'AdaSecurity .</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
                  <ul class="nav nav-tabs px-4" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Valeurs Actuels</a>
                  </ul>
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Horodatage des valeurs</small>
                            <div class="dropdown">

                                <h5 class="mb-0 d-inline-block" id="Tempsaff">Chargement...</h5>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <img src="images/t.png" />
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Température</small>
                            <h5 class="mr-2 mb-0"id="Tempaff">Chargement...</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                        <img src="images/h.png" />
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Humidité</small>
                            <h5 class="mr-2 mb-0" id="Humaff">Chargement...</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <img src="images/co2.png" />
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">CO2</small>
                            <h5 class="mr-2 mb-0" id="Co2aff">Chargement...</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-7 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Graphique</p>
                  <p class="mb-4"> Évolution de la température, de l'humidité et de la concentration de co2 dans l'air  en fonction du temps</p>
                  <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                  <canvas id="cash-deposits-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-5 grid-margin stretch-card">
              <div class="card">
                                <h1>Réglage des seuils: <h1>
                <h2>Capteurs Humidité<h2>
              <p>Valeurs Choisis:</p>
              <p> Entre <input type="number" id="humMini" value="0" max="100" min="0" step="1"> et  <input type="number"  id="hummax" value="0" max="100" min="0" step="1"> % </p>
              <h2>Capteurs Température<h2>
                <p>Valeurs Choisis:</p>
                  <p> Entre <input type="number" id="tempMini" value="0" max="200" min="0" step="1"> et <input type="number" id="tempmax" value="0" max="100" min="0" step="1"> °C </p>
                <h2>Capteurs C02<h2>
                  <p>Valeurs Max Choisis:</p>
                     <p> <input type="number" id="Co2max" value="0" max="1000" min="0" step="1"> ppm Maximum </p>
                     <p> <B>Remarques:</B>Les valeurs chargé par défaut sont des valeurs recommandée pour une salle de serveur voir "Sources et documentation"
                  <p hidden >Code (Test Doit être Non visible)</p>
                  <div hidden  id="tempR">error</div>
              </div>
            </div>
          </div>

       <div class="row">
            <div class="col-md-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Base de donnée</p>
                  <div class="table-responsive">
                    <table id="recent-purchases-listing" class="table">
                      <thead>
                        <tr>
                            <th>Horodatage</th>
                            <th>Température</th>
                            <th>Humidité</th>
                            <th>Co2</th>
                        </tr>
                      </thead>
                        <tbody>
                      <?php
include("php/connect.php");
$link=Connection();
$result=mysqli_query($link,'SELECT timeparis,temperature,humidity,CO2T FROM templog ORDER BY timeStamp DESC LIMIT 8'); //DESC",$link);
if($result!==FALSE){
  while($row = mysqli_fetch_array($result)) {
   printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>",
   $row["timeparis"], $row["temperature"], $row["humidity"], $row["CO2T"]);
}
mysqli_free_result($result);
mysqli_close();
}
?>

                      </tbody>
                    </table>
                           </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <!-- Initialisation de la librairie jQuery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>jQuery().ready(function(){
    setInterval("LectureCapt()",1000);
    setInterval("IHM()",2000)
    setInterval(function r (){execute=false;}, 60000);
    setInterval(function rs (){son=false;}, 60000);
     //l'alerte s'affiche 1 fois par minute
    document.getElementById("Co2max").value = co2max;
    document.getElementById("tempmax").value = tempmax;
    document.getElementById("hummax").value = hummax;
    document.getElementById("tempMini").value= tempMin;
    document.getElementById("humMini").value= humMin;


});
function LectureCapt(){
    jQuery.post("php/update.php",function( data ) {
        jQuery("#tempR").html(data);
        var test= document.getElementById("tempR").value;
       if (test == "error" )
       {
         alert("Problème de connexion a la base de donnée le site internet est indisponible. veuillez réessayer plus tard Merci de votre attention ");
       }
    });
}
</script>
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <script>
  var execute = false;
  var son=false;
   function IHM ()
{


  //Initialisation des variables
  var reset;
  var humcapt=  humR;
  var tempcapt= tempR;
  var Co2capt = co2R;
  var temps = tempsR;
  var hum = document.getElementById("hummax").value;
  var temp= document.getElementById("tempmax").value;
  var Co2= document.getElementById("Co2max").value;
  var audio = new Audio('alarme.mp3');
  //afficher les valeurs
  if (Co2capt == -1) { document.getElementById("Co2aff").innerHTML = 'Moins de 400 ppm';}
  else {document.getElementById("Co2aff").innerHTML = Co2capt;}
  document.getElementById("Tempaff").innerHTML= tempcapt + '°C';
  document.getElementById("Humaff").innerHTML = humcapt  + '%';
  document.getElementById("Tempsaff").innerHTML= temps ;

  if (init == false) //Initialisation de l'ihm
  {

    init = true;
    execute =true;
    son=true;
     //afficher le message d'alerte une fois toute les minute maximum pour éviter de bloqué la page
  }
  if ( humcapt>hum|| Co2capt>Co2  || tempcapt>temp || humcapt<humMin || tempcapt<tempMin   )            //Cette partie du script sera au final un pop d'avertissement
  {
    if (son == false)
     {
       son=true;
       audio.play();
     }
    console.log("hop j'ai hop")
    if(execute == false)
    {
      execute=true;
      alert("Attention ! Les valeurs ont été dépassées veuillez à prendre les précautions nécessaires");
    }
  }
}


</script>
  <!-- End custom js for this page-->

</body>

</html>

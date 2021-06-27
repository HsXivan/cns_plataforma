
<?php


include "lib/validarSesionIndex.php";
$mensajeError = "";
$option=0;



if (isset($_GET["respuesta"])) $respuesta = $_GET["respuesta"]; else $respuesta = "";

switch ($respuesta)
{
    case "1": $respuesta = "El usuario o contrase&ntilde;a no pueden ir vac&iacute;os"; break;
    case "2": $respuesta = "No has iniciado tu sesi&oacute;n o bien ha expirado. Autentificate"; break;
    case "3": $respuesta = "El nombre de usuario o contrase&ntilde;a son incorrectos"; break;
    case "4": $respuesta = "El registro fue exitoso, espera la respuesta de la autorizaci&oacute;n"; break;
    case "5": $respuesta = "Tu registro sigue pendiente de aprobaci&oacute;n"; break;

}

if(isset($_GET["option"]))
    $option=$_GET["option"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Solicitudes CNS | Home</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap -->
    <link rel="stylesheet" href="css/mdb.min.css">
    <!-- Your custom styles (optional) -->
    <link rel="stylesheet" href="css/style.css">


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">

</head>
<body >


<!-- Main navigation -->
<header>

    <!--Navbar -->
    <nav class="navbar navbar-expand-lg scrolling-navbar navbar-dark z-depth-0 fixed-top pb-0 pt-0">
        <a class="navbar-brand" href="https://ipicyt.edu.mx/" target="_blank">
            <img src="img/logo_ipicyt.png" alt="mdb logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="far fa-question-circle"></i>
                    </a>
                </li>

            </ul>
        </div>
    </nav>
    <!--/.Navbar -->


    <?php
    if ($option == 0) {
        ?>
        <!-- Intro -->

        <div class="container">
        <section class="view">
            <div class="row" style="margin-top: 7em;">
                <div class="col-lg-6">

                    <div class="d-flex flex-column justify-content-center align-items-center h-100">
                        <h1 class="heading display-4">Solicitudes CNS</h1>
                        <h4 class="subheading font-weight-bold">Sessión de Administrador</h4>
                        <form action="lib/login.php" method="post">
                        <div class="row">

                                <div class="md-form input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon grey-text" id="material-addon1">@</span>
                                    </div>
                                    <input class="form-control" type="email" name="txtEmail" id ="txtEmail" placeholder="E-mail" aria-describedby="material-addon1" required>
                                </div>
                                <div class="md-form input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon" id="material-addon2"><i class="fa fa-key grey-text"></i> </span>
                                    </div>
                                    <input class="form-control" type="password" name="txtPassword" id = "txtPassword" placeholder="Password" aria-describedby="material-addon2" required>
                                </div>
                            <button class="btn btn-secondary" name="btnAccederAdmin" type="submit">Log in</button>

                        </div>
                        </form>
                    </div>

                </div>

                <div class="col-lg-6">

                    <div class="view">
                        <h4 class=" flex-center subheading font-weight-bold ">Administrador</h4>
                        <div class="mask  hm-gradient ">
                        </div>
                    </div>
                    <h5 class="subheading font-weight-light" style="color: dimgrey;"> Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua. Ut
                        enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquid ex ea commodi
                        consequat. Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur. Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt
                        mollit anim id est laborum.</h5>
                </div>

            </div>

        </section>
        <!-- Intro -->
        </div>

        <?php
    }
    ?>
</header>


<?php
if ($respuesta != ""){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Mensaje |</strong> <?php echo " ".$respuesta;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?
}else if ($mensajeError != ""){
    ?>
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> <?php echo $mensajeError;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
?>

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>

</body>
</html>
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
    <link rel="stylesheet" href="css/added_eh.css">

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/cns.css" rel="stylesheet" media="all">
    <link href="css/main.css" rel="stylesheet" media="all">    
    <link href="css/menu2.css" rel="stylesheet" media="all">
    

</head>
<body >


<!-- Main navigation -->
<header>
    <!--Navbar -->
    <nav class="navbar navbar-expand-lg fondoContenedorMenu navbar-light bg-light " style=" padding-top: 0px; padding-bottom: 0px;">
	<div id="app" class="container  navbar-cns"  style="display: block;">

		<div class="row" id="navbarSupportedContent">
			<div class="col-sm-3" >
				<a class="navbar-brand" href="/" >
					<img class="logoCNS-lg ml-4" src="img/logocns.svg"  />
				</a>
			</div>
				
			<div class="col-sm-7">
				<div class="text-center mt-3" style="color: white;"><h1>PORTAL DE USUARIOS DEL CNS</h1></div>
			</div>
			<div class="col-sm-2 pull-right" >
				
					<a class="" href="#" target="_blank" style="margin-left: 10px;">
						<img  src="img/horizontal.svg"  style="margin-top: 10px;" />
					</a>
			</div>
		</div>
	</div>
</nav>
    <!--/.Navbar -->
</header>

<!--
<div class="row">
    <div class="d-none d-sm-block col-sm-6">
        HIDE ME ON SMALL SCREENS.
        Show me on larger screens.
    </div>
    <div class="col-sm-6 col-xs-12">
        SHOW ME ON SMALL SCREENS.
        Show me on larger screens.
    </div>
</div>
-->

<?php
	if(isset($nombre)){ ?>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="pull-right" style="padding-top: 20px; word-spacing: 20px;"> 
					<a class="text-dark"  href="#"><?php echo $nombre;?></a>
					<a class="text-dark" href="salir.php"> Salir</a>
			</div> 
		</div>
	</div>
<?php
	}?>  


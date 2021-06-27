<?php
session_start();
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
    <link href="css/main.css" rel="stylesheet" media="all">

    <script type="text/javascript" src="../js/jquery.min.js"></script>

</head>
<body >


<div class="elem-group">
    <label for="captcha">Please Enter the Captcha Text</label>
    <img src="democapcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha"></i>
    <br>
    <input type="text" id="captcha" name="captcha_challenge" pattern="[A-Z]{6}">
</div>

<input type="button" value="Click me" id="send" name="send" class="derp" >







<script>
var refreshButton = document.querySelector(".refresh-captcha");
refreshButton.onclick = function() {
  document.querySelector(".captcha-image").src = 'democapcha.php?' + Date.now();
}

$(document).ready(function() {
  $('.derp').click(myFunction);
});

function myFunction() {
    console.log("hello!");
    $.ajax({
        type: "POST",
        url: 'verify.php',
        data: {
                captcha: $("#captcha").val()
            },
        dataType: "html",
        success: function(data) {
            // Run the code here that needs
            //    to access the data returned
            alert(data);
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
}
/*





function cosa() {
console.log("hello!");
    $.ajax({
        type: "POST",
        url: 'verify.php',
        data: {
                captcha: $("#captcha").val()
            },
        dataType: "html",
        success: function(data) {
            // Run the code here that needs
            //    to access the data returned
            alert("Capcha correcto!!");
            return data;
        },
        error: function() {
            alert('Error occured');
        }
    });
}
}


$(document).ready(function() {
  $('#send').click(cosa);
});*/
</script>
</body>


</html>

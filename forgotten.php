<?php 
    include 'common/header.php';
    include 'lib/FunGen.php';
    include 'lib/mail.php';

    $mensaje="";
     $mailMsj="";

    if(isset ($_POST['email']))
    {
       // echo $_POST['email'];

       
        if(existeUser($_POST['email']) && $pass=nuevoPass($_POST['email']) ){
            $mailMsj= "Estimado usuario, Se recibio la solicitud de cambio de contraseña para su usuario, su nueva contraseña es: $pass. Atentamente, Portal de usuarios del CNS";            
            sendNotificationMail($_POST['email'],'Envio de contraseña',$mailMsj);
            $mensaje='<div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Usuario encontrado </strong> Se envia correo con instrucciones para recuperar su contraseña.
            </div>';

        
                

        }else
   //     
        { $mensaje='<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>¡Usuario no encontrado!</strong> si no esta registrado por favor <a href="./index_old.php?option=1" class="alert-link">registrese aquí</a>
          </div>';

          
        }       
    }

?>

<div class="container">
<br>
<div class="row">


    <div class="col-sm-12">
    <?php
    echo $mensaje?></div>
</div>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
<br>
    <h2>¿Olvidó su correo?</h2>
        <p>Por favor llene el siguiente campo para que se le envie un correo con instrucciones para obtener su contraseña</p>
        
        <form action="./forgotten.php" class="was-validated" method="post">
            <div class="form-group">
            <label for="uname">Correo:</label>
            <input type="email" class="form-control" id="email" placeholder="mail@ejemplo.com" name="email" required>
            <div class="valid-feedback">Valido.</div>
            <div class="invalid-feedback">por favor rellene el campo con su correo.</div>
            </div>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

    </div>
</div>
<div class="col-sm-3"></div>
  
</div>
<?php
include 'common/footer.php';
?>
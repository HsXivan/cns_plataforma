<?php
	include_once "conexiones.php";

	function codifica($cadena){
		return $cadena; //return utf8_encode($cadena);
	}

	function decodifica($cadena){
		return $cadena;//return utf8_decode($cadena);
	}

	function preparaCadenaJSON($cadena){
		$cadena =  htmlspecialchars($cadena, ENT_QUOTES);
		return $cadena;
	}

	function preparaCadenaSQL($cadena){
		$cadena = str_replace("'", "''", $cadena);
		return $cadena;
	}
	
	function agregaSlashes($cadena){
		$arreglo = explode(",",$cadena);
		$nuevaCadena = "";
		for ($i=0;$i<count($arreglo);$i++){
			$nuevaCadena .= "'".$arreglo[$i]."',";
		}
		$nuevaCadena = substr($nuevaCadena, 0, strlen($nuevaCadena)-1);

		return $nuevaCadena;
	}

	function obtenerAcademicosEmailNombre(){
        $con = conecta_BD();

        $sql = "SELECT nombres,apellidoPaterno,apellidoMaterno,correo FROM academicos WHERE activo = 1 ";

        $result = mysqli_query($con, $sql);

        mysqli_close($con);
        return $result;
    }

function nuevoUsuario($nombre,$apellidoP,$apellidoM,$email,$password,$telephonPersonal,$telephonInst, $paisInst,$gradoAcademico, $institucionAdscripcion, $tipoUsuario, $correoAcademico, $file )
{

//echo "<br>Archivo:";
//print_r($file['cvu']);
//uploadCVU($file);

echo "<br>".$tipoUsuario;
    $con = conecta_BD();
    
    if($tipoUsuario==1){ $tablename='academicos';
        $sql= "INSERT INTO academicos 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico, tipoDeAcademico,pass,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",".$tipoUsuario.",'".md5(decodifica($password))."','". uploadCVU($file['cvu'])."')";}
    else if($tipoUsuario==2){ $tablename='dependientes';
        echo $sql= "INSERT INTO dependientes 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico, tipoDeDependiente,pass, correoAcademico,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",1,'".md5(decodifica($password))."', '".decodifica($correoAcademico)."', '".uploadCVU($file['cvu'])."')";}
else if ($tipoUsuario==3){ $tablename='dependientes';
    $sql= "INSERT INTO dependientes 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico, tipoDeDependiente,pass, correoAcademico,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",2,'".md5(decodifica($password))."', '".decodifica($correoAcademico)."', '".uploadCVU($file['cvu'])."')";}
    else if ($tipoUsuario==4){ $tablename='profesionales';
        $sql= "INSERT INTO profesionales 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico,pass,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",'".md5(decodifica($password))."', '".uploadCVU($file['cvu'])."')";}

	echo $sql;
    $result = mysqli_query($con,$sql);
    //$last_id=mysqli_insert_id($con);    

    //echo $sql="UPDATE ".$tablename." SET cvu='".decodifica(uploadCVU($file,$last_id))."';";
    //$result = mysqli_query($con,$sql);


   
    if(!$result){
        "Error: " .mysqli_error($con);
        mysqli_close($con);
        header("Location: ../index.php?option=2");
    }else {
        mysqli_close($con);
        $mensaje = "Has sido registrado a la plataforma de solicitud de recursos del Centro Nacional de Supercomputo (CNS). Si eres Profesor-Investigador el administrador de la plataforma te dará la autorización de acceso, en caso de ser estudiante o posdoctorante tu Profesor-Investigador a cargo te dará el acesso.";
        enviarEmailA(decodifica($email), "Registro plataforma de solicitudes CNS", $mensaje);
     //   header("Location: ../index.php?respuesta=4");
    }

}

function uploadCVU($file, $id=null){
//echo "hai!";

    $targetfolder = "../uploads/cv/";
   // echo "</br>file: ". print_r($file);

   // $targetfolder = $targetfolder . basename( $file['name']) ;
    $extension  = pathinfo( $file["name"], PATHINFO_EXTENSION );
    $basename   = $targetfolder.'cvu'.uniqid(). '.' . $extension;

    $ok=1;
   
   $file_type=$file['type'];   
   if ($file_type=="application/pdf") {   
    if(move_uploaded_file($file['tmp_name'], $basename))   
    {   
        echo "The file ". basename( $file['name']). " is uploaded";   
        return $basename;
    }   
    else {   
        echo "Problem uploading file";   
    }   
   }   
   else {   
    echo "You may only upload PDFs, JPEGs or GIF files.<br>";   
   }


}

function autorizarUsuario($email){
    $con = conecta_DB();
    $sql= "UPDATE usuarios SET ID_ESTADO_USUARIO=2 WHERE CORREO = '".decodifica($email)."'";
    $result = mysqli_query($con,$sql);

    mysqli_close($con);
    if(!$result){
        echo "No se pudo validar el nuevo usuario favor de intentarlo mas tarde.";
    }else {
        $mensaje = "Tu cuenta en la plataforma de Patrimonio del Estado de México ha sido autorizada.";
        enviarEmailA(decodifica($email), "Cuenta Autorizada - Patrimonio del Estado de México", $mensaje);
        header("Location: principal.php?mr=3");
    }
}


function validarUsuario($email,$password,$typeUser)
{
    $con = conecta_BD();   
   
    if($typeUser==1)
        $sql= "SELECT * from academicos WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
    else if($typeUser==2||$typeUser==3)
        $sql= "SELECT * from dependientes WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
    else if($typeUser==4)
        $sql= "SELECT * from profesionales WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
    

    $result = mysqli_query($con,$sql);
    $estado=-1;
    mysqli_close($con);
    if(!$result){
        header("Location: ../index.php?respuesta=3");
        exit;
    }else{
        if ($read = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $estado = codifica($read["activo"]);

	    if($estado==0){
		header("Location: ../index.php?respuesta=5");
            	exit;
	    }     // echo "Usuario registrado pero no validado.";
            else if($estado==1)
            {

            session_start();
            $_SESSION['email'] = codifica($read["correo"]);
            $_SESSION['nombres'] = codifica($read["nombres"]);
            $_SESSION['apellidoP'] = codifica($read["apellidoPaterno"]);
            $_SESSION['apellidoM'] = codifica($read["apellidoMaterno"]);
            $_SESSION['typeUser'] = $typeUser;
                header("Location: ../principal.php");
    	        exit;
            }

        }else{
            header("Location: ../index.php?respuesta=3");
            exit;
        }
    }
}

function verificaUser($email,$password){
    
    $con = conecta_BD();
    $sql= "SELECT * from academicos WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
    $result = mysqli_query($con,$sql);
    $datos = mysqli_fetch_assoc($result);
    $typeUser=1;
    $existe=$result->num_rows;
    
    if(!$existe){
        $sql= "SELECT * from dependientes WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
        $result = mysqli_query($con,$sql);        
        //echo $typeUser;
        $existe=$result->num_rows;
        $datos = mysqli_fetch_assoc($result);
        $typeUser=1+$datos['tipoDeDependiente'];

        if(!$existe){
            $sql= "SELECT * from profesionales WHERE  correo = '".$email."' AND pass = '".md5($password)."'";
            $result = mysqli_query($con,$sql);
            $existe=$result->num_rows;
            $datos = mysqli_fetch_assoc($result);
            $typeUser=4;    
        }
       
        
    }

    if($existe){
//        echo $typeUser;
       
        //if ($read = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        if( $datos){
            $estado = codifica($datos["activo"]);
            print_r($datos);

            if($estado==0){
                  //"Usuario registrado pero no validado.";
                header("Location: ../index.php?respuesta=5");
                    exit;
            }   
            else if($estado==1)
            {

                session_start();
                $_SESSION['email'] = codifica($datos["correo"]);
                $_SESSION['nombres'] = codifica($datos["nombres"]);
                $_SESSION['apellidoP'] = codifica($datos["apellidoPaterno"]);
                $_SESSION['apellidoM'] = codifica($datos["apellidoMaterno"]);
                $_SESSION['typeUser'] = $typeUser;
                header("Location: ../principal.php");
    	        exit;
            }

        }else{
            header("Location: ../index.php?respuesta=3");
            exit;
        }

    }
    else  header("Location: ../index.php?respuesta=3");

}

function numeroSolicitudesDeEstudiantes($email)
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from dependientes WHERE correoAcademico = '".decodifica($email)."' AND activo = 0";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroSolicitudesDeInvestigadores()
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from academicos WHERE activo = 0";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroSolicitudesDeProfesionales()
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from profesionales WHERE activo = 0";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroSolicitudesDeProyectos()
{
    $con = conecta_BD();
    $numAcademicos=0;
    $numDependientes=0;
    $numProfesionales=0;

    $sql = "SELECT COUNT(*) as numero from propuestasacademicas WHERE estado = 0";
    $result = mysqli_query($con, $sql);
    $numAcademicos= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    $sql = "SELECT COUNT(*) as numero from propuestasdependientes WHERE estado = 0";
    $result = mysqli_query($con, $sql);
    $numDependientes= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    $sql = "SELECT COUNT(*) as numero from propuestasprofesionales WHERE estado = 0";
    $result = mysqli_query($con, $sql);
    $numProfesionales= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    mysqli_close($con);
    return $numDependientes+$numProfesionales+$numAcademicos;
}

function solicitudesDeEstudiantes($email)
{
    $con = conecta_BD();

    //$sql = "SELECT * from dependientes WHERE correoAcademico = '".decodifica($email)."' AND activo = 0";
    $sql="SELECT dependientes.*, gradosacademicos.nombre 
    as gradoAcademico from dependientes, gradosacademicos 
    WHERE correoAcademico = '".decodifica($email)."' 
    AND gradosacademicos.ID=dependientes.gradoAcademico AND activo = 0 ";

  
    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function solicitudesDeInvestigadores()
{
    $con = conecta_BD();

    $sql = "SELECT academicos.*, gradosacademicos.nombre as gradoAcademico
    from academicos, gradosacademicos
     WHERE activo = 0 
     AND gradosacademicos.ID=academicos.gradoAcademico";



    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function solicitudesDeProfesionales()
{
    $con = conecta_BD();

    //$sql = "SELECT * from profesionales WHERE activo = 0";
    $sql="SELECT profesionales.*, gradosacademicos.nombre AS grado 
        from profesionales, gradosacademicos 
        WHERE activo=0 AND gradosacademicos.ID=profesionales.gradoAcademico ";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function solicitudesProfesionalesProyectos()
{
    $con = conecta_BD();
    $sql = "SELECT detallesproyectos.ID as proyectId, propuestasprofesionales.ID, propuestasprofesionales.correoDelProfesional ,profesionales.nombres, profesionales.apellidoPaterno, profesionales.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion  FROM propuestasprofesionales INNER JOIN detallesproyectos ON propuestasprofesionales.DetallesProyectos_ID = detallesproyectos.ID INNER JOIN profesionales ON propuestasprofesionales.correoDelProfesional = profesionales.correo WHERE  propuestasprofesionales.estado = 0;";  
    $result = mysqli_query($con, $sql);
  if($result=== FALSE)
      echo "<br> <br> <br> <br> Error ".mysqli_error($con);
    mysqli_close($con);
    return $result;
}
function solicitudesAcademicosProyectos()
{
    $con = conecta_BD();
    $sql = "SELECT detallesproyectos.ID as proyectId, propuestasacademicas.ID, propuestasacademicas.correoDelAcademico, academicos.nombres, academicos.apellidoPaterno, academicos.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion FROM propuestasacademicas INNER JOIN detallesproyectos on propuestasacademicas.DetallesProyectos_ID = detallesproyectos.ID INNER  JOIN academicos on propuestasacademicas.correoDelAcademico = academicos.correo WHERE propuestasacademicas.estado = 0;";
//	$sql= "SELECT * FROM  propuestasacademicas INNER JOIN academicos ON propuestasacademicas.correoDelAcademico = academicos.correo;";   
 $result = mysqli_query($con, $sql);
if($result=== FALSE)
      echo "<br> <br> <br> <br> Error ".mysqli_error($con);
    mysqli_close($con);
    return $result;
}
function solicitudesDependientesProyectos()
{
    $con = conecta_BD();
    $sql = "SELECT detallesproyectos.ID as proyectId,propuestasdependientes.ID,propuestasdependientes.correoDelResponsable, 
    propuestasdependientes.correoDelGestor, dependientes.nombres, dependientes.apellidoPaterno, 
    dependientes.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
    FROM propuestasdependientes INNER JOIN detallesproyectos 
    on propuestasdependientes.DetallesProyectos_ID = detallesproyectos.ID 
    INNER  JOIN dependientes on propuestasdependientes.correoDelGestor = dependientes.correo 
    WHERE  propuestasdependientes.estado = 0;";


    $result = mysqli_query($con, $sql);
if($result=== FALSE)
      echo "<br> <br> <br> <br> Error ".mysqli_error($con);
    mysqli_close($con);
    return $result;
}


function estudiantesActivos($email)
{
    $con = conecta_BD();

    $sql="SELECT dependientes.*, tiposdedependientes.nombre as tipoDependiente, gradosacademicos.nombre AS grado 
    from dependientes, tiposdedependientes,  gradosacademicos
    WHERE correoAcademico = '".decodifica($email)."' 
    AND tiposdedependientes.ID=dependientes.tipoDeDependiente
    AND gradosacademicos.ID=dependientes.gradoAcademico
     AND activo = 1 ";

    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
function investigadoresActivos()
{
    $con = conecta_BD();
   
    $sql = "SELECT academicos.*, tiposdeacademico.nombre as tipoAcademico, gradosacademicos.nombre 
            AS grado from academicos, tiposdeacademico, gradosacademicos 
            WHERE  tiposdeacademico.ID=academicos.tipoDeAcademico 
            AND gradosacademicos.ID=academicos.gradoAcademico AND  activo = 1";



    
     

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}


function profesionalesActivos()
{
    $con = conecta_BD();

    //$sql = "SELECT * from profesionales WHERE  activo = 1";

    $sql="SELECT profesionales.*, gradosacademicos.nombre AS grado 
    from profesionales, gradosacademicos 
    WHERE activo=1 AND gradosacademicos.ID=profesionales.gradoAcademico ";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function profesionalesProyectosActivos()
{
    $con = conecta_BD();
    $sql = "SELECT propuestasprofesionales.ID, propuestasprofesionales.correoDelProfesional , profesionales.nombres, profesionales.apellidoPaterno, profesionales.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasprofesionales
            INNER join detallesproyectos on propuestasprofesionales.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN profesionales on propuestasprofesionales.correoDelProfesional = profesionales.correo 
            WHERE  estado = 1";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
function academicosProyectosActivos()
{
    $con = conecta_BD();
    $sql = "SELECT propuestasacademicas.ID,  propuestasacademicas.correoDelAcademico,  academicos.nombres, academicos.apellidoPaterno, academicos.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasacademicas 
            INNER join detallesproyectos on propuestasacademicas.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN academicos on propuestasacademicas.correoDelAcademico = academicos.correo
WHERE  estado = 1";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
function dependientesProyectosActivos()
{
    $con = conecta_BD();
    $sql = "SELECT propuestasdependientes.ID,propuestasdependientes.correoDelResponsable, propuestasdependientes.correoDelGestor, dependientes.nombres, dependientes.apellidoPaterno, dependientes.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasdependientes 
            INNER join detallesproyectos on propuestasdependientes.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN dependientes on propuestasdependientes.correoDelGestor = dependientes.correo 
            WHERE  estado = 1";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

function misProyectos($email,$typeUser)
{
    $email = addslashes($email);
    $email = trim($email);
    $con = conecta_BD();
$sql="";
    if($typeUser==2 || $typeUser== 3) {
        $sql = "SELECT propuestasdependientes.ID, propuestasdependientes.estado, detallesproyectos.resumen ,propuestasdependientes.correoDelResponsable, dependientes.nombres, dependientes.apellidoPaterno, dependientes.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasdependientes 
            INNER join detallesproyectos on propuestasdependientes.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN dependientes on propuestasdependientes.correoDelGestor = dependientes.correo 
            WHERE  propuestasdependientes.correoDelGestor = '".decodifica($email)."'";
    }else if ($typeUser == 1){
        $sql = "SELECT propuestasacademicas.ID, propuestasacademicas.estado, detallesproyectos.resumen , propuestasacademicas.correoDelAcademico, academicos.nombres, academicos.apellidoPaterno, academicos.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasacademicas 
            INNER join detallesproyectos on propuestasacademicas.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN academicos on propuestasacademicas.correoDelAcademico = academicos.correo
WHERE propuestasacademicas.correoDelAcademico = '".decodifica($email)."'";
    }else if($typeUser == 4)
    {
        $sql = "SELECT propuestasprofesionales.ID, propuestasprofesionales.estado , detallesproyectos.resumen ,propuestasprofesionales.correoDelProfesional ,profesionales.nombres, profesionales.apellidoPaterno, profesionales.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasprofesionales
            INNER join detallesproyectos on propuestasprofesionales.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN profesionales on propuestasprofesionales.correoDelProfesional = profesionales.correo 
            WHERE  propuestasprofesionales.correoDelProfesional = '".decodifica($email)."'";
    }

    //echo $sql;
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

function consultarProyecto($email,$idProject,$typeUser){
    $email = addslashes($email);
    $email = trim($email);
    $con = conecta_BD();
    $sql="";
    if($typeUser==2 || $typeUser== 3) {
        $sql = "SELECT propuestasdependientes.estado, detallesproyectos.ID,detallesproyectos.financiamiento,detallesproyectos.numeroDeCores,detallesproyectos.tarjetasGraficas,detallesproyectos.justificacionTarjetaGrafica,detallesproyectos.almacenamiento,detallesproyectos.especialidad,detallesproyectos.justificacionGeneral,detallesproyectos.resultadosEsperados,detallesproyectos.urlDelResumen, detallesproyectos.resumen ,propuestasdependientes.correoDelResponsable as correo, dependientes.nombres, dependientes.apellidoPaterno, dependientes.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasdependientes 
            INNER join detallesproyectos on propuestasdependientes.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN dependientes on propuestasdependientes.correoDelGestor = dependientes.correo 
            WHERE  propuestasdependientes.correoDelGestor = '".decodifica($email)."' AND propuestasdependientes.ID = ".decodifica($idProject);
    }else if ($typeUser == 1){
        $sql = "SELECT propuestasacademicas.estado,detallesproyectos.ID,detallesproyectos.financiamiento,detallesproyectos.numeroDeCores,
            detallesproyectos.tarjetasGraficas,detallesproyectos.justificacionTarjetaGrafica,detallesproyectos.almacenamiento,detallesproyectos.especialidad,
            detallesproyectos.justificacionGeneral,detallesproyectos.resultadosEsperados,detallesproyectos.urlDelResumen, detallesproyectos.resumen , 
            propuestasacademicas.correoDelAcademico  as correo, academicos.nombres, academicos.apellidoPaterno, academicos.apellidoMaterno, 
            detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasacademicas 
            INNER join detallesproyectos on propuestasacademicas.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN academicos on propuestasacademicas.correoDelAcademico = academicos.correo
WHERE propuestasacademicas.correoDelAcademico = '".decodifica($email)."'  AND propuestasacademicas.ID = ".decodifica($idProject);
    }else if($typeUser == 4)
    {
        $sql = "SELECT propuestasprofesionales.estado,detallesproyectos.ID, detallesproyectos.financiamiento,detallesproyectos.numeroDeCores,detallesproyectos.tarjetasGraficas,detallesproyectos.justificacionTarjetaGrafica,detallesproyectos.almacenamiento,detallesproyectos.especialidad,detallesproyectos.justificacionGeneral,detallesproyectos.resultadosEsperados,detallesproyectos.urlDelResumen, detallesproyectos.resumen ,propuestasprofesionales.correoDelProfesional as correo,profesionales.nombres, profesionales.apellidoPaterno, profesionales.apellidoMaterno, detallesproyectos.titulo, detallesproyectos.areaDeInvestigacion 
            from propuestasprofesionales
            INNER join detallesproyectos on propuestasprofesionales.DetallesProyectos_ID = detallesproyectos.ID
            INNER  JOIN profesionales on propuestasprofesionales.correoDelProfesional = profesionales.correo 
            WHERE  propuestasprofesionales.correoDelProfesional = '".decodifica($email)."'  AND propuestasprofesionales.ID = ".decodifica($idProject);
    }

   // echo $sql;
   
    $result = mysqli_query($con, $sql);
    $listObjects= array();
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
        $objectJsonProject = (object)[
	    'idDetalle' => codifica($row['ID']),
            'titulo' => codifica($row['titulo']),
            'resumen' => codifica($row['resumen']),
            'correo' => codifica($row['correo']),
            'nombres' => codifica($row['nombres']),
            'estado' => codifica($row['estado']),
            'apellidoPaterno' => codifica($row['apellidoPaterno']),
            'apellidoMaterno' => codifica($row['apellidoMaterno']),
            'areaInvestigacion' => codifica($row['areaDeInvestigacion']),
            'numCores' => codifica($row['numeroDeCores']),
            'numTarjetasGraficas' => codifica($row['tarjetasGraficas']),
            'justificacionTarjeta' => codifica($row['justificacionTarjetaGrafica']),
            'almacenamiento' => codifica($row['almacenamiento']),
            'especialidad' => codifica($row['especialidad']),
            'justificacion' => codifica($row['justificacionGeneral']),
            'resultEsperados'=> codifica($row['resultadosEsperados']),
            'financiamiento' => codifica($row['financiamiento']),
            'fileJustificacion' => codifica($row['urlDelResumen']),
        ];
        $listObjects[]= $objectJsonProject;
    }
    mysqli_close($con);
    mysqli_free_result($result);

    return $listObjects;
}

function consultarSoftwareRequerido($idDetalleRequerido){
    $con = conecta_BD();
    $sql = "SELECT * FROM softwarerequeridos WHERE DetallesProyectos_ID = ".$idDetalleRequerido;
    $result = mysqli_query($con, $sql);

    
    $listObjects= array();
    while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {

	$pathFile = codifica($row['sitioWeb']);
	if($pathFile!=""){
		if(strpos($pathFile,"http") == false){
			$pathFile = "http://" . $pathFile;
		}
	}

	$tipoLicencia = "Libre";
	if(codifica($row['tipo'])==1)
	{
		$tipoLicencia = "Comercial";
	}

    $objectJsonProject = (object)[
            'nombre' => codifica($row['nombre']),
            'version' => codifica($row['version']),
            'sitioWeb' => $pathFile,
            'tipo' => $tipoLicencia,
            'pathFileLicencia' => codifica($row['linkDeLicencia']),
        ];
        $listObjects[]= $objectJsonProject;
    }
    mysqli_close($con);
    mysqli_free_result($result);
   return $listObjects;
}

function numeroDeMisProyectos($email,$typeUser)
{
//    $email = addslashes($email);
  //  $email = trim($email);
    $con = conecta_BD();


    $sql = "";
    if($typeUser==2 || $typeUser== 3) {
        $sql = "SELECT COUNT(*) as numero from propuestasdependientes WHERE  correoDelGestor = '".decodifica($email). "'";
    }else if ($typeUser == 1){
        $sql = "SELECT COUNT(*) as numero from propuestasacademicas WHERE correoDelAcademico = '".decodifica($email)."'";
    }else if($typeUser == 4)
    {
        $sql = "SELECT COUNT(*) as numero from propuestasprofesionales WHERE correoDelProfesional = '".decodifica($email)."'";
    }


    
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}

function numeroDeEstudiantes($email)
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from dependientes WHERE correoAcademico = '".decodifica($email)."' AND activo = 1";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroDeInvestigadores()
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from academicos WHERE  activo = 1";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroDeProfesionales()
{
    $con = conecta_BD();

    $sql = "SELECT COUNT(*) as numero from profesionales WHERE  activo = 1";

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}
function numeroDeProyectos()
{
    $con = conecta_BD();
    $numAcademicos=0;
    $numDependientes=0;
    $numProfesionales=0;

    $sql = "SELECT COUNT(*) as numero from propuestasacademicas WHERE estado = 1";
    $result = mysqli_query($con, $sql);
    $numAcademicos= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    $sql = "SELECT COUNT(*) as numero from propuestasdependientes WHERE estado = 1";
    $result = mysqli_query($con, $sql);
    $numDependientes= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    $sql = "SELECT COUNT(*) as numero from propuestasprofesionales WHERE estado = 1";
    $result = mysqli_query($con, $sql);
    $numProfesionales= mysqli_fetch_row($result)[0];
    mysqli_free_result($result);

    mysqli_close($con);
    return $numDependientes+$numProfesionales+$numAcademicos;
}

function ejecutarActualizacion($sql)
{
    $con = conecta_BD();

    $result = mysqli_query($con, $sql);

    mysqli_close($con);
    return $result;
}

function obtenerPaises()
{
    $con = conecta_BD();
    $sql = "SELECT * from paises";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    return $result;
}
function enviarEmailA($destinatario, $asunto, $mensaje){
    $headers = 'From: leonardo.alvarez@ipicyt.edu.mx' . "\r\n" .
        'Reply-To: leonardo.alvarez@ipicyt.edu.mx' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($destinatario, $asunto, $mensaje, $headers);
}


function getPersonalData($id,$tipo=null){

    $con = conecta_BD();
    $correo= mysqli_real_escape_string($con,$id);

    
    switch(decodifica($tipo)){
        case 1:
           $sql="SELECT dependientes.*, tiposdedependientes.nombre as tipoDependiente, gradosacademicos.nombre AS grado 
            from dependientes, tiposdedependientes, gradosacademicos 
            WHERE correo = '".decodifica($correo)."' AND tiposdedependientes.ID=dependientes.tipoDeDependiente 
            AND gradosacademicos.ID=dependientes.gradoAcademico AND activo = 1 ";
            break;

        case 2:
            $sql="SELECT academicos.*, tiposdeacademico.nombre as tipoAcademico, gradosacademicos.nombre 
            AS grado from academicos, tiposdeacademico, gradosacademicos 
            WHERE correo = '".decodifica($correo)."' AND tiposdeacademico.ID=academicos.tipoDeAcademico 
            AND gradosacademicos.ID=academicos.gradoAcademico ";                        
            break;
        case 3: 
            $sql="SELECT dependientes.*, tiposdedependientes.nombre as tipoDependiente, gradosacademicos.nombre AS grado 
            from dependientes, tiposdedependientes, gradosacademicos 
            WHERE correo = '".decodifica($correo)."' AND tiposdedependientes.ID=dependientes.tipoDeDependiente 
            AND gradosacademicos.ID=dependientes.gradoAcademico";
            break;
        case 4: 
            $sql="SELECT profesionales.*, gradosacademicos.nombre AS grado 
                from profesionales, gradosacademicos 
                WHERE correo = '".decodifica($correo)."' AND gradosacademicos.ID=profesionales.gradoAcademico ";
            break;

    }
    

    

    $result = mysqli_query($con,$sql);
   // mysqli_close($con);
    if(!$result){
            //errror!;
    }
    mysqli_close($con);
    return $result->fetch_assoc();

}

function existeUser($email){

    $con = conecta_BD();
    $email= mysqli_real_escape_string($con,$email);


    $sql="SELECT (SELECT correo FROM dependientes WHERE dependientes.correo='".$email."' ) as sub1, 
    (SELECT correo FROM academicos WHERE academicos.correo='".$email."') as sub2, 
    (SELECT correo FROM profesionales WHERE profesionales.correo='".$email."' ) as sub3";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);

     if(!$result){
            return false;
     }
     
     while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
         //if($row['sub1']!=null || $row['sub2']!=null || $row['sub3']!=null)
           // return true;
           return $row['sub1']!=null?'dependientes':($row['sub2']!=null?'academicos':($row['sub3']!=null?'profesionales':false));
                
     }
     return false;
}

function buscaUser($email){

    $con = conecta_BD();
    $email= mysqli_real_escape_string($con,$email);
    $usr=null;
    if($tabla=existeUser($email)){
        //echo  $tabla;
        $sql= "SELECT * FROM $tabla WHERE correo= '$email'";
        $result = mysqli_query($con,$sql);
        
        $usr = mysqli_fetch_array($result,MYSQLI_ASSOC);
        //print_r($row);
        $usr['tipo']=daTipoUsuario($tabla);

        if(isset($usr['tipoDeDependiente'])){
           echo  $usr['tipo']+=1;
        }
        
    }
    mysqli_close($con);    
    return $usr;
}

function daTipoUsuario($tabla){
    switch($tabla){
        
        case 'academicos': return 1; break;
        case 'dependientes': return 2; break;
        case 'profesionales': return 4; break;
        default: return 'error'; break;

    }
}

function nuevoPass($email){
    
    $con = conecta_BD();
    $tabla=existeUser($email);
    $passwd=randomPassword();

    $sql="UPDATE $tabla SET pass='".md5($passwd)."' WHERE correo='$email'";
    $result = mysqli_query($con,$sql);
    mysqli_close($con);
    if($result)
    {
   
        return $passwd;
    }
        
    return false;

}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}



function editaUsuario($nombre,$apellidoP,$apellidoM,$email,$password,$telephonPersonal,$telephonInst, $paisInst,$gradoAcademico, $institucionAdscripcion, $tipoUsuario, $correoAcademico, $file )
{

    $con = conecta_BD();
    
    if($tipoUsuario==1){ $tablename='academicos';  $extra=" tipoDeAcademico = ".$tipoUsuario; }
    else if($tipoUsuario==2){ $tablename='dependientes';  $extra=" tipoDeDependiente = 1"; 
    }
    else if ($tipoUsuario==3){ $tablename='dependientes'; $extra=" tipoDeDependiente = 2";
    }
    else if ($tipoUsuario==4){ $tablename='profesionales';}

    if($password!='')
        $extra.=" , pass = '".md5(decodifica($password))."'";

    $sql= "UPDATE $tablename SET
    nombres ='".decodifica($nombre)."',
    apellidoPaterno = '".decodifica($apellidoP)."',
    apellidoMaterno ='".decodifica($apellidoM)."',
    correo = '".decodifica($email)."',
    telefonoInstitucional ='".decodifica($telephonInst)."',
    telefonoPersonal = '".decodifica($telephonPersonal)."',
    institucionDeAdscripcion ='".decodifica($institucionAdscripcion)."',
    paisDeLaInstitucion = '".decodifica($paisInst)."',    
    gradoAcademico =".$gradoAcademico.",".$extra;

    if(!empty($file['cv']))
        $sql.=", cv = '". uploadCVU($file['cvu'])."'";                
    
        $sql.="  WHERE correo='".decodifica($email)."' ";



       /*     
    else if($tipoUsuario==2){ $tablename='dependientes';
        $sql= "INSERT INTO dependientes 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico, tipoDeDependiente,pass, correoAcademico,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",1,'".md5(decodifica($password))."', '".decodifica($correoAcademico)."', '".uploadCVU($file)."')";}
else if ($tipoUsuario==3){ $tablename='dependientes';
    $sql= "INSERT INTO dependientes 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico, tipoDeDependiente,pass, correoAcademico,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",2,'".md5(decodifica($password))."', '".decodifica($correoAcademico)."', '".uploadCVU($file)."')";}
    else if ($tipoUsuario==4){ $tablename='profesionales';
        $sql= "INSERT INTO profesionales 
            (nombres,apellidoPaterno,apellidoMaterno,correo,telefonoInstitucional,telefonoPersonal,institucionDeAdscripcion, paisDeLaInstitucion,activo,gradoAcademico,pass,cv) 
                VALUES('".decodifica($nombre)."','".decodifica($apellidoP)."','".decodifica($apellidoM)."','".decodifica($email)."','".decodifica($telephonInst)."','".decodifica($telephonPersonal)."','".decodifica($institucionAdscripcion)."','".decodifica($paisInst)."',0,".$gradoAcademico.",'".md5(decodifica($password))."', '".uploadCVU($file)."')";}

*/
        echo $sql;
    $result = mysqli_query($con,$sql);

   
    if(!$result){
        "Error: " .mysqli_error($con);
        mysqli_close($con);
        header("Location: ../index.php?option=2");
    }else {
        mysqli_close($con);
       // $mensaje = "Has sido registrado a la plataforma de solicitud de recursos del Centro Nacional de Supercomputo (CNS). Si eres Profesor-Investigador el administrador de la plataforma te dará la autorización de acceso, en caso de ser estudiante o posdoctorante tu Profesor-Investigador a cargo te dará el acesso.";
       // enviarEmailA(decodifica($email), "Registro plataforma de solicitudes CNS", $mensaje);
        header("Location: ../index.php?respuesta=7");
    }
}



?>



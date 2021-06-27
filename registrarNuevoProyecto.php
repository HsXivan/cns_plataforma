<?php

require 'lib/conexiones.php';
require 'lib/FunGen.php';

//print_r($_POST);

// Datos principales del proyecto
$titulo = decodifica($_POST["proyecto-titulo"]);
$descripcion = decodifica($_POST["proyecto-descripcion"]);

//Requerimientos técnicos
$cores = $_POST["proyecto-cores"];
$espacio = $_POST["proyecto-discoduro"];
$gpus = $_POST["proyecto-gpus"];
$justificacionGpus = decodifica($_POST["proyecto-justificacion-gpu"]);

//Datos secundarios del proyecto
$justificacion = decodifica($_POST["proyecto-justificacion-gral_"]);
$financiamiento = decodifica($_POST["proyecto-financiamiento"]);
$area = decodifica($_POST["proyecto-area"]);
$especialidad = decodifica($_POST["proyecto-especialidad"]);
$resultados = decodifica($_POST["proyecto-resultados_"]);
$resumenPDF = "PENDING";

$conexion = conecta_BD();
//$resumenPDF =$conexion->real_escape_string($resumenPDF);

$statement = $conexion->prepare("INSERT INTO detallesproyectos (titulo, resumen, numeroDeCores, almacenamiento, tarjetasGraficas, justificacionTarjetaGrafica, justificacionGeneral, financiamiento, areaDeInvestigacion, especialidad, resultadosEsperados, urlDelResumen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$statement->bind_param("ssiiisssssss", $titulo, $descripcion, $cores, $espacio, $gpus, $justificacionGpus, $justificacion, $financiamiento, $area, $especialidad, $resultados, $resumenPDF);
$statement->execute(); 

$insertedProject = $conexion->insert_id;
$statement->close();

$urlDelResumen = uploadPDF($_FILES['resumen']); //subirArchivoPDF("proyecto-resumen-pdf", "resumen");
$updateStatement = $conexion->prepare("UPDATE detallesproyectos SET urlDelResumen=? WHERE ID=?;");
$updateStatement->bind_param("ss", $urlDelResumen, $insertedProject);
$updateStatement->execute();
$updateStatement->close();

$number= count($_POST['ps-nombre']);
if($number>0){

    //$var= 'DATA.--\n';
    for($i=0; $i<$number; $i++ ){

		

       /* $var.= $_POST['ps-nombre'][$i].'\n';
        $var.= $_POST['ps-version'][$i].'\n';
        $var.= $_POST['ps-tipo'][$i].'\n';
		$var.= $_POST['ps-link'][$i].'\n';
		$var.= $_POST['ps-licencia'][$i].'\n';*/
		
		
		$insertSoftware = $conexion->prepare("INSERT INTO softwarerequeridos (DetallesProyectos_ID, nombre, version, sitioWeb, tipo, linkDeLicencia) VALUES (?, ?, ?, ?, ?, ?)");
		$insertSoftware->bind_param("isssss", $insertedProject, $software, $version, $sitio, $tipo, $licencia);
		
		$software = $_POST["ps-nombre"][$i];
		$version = $_POST["ps-version"][$i];
		$sitio = $_POST["ps-link"][$i];
		$tipo = $_POST["ps-tipo"][$i];
		//$licencia = $_FILES["ps-licencia"][$i];

		if (!empty($_FILES['ps-licencia']['name'][$i])) {
			$pdf ["name"] = $_FILES['ps-licencia']["name"][$i];
			$pdf ["type"] = $_FILES['ps-licencia']["type"][$i];
			$pdf ["tmp_name"] = $_FILES['ps-licencia']["tmp_name"][$i];
			$pdf ["error"] = $_FILES['ps-licencia']["error"][$i];
			$pdf ["size"] = $_FILES['ps-licencia']["size"][$i];

			$licencia = uploadPDF($pdf);
		}

		
	
		else $licencia="N/A";

		$insertSoftware->execute();
		printf("Error: %s.\n", $insertSoftware->error);
		$insertSoftware->close();
        
	}
}


/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* Procesamiento de la propuesta */

$responsable = $_POST["proyecto-responsable"];
$gestor = $_POST["proyecto-gestor"];

$tipoDeUsuario = $_POST["tipo-usuario"];
$sqlPropuesta = "";
if($tipoDeUsuario == "1"){
	// Tabla de propuestasacademicas
	$proyectoStm = $conexion->prepare("INSERT INTO propuestasacademicas (estado, correoDelAcademico, detallesproyectos_ID) VALUES (0, ?, ?);");
	$proyectoStm->bind_param("si", $responsable, $insertedProject);
} else if($tipoDeUsuario == "2" || $tipoDeUsuario == "3"){
	// Tabla de propuestasdependientes
	$proyectoStm = $conexion->prepare("INSERT INTO propuestasdependientes (estado, correoDelGestor, correoDelResponsable, detallesproyectos_ID) VALUES (0, ?, ?, ?);");
	$proyectoStm->bind_param("ssi", $gestor, $responsable, $insertedProject);
} else {
	// Tabla de propuestasprofesionales
	$proyectoStm = $conexion->prepare("INSERT INTO propuestasprofesionales (estado, correoDelProfesional, detallesproyectos_ID) VALUES (0, ?, ?);");
	$proyectoStm->bind_param("si", $responsable, $insertedProject);
}

$proyectoStm->execute();
$propuestaInsertada = $conexion->insert_id;
$proyectoStm->close();



/* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
/* Procesamiento de los colaboradores de la propuesta de proyecto */

$colaboradores = $_POST["proyecto-colaboradores-lista"];

$conexion->close();




header("Location: /principal.php?respuesta=6");









function uploadPDF($file, $id=null){
	echo "hai!";
	echo $file['name'];
	echo "</br>";
	
		$targetfolder = "./uploads/resumen/";
	
	   // $targetfolder = $targetfolder . basename( $file['name']) ;
		$extension  = pathinfo( $file["name"], PATHINFO_EXTENSION );
		$basename   = $targetfolder.'resumen'.uniqid(). '.' . $extension;
	
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


?>
<?php


$connect= mysqli_connect("localhost", "root","","test_db");

$number= count($_POST['ps-nombre']);





if($number>1){

    $var= 'DATA.--\n';
    for($i=0; $i<$number; $i++ ){
        $var.= $_POST['ps-nombre'][$i].'\n';
        $var.= $_POST['ps-version'][$i].'\n';
        $var.= $_POST['ps-tipo'][$i].'\n';
        $var.= $_POST['ps-link'][$i].'\n';        
}
echo $var;


/*
    for($i=0; $i<$number; $i++ ){

        if(trim($_POST['name'][$i]!='')){
            $sql= "INSERT INTO tbl_name (name) VALUES ('".mysqli_real_escape_string($connect, $_POST["name"][$i])."') ";
            //$sql = "INSERT INTO tbl_name(name) VALUES ('".mysqli_real_escape_string($connect, $_POST["name"][$i])."') ";

            mysqli_query($connect,$sql);
        }
        echo "derp!";

    }

*/    
}


?>
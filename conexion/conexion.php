<?php
//conexion

$Nombre_Servidor="localhost";
$Nombre_Usuario="root";
$password="";
$Base_Datos="actividadticket";

//$Nombre_Servidor="localhost";
//$Nombre_Usuario="root";
//$password="";
//$Base_Datos="blogaleks";

$ConDB = mysqli_connect($Nombre_Servidor, $Nombre_Usuario, $password, $Base_Datos);
mysqli_set_charset($ConDB, 'utf8');

//chequeamos nuestrsuperconexion
if(mysqli_connect_errno()){
    echo "Error, no pude conectar". mysqli_connect_errno();
}
else{
   // echo "odfsdfsdfk";
}



?>
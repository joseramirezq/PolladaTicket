<?php
                //determinamos si lavariable esta definida y no es null
                if(isset($_POST['actualizar_pago'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $id_ticket =mysqli_real_escape_string($ConDB,$_POST['id_ticket']);
                    $estado=1;
                    $deuda=0;
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
              
                    $sqli = "UPDATE ticket SET estado='$estado', deuda='$deuda' where id_ticket='$id_ticket'";
                    mysqli_query($ConDB, $sqli);
                    header('location:detallet.php?id='.$id_ticket);

                    }
                                
            ?>


<?php
                //determinamos si lavariable esta definida y no es null
                if(isset($_POST['actualizar_deuda'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $id =mysqli_real_escape_string($ConDB,$_POST['id']);
                    $deuda =mysqli_real_escape_string($ConDB,$_POST['deuda']);
                    $comentario=mysqli_real_escape_string($ConDB,$_POST['comentario']);
                    $estado=0;
                  
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
              
                    $sqli = "UPDATE ticket SET estado='$estado' where id_ticket='$id'";
                    mysqli_query($ConDB, $sqli);
                    header('location:detallet.php?id='.$id_ticket);


                    }
                                
            ?>

<?php
                //determinamos si lavariable esta definida y no es null
                if(isset($_POST['actualizar_salida'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $id_ticket =mysqli_real_escape_string($ConDB,$_POST['id_ti']);
                    $estado=1;
                 
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
              
                    $sqli = "UPDATE ticket SET estado_salida='$estado' where id_ticket='$id_ticket'";
                    mysqli_query($ConDB, $sqli);
                    header('location:detallet.php?id='.$id_ticket);


                    }
                                
            ?>
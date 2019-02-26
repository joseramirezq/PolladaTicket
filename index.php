<?php
                    if(isset($_POST['insert_actividad'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $nombre =mysqli_real_escape_string($ConDB,$_POST['nombre']);
                    $decripcion =mysqli_real_escape_string($ConDB,$_POST['descripcion']);
                    $numero =mysqli_real_escape_string($ConDB,$_POST['numero']);
                  

                  //  $sql = "SELECT * FROM actividad WHERE correo_al = '$correo'";
                  //  $existencia = mysqli_query($ConDB, $sql);

                       
                     //    if($exite =  mysqli_fetch_object($existencia)){
                     //       echo "<script> alert('El correo ya esta registrado') </script>";
                          //  header('location:clase.php' );
    
                     //   }
                     //   else{
                            $sql = "INSERT INTO actividad (nombre, descripcion,numero_ticket) 
                            VALUES ('$nombre','$decripcion','$numero')";
                                    mysqli_query($ConDB, $sql);
                                      header('index.html' );
                                   
                        //         }
                         mysqli_close($ConDB);//cerramos conexion          

                }
            ?>

<?php include('modulos/header.php')?>
    <!--/.Navbar-->

    <!--card para ticket-->
    <!-- Card Wider -->


<!--Section: Live preview-->
<div class="container p-5">
    <div class="row">
    <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                    
                                                   
                                                   $sql= "SELECT * FROM actividad";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <div class="col-md-4">
                        <!-- Card -->
            <div class="card">

            <!-- Card image -->
            <div class="view overlay">
            <img class="card-img-top" src="img/tickets.jpg" alt="Card image cap">
            <a href="#!">
                <div class="mask rgba-white-slight"></div>
            </a>
            </div>

            <!-- Card content -->
            <div class="card-body">

            <!-- Title -->
                                            
            <h4 class="card-title"><?php echo  $row['nombre'];?> <div class="badge badge-primary text-wrap" style="width: 6rem;"> 
            <i class="fas fa-hashtag"></i> <?php echo  $row['numero_ticket'];?>
</div>          </h4>
            <!-- Text -->
            <p class="card-text"><?php echo  $row['descripcion'];?></p>
            <!-- Button -->
            <div class="btn-group" role="group" aria-label="Basic example">
                  <a  class="btn btn-unique btn-indigo" href="responsables.php?id=<?php echo $row['id'];?>"><i class="fas fa-plus"></i> Agregar</a>
                <a  class="btn btn-unique " href="detalle.php?id=<?php echo $row['id'];?>"> <i class="fas fa-marker"></i> Controlar</a>
                <a  class="btn btn-unique " href="deudores.php?id=<?php echo $row['id'];?>"> <i class="fas fa-marker"></i> Deudores</a>
           
            </div>
          
            </div>

            </div>
            <!-- Card -->
            

           
        </div>
        <?php
                 }
                 ?>
    </div>
</div>


 <script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>
   

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.js"></script>
  </body>
</html>

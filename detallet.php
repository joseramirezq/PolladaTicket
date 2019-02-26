<?php
                //determinamos si lavariable esta definida y no es null
                if(isset($_POST['actualizar_deuda'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $id_ticket=$_GET['id'];
                    $deuda =mysqli_real_escape_string($ConDB,$_POST['deuda']);
                    $comentario=mysqli_real_escape_string($ConDB,$_POST['comentario']);
                    $estado=0;
                  
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
              
                    $sqli = "UPDATE ticket SET estado='$estado', deuda='$deuda', comentario='$comentario' where id_ticket='{$_GET['id']}'";
                    mysqli_query($ConDB, $sqli);
                    header('location:detallet.php?id='.$id_ticket);


                    }
                                
            ?>
<?php include('modulos/header.php')?>

<div class="container p-5">
<div class="row">
  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Entregados</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                   
                                                   $sql= "SELECT count(*) AS 'canti' from ticket  where estado_salida=1";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text"><?php echo $row['canti']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Sin entregar</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                    $sql= "SELECT count(*) AS 'canti' from ticket  where estado_salida=0";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text"><?php echo $row['canti']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Deuda</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                           
                                                    $sql= "SELECT SUM(deuda) AS total FROM ticket ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>


  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Efectivo</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                           
                                                    $sql= "SELECT SUM(10-deuda) AS total FROM ticket ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>


  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card">
      <div class="card-body">
      <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                    
                                                   
                                                   $sql= "SELECT * FROM ticket WHERE id_ticket='{$_GET['id']}'";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
         <a href="http:detalle.php?id=<?php echo $row['id_actividad']?>"><button type="button" class="btn btn-success">ATRAS</button></a>                                    
                                                    <?php } ?>
      </div>
    </div>
  </div>

  
</div>
                                                  

</div>


    <!-- Card Regular -->
    <div class="container-fluid p-5">
      <div class="row">
      <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                    
                                                   
                                                   $sql= "SELECT * FROM ticket WHERE id_ticket='{$_GET['id']}'";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <div class="col-md-3">
          <!-- Card -->
          <div class="card">
            <!-- Card image -->
            <form action="sql.php" method="POST">
            <input type="text" name="id_ti" value="<?php echo $row['id_ticket']?>" style="display:none">  
            <button
            
              type="submit" name="actualizar_salida"
              class="btn <?php if($row['estado_salida']==0){
                echo "default-color";
              }
              if($row['estado_salida']==1){
                echo "secondary-color-dark";
              };
              ?> btn-lg btn-rounded text-lg">
             <h1><?php echo $row['numero'];?></h1>
            
            </button>

            </form> 
            <hr />
            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title   <?php 
                if($row['estado']==0){
                  echo "text-danger";
                }
                if($row['estado']==1){
                  echo "text-success";
                }
                
               ;?>
                text-center">
              <?php 
                if($row['estado']==0){
                  echo "Debe: ".$row['deuda'];
                }
                if($row['estado']==1){
                  echo "Pagó";
                }
                
               ;?>
                <p class="card-text">
                  Resp: <?php echo $row['responsable']?><br>
                
                </p>
               

              </h4>
              <!-- Text -->

              <!-- Button -->
              <div class="row justify-content-center">
                <div
                  class="btn-group justify-content-xl-center"
                  role="group"
                  aria-label="Basic example"
                >
                 <form action="sql.php" method="POST">
                 <input type="text" name="id_ticket" value="<?php echo $row['id_ticket']?>" style="display:none">  
                 <button
                    type="submit"
                    class="btn btn-success btn-rounded px-3" name="actualizar_pago">
                    <i class="fas fa-dollar-sign"></i>
                  </button></form> 


                 
              
<form action="" method="POST">

    <div

    class="modal fade"
    id="deuda"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
      <!--Content-->
      <div class="modal-content">
        <!--Header-->
        <div class="modal-header text-center">
          <h4 class="modal-title white-text w-100 font-weight-bold py-2">
          Deuda
          </h4>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true" class="white-text">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body">
          <div class="md-form mb-5">
              <i class="fas fa-money-check-alt prefix warning-text"></i>
            
            <input type="text" name="deuda" id="deuda" class="form-control validate" />
            <label data-error="incorrecto" data-success="correcto" for="form3">Ingrese cuanto debe</label
            >
          </div>

          <div class="md-form">
              <i class="far fa-comment prefix warning-text"></i>
            <input type="text" name="comentario" id="comentario" class="form-control validate" />
            <label data-error="incorrecto" data-success="correcto" for="form2"
              >Ingrese comentario de la deuda</label
            >
          </div>
        </div>

        <!--Footer-->
        <div class="modal-footer justify-content-center">
            <button type="submit" name="actualizar_deuda" class="btn btn-pink"><i class="far fa-save pr-2" aria-hidden="true"></i>Guardar</button>
        </div>
      </div>
      <!--/.Content-->
    </div>
    </div>

</form>








            
                  <button
                    type="button"
                    class="btn btn-danger btn-rounded px-3" data-toggle="modal" data-target="#deuda"
                  >
                  <i class="fas fa-frown"></i>
                  </button>
                
                </div>
              </div>
            </div>
          </div>
                                                    
          <!-- Card -->
        </div>
        <?php }; ?>
      </div>
    </div>

    <!-- Card Regular -->

 


  
 

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

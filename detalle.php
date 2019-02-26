<?php
                //determinamos si lavariable esta definida y no es null
                if(isset($_POST['actualizar_deuda'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                 
                    $deuda =mysqli_real_escape_string($ConDB,$_POST['deuda']);
                    $comentario=mysqli_real_escape_string($ConDB,$_POST['comentario']);
                    $estado=0;
                  
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
              
                    $sqli = "UPDATE ticket SET estado='$estado', deuda='$deuda', comentario='$comentario' where id_ticket='{$_GET['id']}'";
                    mysqli_query($ConDB, $sqli);
                    header('location:detalle.php');


                    }
                                
            ?>
<?php include('modulos/header.php')?>
  

<div class="container p-5">
<div class="row">
  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card  secondary-color-dark text-white">
      <div class="card-body">
        <h5 class="card-title ">Entregados</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                   
                                                   $sql= "SELECT count(*) AS 'canti' from ticket  where estado_salida=1";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['canti']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card default-color">
      <div class="card-body">
        <h5 class="card-title text-white text-center">Sin entregar</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                    $sql= "SELECT count(*) AS 'canti' from ticket  where estado_salida=0";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['canti']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card danger-color">
      <div class="card-body">
        <h5 class="card-title text-white text-center">Deuda</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                           
                                                    $sql= "SELECT SUM(deuda) AS total FROM ticket where estado_salida=1 ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card warning-color">
      <div class="card-body">
        <h5 class="card-title text-white text-center">Pagados</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                              
                                                    $sql= "SELECT count(*) AS total FROM ticket where estado=1 ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>


  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card success-color">
      <div class="card-body">
        <h5 class="card-title text-white text-center">Efectivo</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                                           
                                                    $sql= "SELECT SUM(10-deuda) AS total FROM ticket ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>

  <div class="col-sm-2 mb-3 mb-md-0">
    <div class="card primary-color">
      <div class="card-body">
        <h5 class="card-title text-white text-center">EntregPag</h5>
        <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                   
  
                                              
                                                    $sql= "SELECT count(*) AS total FROM ticket where estado=1 and estado_salida=1 ";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                 
                                                  
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            if($resultado){
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <h1 class="card-text text-white text-center"><?php echo $row['total']; ?></h1>
        
      </div>
    </div>
  </div>
  <?php } };?>
  
</div>
                                                  

</div>


    <!-- Card Regular -->
    <div class="container-fluid p-5">
      <div class="row">
      <?php  //viusalizacion de articulos
                                                    require_once 'conexion/conexion.php'; 
                                                    
                                                   
                                                   $sql= "SELECT * FROM ticket ORDER BY numero asc";
                                                    $resultado = mysqli_query($ConDB, $sql);
                                                    //COMPROBAMOS SI HAY ARTICULOS
                                            
                                                    while($row = mysqli_fetch_assoc($resultado)){

                                                      ?>
        <div class="col-md-2">
          <!-- Card -->
          <div class="card">
            <!-- Card image -->
          
          
            <a
            href="detallet.php?id=<?php echo $row['id_ticket']?>" 
              class="btn <?php if($row['estado_salida']==0){
                echo "default-color";
              }
              if($row['estado_salida']==1){
                echo "secondary-color-dark";
              };
              ?> btn-lg btn-rounded text-lg">
             <h1><?php echo $row['numero'];?></h1>
            
            </a>

           
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
                  echo "Debe:".$row['deuda'];
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
            
              <hr>
               
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

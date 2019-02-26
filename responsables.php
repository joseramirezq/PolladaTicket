<?php
                    if(isset($_POST['insert_ticket'])){
                    //incluimos conexion
                    require_once 'conexion/conexion.php'; 
                    //obtendremos datos del formulario mediante el super global variable $_POST de php
                    
                    $id_actividad=mysqli_real_escape_string($ConDB,$_POST['id_actividad']);
                    $numeroinicio =mysqli_real_escape_string($ConDB,$_POST['numeroinicio']);
                    $numerofin =mysqli_real_escape_string($ConDB,$_POST['numerofin']);
                    $responsable =mysqli_real_escape_string($ConDB,$_POST['responsable']);
                    $deuda =mysqli_real_escape_string($ConDB,$_POST['deuda']);
                    $comentario =mysqli_real_escape_string($ConDB,$_POST['comentario']);
                    $estado =mysqli_real_escape_string($ConDB,$_POST['estado']);
                  
                    for ($i = $numeroinicio; $i <= $numerofin; $i++) {
                      $sql = "INSERT INTO ticket (id_actividad,numero, responsable, deuda, estado, comentario) 
                            VALUES ('$id_actividad','$i','$responsable','$deuda', '$estado', ' $comentario' )";
                                    mysqli_query($ConDB, $sql);
                                   
                  }
                  
                         
                                   
                        //         }
                         mysqli_close($ConDB);//cerramos conexion          

                }
            ?>

<?php include('modulos/header.php'); ?>
<!--Section: Live preview-->
<!-- Material form register -->
<div class="container p-5">
<div class="card">

<h5 class="card-header info-color white-text text-center py-4">
    <strong>Responsables  / estados</strong>
</h5>

<!--Card content-->
<div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    
    <form action="" class="text-center" style="color: #757575;" method="POST">

        <div class="form-row">

            <div class="col-12">
                <!-- First name -->
                <div class="md-form">
              
                  <select class="browser-default custom-select" name="id_actividad">
                  <?php
                                       require_once 'conexion/conexion.php';//conexion
                                       $sql = "SELECT * FROM actividad WHERE id='{$_GET['id']}'";
                                   
                                       $resultado = mysqli_query($ConDB, $sql);
                                    

                                       //comporbamos us existencia
                                       if(mysqli_num_rows($resultado) > 0){
                                       
                                           // salida de dato
                                           while($row = mysqli_fetch_assoc($resultado)) {
                                             //  $estadol=$row['estado_al'];
                                             
                                               
                                   ?>
                   
                    <option value="<?php echo $row['id'];?>"><?php echo $row['nombre'];?></option>
                  
                  </select>
                                               <?php }
                       
                      } ?> 
                </div>
            </div>
            <div class="col-2">
                <!-- Last name -->
                <div class="md-form">
                    <input type="number"  name="numeroinicio" id="numeroinicio" class="form-control">
                    <label for="materialRegisterFormLastName">N° Inicial</label>
                </div>
            </div>
            <div class="col-2">
                <!-- Last name -->
                <div class="md-form">
                    <input type="number" name="numerofin" name="numerofin" class="form-control">
                    <label for="materialRegisterFormLastName">N° Final</label>
                </div>
            </div>
            <div class="col-4">
                <!-- Last name -->
                <div class="md-form">
                    <input type="text" name="responsable"  id="responsable"  class="form-control">
                    <label for="materialRegisterFormLastName">Responsable</label>
                </div>
            </div>
            <div class="col-4">
                <!-- Last name -->
                <div class="md-form">
                    <input type="number"  name="deuda"   id="deuda"  class="form-control">
                    <label for="materialRegisterFormLastName">Deuda</label>
                </div>
            </div>
            <div class="col-8">
                <!-- Last name -->
                <div class="md-form">
                    <input type="text" name="comentario" id="comentario" class="form-control">
                    <label for="materialRegisterFormLastName">Comentario</label>
                </div>
            </div>
            <div class="col-4">
                <!-- Last name -->
                <div class="md-form">
                      <select class="browser-default custom-select" id="estado" name="estado">
                      <option value="0">Debe</option>
                      <option value="1">Pago</option>
                        
                       
                      </select>
                </div>
            </div>


        </div>

        <!-- Sign up button -->
        <button class="btn btn-outline-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="insert_ticket">Agregar</button>

        <!-- Social register -->
      

    

    </form>
    <!-- Form -->

    <div class="container">
      <div class="row">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">N° ticket</th>
               
                <th scope="col">Responsable</th>
                <th scope="col">Deuda</th>
                <th scope="col">Estado</th>
                <th scope="col">Estado de Salida</th>
                <th scope="col">Comentario</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php
                                       require_once 'conexion/conexion.php';//conexion
                                       $sql = "SELECT * FROM ticket WHERE id_actividad='{$_GET['id']}' ORDER BY numero asc";
                                      
                                       $resultado = mysqli_query($ConDB, $sql);
                                   

                                       //comporbamos us existencia
                                       if(mysqli_num_rows($resultado) > 0){
                                       
                                           // salida de dato
                                           while($row = mysqli_fetch_assoc($resultado)) {
                                             //  $estadol=$row['estado_al'];
                                            
                                               
                                   ?>
                <th scope="row"><?php echo $row['numero'];?></th>
                <td><?php echo $row['responsable'];?></td>
                <td><?php echo $row['deuda'];?></td>
                <td><?php 
                if($row['estado']==0){
                  echo "Debe";
                }
                if($row['estado']==1){
                  echo "Pago";
                }
                
               ;?></td>
                <td> <?php 
                if($row['estado_salida']==0){
                  echo "No entregado";
                }
                if($row['estado_salida']==1){
                  echo "Entregado";
                }
                
               ;?></td>
                <td><?php echo $row['comentario'];?></td>
              </tr>
              <?php }}?>
              
              
            </tbody>
          </table>
      </div>
    </div>




    <div class="container">
<H1>LISTA DE DEUDORES</H1>
      <div class="row">
            <table class="table">
            <thead>
              <tr>
                <th scope="col">N° ticket</th>
               
                <th scope="col">Responsable</th>
                <th scope="col">Deuda</th>
                <th scope="col">Estado</th>
                <th scope="col">Estado de Salida</th>
                <th scope="col">Comentario</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <?php
                                       require_once 'conexion/conexion.php';//conexion
                                       $sql = "SELECT * FROM ticket WHERE  estado_salida=1 AND estado=0 ";
                                      
                                       $resultado = mysqli_query($ConDB, $sql);
                                   

                                       //comporbamos us existencia
                                       if(mysqli_num_rows($resultado) > 0){
                                       
                                           // salida de dato
                                           while($row = mysqli_fetch_assoc($resultado)) {
                                             //  $estadol=$row['estado_al'];
                                            
                                               
                                   ?>
                <th scope="row"><?php echo $row['numero'];?></th>
                <td><?php echo $row['responsable'];?></td>
                <td><?php echo $row['deuda'];?></td>
                <td><?php 
                if($row['estado']==0){
                  echo "Debe";
                }
                if($row['estado']==1){
                  echo "Pago";
                }
                
               ;?></td>
                <td> <?php 
                if($row['estado_salida']==0){
                  echo "No entregado";
                }
                if($row['estado_salida']==1){
                  echo "Entregado";
                }
                
               ;?></td>
                <td><?php echo $row['comentario'];?></td>
              </tr>
              <?php }}?>
              
              
            </tbody>
          </table>
      </div>
    </div>

</div>

</div>

 
</div>

   
     <?php include('modulos/footer.html'); ?>
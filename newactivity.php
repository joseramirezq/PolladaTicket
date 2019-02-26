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

   <style>
   .form-dark .font-small {
font-size: 0.8rem; }

.form-dark [type="radio"] + label,
.form-dark [type="checkbox"] + label {
font-size: 0.8rem; }

.form-dark [type="checkbox"] + label:before {
top: 2px;
width: 15px;
height: 15px; }

.form-dark .md-form label {
color: #fff; }

.form-dark input[type=text]:focus:not([readonly]) {
border-bottom: 1px solid #00C851;
-webkit-box-shadow: 0 1px 0 0 #00C851;
box-shadow: 0 1px 0 0 #00C851; }

.form-dark input[type=text]:focus:not([readonly]) + label {
color: #fff; }

.form-dark input[type=password]:focus:not([readonly]) {
border-bottom: 1px solid #00C851;
-webkit-box-shadow: 0 1px 0 0 #00C851;
box-shadow: 0 1px 0 0 #00C851; }

.form-dark input[type=password]:focus:not([readonly]) + label {
color: #fff; }

.form-dark input[type="checkbox"] + label:before {
content: '';
position: absolute;
top: 0;
left: 0;
width: 17px;
height: 17px;
z-index: 0;
border: 1.5px solid #fff;
border-radius: 1px;
margin-top: 2px;
-webkit-transition: 0.2s;
transition: 0.2s; }

.form-dark input[type="checkbox"]:checked + label:before {
top: -4px;
left: -3px;
width: 12px;
height: 22px;
border-style: solid;
border-width: 2px;
border-color: transparent #00c851 #00c851 transparent;
-webkit-transform: rotate(40deg);
-ms-transform: rotate(40deg);
transform: rotate(40deg);
-webkit-backface-visibility: hidden;
-webkit-transform-origin: 100% 100%;
-ms-transform-origin: 100% 100%;
transform-origin: 100% 100%; }
</style>

<!--Section: Live preview-->
<div class="container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
            <section class="form-dark">

                    <!--Form without header-->
                    <div class="card card-image" style="background-image: url('img/tickets.jpg'); width: 28rem;">
                        <div class="text-white rgba-stylish-strong py-5 px-5 z-depth-4">
                    
                            <!--Header-->
                            <div class="text-center">
                                <h3 class="white-text mb-5 mt-4 font-weight-bold"><strong>NUEVA</strong> <a class="text-white bg-warning" font-weight-bold"><strong> ACTIVIDAD</strong></a></h3>
                            </div>
                            <form action="" method="POST">
                            <!--Body-->
                            <div class="md-form">
                                <input type="text" id="nombre" name="nombre" class="form-control white-text" required>
                                <label for="Form-email">Nombre de la actividad</label>
                            </div>
                            <div class="md-form">
                                    <input type="text" id="descripcion"  name="descripcion" class="form-control white-text" required>
                                    <label for="Form-email5">Descripcion de la actividad</label>
                                </div>
                    
                            <div class="md-form pb-3">
                                <input type="text" id="numero" name="numero" class="form-control white-text" required>
                                <label for="Form-pass5">Numero de tickets</label>
                               
                            </div>
                    
                            <!--Grid row-->
                            <div class="row d-flex align-items-center mb-4">
                    
                                <!--Grid column-->
                                <div class="text-center mb-3 col-md-12">
                                    <button ttype="submit" name="insert_actividad" class="btn btn-warning btn-block btn-rounded z-depth-1">CREAR</button>
                                </div>
                                <!--Grid column-->
                            </div>

                            </form>
                    
                            <!--Grid column-->
                    
                        </div>
                    </div>
                    <!--/Form without header-->
                    
                    </section>
    </div>
    <div class="col-md-4"></div>
</div>

<!--Section: Live preview-->

    <!--nodal-->
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
             
              <input type="text" id="form3" class="form-control validate" />
              <label data-error="incorrecto" data-success="correcto" for="form3">Ingrese cuanto debe</label
              >
            </div>

            <div class="md-form">
                <i class="far fa-comment prefix warning-text"></i>
              <input type="text" id="form2" class="form-control validate" />
              <label data-error="incorrecto" data-success="correcto" for="form2"
                >Ingrese comentario de la deuda</label
              >
            </div>
          </div>

          <!--Footer-->
          <div class="modal-footer justify-content-center">
              <button type="button" class="btn btn-pink"><i class="far fa-save pr-2" aria-hidden="true"></i>Guardar</button>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>



       <!--nodal-->
       <div
       class="modal fade"
       id="comentario"
       tabindex="-1"
       role="dialog"
       aria-labelledby="myModalLabel"
       aria-hidden="true">
       <div class="modal-dialog modal-notify modal-warning" role="document">
         <!--Content-->
         <div class="modal-content">
           <!--Header-->
           <div class="modal-header text-center">
             <h4 class="modal-title white-text w-100 font-weight-bold py-2">
              Comentario
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
          
 
             <div class="md-form">
                 <i class="far fa-comment prefix warning-text"></i>
               <input type="text" id="form2" class="form-control validate" />
               <label data-error="incorrecto" data-success="correcto" for="form2"
                 >Ingrese comentario</label
               >
             </div>
           </div>
 
           <!--Footer-->
           <div class="modal-footer justify-content-center">
               <button type="button" class="btn btn-pink"><i class="far fa-save pr-2" aria-hidden="true"></i>Guardar</button>
           </div>
         </div>
         <!--/.Content-->
       </div>
     </div>
 
   

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

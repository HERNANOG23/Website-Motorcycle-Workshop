<?php
ob_start();
?>
<?php

 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idusuario'])==false){
     header('location: index.php');
 }
 
 if(isset($_REQUEST['guardar'])){
     require_once('conexion.php');
     $conn = mysqli_connect($host, $user, $pwd, $db);

     //declarar variables para tomar los datos en los input

     $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']??'');
     $referencia = mysqli_real_escape_string($conn, $_REQUEST['referencia']??'');
     $precio = mysqli_real_escape_string($conn, $_REQUEST['precio']??'');
     $existencia = mysqli_real_escape_string($conn, $_REQUEST['existencia']??'');
     $descripcion = mysqli_real_escape_string($conn, $_REQUEST['descripcion']??'');
     //verificar que no se repita un producto con el mismo nombre o referencia
     $veriuser ="SELECT * FROM producto WHERE nombre='".$nombre."' OR referencia='".$referencia."';";
     $veriresult=$conn->query($veriuser);
     $veryrow=$veriresult->num_rows;

     if($nombre !="" && $referencia !="" && $precio!="" && $existencia!="" && $veryrow==null){
         $sql = "INSERT INTO producto
         (nombre,referencia,precio,existencia,descripcion) VALUES
         ('".$nombre."','".$referencia."','".$precio."','".$existencia."','".$descripcion."');";
     

     $result =mysqli_query($conn,$sql);

     if($result){
         echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=producto&mensaje=Producto Creado"/>';
     }else{
         ?>
         
         <div class="alert alert-danger" role="alert">
            Error al crear Producto <?php echo mysqli_error($conn); ?>
         </div>
            <?php
        }

    }
  }
 

 ?>
<div class="content-wrapper">
        <section class="content-header">
            <div class="content-fluid">
              <div class="row mb-2">    
                 <div class="col-sm-6">
                 <div class="login-logo">
             <b>Daniel Motos</b><br>
             <a class="logo">
             <img src="logo.png" alt="Daniel Motos Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
             </a>
                    <h1>Crear Productos</h1>
                 </div>
              </div>
            </div>        
        </section>

        <!--contenido o content-->
        <section class="content">
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                   <form action="panel.php?modulo=crearProducto" method="post" id="crearProducto">
                      <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digitar Nombre">                      
                      </div>

                      <div class="form-group">
                       <label for="referencia">referencia</label>
                       <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Digitar referencia">                      
                      </div>

                      <div class="form-group">
                       <label for="precio">precio</label>
                       <input type="text" name="precio" id="precio" class="form-control" placeholder="Digitar precio">                      
                      </div>

                      <div class="form-group">
                       <label for="existencia">existencia</label>
                       <input type="text" name="existencia" id="existencia" class="form-control" placeholder="Digitar existencia">                      
                      </div>

                      <div class="form-group">
                       <label for="descripcion">descripcion</label>
                       <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripcion"></textarea>                      
                      </div>

                      <div class="form-group">
                       <button type="submit" name="guardar" class="btn btn-primary">Crear Producto</button>                      
                       <button type="reset" class="btn btn-danger">Cancelar Producto</button>                      
                      </div>              
                   
                   
                   </form>
                      
                  </div>
                
                </div>
              </div>         
           
           </div>
        
        </section>

</div>
<?php
ob_end_flush();
?>
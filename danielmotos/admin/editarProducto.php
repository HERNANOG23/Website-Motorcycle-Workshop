<?php
ob_start();
?>
<?php
  require_once('conexion.php');
  $conn = mysqli_connect($host, $user, $pwd, $db);
 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idusuario'])==false){
     header('location: index.php');
 }
 
 if(isset($_REQUEST['guardar'])){
     

     //declarar variables para tomar los datos en los input

     $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']??'');
     $referencia = mysqli_real_escape_string($conn, $_REQUEST['referencia']??'');
     $precio = mysqli_real_escape_string($conn, $_REQUEST['precio']??'');
     $existencia = mysqli_real_escape_string($conn, $_REQUEST['existencia']??'');
     $descripcion = mysqli_real_escape_string($conn, $_REQUEST['descripcion']??'');
     $idproducto = mysqli_real_escape_string($conn, $_REQUEST['idproducto']??'');

     

     //actualizar o editar con lenguaje sql
         $sql = "UPDATE producto SET
         nombre='".$nombre."',referencia='".$referencia."',precio='".$precio."',
         existencia='".$existencia."',descripcion='".$descripcion."' 
         WHERE idproducto='".$idproducto."';";
     

     $result =mysqli_query($conn,$sql);

     if($result){
         echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto '.$nombre.' Actualizado"/>';
     }else{
         ?>
         
         <div class="alert alert-danger" role="alert">
            Error al actualizar producto <?php echo mysqli_error($conn); ?>
         </div>
            <?php
        }
    }

    //hay que leer los datos de la tabla
    $idproducto=mysqli_real_escape_string($conn,$_REQUEST['idproducto']??'');
    $sql="SELECT * FROM producto WHERE idproducto='".$idproducto."';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);

  
 

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
                    <h1>Actualizar productos</h1>
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
                   <form action="panel.php?modulo=editarProducto" method="post" id="editarProducto">
                      <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digitar Nombre" value="<?php echo $row['nombre'] ?>">                      
                      </div>

                      <div class="form-group">
                       <label for="referencia">referencia</label>
                       <input type="text" name="referencia" id="referencia" class="form-control" placeholder="Digitar referencia" value="<?php echo $row['referencia'] ?>">                      
                      </div>

                      <div class="form-group">
                       <label for="precio">precio</label>
                       <input type="text" name="precio" id="precio" class="form-control" placeholder="Digitar precio" value="<?php echo $row['precio'] ?>">                      
                      </div>

                      <div class="form-group">
                       <label for="existencia">existencia</label>
                       <input type="text" name="existencia" id="existencia" class="form-control" placeholder="Digitar existencia" value="<?php echo $row['existencia'] ?>">                      
                      </div>

                      <div class="form-group">
                       <label for="descripcion">descripcion</label>
                       <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Digitar descripcion"><?php echo $row['descripcion'] ?></textarea>                      
                      </div>

                      <div class="form-group">
                       <input type="hidden" name="idproducto" value="<?php echo $row['idproducto']?>">
                       <button type="submit" name="guardar" class="btn btn-primary">Actualizar Producto</button>                      
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
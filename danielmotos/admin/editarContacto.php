<?php
ob_start();
?>
<?php
   require_once('conexion.php');
   $conn = mysqli_connect($host, $user, $pwd, $db); 
 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idcliente'])==false){
     header('location: index.php');
 }
 if(isset($_REQUEST['guardar'])){
    
          //declarar variables para tomar los datos en los input

          $identificacion = mysqli_real_escape_string($conn, $_REQUEST['identificacion']??'');
          $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']??'');
          $apellido = mysqli_real_escape_string($conn, $_REQUEST['apellido']??'');
          $telefono = mysqli_real_escape_string($conn, $_REQUEST['telefono']??'');
          $direccion = mysqli_real_escape_string($conn, $_REQUEST['direccion']??'');
          $email = mysqli_real_escape_string($conn, $_REQUEST['email']??'');
          $descripcion = mysqli_real_escape_string($conn, $_REQUEST['descripcion']??'');
        

     //actualizar o editar con lenguaje sql
     $sql = "UPDATE contacto SET
     identificacion='".$identificacion."',nombre='".$nombre."',apellido='".$apellido."',
     telefono='".$telefono."',direccion='".$direccion."',email='".$email."',descripcion='".$descripcion."' 
     WHERE idcontacto='".$idcontacto."';";

     $result=mysqli_query($conn, $sql);

     if ($result) {
        echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=contacto&mensaje=Contacto '.$nombre.' Actualizado"/>';
    }else{
         ?>
          <div class="alert alert-danger" role="alert">
            Error al actualizar contacto <?php echo mysqli_error($conn); ?>
         </div>
            <?php
        }
    }

    //hay que leer los datos de la tabla
    $idcontacto=mysqli_real_escape_string($conn,$_REQUEST['idcontacto']??'');
    $sql="SELECT * FROM contacto WHERE idcontacto='".$idcontacto."';";
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
                    <h1>Actualizar Contacto</h1>
                 </div>
                 
              </div>
            </div>        
        </section>
        
         <!--content-->
         <section class="content">
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                   <form action="panel.php?modulo=editarContacto" method="post" id="editarContacto">
                      <div class="form-group">
                       <label for="identificacion">Identificación</label>
                       <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Digitar Identificacion">                      
                      </div>

                      <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digitar Nombre">                      
                      </div>

                      <div class="form-group">
                       <label for="referencia">apellido</label>
                       <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Digitar apellido">                      
                      </div>

                      <div class="form-group">
                       <label for="telefono">telefono</label>
                       <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Digitar telefono">                      
                      </div>

                      <div class="form-group">
                       <label for="direccion">direccion</label>
                       <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Digitar direccion">                      
                      </div>

                      <div class="form-group">
                       <label for="email">email</label>
                       <input type="text" name="email" id="email" class="form-control" placeholder="Digitar email">                      
                      </div>

                      <div class="form-group">
                       <label for="descripcion">descripcion</label>
                       <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripcion"></textarea>                      
                      </div>

                      <div class="form-group">
                       <button type="submit" name="guardar" class="btn btn-primary">Crear Contacto</button>                      
                       <button type="reset" class="btn btn-danger">Cancelar Contacto</button>                      
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
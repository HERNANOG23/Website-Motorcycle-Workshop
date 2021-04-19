<?php
ob_start();
?>
<?php
 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idcliente'])==false){
     header('location: index.php');
 }
 if(isset($_REQUEST['guardar'])){
    require_once('admin/conexion.php');
    $conn = mysqli_connect($host, $user, $pwd, $db);
          //declarar variables para tomar los datos en los input

          $identificacion = mysqli_real_escape_string($conn, $_REQUEST['identificacion']??'');
          $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']??'');
          $apellido = mysqli_real_escape_string($conn, $_REQUEST['apellido']??'');
          $telefono = mysqli_real_escape_string($conn, $_REQUEST['telefono']??'');
          $direccion = mysqli_real_escape_string($conn, $_REQUEST['direccion']??'');
          $email = mysqli_real_escape_string($conn, $_REQUEST['email']??'');
          $descripcion = mysqli_real_escape_string($conn, $_REQUEST['descripcion']??'');
//verificar que no se repita un producto con el mismo nombre o referencia
$veriuser ="SELECT * FROM contacto WHERE identificacion='".$identificacion."' OR email='".$email."';";
$veriresult=$conn->query($veriuser);
$veryrow=$veriresult->num_rows;

if($identificacion !="" && $nombre !="" && $apellido !="" && $telefono !="" && $direccion!="" && $email!="" && $veryrow==null){
    $sql = "INSERT INTO contacto
    (identificacion,nombre,apellido,telefono,direccion,email,descripcion) VALUES
    ('".$identificacion."','".$nombre."','".$apellido."','".$telefono."','".$direccion."','".$email."','".$descripcion."');";


$result =mysqli_query($conn,$sql);

if($result){
    echo '<meta http-equiv="refresh" content="0; url=panelCliente.php?modulo=contacto&mensaje=Contacto Creado"/>';
}else{
    ?>
    
    <div class="alert alert-danger" role="alert">
       Error al crear Contacto <?php echo mysqli_error($conn); ?>
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
             <img src="admin/logo.png" alt="Daniel Motos Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
             </a>
                    <h1>Crear Contacto</h1>
                 </div>
                 <section class="logo" style="padding-left: 300;">
                        <img src="contactomoto.jpeg"class="mx-auto d-block" alt="imagen.jpeg">
                    </section>
              </div>
            </div>        
        </section>
        
        <!--content-->
        <section class="content">
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                   <form action="panelCliente.php?modulo=crearContacto" method="post" id="crearContacto">
                      <div class="form-group">
                       <label for="identificacion">Identificación</label>
                       <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Digitar Identificacion">                      
                      </div>

                      <div class="form-group">
                       <label for="nombre">Nombre</label>
                       <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Digitar Nombre">                      
                      </div>

                      <div class="form-group">
                       <label for="referencia">Apellido</label>
                       <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Digitar apellido">                      
                      </div>

                      <div class="form-group">
                       <label for="telefono">Telefono</label>
                       <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Digitar telefono">                      
                      </div>

                      <div class="form-group">
                       <label for="direccion">Direccion</label>
                       <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Digitar direccion">                      
                      </div>

                      <div class="form-group">
                       <label for="email">Email</label>
                       <input type="text" name="email" id="email" class="form-control" placeholder="Digitar email">                      
                      </div>

                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                       <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="10" placeholder="Descripcion"></textarea>                      
                      </div>

                      <div class="form-group">
                      <button type="submit" name="guardar" class="btn btn-primary"><img src="whel.jpeg" width="55" height="45" alt="DANIEL MOTOS" >Crear Contacto</button>                      
                       <button type="reset" class="btn btn-danger"><img src="cancel.jpeg" width="55" height="45">Cancelar Contacto</button>                       
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
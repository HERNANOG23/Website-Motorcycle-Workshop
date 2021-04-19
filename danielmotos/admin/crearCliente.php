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

          $identificacion = mysqli_real_escape_string($conn, $_REQUEST['identificacion']??'');
          $tipoidentificacion = mysqli_real_escape_string($conn, $_REQUEST['tipoidentificacion']??'');
          $nombre = mysqli_real_escape_string($conn, $_REQUEST['nombre']??'');
          $apellido = mysqli_real_escape_string($conn, $_REQUEST['apellido']??'');
          $telefono = mysqli_real_escape_string($conn, $_REQUEST['telefono']??'');
          $email = mysqli_real_escape_string($conn, $_REQUEST['email']??'');
          $clave = mysqli_real_escape_string($conn, $_REQUEST['clave']??'');
//verificar que no se repita un cliente con la misma ident o email
$veriuser ="SELECT * FROM clientes WHERE identificacion='".$identificacion."' OR email='".$email."';";
$veriresult=$conn->query($veriuser);
$veryrow=$veriresult->num_rows;

if($identificacion !="" && $tipoidentificacion !="" && $nombre !="" && $apellido !="" && $telefono !="" && $email!="" && $clave!=""){
    $sql = "INSERT INTO clientes
    (identificacion,tipoidentificacion,nombre,apellido,telefono,email,clave) VALUES
    ('".$identificacion."','".$tipoidentificacion."','".$nombre."','".$apellido."','".$telefono."','".$email."','".$clave."');";


$result =mysqli_query($conn,$sql);

if($result){
    echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=clientes&mensaje=Cliente Creado"/>';
}else{
    ?>
    
    <div class="alert alert-danger" role="alert">
       Error al crear Cliente <?php echo mysqli_error($conn); ?>
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
                    <h1>Crear Cliente</h1>
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
                   <form action="panel.php?modulo=crearCliente" method="post" id="crearCliente">
                      <div class="form-group">
                       <label for="identificacion">Identificación</label>
                       <input type="text" name="identificacion" id="identificacion" class="form-control" placeholder="Digitar Identificacion">                      
                      </div>
                     
                      <div class="form-group">
                       <label for="tipoidentificacion">Tipo de Identificación</label>
                       <input type="text" name="tipoidentificacion" id="tipoidentificacion" class="form-control" placeholder="Digitar Tipo de Identificacion">                      
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
                       <label for="email">Email</label>
                       <input type="text" name="email" id="email" class="form-control" placeholder="Digitar email">                      
                      </div>

                      <div class="form-group">
                       <label for="clave">Clave</label>
                       <input type="password" name="clave" id="clave" class="form-control"  placeholder="Digitar clave">                     
                      </div>
                      
                      <div class="form-group">
                       
                       <button type="submit" name="guardar" class="btn btn-primary">Crear Usuario Cliente</button>                      
                       <button type="reset" class="btn btn-danger">Cancelar Usuario Cliente</button>                      
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
<?php
ob_start();
?>
<?php
 //conexión a la base de datos
 include_once 'conexion.php';
 $conn = mysqli_connect($host, $user, $pwd, $db);

 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idusuario'])==false){
     header('location: index.php');
 }
 if (isset($_REQUEST['idBorrar'])) {
     $idcliente = mysqli_real_escape_string($conn, $_REQUEST['idBorrar']??'');
     //query o instruccion para eliminar con lenguaje sql
     $sql ="DELETE FROM clientes WHERE idcliente='".$idcliente."';";
     $result=mysqli_query($conn, $sql);
     if ($result) {
         ?>
      
      <div class="alert alert-success ocultar float-right" role="alert">
        Cliente Eliminado!!
      </div>
      <?php
     } else {
         ?>
      
      <div class="alert alert-danger float-right" role="alert">
         Error en eliminar cliente!! <?php echo $mysqli_error($conn); ?>
      </div>
      <?php
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
                    <h1>Clientes</h1>
                 </div>
                
              </div>
            </div>        
        
        
         <!--content-->
        <section class="content">
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                      <!--crear la tabla para el cliente registrado-->
                      <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>                     
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Opciones 
                        <a title="crearCliente" href="panel.php?modulo=crearCliente"><i class="fas fa-book-medical"></i></a>
                        </th>                                       
                        </tr>                        
                        </thead>
                        <tbody>
                        <?php
                        //conectar a la base de datos
                         include_once "conexion.php";
                         $conn=mysqli_connect($host, $user, $pwd, $db);

                         //consulta o query a la tabla cliente
                         $sql="SELECT * FROM clientes;";
                         $result=mysqli_query($conn,$sql);

                         //aplicar un bucle para mostrar los datos de la tabla clientes
                         while($row = mysqli_fetch_assoc($result)){
                             ?>

                             <tr>
                             <td><?php echo $row['identificacion'] ?></td>
                             <td><?php echo $row['nombre'] ?></td>
                             <td><?php echo $row['apellido'] ?></td>
                             <td><?php echo $row['telefono'] ?></td>
                             <td><?php echo $row['email'] ?></td>
                             
                             <td>
                              <a href="panel.php?modulo=editarCliente&idcliente=<?php echo $row['idcliente'] ?>" style="margin-right: 10px"><i class="fa fa-book" title="Editar Cliente"></i></a>
                              <a href="panel.php?modulo=clientes&idBorrar=<?php echo $row['idcliente'] ?>" class="fas fa-trash-alt borrarCliente" title="Eliminar cliente"></a>
                             </td>

                             </tr>
                             <?php
                         
                        }
?>
                        </tbody>
                      </table>
                  </div>
                </div>                   
              </div>        
          </div>
        </section>
</div>
<?php
ob_end_flush();
?>
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

 //borrar producto
 if(isset($_REQUEST['idBorrar'])){
    $idproducto = mysqli_real_escape_string($conn,$_REQUEST['idBorrar']??'');
    //query o instruccion para eliminar con lenguaje sql
    $sql ="DELETE FROM producto WHERE idproducto='".$idproducto."';";
    $result=mysqli_query($conn,$sql);

    if($result){
       ?>
       
       <div class="alert alert-success ocultar float-right" role="alert">
         Producto Eliminado!!
       </div>
       <?php       
    }else{
       ?>
       
       <div class="alert alert-danger float-right" role="alert">
          Error en eliminar producto!! <?php echo $mysqli_error($conn); ?>
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
                    <h1>Productos</h1>
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
                      <!--crear la tabla para el nombre y email usuario registrado-->
                      <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Referencia</th>                     
                        <th>Precio</th>
                        <th>Existencia</th>
                        <th>Descripcion</th>
                        <th>Opciones
                        <a title="Crear producto" href="panel.php?modulo=crearProducto"><i class="fas fa-book-medical"></i></a>
                                            
                        </th>                        
                         </tr>                        
                        </thead>
                        <tbody>
                        <?php
                        //conectar a la base de datos
                         include_once "conexion.php";
                         $conn=mysqli_connect($host, $user, $pwd, $db);

                         //consulta o query a la tabla producto
                         $sql="SELECT * FROM producto;";
                         $result=mysqli_query($conn,$sql);

                         //aplicar un bucle para mostrar los datos de la tabla producto

                         while($row = mysqli_fetch_assoc($result)){
                             ?>

                             <tr>
                             <td><?php echo $row['nombre'] ?></td>
                             <td><?php echo $row['referencia'] ?></td>
                             <td><?php echo $row['precio'] ?></td>
                             <td><?php echo $row['existencia'] ?></td>
                             <td><?php echo $row['descripcion'] ?></td>
                             <td>
                              <a href="panel.php?modulo=editarProducto&idproducto=<?php echo $row['idproducto'] ?>" style="margin-right: 10px"><i class="fa fa-book" title="Editar Producto"></i></a>
                              <a href="panel.php?modulo=productos&idBorrar=<?php echo $row['idproducto'] ?>" class="fas fa-trash-alt borrar" title="Eliminar Producto"></a>
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
<?php
ob_start();
?>
<?php
 //conexión a la base de datos
 include_once 'admin/conexion.php';
 $conn = mysqli_connect($host, $user, $pwd, $db);

 //verificar que el usuario tenga la sesion activa
 //obligar al visitante que se registre
 if(isset($_SESSION['idcliente'])==false){
     header('location: index.php');
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
                        <th>Descripción</th>
                                          
                         </tr>                        
                        </thead>
                        <tbody>
                        <?php
                        //conectar a la base de datos
                         include_once "admin/conexion.php";
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
<?php
ob_start();
?>
<?php
 //conexión a la base de datos
 include_once 'conexion.php';
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
                    <h1>Contactos</h1>
                 </div>
                 <section class="logo" style="padding-left: 30%;">
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
                      <!--crear la tabla para el nombre y email contacto registrado-->
                      <table id="" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                        <th>Identificacion</th>
                        <th>Nombre</th>
                        <th>Apellido</th>                     
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Descripcion</th>
                        <th>Opciones 
                        <a title="Crear contacto" href="panel.php?modulo=crearContacto"><i class="fas fa-book-medical"></i></a>
                         
                        </th>                                       
                        </tr>                        
                        </thead>
                        <tbody>
                        <?php
                        //conectar a la base de datos
                         include_once "conexion.php";
                         $conn=mysqli_connect($host, $user, $pwd, $db);

                         //consulta o query a la tabla contacto
                         $sql="SELECT * FROM contacto;";
                         $result=mysqli_query($conn,$sql);

                         //aplicar un bucle para mostrar los datos de la tabla contacto

                         while($row = mysqli_fetch_assoc($result)){
                             ?>

                             <tr>
                             <td><?php echo $row['identificacion'] ?></td>
                             <td><?php echo $row['nombre'] ?></td>
                             <td><?php echo $row['apellido'] ?></td>
                             <td><?php echo $row['telefono'] ?></td>
                             <td><?php echo $row['direccion'] ?></td>
                             <td><?php echo $row['email'] ?></td>
                             <td><?php echo $row['descripcion'] ?></td>
                             <td>
                              <a href="panel.php?modulo=editarContacto&idcontacto=<?php echo $row['idcontacto'] ?>" style="margin-right: 10px"><i class="fa fa-book" title="Editar Contacto"></i></a>
                              <a href="panel.php?modulo=contacto&idBorrar=<?php echo $row['idcontacto'] ?>" class="fas fa-trash-alt borrarContacto" title="Eliminar contacto"></a>
                             </td>

                             </tr>
                             <?php
                         
                        }
                         
        /*contenido o content
        <section class="content">
        <div class="contenedor">
                
                    <section class="logo" style="padding-left: 30%;">
                        <img src="contactomoto.jpeg"class="mx-auto d-block" alt="imagen.jpeg">
                    </section>
                   
                         <form >
                               
                               <label>Identificación:</label>
                               <input type="text"required><br><br>
                               <label>Escribe tu nombre:</label>
                               <input type="text" required ><br><br>
                               <label>Escribe tu apellido:</label>
                               <input type="text" required ><br><br>
                               <label>Telefono:</label>
                               <input type="text"required><br><br>
                               <label>Dirección:</label>
                               <input type="text"required><br><br>
                               <label>Email </label>
                               <input type="email" required ><br><br>
                               <label>En que podemos ayudarte:</label>
                               <input type="text"><br><br>
                               <a title="Crear contacto" href="panel.php?modulo=clienteContacto"><i class="fas fa-address-book"></i>
                               
                         </form>
                  
                   
                    
               
            </div>   
        </section>*/?>
            
</div>
<?php
ob_end_flush();
?>
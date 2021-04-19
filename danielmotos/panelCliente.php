<?php
ob_start();
?>
<?php
 session_start();
 //evitar secuestro de sesion al usuario final
 session_regenerate_id(true);
 //validar los campos de sesion
 if(isset($_REQUEST['sesion']) && $_REQUEST['sesion']=="cerrar"){
   //destruir la sesion
   session_destroy();
   header('location: index.php');
 }
 
 //validar que todos los visitantes si tengan un acceso al sitio
 /*if(isset($_SESSION['idcliente'])==false){
   header('location: index.php');
 }*/

 //implementar los modulos que se van a llamar a este sitio
 $modulo=$_REQUEST['modulo'] ?? '';


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Daniel Motos</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="admin/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="admin/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="preload" href="css/normalize.css" as="style">
  <link rel="stylesheet" href="css/normalize.css">

  <link rel="preload" href="style.css" as="style">
  <link rel="stylesheet" href="style.css">
  <!--precargar(preload) de las fuentes-->
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,500&family=Ubuntu:ital,wght@0,500;1,300&display=swap"
  crossorigin="crossorigin" as="font">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,700;1,500&family=Ubuntu:ital,wght@0,500;1,300&display=swap" rel="stylesheet">
  
</head>
<body class="hold-transition sidebar-mini layout-fixed"style="padding-left: 50px;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
    </ul>

   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
     
        
         
        <a class="nav-link"  href="panelCliente.php?modulo=&sesion=cerrar" title="Cerrar">
             <i class="fas fa-sign-out-alt"></i>
        </a>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="panelCliente.php" class="brand-link">
      <img src="admin/logo.png" alt="Daniel Motos Logo Small" class="brand-image-xs logo-xs"
           style="opacity: .8">
           <img src="admin/logo.png" alt="Daniel Motos Logo Large" class="brand-image-xl logo-xl"
           style="left: 100px">    
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nombre'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel Cliente
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
               
              </li>
              
              <li class="nav-item">
                <a href="panelCliente.php?modulo=clienteProductos" class="nav-link <?php echo ($modulo=="clienteProductos")? "active":" ";?>">
                <i class="fas fa-motorcycle"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="panelCliente.php?modulo=crearContacto" class="nav-link <?php echo ($modulo=="crearContacto")? "active":" ";?>">
                  <i class="fas fa-address-book"></i>
                  <p>Contacto</p>
                </a>
              </li>
            </ul>
          </li>
          

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
       <!--incluir los fragmentos de paginas web-->
      
      <?php
       //mensaje de usuario creado
       if(isset($_REQUEST['mensaje'])){
         ?>
         <div class="alert alert-primary alert-dismissible fade show float-right" role="alert">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             <span class="sr-only">Close</span>
           </button>
          <?php echo $_REQUEST['mensaje']?>
         </div>
         <?php
       }

       

      //incluir modulos o paginas de productosp0
      
      if($modulo=="clienteProductos"){
        include_once "clienteProductos.php";

      }

      //incluir modulos o paginas de contacto
    

      if($modulo=="crearContacto"){
        include_once "crearContacto.php";
      }


      ?>
   
  <header class="header">
   
        <div class="contenedor">
       
        <div class="login-logo">
             <b>Daniel Motos</b><br>
             <a class="logo">
             <img src="admin/logo.png" alt="Daniel Motos Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
             </a>
  </div>       
            <!--Slogan-->
            <div class="header__texto" aling ="center">
            <h2 class="header" align ="center">Todo en mecanica de motocicletas</h2>
                <h3 class="header" align ="center">Tu moto en manos profesionales</h3>
            
            </div>
        </div>
        
  </header><!--fin encabezado-->
      <article class="entrada">
          <div class="img">
            <picture>
              <img src="temas.jpeg" width="1800" height="300" class="img-responsive center" alt="DANIEL MOTOS" loading="lazy">
            </picture>
          </div>
        <div class="contenedor contenido-principal" style="padding-left: 30px;">
          
           
            <aside>
                <h2 class="titulo">Temas</h2>              
                    <nav class="indice">
                      <a href="#Info"><h3>Nuestra Info</h3></a><br>
                      <a href="#Acce"><h3>Accesorios</h3></a><br>
                      <a href="#Videos"><h3>Videos</h3></a><br>
                      <a href="#Imag"><h3>Imágenes</h3></a>  
                    </nav>
            </aside>
            <main class="blog">
                <a name="Info" id="info"></a>
                <h2>Nuestra Info</h2>
                <h3>Nos encontramos ubicados en la ciudad de Medellín, abrimos nuestras instalaciones al público en en enero de 2021
                    contamos con las herramientas necesarias para prestar un excelente servicio en los tiempos establecidos según la
                    necesidad del cliente.</h3>
                <!--articulos-->               
                    <div class="entrada__contenido">
                        <h4>
                            TALLER
                        </h4>
                        <img src="taller.jpeg" width="1200" height="900" class="mx-auto d-block" alt="DANIEL MOTOS" loading="lazy">
                        
                        <h4>En DANIEL MOTOS somos expertos en mecanica de motocicletas de dos y cuatro tiempos, se realizan mantenimientos preventivos, arreglos, latoneria y pintura a motocicletas de cualquier marca.</h4>
                       <div class="entrada__imagen">
                        <picture>
                        <img src="repuestos.jpeg" width="1200" height="600" class="mx-auto d-block" alt="DANIEL MOTOS" loading="lazy">
                        
                      </picture>
                    </div>

                    </div>

                </article><!--fin articulo 1-->

                <!--articulo 2-->

                <article class="entrada">
                    

                    <div class="entrada__contenido">
                        <h4 style="padding-left: 50px;">
                         Toda Clase de arreglos.
                        </h4>
                        <p>
                           
                        </p>

                       

                    </div>

                </article><!--fin articulo2-->

                <!--articulo3-->

                <article class="entrada">
                <a name="Acce" id="Acce"></a>
                    <div class="entrada__imagen">
                    <h2 style="padding-left: 50px;">Venta de Accesorios</h2>
                        <picture>
                            <!--para detectar o no imagenes webp-->
                            <!--<source srcset="images/noticias1.webp" type="image/webp">-->
                            <img src="accesorios.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                        </picture>
                    </div>

                    <div class="entrada__contenido">
                    
                        <h3 style="padding-left: 50px;">
                           Contamos con gran variedad de accesorios para motocicletas y pilotos.
                        </h3>
                        <img src="accesorios1.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                    </div>

                </article><!--fin articulo3-->

           

             <!--Sidebar-->
           
             <a name="Videos" id="Videos"></a>
                <h2 style="padding-left: 50px;">Videos</h2>
                
                <!--Lista-->
                <!--Videos-->
                
                    <ul class="video">
                      <h3>Resolución Cascos motociclistas</h3>
                        <iframe width="1200" height="900" class="mx-auto d-block" src="https://www.youtube.com/embed/jeznzD_csOg" frameborder="5" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><br>
                      <h3>Motos Yamaha Precio</h3> 
                        <iframe width="1200" height="900" class="mx-auto d-block" src="https://www.youtube.com/embed/VCy4yQuhi-w" frameborder="4" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>    

                    </ul> <!--fin videos-->
                    <!--imagenes-->
                    <ul class="img">
                        <li class="widget-img">
                        <a name="Imag" id="Imag"></a>
                            <h2 class="responsive center" style="padding-left: 50px;">Imágenes</h2>
                            <img src="casco.jpeg" width="1240" height="200" class="mx-auto d-block" alt="DANIEL MOTOS" loading="lazy">
                            <div>
                              <picture>  
                                <h3>Yamaha 400</h3>                        
                                <img src="moto1.jpeg" width="1200" height="900" class="mx-auto d-block" alt="DANIEL MOTOS" loading="lazy">
                                <h3>Yamaha XT500</h3> 
                                <img src="moto2.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Yamaha DT 125</h3> 
                                <img src="moto3.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Honda XR 250R</h3> 
                                <img src="moto4.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Honda XR 400R</h3> 
                                <img src="moto5.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Suzuki GS500</h3> 
                                <img src="moto6.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Ducati Hypermotard 950</h3> 
                                <img src="moto7.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                               <h3>Ducati Scrambler 1100</h3>  
                                <img src="moto8.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>BMW G1200 GS</h3> 
                                <img src="moto9.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>BMW RR 1000/h3> 
                                <img src="moto10.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>KTM Prestige 690</h3> 
                                <img src="moto11.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>KTM 1290 Super Duke R</h3> 
                                <img src="moto12.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Yamaha R1</h3> 
                                <img src="moto13.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Honda  CBR Fireblade RR900</h3> 
                                <img src="moto14.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                <h3>Kawasaki Z1000</h3> 
                                <img src="moto15.jpeg" width="1200" height="900" class="mx-auto d-block"alt="DANIEL MOTOS" loading="lazy">
                                
                                
                                </picture>
                              </div>
                            </div>
                           
                        </li>

                    </ul> <!--fin imagenes2-->
             </main>
           
        </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
            <div class="contenedor">
            <h4>Medellín Colombia. Since 2021</h4>   
            </div> 
  <ul> 
  <aside class="sidebar">
				<a href="https://api.whatsapp.com/send?phone=573143244638&text=Hola!" target="_blank" >Contacto en: <i class="fab fa-whatsapp" width="300"></i> </a>
				<strong>Copyright &copy; 2021 <a href="#">Hernán Ortiz G.</a>.</strong></ul>
    
    Todos los Derechos Reservados.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
 </aside>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="admin/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="admin/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="admin/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="admin/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="admin/plugins/moment/moment.min.js"></script>
<script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="admin/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>

<!--confirmacion de eliminacion usuarios-->
<script>
 $(document).ready(function(){
   $(".borrar").click(function (e){
     e.preventDefault();
     var eliminar=confirm("Esta seguro de eliminar el usuario?");
     if(eliminar==true){
       var link=$(this).attr("href");
       window.location=link;
     }
   });
 });
</script>


<!--confirmacion de eliminacion de productos-->
<script>
 $(document).ready(function(){
   $(".borrarProducto").click(function (e){
     e.preventDefault();
     var eliminar=confirm("Esta seguro de eliminar el producto?");
     if(eliminar==true){
       var link=$(this).attr("href");
       window.location=link;
     }
   });
 });
</script>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
 $(document).ready(function(){
   setTimeout(function(){
     $(".ocultar").fadeOut(1500);
    },1000);
   });

</script>




</body>
</html>
<?php
ob_end_flush();
?>
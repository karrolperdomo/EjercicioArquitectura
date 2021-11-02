<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['parkingdb'])==0) {
  header('location:logout.php');
  } else{
    $cid=$_GET['viewid'];

    if(isset($_POST['submit'])) {
      echo $cid;
      $consulta = " UPDATE vehiculo ".
        " SET Observacion=null, Estado=null, Valor=null, HoraSalida=null, HoraEntrada=now(),Estado = 'Out' " . 
        " WHERE ID='$cid' ";
        echo $consulta;
      $query=mysqli_query(
        $con, 
        $consulta
      );
     
    if ($query) {
      $msg="Todas las observaciones han sido actualizadas.";
      //header('location:view-incomingvehicle-detail.php?viewid=' . $cid);
    } else {
      $msg="Algo ha ocurrido. Porfavor intente de nuevo";
    }      
    }

?>

<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>Ver detalle del vehículo</title>
   

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
    <!-- Left Panel -->

  <?php include_once('includes/sidebar.php');?>

    <!-- Left Panel -->

    <!-- Right Panel -->

     <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tablero de mandos</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="dashboard.php">Tablero de mandos</a></li>
                                    <li><a href="manage-outgoingvehicle.php">Ver vehículo</a></li>
                                    <li class="active">Vehiculo Entrante</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    
         

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Vehiculo Entrante</strong>
                        </div>
                        <div class="card-body">
                  
              <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from vehiculo where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                       <table border="1" class="table table-bordered mg-b-0">
 

   <tr>
                                <th>Nº de aparcamiento</th>
                                   <td><?php  echo $row['Bahia'];?></td>
                                   </tr>                             
<tr>
                                <th>Categoría de vehículo</th>
                                   <td><?php  echo $row['Categoria'];?></td>
                                   </tr>
                                   <tr>
                                <th>Nombre de la compañia del vehículo</th>
                                   <td><?php  echo $packprice= $row['Marca'];?></td>
                                   </tr>
                                <tr>
                                <th>Nº de registro</th>
                                   <td><?php  echo $row['Placa'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Nombre del propietario</th>
                                      <td><?php  echo $row['Propietario'];?></td>
                                  </tr>
                                    <tr>  
                                       <th>Número de contacto del propietario</th>
                                        <td><?php  echo $row['Celular'];?></td>
                                    </tr>
                                    <tr>  
                                       <th>Estado</th>
                                        <td><?php if ($row['Estado'] == 'exit'){echo "AFUERA";} else {echo "DENTRO";}?></td>
                                    </tr>
                                    
                               
<?php if ($row['Estado'] == 'exit') { ?>
<tr>
  <td colspan="2" > 
    <center>
    <button type="submit" class="btn btn-success btn-lg" name="submit" >Registrar Ingreso</button>
    </center>
  </td>
</tr>
         
<?php } ?>

</table>
</form>
                    </div>
                </div>
                

 


  

  

<?php } ?>
            </div>



        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>

<?php include_once('includes/footer.php');?>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


</body>
</html>
<?php }  ?>
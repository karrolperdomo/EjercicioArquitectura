<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['parkingdb'])==0) {
  header('location:logout.php');
} else{

  if(isset($_POST['submit'])) {
      
    $cid=$_GET['viewid'];
    $remark=$_POST['remark'];
    $status=$_POST['status'];      
    $parkingcharge=$_POST['parkingcharge'];
    $hora_salida=$_POST['hora_salida'];
    $query=mysqli_query(
      $con, 
      " UPDATE vehiculo ".
      " SET Observacion='$remark', Estado='$status', Valor='$parkingcharge', HoraSalida='$hora_salida ' " . 
      " WHERE ID='$cid'"
    );
     
    if ($query) {
      $msg="Todas las observaciones han sido actualizadas.";
      header('location:view-incomingvehicle-detail.php?viewid=' . $cid);
    } else {
      $msg="Algo ha ocurrido. Porfavor intente de nuevo";
    }

    
  } 


  ?>
<!doctype html>

<html class="no-js" lang="">
<head>
   
    <title>Ver detalle del vehiculo</title>
   

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
                                    <li><a href="manage-incomingvehicle.php">Ver vehículo</a></li>
                                    <li class="active">Vehículo entrante</li>
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
                            <strong class="card-title">Ver vehículo entrante</strong>
                        </div>
                        <div class="card-body">
                  
              <?php
 $cid=$_GET['viewid'];
$ret=mysqli_query($con,"select * from vehiculo where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
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
                               <th>Tiempo de entrada</th>
                                <td><?php  echo $row['HoraEntrada'];?></td>
                            </tr>
                            <tr>
    <th>Estado</th>
    <td> <?php  
if($row['Estado']=="")
{
  echo "Vehiculo Entrando";
}
if($row['Estado']=="Out")
{
  echo "Vehiculo Saliendo";
}

     ;?></td>
  </tr>

</table>

                    </div>
                </div>
                <table class="table mb-0">

<?php if($row['Status']==""){ ?>

<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
  <p style="font-size:16px; color:red" align="center"> 
    <?php 
      if($msg){
        echo $msg;
      }  
    ?> 
  </p>

  <tr>
    <th>Nota :</th>
    <td>
    <textarea name="remark" id="remark" placeholder="" rows="12" cols="14" class="form-control" required="true"></textarea></td>
  </tr>
  <tr>
<?php
    $ret=mysqli_query($con,"SELECT TIMESTAMPDIFF(MINUTE, HoraEntrada, now()) AS MINUTOS, now() as hora_salida FROM vehiculo WHERE ID='$cid';");
    $num=mysqli_num_rows($ret);
    $cantidadMinutos = 0;
    $hora_salida = 0;
    $tarifa = 0;
    $valorTotal = 0;
    if($num>0){
        $row = mysqli_fetch_array($ret);
        $cantidadMinutos = $row['MINUTOS'];
        $hora_salida = $row['hora_salida'];
        
        $ret2=mysqli_query(
          $con,
          "SELECT categoria.valor_tarifa " .
          "FROM vehiculo INNER JOIN categoria on vehiculo.Categoria = categoria.tipo " .
          "AND vehiculo.ID = '$cid';" 
        );
        $row2 = mysqli_fetch_array($ret2);
        $tarifa = $row2['valor_tarifa'];
        $valorTotal = $cantidadMinutos * $tarifa;
        $valorTotal = number_format($valorTotal);
    }

?>  
  <tr>  
    <th>Fecha hora salida: </th>
    <td>
      <input type="text" name="hora_salida" id="hora_salida" class="form-control" value="<?php echo $hora_salida; ?>" >
    </td>
  </tr>

    <th>Cargo por estacionamiento: </th>
    <td>
      <input type="text" name="parkingcharge" id="parkingcharge" class="form-control" value="<?php echo $valorTotal; ?>" >
    </td>
  </tr>
<tr>
    <th>Estado :</th>
    <td>
   <select name="status" id="status" class="form-control" required="true" >
     <option value="exit">Vehículo de salida</option>
   </select></td>
  </tr>
                                 
                                    
                                    
<tr>  <p style="text-align: center;"><td> 
  <button type="submit" class="btn btn-primary btn-sm" name="submit" >Actualización</button>
</p>
</td>
</tr>
</form>
</table>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
  <tr>
    <th>Nota</th>
    <td><?php echo $row['Observacion']; ?></td>
  </tr>
<tr>
   <tr>
    <th>Tarifa de aparcamiento</th>
   <td><?php echo $cantidadMinutos; ?></td>
  </tr>

  

<?php } ?>
</table>


  

  

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
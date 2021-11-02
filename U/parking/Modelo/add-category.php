<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['parkingdb'])==0) {
  header('location:logout.php');
  } else{

if(isset($_POST['submit']))
  {
    $catname=$_POST['catename'];
    $tarifa=$_POST['tarifa'];
     
    $query=mysqli_query($con, "insert into  categoria(tipo,valor_tarifa) value('$catname','$tarifa')");
    if ($query) {
    $msg="Categoria Añadida";
  }
  else
    {
      $msg="Ha ocurrido un error. Intente de nuevo";
    }

  
}
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    
    <title>Añadir categoría</title>
   

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

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
   <?php include_once('includes/sidebar.php');?>
    <!-- Right Panel -->

   <?php include_once('includes/header.php');?>

        <div class="breadcrumbs" >
            <div class="breadcrumbs-inner" >
                <div class="row m-0" >
                    <div class="col-sm-4" style="background-color: #cfe2e9;">
                        <div class="page-header float-left" style="background-color: #cfe2e9;">
                            <div class="page-title">
                                <h1>Tablero de mandos</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8" style="background-color: #cfe2e9;">
                        <div class="page-header float-right" style="background-color: #cfe2e9;"> 
                            <div class="page-title" >
                                <ol class="breadcrumb text-right" style="background-color: #cfe2e9;">
                                    <li><a href="dashboard.php">Tablero de mandos</a></li>
                                    <li><a href="add-category.php">Categoría</a></li>
                                    <li class="active">Añadir categoría</li>
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
                    <div class="col-lg-6">
                        <div class="card">
                            
                           
                        </div> <!-- .card -->

                    </div><!--/.col-->

              

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Añadir </strong> Categoría
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                   
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Nombre de la Categoría </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="catename" name="catename" class="form-control" placeholder="Categoría del vehículo" required="true">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Valor tafira</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="tarifa" name="tarifa" class="form-control" placeholder="Valor tarifa" required="true">
                                        </div>
                                    </div>
                                 
                                    
                                    
                                   <p style="text-align: center;"> <button type="submit" class="btn btn-primary btn-sm" name="submit" >Añadir</button></p>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-lg-6">
                        
                  
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
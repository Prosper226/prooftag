<?php
    include_once "action/session.php"; 

    include_once("api/citizens/GET.php");

    $token = $_SESSION['jwt']; // '15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
    // $trying = 1;
    // $stoped = false;
    // do{
    $DATAS = get_All_Citizens();
    //   if(empty($DATAS)){
    //     $trying++;
    //   }else{
    //     $stoped = true;
    //   }
    // }while($trying != 4 || $stoped);

    
    
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Citoyens | ICIVIL</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i,800" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- adminpro icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/adminpro-custon-icon.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="css/data-table/bootstrap-editable.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- charts CSS
		============================================ -->
    <link rel="stylesheet" href="css/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Header top area start-->
    <?php include('includes/headers.php'); ?>
    <!-- Mobile Menu end -->
    <!-- Breadcome start-->
    <div class="breadcome-area mg-t-40 mg-b-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list shadow-reset">
                        <div class="breadcome-heading">
                            <h2>CITOYENS</h2>
                        </div>
                        <ul class="breadcome-menu">
                            <li><a href="#">Administration</a> <span class="bread-slash">/</span>
                            </li>
                            <li><a href="#">Citoyens</a> <span class="bread-slash">/</span>
                            </li>
                            <li><span class="bread-blod">Consultation</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcome End-->
    <!-- Static Table Start -->
    <div class="admin-dashone-data-table-area mg-b-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sparkline8-list shadow-reset">
                        <div class="sparkline8-hd">
                            <div class="main-sparkline8-hd">
                                <h1>Liste des naissances enregistres</h1>
                                <div class="sparkline8-outline-icon">
                                    <span class="sparkline8-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <!-- <span><i class="fa fa-wrench"></i></span> -->
                                    <!-- <span class="sparkline8-collapse-close"><i class="fa fa-times"></i></span> -->
                                </div>
                            </div>
                        </div>
                        <div class="sparkline8-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <div id="toolbar">
                                    <select class="form-control">
                                        <option value="">Export Basic</option>
                                        <option value="all">Export All</option>
                                        <option value="selected">Export Selected</option>
                                    </select>
                                </div>
                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true" data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
                                        <tr>
                                            <th data-field="state" data-checkbox="true"></th>
                                            <th data-field="id">ID</th>
                                            <th data-field="QR_code">Identificateur</th>
                                            <th data-field="name" data-editable="false">Nom</th>
                                            <th data-field="firstname" data-editable="false">Prenom (s)</th>
                                            <th data-field="sexe">sexe</th>
                                            <th data-field="date" data-editable="false">Naissance</th>
                                            <th data-field="commune" data-editable="false">Commune</th>
                                            <th data-field="action">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        if(isset($DATAS) and $DATAS){
                                          foreach($DATAS as $data){
                                      ?>
                                            <tr>
                                                <td></td>
                                                <td><?=$data->id?></td>
                                                <td><?=$data->unique_id?></td>
                                                <td><?=$data->name?></td>
                                                <td><?=$data->first_name?></td>
                                                </td>

                                                <?php
                                                  if(isset($data->birth_civil_status_certificate) and $data->birth_civil_status_certificate){
                                                ?>
                                                    <td>
                                                        <div class="btn-group project-list-ad">
                                                            <button class="btn btn-white btn-xs"><?=$data->birth_civil_status_certificate->sex?></button>
                                                        </div>
                                                    </td>
                                                    <td><?=$data->birth_civil_status_certificate->date_of_birth?></td>
                                                    <td><?=$data->birth_civil_status_certificate->commune?></td>
                                                <?php
                                                  }else{
                                                ?>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                <?php
                                                  }
                                                ?>
                                                <td>
                                                    <div class="btn-group project-list-action">
                                                        <a href="citizens-extrait.php?id=<?=$data->id?>" class="btn btn-white btn-action btn-xs"><i class="fa fa-file"></i> pdf</a>
                                                        <a href="citizens-update.php?id=<?=$data->id?>" class="btn btn-white  btn-xs"><i class="fa fa-pencil"></i>  Modifier</a>
                                                    </div>
                                                </td>
                                            </tr>
                                      <?php
                                          }
                                      } 
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Static Table End -->
    <!-- Footer Start-->
    <?php include('includes/footer.php'); ?>
    <!-- Footer End-->
   
    <!-- Chat Box End-->
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="js/peity/jquery.peity.min.js"></script>
    <script src="js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="js/data-table/bootstrap-table.js"></script>
    <script src="js/data-table/tableExport.js"></script>
    <script src="js/data-table/data-table-active.js"></script>
    <script src="js/data-table/bootstrap-table-editable.js"></script>
    <script src="js/data-table/bootstrap-editable.js"></script>
    <script src="js/data-table/bootstrap-table-resizable.js"></script>
    <script src="js/data-table/colResizable-1.5.source.js"></script>
    <script src="js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>


</body>

</html>
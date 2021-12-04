<?php
    include_once "action/session.php";
    include_once("api/citizens/GET.php");

    $token = $_SESSION['jwt']; //'15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
    
    $set_init_data = true; 

    if(isset($_GET['id']) and !empty($_GET['id'])){
        $id = $_GET['id'];
        try{
            $data = get_Citizen_ByID($id);
            if(isset($data->id)){
                $set_init_data = false;
            }
        }catch(Exception $e){
            $set_init_data = true;
        }
    } 

    if($set_init_data){ 
        if (!isset($data)) 
        $data = new stdClass();

        $data->id = ''; 
        $data->name = '';
        $data->first_name = '';
        $data->unique_id = '';
        // $data->birth_civil_status_certificate = null;
        // $data->date_of_birth = '';
        // $data->commune = ''; 
        // $data->sex = '';
        // $data->civil_status_center =  "";
        // $data->name_of_officer = "";
        // $data->citizen_id = '';
        // $data->volet_number = "";
        // $data->act_number = "";
        // $data->father_name = "";
        // $data->mother_name = "";
        // $data->father_profession = "";
        // $data->mother_profession = "";
        // $data->parents_domicil = "";
        // $data->declarant = "";
        // $data->date_of_birth = "";
        // $data->time_of_birth = "";
        // $data->declaration_act = "";
        // $data->birth_act = "";
    }
    $birthPart = false;
    if(isset($data->birth_civil_status_certificate) and $data->birth_civil_status_certificate){
        $birthPart = true;
    }

    
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
    <link rel="stylesheet" href="css/normalize.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="css/form.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
                            <li><span class="bread-blod">Modifications</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcome End-->
    <!-- Order Form Start-->
    <div class="login-form-area mg-t-30 mg-b-40">
        <div class="container">
            <div id="snackbar"></div>
        <div class="row">
                <div class="col-lg-6">
                    <div class="sparkline10-list shadow-reset mg-t-30">
                        <div class="sparkline10-hd">
                            <div class="main-sparkline10-hd">
                                <h1>Mise a jour des informations du citoyen</h1>
                                <div class="sparkline10-outline-icon">
                                    <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <!-- <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span> -->
                                </div>
                            </div>
                        </div>
                        <div class="sparkline11-graph">
                            <div class="input-knob-dial-wrap">
                                <form id="citizen_update_form" class="" method="post">
                                    <div class="">
                                        <div class="login-bg">
                                            <input type="hidden" name="id" value="<?=$data->id?>"/>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Identificateur</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="unique_id" value="<?=$data->unique_id?>" readonly/>
                                                        <i class="fa fa-qrcode login-user" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Nom</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="name" value="<?=$data->name?>" required/>
                                                        <!-- <i class="fa fa-user login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>err</p>
                                                    </div>
                                                </div> -->
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="hidden" name="" value="" readonly/>
                                                        <!-- <i class="fa fa-qrcode login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Prenom(S)</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="first_name" value="<?=$data->first_name?>" required/>
                                                        <!-- <i class="fa fa-qrcode login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <div class="login-button-pro">
                                                        <button type="submit" class="login-button login-button-lg">Modifier le citoyen</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sparkline10-list shadow-reset mg-t-30">
                        <div class="sparkline10-hd">
                            <div class="main-sparkline10-hd">
                                <h1>Mise a jour des informations d'extrait d'etat civil</h1>
                                <div class="sparkline10-outline-icon">
                                    <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <!-- <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span> -->
                                </div>
                            </div>
                        </div>
                        <div class="sparkline11-graph">
                            <div class="input-knob-dial-wrap">
                                <form id="citizen_update_certificate_form" method="post">
                                    <div class="">
                                        <div class="login-bg">
                                        <input type="hidden" name="citizen_id"  value="<?=$data->id?>"/>
                                        <input type="hidden" name="id"  value="<?=$data->birth_civil_status_certificate->id?>"/>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Status centre civil</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="civil_status_center" value="<?=$data->birth_civil_status_certificate->civil_status_center?>"/>
                                                        <!-- <i class="fa fa-user login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Commune</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="commune" value="<?=$data->birth_civil_status_certificate->commune?>"/>
                                                        <!-- <i class="fa fa-envelope login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Nom de l'officier</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="name_of_officer" value="<?=$data->birth_civil_status_certificate->name_of_officer?>"/>
                                                        <!-- <i class="fa fa-phone login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Numero de volet</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="volet_number" value="<?=$data->birth_civil_status_certificate->volet_number?>"/>
                                                        <!-- <i class="fa fa-briefcase login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Numero d'acte</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="act_number" value="<?=$data->birth_civil_status_certificate->act_number?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Sexe</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="interested-input-area">
                                                        <select name="sex">
                                                            <!-- <option value="none" selected="" disabled="">Selection du sexe</option> -->
                                                            <?php if($data->birth_civil_status_certificate->sex === 'masculin') { ?>
                                                                <option selected="" value="masculinn">Masculin</option>
                                                                <option value="feminin">Feminin</option>
                                                            <?php } else { ?>
                                                                <option selected="" value="feminin">Feminin</option>
                                                                <option value="masculin">Masculin</option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Nom du pere</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="father_name"  value="<?=$data->birth_civil_status_certificate->father_name?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Nom de la mere</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="mother_name"  value="<?=$data->birth_civil_status_certificate->mother_name?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Profession du pere</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="father_profession"  value="<?=$data->birth_civil_status_certificate->father_profession?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Profession de la mere</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="mother_profession"  value="<?=$data->birth_civil_status_certificate->mother_profession?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Numero de la mere</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" class="form-control" name="mother_number"  value="<?=$data->birth_civil_status_certificate->mother_number?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Domicile des parents</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="parents_domicil"  value="<?=$data->birth_civil_status_certificate->parents_domicil?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Declarant</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="declarant"  value="<?=$data->birth_civil_status_certificate->declarant?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Date de naissance</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="date" class="form-control" name="date_of_birth"  value="<?=date('Y-m-d',strtotime($data->birth_civil_status_certificate->date_of_birth))?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Heure de naissance</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="time" class="form-control" name="time_of_birth"  value="<?=$data->birth_civil_status_certificate->time_of_birth?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                    
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <div class="login-button-pro">
                                                        <button type="submit" class="login-button login-button-lg">Modifier le certificat</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <!-- <div class="col-lg-2"></div> -->
            
            </div>
        </div>
    </div>
    <!-- Order Form End-->
    <!-- Footer Start-->
    <?php include('includes/footer.php'); ?>
    <!-- Footer End-->
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
    <!-- maskedinput JS
		============================================ -->
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/masking-active.js"></script>
    <!-- datepicker JS
		============================================ -->
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/datepicker-active.js"></script>
    <!-- form validate JS
		============================================ -->
    <script src="js/jquery.form.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/form-active.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#citizen_update_form').submit(function(e) {
            e.preventDefault();
            confirm('Etes vous sur de vouloir modifier le citoyen ?');
            $.ajax({ 
                type: "POST",
                url: 'action/update-citizen.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData.success)
                    {
                        // setTimeout(function () {
                        //     window.location.href = "#";
                        // },250);
                        snackBarAllert(jsonData.message);
                        console.log('Mise a jour effectuee');
                    }
                    else
                    {
                        snackBarAllert(jsonData.message);
                        console.log('Echec de mise a jour');
                    }
                }
            });
        });

        $('#citizen_update_certificate_form').submit(function(e) {
            e.preventDefault();
            confirm('Etes vous sur de vouloir poursuivre les modifications ?');
            $.ajax({ 
                type: "POST",
                url: 'action/update-citizen-certificate.php',
                data: $(this).serialize(),
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    console.log(jsonData);
                    if (jsonData.success)
                    {
                        // setTimeout(function () {
                        //     window.location.href = "dashboard.php";
                        // },250);
                        snackBarAllert(jsonData.message);
                        alert('Mise a jour effectuee');
                    }
                    else
                    {
                        snackBarAllert(jsonData.message);
                        console.log('Echec de mise a jour');
                    }
                }
            });
        });

    });
    </script>
</body>

</html>
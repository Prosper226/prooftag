<?php
    include_once "action/session.php";
    include_once("api/users/GET.php");

    $token = $_SESSION['jwt']; // '15|4UEg9FGX1k4X5YfTTeHloBwcf0aTGoZeCN3DUa7q';
    
    $set_init_data = true; 

    if(isset($_GET['id']) and !empty($_GET['id'])){
        $id = $_GET['id'];
        $data = get_User_ByID($id);
        if(!empty($data->id)){
            $set_init_data = false;
        }
    }

    if($set_init_data){ 
        if (!isset($data)) 
        $data = new stdClass();
        $data->id = '';
        $data->name = '';
        $data->first_name = '';
        $data->login = "";
        // $data->role->name = '';
        $data->authorize = '';
        $data->matricule = "";
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
                            <h2>UTILISATEURS</h2>
                        </div>
                        <ul class="breadcome-menu">
                            <li><a href="#">Administration</a> <span class="bread-slash">/</span>
                            </li>
                            <li><a href="#">Utilisateurs</a> <span class="bread-slash">/</span>
                            </li>
                            <li><span class="bread-blod">Modification</span>
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
            <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="sparkline10-list shadow-reset mg-t-30">
                        <div class="sparkline10-hd">
                            <div class="main-sparkline10-hd">
                                <h1>Mise a jour des informations utilisateur</h1>
                                <div class="sparkline10-outline-icon">
                                    <span class="sparkline10-collapse-link"><i class="fa fa-chevron-up"></i></span>
                                    <!-- <span><i class="fa fa-wrench"></i></span>
                                    <span class="sparkline10-collapse-close"><i class="fa fa-times"></i></span> -->
                                </div>
                            </div>
                        </div>
                        <div class="sparkline11-graph">
                            <div class="input-knob-dial-wrap">
                                <form id="user_update_form" method="post">
                                    <div class="">
                                        <div class="login-bg">
                                            <input type="hidden" name="id" value="<?=$data->id?>"/>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Nom</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="name" value="<?=$data->name?>"/>
                                                        <!-- <i class="fa fa-user login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Prenom(s)</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="first_name" value="<?=$data->first_name?>"/>
                                                        <!-- <i class="fa fa-envelope login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Login</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="login" value="<?=$data->login?>"/>
                                                        <!- <i class="fa fa-phone login-user" aria-hidden="true"></i> ->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Role</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="role_id" value="<?=$data->role->name?>" readonly/>
                                                        <!-- <i class="fa fa-briefcase login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Autorization</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="authorize" value="<?=$data->authorize?>"/>
                                                        <!- <i class="fa fa-calendar login-user" aria-hidden="true"></i> ->
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="login-input-head">
                                                        <p>Matricule</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    <div class="login-input-area">
                                                        <input type="text" name="matricule"  value="<?=$data->matricule?>"/>
                                                        <!-- <i class="fa fa-calendar login-user" aria-hidden="true"></i> -->
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="row">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-8">
                                                    <div class="login-button-pro">
                                                        <button type="submit" class="login-button login-button-lg">Modifier l'utilisateur</button>
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
            $('#user_update_form').submit(function(e) {
                e.preventDefault();
                confirm('Etes vous sur de vouloir modifier cet utilisateur ?');
                $.ajax({ 
                    type: "POST",
                    url: 'action/update-user.php',
                    data: $(this).serialize(),
                    success: function(response)
                    {
                        var jsonData = JSON.parse(response);
                        if (jsonData.success)
                        {
                            // setTimeout(function () {
                            //     window.location.href = "dashboard.php";
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
        });
    </script>
</body>

</html>
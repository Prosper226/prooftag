<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Login | ICIVIL</title>

  <!-- Bootstrap CSS -->
  <link href="login/css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="login/css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="login/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="login/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="login/css/style.css" rel="stylesheet">
  <link href="login/css/style-responsive.css" rel="stylesheet" />
  
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
 
    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->

    <style>
      
    </style>
</head>

<body class="login-img3-body">

  <div class="container">

    <form class="login-form" id="loginform" method="post">
      <div class="login-wrap">
        <!-- <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
          This is an alert box.
        </div> -->
        <div id='snackbar'></div>
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="email" class="form-control" placeholder="Entrez votre nom d'utlisateur" autofocus name="username" required>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" class="form-control" placeholder="Entrez votre mot de passse" name="password" required>
        </div>
        <label class="checkbox">
                <input type="checkbox" value="remember-me"> Se souvenir de moi
                <span class="pull-right"> <a href="#"> Mot de passe oublié?</a></span>
            </label>
        <button class="btn btn-primary btn-lg btn-block" type="submit">Se connecter</button>

        <!-- <button class="btn btn-info btn-lg btn-block" type="submit">Signup</button> -->
      </div>
      
    </form>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#loginform').submit(function(e) {
          e.preventDefault();
          $.ajax({ 
              type: "POST",
              url: 'action/login.php',
              data: $(this).serialize(),
              success: function(response)
              {
                  var jsonData = JSON.parse(response);
                  if (jsonData.success)
                  {
                    setTimeout(function () {
                        window.location.href = "dashboard.php";
                    },250);
                    snackBarAllert(jsonData.message);
                  }
                  else
                  {
                    snackBarAllert(jsonData.message);
                  }
              }
          });
      });
    });
  </script>
  <script src="login/js/scripts.js"></script>  
  <script src="login/js/jquery.js"></script>
  <script src="login/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="login/js/jquery.scrollTo.min.js"></script>
  <script src="login/js/jquery.nicescroll.js" type="text/javascript"></script>
</body>

</html>

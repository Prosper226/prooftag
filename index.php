<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | ICIVIL</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="icivil/registration/assets/css/style.css">
    <link rel="shortcut icon" href="img/favicon.png">
</head>
<body>
    <div class="registration-form">
        <form id="loginform" method="post" autocomplete="off">
            <center>
            <img src="icivil/img/bf1.jpeg" width="225"/>
            </center>
            <br>
            
            <!-- <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div> -->
            <div class="form-group">
                <input type="email" class="form-control item" name="username" autofocus placeholder="Nom d'utilisateur" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control item" name="password" placeholder="Mot de passe" required>
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Se connecter</button>
            </div>
        </form>
        <div class="social-media">
            <!-- <h5>Sign up with social media</h5> -->
            <div id="loading">
                <img src="icivil/img/spinner.gif" width="35"/>
            </div>

        </div>
        <div id='snackbar'></div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="icivil/registration/assets/js/script.js"></script>
    <!-- <script src="icivil/login/js/scripts.js"></script>   -->
    <script src="icivil/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#loading').hide();
            $('#loginform').submit(function(e) {
                e.preventDefault();
                $.ajax({ 
                    type: "POST",
                    url: 'icivil/action/login.php',
                    data: $(this).serialize(),
                    beforeSend : function(){
                        $('#loading').show();
                    },
                    success: function(response)
                    {
                        $('#loading').hide();
                        var jsonData = JSON.parse(response);
                        console.log(jsonData);
                        if (jsonData.success)
                        {
                            setTimeout(function () {
                                window.location.href = "icivil/dashboard.php";
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
</body>
</html>

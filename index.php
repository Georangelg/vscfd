<?php
require("config/session.php");
require("config/constant.php");
require("config/helper.db2.php");

//redirect to template page if the user is logged in
if(logged_in()){ //Session.php
    header( "Location: home.php" ); die;
}

$help=new helper();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=PROJECT_MODULE?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    
<!-- jQuery 2.2.3 --><script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 --><script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck --><script src="plugins/iCheck/icheck.min.js"></script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <?=PROJECT_MODULE?>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Iniciar sesión</p>
        
        <!-- start display error message -->
        <?php
        $error_code = @$_GET['error']; //var_dump($error_code);
        if($error_code==ERROR_CODE_LOGIN){
            $msg = $help->display_error('alert-danger',ERROR_MSG_LOGIN);//helper.db2.php     
        }elseif ($error_code==ERROR_CODE_BLOCKED) {
            $msg = $help->display_error('alert-danger',ERROR_MSG_BLOCKED);//helper.db2.php      
        }
         
        ?>

        


        <!-- end display error message -->

        <form action="process_login.php" method="post">
            <div class="form-group has-feedback">
                <input type="email" name="email" class="form-control" placeholder="Email" id="Mail" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <!-- <div class="checkbox icheck"> -->
                        <!-- <label> -->
                            <!-- <input type="checkbox"> Remember Me -->
                        <!-- </label> -->
                    <!-- </div> -->
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="#">Olvide la contraseña</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script>
$(function () {
   
});
</script>
</body>
</html>

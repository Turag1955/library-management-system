<?php
require_once '../database.php';
if (isset($_POST['forget_submit'])) {
    $librariyan_username = $_POST['librariyan_username'];
    $librariyan_password = $_POST['librariyan_password'];
    $haspass = md5($librariyan_password);

    $query = mysqli_query($conn, "UPDATE librariyan SET librariyan_password = '$haspass'  WHERE librariyan_username =  '$librariyan_username' ");
    if ($query) {
        $success = 'password change success';
    } else {
        echo 'no';
    }
}
?>




<!doctype html>
<html lang="en" class="fixed accounts forgot-password">


    <!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Helsinki</title>
        <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
        <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <!--BASIC css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--TEMPLATE css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/stylesheets/css/style.css">
    </head>

    <body>
        <div class="wrap">
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body  animated slideInDown">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--LOGO-->

                <div class="box">
                    <!--FORGOT PASSWPRD FORM-->
                    <div class="panel mb-none">
                        <div class="panel-content bg-scale-0">
                            <?php
                            if (isset($success)) {
                             ?>
                            <div class="alert alert-success"><?=$success?></div>
                            <?php
                            }
                            ?>
                            <form action="" method="POST">
                                <h4>Forgot your password?</h4> Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi distinctio ducimus ipsam reprehenderit vel?
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" id="student_username" placeholder="Username" name="librariyan_username" >
                                        <i class="fa fa-user"></i>
                                    </span>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="password" class="form-control" id="" placeholder="Reset Password" name="librariyan_password">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                
                                    <button type="submit" class="btn btn-primary btn-block " name="forget_submit">Send</button>
                                </div>
                                <div class="form-group text-center">
                                    You remembered?, <a href="sign-in.php">Sign in!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>

        </div>
        <!--BASIC scripts-->
        <!-- ========================================================= -->
        <script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>


        <!--TEMPLATE scripts-->
        <!-- ========================================================= -->
        <script src="../assets/javascripts/examples/ui-elements/alerts.js"></script>
        <script src="../assets/javascripts/template-script.min.js"></script>
        <script src="../assets/javascripts/template-init.min.js"></script>

        <!-- SECTION script and examples-->
        <!-- ========================================================= -->
    </body>


    <!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
</html>


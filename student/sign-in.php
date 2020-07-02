<?php
require_once '../database.php';
session_start();
if (isset($_SESSION['student_login'])) {
    header("Location:index.php");
}

if (isset($_POST['student_submit'])) {
    $errors = [];
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];

    $sql = "SELECT * FROM `student` WHERE `student_email` = '$student_email' OR `student_username` = '$student_email'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) == 1) {
        $assoc = mysqli_fetch_assoc($query);
        if (password_verify($student_password, $assoc['student_password'])) {
            if ($assoc['student_status'] == 1) {
                $_SESSION['student_login'] = $student_email;
                $_SESSION['student_id'] = $assoc['id'];
                header("Location:index.php");
            } else {
                $errors [] = 'Your Account is Inactive..!';
            }
        } else {
            $errors [] = 'Your password Invalid..!';
        }
    } else {
        $errors [] = 'Your Email or User name Wrong';
    }
}
?>


<!doctype html>
<html lang="en" class="fixed accounts sign-in">



    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>LMS</title>

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
            <div class="page-body animated slideInDown">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--LOGO-->
                <div class="logo text-center">
                    <h2>LMS</h2>
                    <?php
                    if (isset($errors)) {
                        foreach ($errors as $error) {
                            ?>
                            <div class="alert alert-warning"><?= $error ?></div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="box">
                    <!--SIGN IN FORM-->
                    <div class="panel mb-none">
                        <div class="panel-content bg-scale-0">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control" id="email" placeholder="Email Or Username" name="student_email" value="<?= (isset($student_email) ? $student_email : '') ?>">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="student_password" value="<?= (isset($student_password) ? $student_password : '') ?>">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Sing in" name="student_submit" class="btn btn-block btn-primary" />
                                </div>
                                <div class="form-group text-center">
                                    <a href="forget_pass.php">Forgot password?</a>
                                    <hr/>
                                    <span>Don't have an account?</span>
                                    <a href="register.php" class="btn btn-block mt-sm">Register</a>
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
        <script src="../assets/javascripts/template-script.min.js"></script>
        <script src="../assets/javascripts/template-init.min.js"></script>
        <!-- SECTION script and examples-->
        <!-- ========================================================= -->
    </body>



</html>

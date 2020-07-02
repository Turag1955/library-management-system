<?php
require_once '../database.php';
session_start();
if(isset($_SESSION['student_login'])){
    header("Location:index.php");
}

if (isset($_POST['submit_reg'])) {
    $errors = [];
    $student_name = $_POST['student_name'];
    $student_roll = $_POST['student_roll'];
    $student_reg = $_POST['student_reg'];
    $student_department = $_POST['student_department'];
    $student_number = $_POST['student_number'];
    $student_email = $_POST['student_email'];
    $student_username = $_POST['student_username'];
    $student_password = $_POST['student_password'];

    $student_picture = $_FILES['student_image'];
    $picture_name = $student_picture['name'];
    $picture_tmp = $student_picture['tmp_name'];
    $picture_size = $student_picture['size'];

    $explode = explode(".", $picture_name);
    $extention = strtolower(end($explode));
    $extention_list = ['jpg', 'jpeg', 'png'];

    if (!in_array($extention, $extention_list)) {
        $errors ['extention'] = 'Please upload image with jpg/jpeg/png Formate';
    }
    if ($picture_size > 1024 * 1024 * 3) {
        $errors ['size'] = 'Please upload image within 3Mb';
    }

    if (empty($student_name)) {
        $errors ['name'] = 'Name Feild Is Required..!';
    }
    if (empty($student_roll)) {
        $errors ['roll'] = 'Roll Feild Is Required..!';
    }
    if (empty($student_reg)) {
        $errors ['reg'] = 'Reg. Feild Is Required..!';
    }
    if (empty($student_department)) {
        $errors ['department'] = 'Department Feild Is Required..!';
    }
    if (empty($student_number)) {
        $errors ['number'] = 'Mob. No. Feild Is Required..!';
    }
    if (empty($student_email)) {
        $errors ['email'] = 'Email Feild Is Required..!';
    }
    if (empty($student_username)) {
        $errors ['username'] = 'UserName Feild Is Required..!';
    }
    if (empty($student_password)) {
        $errors ['password'] = 'Password Feild Is Required..!';
    }

    if (count($errors) == 0) {

        $check_error = [];
        $email_chek = "SELECT * FROM `student` WHERE `student_email` = '$student_email'";
        $email_query = mysqli_query($conn, $email_chek);
        $email_row = mysqli_num_rows($email_query);
        if ($email_row == '0') {
            $username_chek = "SELECT * FROM `student` WHERE `student_username` = '$student_username'";
            $username_query = mysqli_query($conn, $username_chek);
            $username_row = mysqli_num_rows($username_query);
            if ($username_row == '0') {
                if (strlen($student_username) > 6) {
                    if (strlen($student_password) > 6) {

                        $passhass = password_hash($student_password, PASSWORD_DEFAULT);
                        $newpicturename = $student_name . '-' . time() . '-' . '.' . $extention;

                        $sql = "INSERT INTO `student`( `student_name`, `student_roll`, `student_reg`, `student_department`, `student_number`, `student_email`, `student_username`, `student_password`, `student_status`, `student_image`)
                          VALUES ('$student_name','$student_roll','$student_reg','$student_department','$student_number','$student_email','$student_username','$passhass','0','$newpicturename')";

                        $query = mysqli_query($conn, $sql);

                        if ($query) {
                            move_uploaded_file($picture_tmp, "../assets/upload/student/" . $newpicturename);
                            $success = 'Register is Success ..!';
                        } else {
                            $errors['noQuery'] = "You can't Register..!";
                        }
                    } else {
                        $check_error [] = 'Password More Than 6 Charecter..!';
                    }
                } else {
                    $check_error [] = 'User Name More Than 6 Charecter..!';
                }
            } else {
                $check_error [] = 'This User Name Allready Exit..!';
            }
        } else {
            $check_error [] = 'This Email Allready Exit..!';
        }
    }
}
?>





<!doctype html>
<html lang="en" class="fixed accounts sign-in">


    <!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
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
                <div class="logo text-center text-muted">
                    <h2>Library Management System</h2>
                    <h4>Register Form</h4>
                    <?php
                    if (isset($success)) {
                        ?>
                        <div class="alert alert-success">
                            <?= $success ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($errors['noQuery'])) {
                        ?>
                        <div class="alert alert-danger">
                            <?= $errors['noQuery'] ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if (isset($check_error)) {
                        foreach ($check_error as $error) {
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
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Name" name="student_name" value="<?= isset($student_name) ? $student_name : '' ?>">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['name'])) {
                                        echo '<span class ="text-danger">' . $errors ['name'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Roll" name="student_roll" value="<?= isset($student_roll) ? $student_roll : '' ?>">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['roll'])) {
                                        echo '<span class ="text-danger">' . $errors ['roll'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Reg." name="student_reg" value="<?= isset($student_reg) ? $student_reg : '' ?>" />
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['reg'])) {
                                        echo '<span class ="text-danger">' . $errors ['reg'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input class="form-control" type="text" placeholder="Department" name="student_department" value="<?= isset($student_department) ? $student_department : '' ?>" />
                                        <i class="fa fa-user"> </i>
                                    </span>
                                    <?php
                                    if (isset($errors ['department'])) {
                                        echo '<span class ="text-danger">' . $errors ['department'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Mob No." name="student_number" value="<?= isset($student_number) ? $student_number : '' ?>"">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['number'])) {
                                        echo '<span class ="text-danger">' . $errors ['number'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="student_email" value="<?= isset($student_email) ? $student_email : '' ?>">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['email'])) {
                                        echo '<span class ="text-danger">' . $errors ['email'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="text" class="form-control"  placeholder="Username" name="student_username" value="<?= isset($student_username) ? $student_username : '' ?>">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['username'])) {
                                        echo '<span class ="text-danger">' . $errors ['username'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <span class="input-with-icon">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="student_password" value="<?= isset($student_password) ? $student_password : '' ?>">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <?php
                                    if (isset($errors ['password'])) {
                                        echo '<span class ="text-danger">' . $errors ['password'] . '</span>';
                                    }
                                    ?>
                                </div>
                                <div class="form-group mt-md">
                                    <span class="input-with-icon">
                                        <input type="file" class="form-control"   name="student_image" value="<?= isset($picture_name) ? $student_image : '' ?>">
                                    </span>
                                    <?php
                                    if (isset($errors ['extention'])) {
                                        echo '<span class ="text-danger">' . $errors ['extention'] . '</span>';
                                    }

                                    if (isset($errors ['size'])) {
                                        echo '<span class ="text-danger">' . $errors ['size'] . '</span>';
                                    }
                                    ?>

                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Register" name="submit_reg" class="btn btn-primary btn-block" />
                                </div>
                                <div class="form-group text-center">
                                    Have an account?, <a href="sign-in.php">Sign In</a>
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

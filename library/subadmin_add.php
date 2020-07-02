<?php
require_once './header.php';
require_once '../database.php';

$errors = [];
if (isset($_POST['librariyan_submit'])) {

    $librariyan_name = $_POST['librariyan_name'];
    $librariyan_email = $_POST['librariyan_email'];
    $librariyan_username = $_POST['librariyan_username'];
    $librariyan_password = $_POST['librariyan_password'];
   // $libriyan_username = $_SESSION['librayian_username'];


    $pictureofbook = $_FILES['libraiyan_image'];
    $picture_name = $pictureofbook['name'];
    $picture_tmp = $pictureofbook['tmp_name'];
    $picture_size = $pictureofbook['size'];

    $explode = explode(".", $picture_name);
    $extention = strtolower(end($explode));
    $extention_list = ['jpg', 'jpeg', 'png'];

    if (!in_array($extention, $extention_list)) {
        $errors ['extention'] = 'Please upload image with jpg/jpeg/png Formate';
    }
    if ($picture_size > 1024 * 1024 * 3) {
        $errors ['size'] = 'Please upload image within 3Mb';
    }

    if (empty($librariyan_name)) {
        $errors [] = ' Name Feild Is Required..!';
    }
    if (empty($librariyan_email)) {
        $errors [] = 'EmailFeild Is Required..!';
    }
    if (empty($librariyan_username)) {
        $errors [] = ' User Name Feild Is Required..!';
    }
    if (empty($librariyan_password)) {
        $errors [] = 'Password   Feild Is Required..!';
    }
 
    if (!$errors) {
        //$success = 'Book Entry success';

        $newpass = md5($librariyan_password);
        $newpicturename = $librariyan_name . '-' . time() . '-' . '.' . $extention;

        $sql = "INSERT INTO librariyan (librariyan_name, librariyan_email,librariyan_username, librariyan_password,libraiyan_image)
                 VALUES ('$librariyan_name','$librariyan_email','$librariyan_username','$newpass','$newpicturename')";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            move_uploaded_file($picture_tmp, "../assets/upload/libraiyan/" . $newpicturename);
            $success = 'Admin Add success';
        }
    }
}
?>
<!-- CONTENT -->
<!-- ========================================================= -->
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Sub Admin Add</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-8 col-sm-offset-2 ">
            <h4 class="section-subtitle"><b>Sub Admin Add</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            if (isset($errors)) {
                                foreach ($errors as $error) {
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?= $error ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <?php
                            if (isset($success)) {
                                ?>
                                <div class="alert alert-success text-center"><?= $success ?></div>
                                <?php
                            }
                            ?>
                            <form class="form-horizontal form-stripe" action="" method="POST" enctype="multipart/form-data">
                                <br /><br />
                                <div class="form-group">
                                    <label for="adimin_name" class="col-sm-2 control-label">Admin Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" placeholder="Admin Name" name="librariyan_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adimin_email" class="col-sm-2 control-label">Admin Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="adimin_email" placeholder="Admin Email" name="librariyan_email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adimin_username" class="col-sm-2 control-label">Admin Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="adimin_username" placeholder="Admin User Name" name="librariyan_username">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="adimin_password" class="col-sm-2 control-label">Admin Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="adimin_password" placeholder="Admin Password " name="librariyan_password">
                                    </div>
                                </div>    
                            
                                <div class="form-group">
                                    <label for="libraiyan_image" class="col-sm-2 control-label">Admin Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="libraiyan_image" name="libraiyan_image" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Save" name="librariyan_submit" class="btn btn-primary" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>

<?php require_once './footer.php'; ?>
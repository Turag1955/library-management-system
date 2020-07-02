<?php
require_once './header.php';
$student_id = $_SESSION['student_id'];
if (isset($_POST['message'])) {


    $studentid = $_POST['student_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['textarea'];

    $sql = "INSERT INTO `contact`(`student_id`, `name`, `email`, `message`) 
                VALUES ('$studentid','$name','$email','$message')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $succes = 'Message Sent Successfully';
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
                <li><i class="" aria-hidden="true"></i><a href="#">Contact</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">
            <h4 class="section-subtitle"><b>Contact</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <?php
                    if (isset($succes)) {
                        ?>
                        <div class="alert alert-success"><?= $succes ?></div>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" >
                                <!--INPUT max length-->
                                <div class="form-group">
                                    <label for="name" class="control-label">Name</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" maxlength="20" name="name" required="">
                                    <input type="hidden" name="student_id" value="<?= $student_id ?>" />
                                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to <span class="code">20</span></span>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required="">
                                </div>
                                <!--TEXTAREA max length-->
                                <div class="form-group">
                                    <label for="message" class="control-label">Message</label>
                                    <textarea class="form-control" rows="3" id="message" placeholder="Write a comment" maxlength="300" name="textarea" required=""></textarea>
                                    <span class="help-block"><i class="fa fa-info-circle mr-xs"></i>Max characters set to <span class="code">300</span></span>
                                </div>
                                <div class="text-right">
                                    <input class="btn btn-primary" type="submit" value="Message" name="message" />
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
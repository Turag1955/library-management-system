<?php require_once './header.php'; ?>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javacript:avoid(0)">Profile</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="pane bg-secondaryl">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <h2 class="text-center my-3">Your Profile</h2>
                            <?php
                            $student_id = $_SESSION['student_id'];
                            $sql = "SELECT * FROM `student` where id = '$student_id' ";
                            $query = mysqli_query($conn, $sql);
                            $assoc = mysqli_fetch_assoc($query);
                            ?>
                            <tbody>
                                <tr>
                                    <th> Name</th>
                                    <th><?= ucfirst($assoc['student_name']) ?></th>
                                </tr>
                                <tr>
                                    <th> Roll</th>
                                    <th><?= ucfirst($assoc['student_roll']) ?></th>
                                </tr>
                                <tr>
                                    <th> Reg.No</th>
                                    <th><?= ucfirst($assoc['student_reg']) ?></th>
                                </tr>
                                <tr>
                                    <th> Department</th>
                                    <th><?= ucfirst($assoc['student_department']) ?></th>
                                </tr>
                                <tr>
                                    <th> Email</th>
                                    <th><?= ucfirst($assoc['student_email']) ?></th>
                                </tr>
                                <tr>
                                    <th> User Name</th>
                                    <th><?= ucfirst($assoc['student_username']) ?></th>
                                </tr>
                                <tr>
                                    <th> Image</th>
                                    <th><img src="../assets/upload/libraiyan/<?= ucfirst($assoc['student_image']) ?>" alt=""  style="width: 100px;"/></th>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php require_once './footer.php'; ?>
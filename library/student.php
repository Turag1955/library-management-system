<?php require_once './header.php'; ?>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javacript:avoid(0)">Student</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Reg No.</th>
                                    <th>Department</th>
                                    <th>Mobile No.</th>
                                    <th>Email</th>
                                    <th>User Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `student`";
                                $query = mysqli_query($conn, $sql);
                                while ($assoc = mysqli_fetch_assoc($query)) {
                                    ?>

                                    <tr>
                                        <td><?= ucfirst($assoc['student_name']) ?></td>
                                        <td><?= $assoc['student_roll'] ?></td>
                                        <td><?= $assoc['student_reg'] ?></td>
                                        <td><?= ucfirst($assoc['student_department']) ?></td>
                                        <td><?= ucfirst($assoc['student_number']) ?></td>
                                        <td><?= ucfirst($assoc['student_email']) ?></td>
                                        <td><?= ucfirst($assoc['student_username']) ?></td>
                                        <td><img src="../assets/upload/student/<?= $assoc['student_image'] ?>" alt="studentpicture" style="width: 50px;" /></td>
                                        <td>
                                            <?php
                                            if ($assoc['student_status'] == 1) {
                                                ?>
                                                <a href="status_inactive.php?id=<?= base64_encode($assoc['id']) ?>" class="btn btn-success">Active</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="status_active.php?id=<?= base64_encode($assoc['id']) ?>" class="btn btn-danger">InActive</a>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <?php
                                }
                                ?>
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
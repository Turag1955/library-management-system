<?php
require_once './header.php';
require_once '../database.php';
?>

<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javacript:avoid(0)">Sub Admin Manage</a></li>

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
                                    <th>Admin Name</th>
                                    <th>Admin Email</th>
                                    <th>Admin Username   </th>
                                    <th>Admin Register Date  </th>
                                    <th>Admin Image</th>
                                    <th>Admin Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `librariyan`";
                                $query = mysqli_query($conn, $sql);
                                while ($assoc = mysqli_fetch_assoc($query)) {
                                    ?>

                                    <tr>
                                        <td><?= ucfirst($assoc['librariyan_name']) ?></td>
                                        <td><?= ucfirst($assoc['librariyan_email']) ?></td>
                                        <td><?= ucfirst($assoc['librariyan_username']) ?></td>
                                        <td><?= ucfirst($assoc['insertdate']) ?></td>
                                        <td><img src="../assets/upload/libraiyan/<?= $assoc['libraiyan_image'] ?>" alt="" style="width: 50px;" /></td>
                                        <td>
                                            <?php
                                            if ($assoc['librariyan_status'] == 1) {
                                                ?>
                                                <a href="admin_inactive.php?id=<?= $assoc['id'] ?>" class="btn btn-primary">Active</a>
                                                <?php
                                            } else {
                                                ?>
                                                <a href="admin_active.php?id=<?= $assoc['id'] ?>" class="btn btn-danger" >InActive</a>
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




<?php
require_once '../database.php';
session_start();
if (!isset($_SESSION['librayian_login'])) {
    header("Location:sign-in.php");
}




$page = $_SERVER['PHP_SELF'];
$page_explode = explode("/", $page);
$page_link = end($page_explode);
?>

<!doctype html>
<html lang="en" class="fixed left-sidebar-top">


    <!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:03:33 GMT -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>LMS</title>
        <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
        <!--load progress bar-->
        <script src="../assets/vendor/pace/pace.min.js"></script>
        <link href="../assets/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

        <!--BASIC css-->
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="../assets/vendor/animate.css/animate.css">
        <!--SECTION css-->
        <!-- ========================================================= -->
        <!--Notification msj-->
        <!--Magnific popup-->
        <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
        <!--dataTable-->
        <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
        <!-- ========================================================= -->
        <link rel="stylesheet" href="../assets/stylesheets/css/style.css">


    </head>

    <body>
        <div class="wrap">
            <!-- page HEADER -->
            <!-- ========================================================= -->
            <div class="page-header">
                <!-- LEFTSIDE header -->
                <div class="leftside-header">
                    <div class="logo">
                        <a href="index.php" class="on-click">
                            <h3>LMS</h3>
                        </a>
                    </div>
                    <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>
                <!-- RIGHTSIDE header -->
                <div class="rightside-header">
                    <div class="header-middle"></div>


                    <!--NOCITE HEADERBOX-->
                    <div class="header-section hidden-xs" id="notice-headerbox">

                        <div class="notice" id="messages-notice">
                            <i class="fa fa-comments-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger"><i class="fa fa-exclamation"></i></span>
                            </i>
                            <div class="dropdown-box basic">
                                <?php
                                $count_query = mysqli_query($conn, "SELECT COUNT(`id`) as total FROM `contact` ");
                                $total_count = mysqli_fetch_assoc($count_query);
                                ?>
                                <div class="drop-header ">
                                    <h3><i class="fa fa-comments" aria-hidden="true"></i> Messages</h3>
                                    <span class="badge x-danger b-rounded"><?= $total_count['total'] ?></span>
                                </div>
                                <div class="drop-content">
                                    <div class="widget-list list-left-element">
                                        <?php
                                        //  $student_id =   $_SESSION['student_id'];

                                        $sql_contact = "SELECT student.student_image, contact.name,contact.id,contact.insertdate
                                                                FROM contact INNER JOIN student
                                                                ON contact.student_id = student.id
                                                              ";
                                        $query_contact = mysqli_query($conn, $sql_contact);
                                        while ($assoc_modal = mysqli_fetch_assoc($query_contact)) {
                                            ?>
                                            <ul>
                                                <li>
                                                    <a href="javascript:avoid(0)" data-toggle="modal" data-target="#<?= $assoc_modal['id'] ?>" >
                                                        <div class="left-element"><img alt="profile photo" src="../assets/upload/student/<?= $assoc_modal['student_image'] ?>" style="width:50px" /></div>
                                                        <div class="text">
                                                            <span class="title"><?= $assoc_modal['name'] ?></span>
                                                            <span class="subtitle"><?= $assoc_modal['insertdate'] ?></span>
                                                        </div>
                                                    </a>
                                                </li>

                                            </ul>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div class="drop-footer">
                                    <a>See all messages</a>
                                </div>
                            </div>
                        </div>
                        <!--alerts notices-->
                        <div class="notice" id="alerts-notice">
                            <i class="fa fa-bell-o" aria-hidden="true"><span class="badge badge-xs badge-top-right x-danger">7</span></i>

                            <div class="dropdown-box basic">
                                <div class="drop-header">
                                    <h3><i class="fa fa-bell-o" aria-hidden="true"></i> Notifications</h3>
                                    <span class="badge x-danger b-rounded">7</span>

                                </div>
                                <div class="drop-content">
                                    <div class="widget-list list-left-element list-sm">
                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-warning color-warning"></i></div>
                                                    <div class="text">
                                                        <span class="title">8 Bugs</span>
                                                        <span class="subtitle">reported today</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-flag color-danger"></i></div>
                                                    <div class="text">
                                                        <span class="title">Error</span>
                                                        <span class="subtitle">sevidor C down</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-cog color-dark"></i></div>
                                                    <div class="text">
                                                        <span class="title">New Configuration</span>
                                                        <span class="subtitle"></span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-tasks color-success"></i></div>
                                                    <div class="text">
                                                        <span class="title">14 Task</span>
                                                        <span class="subtitle">completed</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
                                                    <div class="text">
                                                        <span class="title">21 Menssage</span>
                                                        <span class="subtitle"> (see more)</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="drop-footer">
                                    <a>See all notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="header-separator"></div>
                    </div>
                    <?php
                    $libraiyan_id = $_SESSION['librayian_id'];
                    $sql = "SELECT * FROM `librariyan` where id = '$libraiyan_id' ";
                    $query = mysqli_query($conn, $sql);
                    $assoc = mysqli_fetch_assoc($query);
                    ?>
                    <!--USER HEADERBOX -->
                    <div class="header-section" id="user-headerbox">
                        <div class="user-header-wrap">
                            <div class="user-photo">
                                <img alt="profile photo" src="../assets/upload/libraiyan/<?= $assoc['libraiyan_image'] ?>" >
                            </div>
                            <div class="user-info">
                                <span class="user-name"> <?= ucfirst($assoc['librariyan_name']) ?></span>
                                <?php
                                if ($libraiyan_id == 3) {
                                    ?>
                                    <span class="user-profile">Administration</span>
                                    <?php
                                } else {
                                    ?>
                                    <span class="user-profile">Admin</span>
                                    <?php
                                }
                                ?>

                            </div>
                            <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                            <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                        </div>
                        <div class="user-options dropdown-box">
                            <div class="drop-content basic">
                                <ul>
                                    <li> <a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="header-separator"></div>
                    <!--Log out -->
                    <div class="header-section">
                        <a href="logout.php" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <!-- page BODY -->
            <!-- ========================================================= -->
            <div class="page-body">
                <!-- LEFT SIDEBAR -->
                <!-- ========================================================= -->
                <div class="left-sidebar">
                    <!-- left sidebar HEADER -->
                    <div class="left-sidebar-header">
                        <div class="left-sidebar-title">Navigation</div>
                        <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                            <span></span>
                        </div>
                    </div>
                    <!-- NAVIGATION -->
                    <!-- ========================================================= -->
                    <div id="left-nav" class="nano">
                        <div class="nano-content">
                            <nav>
                                <ul class="nav nav-left-lines" id="main-nav">
                                    <!--HOME-->
                                    <li class="<?= $page_link == 'index.php' ? 'active-item' : '' ?>"><a href="index.php"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>
                                    <li class="<?= $page_link == 'student.php' ? 'active-item' : '' ?>"><a href="student.php"><i class="fa fa-users" aria-hidden="true"></i><span>Student</span></a></li>
                                    <li class="has-child-item  close-item <?= $page_link == 'book_add.php' ? 'open-item' : '' ?> <?= $page_link == 'book_manage.php' ? 'open-item' : '' ?>">
                                        <a><i class="fa fa-book" aria-hidden="true"></i><span>Book</span></a>
                                        <ul class="nav child-nav level-1" style="">
                                            <li class="<?= $page_link == 'book_add.php' ? 'active-item' : '' ?>"><a href="book_add.php">Book Add</a></li>
                                            <li class="<?= $page_link == 'book_manage.php' ? 'active-item' : '' ?>"><a href="book_manage.php">Book Management</a></li>
                                        </ul>
                                    </li>
                                    <li class="<?= $page_link == 'issubook.php' ? 'active-item' : '' ?>"><a href="issubook.php"><i class="fa fa-book" aria-hidden="true"></i><span>Issu Book</span></a></li>
                                    <li class="<?= $page_link == 'returnbook.php' ? 'active-item' : '' ?>"><a href="returnbook.php"><i class="fa fa-book" aria-hidden="true"></i><span>Return Book</span></a></li>
                                    <?php
                                    if ($_SESSION['librayian_id'] == 3) {
                                        ?>
                                        <li class="has-child-item  close-item <?= $page_link == 'subadmin_add.php' ? 'open-item' : '' ?> <?= $page_link == 'subadmin_manage.php' ? 'open-item' : '' ?>">
                                            <a><i class="fa fa-tree" aria-hidden="true"></i><span>Admin</span></a>
                                            <ul class="nav child-nav level-1" style="">
                                                <li class="<?= $page_link == 'subadmin_add.php' ? 'active-item' : '' ?>"><a href="subadmin_add.php">Sub Admin Add</a></li>
                                                <li class="<?= $page_link == 'subadmin_manage.php' ? 'active-item' : '' ?>"><a href="subadmin_manage.php">Sub Admin Management</a></li>
                                            </ul>
                                        </li>
                                        <?php
                                    } else {
                                        ?>
                                        <li disabled="disabled" title="Only Administer" class="<?= $page_link == '' ? 'active-item' : '' ?>"><a href="javascript:avoid(1)" ><i class="fa fa-tree"></i>Admin</a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--message modal--->
                <?php
                $modal_query = mysqli_query($conn, "SELECT * FROM `contact`");
                while ($assoc_modal = mysqli_fetch_assoc($modal_query)) {
                    ?>
                    <div class="modal fade" id="<?= $assoc_modal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header state modal-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i>Message From <?= ucfirst($assoc_modal['name']) ?></h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">

                                        <table class="table table-striped table-hover table-bordered">
                                            <tr>
                                                <td>Name</td>
                                                <td><?= ucfirst($assoc_modal['name']) ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= $assoc_modal['email'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Message</td>
                                                <td><?= $assoc_modal['message'] ?></td>
                                            </tr>
                                            <tr>
                                                <td>Send Date</td>
                                                <td><?= date('d-m-y') ?></td>
                                            </tr>
                                            <tr>
                                                <td>Your Message </td>
                                            <input type="hidden" value="<?= $assoc_modal['student_id'] ?>" name="student_id"/>
                                            <td><textarea  required="" class="form-control" placeholder="Write Replay Message" name="replay_message" irows="5"></textarea></td>
                                            </tr>
                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Replay" name="replay" class="btn btn-primary" />
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <?php
                if (isset($_POST['replay'])) {
                    $student_id = $_POST['student_id'];
                    $replay_message = $_POST['replay_message'];
                    $admin_id = $_SESSION['librayian_id'];
                    $sql = "INSERT INTO `replaymessage`(`admin_id`, `student_id`, `replay_message`) 
                    VALUES ('$admin_id','$student_id','$replay_message') ";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        ?>
                        <script type="text/javascript">alert('Replay successe');</script>
                        <?php
                    }
                }
                ?>




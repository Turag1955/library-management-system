<?php
require_once '../database.php';
session_start();
if (!isset($_SESSION['student_login'])) {
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
        <title>Helsinki</title>

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
        <link rel="stylesheet" href="../assets/vendor/toastr/toastr.min.css">
        <!--Magnific popup-->
        <link rel="stylesheet" href="../assets/vendor/magnific-popup/magnific-popup.css">
        <!--dataTable-->
        <link rel="stylesheet" href="../assets/vendor/data-table/media/css/dataTables.bootstrap.min.css">
        <!--TEMPLATE css-->
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
                                $count_query = mysqli_query($conn, "SELECT COUNT(`id`) as total FROM `replaymessage` ");
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
                                        //$student_id = $_SESSION['student_id'];
                                        $sql_contact = "SELECT replaymessage.id,replaymessage.insertdate,librariyan.librariyan_name,librariyan.libraiyan_image
                                                                FROM replaymessage INNER JOIN librariyan
                                                                ON replaymessage.admin_id = librariyan.id
                                                              ";
                                        $query_contact = mysqli_query($conn, $sql_contact);
                                        while ($assoc_modal = mysqli_fetch_assoc($query_contact)) {
                                            ?>
                                            <ul>
                                                <li>
                                                    <a href="javascript:avoid(0)" data-toggle="modal" data-target="#<?= $assoc_modal['id'] ?>" >
                                                        <div class="left-element"><img alt="profile photo" src="../assets/upload/libraiyan/<?= $assoc_modal['libraiyan_image'] ?>" style="width:50px" /></div>
                                                        <div class="text">
                                                            <span class="title"><?= ucfirst($assoc_modal['librariyan_name']) ?></span>
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
                    <!--USER HEADERBOX -->
                    <?php
                    $student_id = $_SESSION['student_id'];
                    $sql = "SELECT * FROM `student` where id = '$student_id' ";
                    $query = mysqli_query($conn, $sql);
                    $assoc = mysqli_fetch_assoc($query);
                    ?>
                    <div class="header-section" id="user-headerbox">
                        <div class="user-header-wrap">
                            <div class="user-photo">
                                <img alt="profile photo" src="../assets/upload/student/<?= $assoc['student_image'] ?>" />
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?= ucfirst($assoc['student_name']) ?></span>
                                <span class="user-profile"><?= date('d-M-Y') ?></span>
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
                                    <li class="<?= $page_link == 'test.php' ? 'active-item' : '' ?>"><a href="booksearch.php"><i class="fa fa-book" aria-hidden="true"></i><span>Book List</span></a></li>
                                    <li class="<?= $page_link == 'contact.php' ? 'active-item' : '' ?>"><a href="contact.php"><i class="fa fa-pencil" aria-hidden="true"></i><span>Contact</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>




                <!--message modal--->
                <?php
                $modal_query = mysqli_query($conn, "SELECT replaymessage.id,replaymessage.admin_id,replaymessage.student_id,replaymessage.replay_message,contact.student_id,contact.message,contact.name,contact.email
                                                                            FROM replaymessage INNER JOIN contact
                                                                            ON replaymessage.student_id = contact.student_id");
                while ($assoc_modal = mysqli_fetch_assoc($modal_query)) {
                    ?>
                    <div class="modal fade" id="<?= $assoc_modal['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label" style="display: none;">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header state modal-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-envelope"></i>Message From Admin</h4>
                                </div>
                                <form action="" method="POST">
                                    <div class="modal-body">

                                        <table class="table table-striped  table-bordered">
                                            <tr class="bg-primary">
                                                <td>Your Message</td>
                                                <td><?= ucfirst($assoc_modal['message']) ?></td>
                                            </tr>
                                            <tr class="bg-muted">
                                                <td>Admin Replay</td>
                                                <td><?= $assoc_modal['replay_message'] ?></td>
                                            </tr>

                                            <tr>
                                                <td>Replay </td>
                                            <input type="hidden" value="<?= $assoc_modal['student_id'] ?>" name="student_id"/>
                                            <td><textarea  required="" class="form-control" placeholder="Write Replay Message" name="replay_student" irows="5"></textarea></td>
                                            </tr>

                                            <input type="hidden" value="<?= $assoc_modal['student_id'] ?>" name="student_id" />
                                            <input type="hidden" value="<?= $assoc_modal['name'] ?>"  name="name"/>
                                            <input type="hidden" value="<?= $assoc_modal['email'] ?>"  name="email"/>

                                        </table>

                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit" value="Replay" name="replay_st" class="btn btn-primary" />
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
                if (isset($_POST['replay_st'])) {
                    $student_id = $_POST['student_id'];
                    $replay_student = $_POST['replay_student'];
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    // $admin_id = $_SESSION['librayian_id'];
                    $sql = "INSERT INTO `contact`(`student_id`, `name`, `email`, `message`) 
                              VALUES ('$student_id','$name','$email','$replay_student')";
                    $query = mysqli_query($conn, $sql);
                    if ($query) {
                        ?>
                        <script type="text/javascript">alert('Replay successe');</script>
                        <?php
                    }
                }
                ?>
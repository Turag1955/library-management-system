<?php
require_once './header.php';
?>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javacript:avoid(0)">Return Book</a></li>

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
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Mobile No.</th>
                                    <th>Book Name</th>
                                    <th> Book Issu Date</th>
                                    <th>Book Return</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT student.student_name,student.student_roll,student.student_number,book.book_name,bookissu.book_issu_date,bookissu.id
                                            FROM bookissu INNER JOIN book
                                            on bookissu.book_id = book.id
                                            INNER JOIN student
                                            ON bookissu.student_id = student.id
                                            WHERE bookissu.book_return_date = ''";
                                $query = mysqli_query($conn, $sql);
                                while ($assoc = mysqli_fetch_assoc($query)) {
                                    ?>

                                    <tr>
                                        <td><?= ucfirst($assoc['student_name']) ?></td>
                                        <td><?= $assoc['student_roll'] ?></td>
                                        <td><?= ucfirst($assoc['student_number']) ?></td>
                                        <td><?= ucfirst($assoc['book_name']) ?></td>
                                        <td><?= ucfirst($assoc['book_issu_date']) ?></td>
                                        <td><a class="btn btn-primary"href="returnbook.php?id=<?= $assoc['id'] ?>">Return Book</a></td>
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <?php
                        if (isset($_GET['id'])) {
                            $id = $_GET['id'];
                            $date = date('d-M-Y');

                            $sql_return = "UPDATE `bookissu` SET `book_return_date` = '$date'  WHERE `id` = '$id' ";
                            $query_return = mysqli_query($conn, $sql_return);
                            if ($query_return) {
                                ?>
                                <script type="text/javascript">
                                    alert('Book Return Successfully');
                                    javascript:history.go(-1);
                                </script>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php require_once './footer.php'; ?>
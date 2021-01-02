<?php require_once './header.php'; ?>
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

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="panel">
            <?php 
         
            ?>
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">

                            <thead>
                                <tr>
                                    <th>Book Name</th>
                                    <th>Book Image</th>
                                    <th>Book Issu Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $student_id = $_SESSION['student_id'];
                                $sql = "SELECT bookissu.book_issu_date , book.book_name, book.book_image
                                        FROM bookissu INNER JOIN book
                                        on bookissu.book_id = book.id
                                        WHERE bookissu.student_id = '$student_id'";
                                $query = mysqli_query($conn, $sql);
                                while ($assoc = mysqli_fetch_assoc($query)){
                                    ?>
                                <tr>
                                    <td><?= ucfirst($assoc['book_name'])?></td>
                                    <td><img src="../assets/upload/book/<?=$assoc['book_image']?>" style="width: 50px;" alt="" /></td>
                                    <td><?= date('d-M-Y', strtotime($assoc['book_issu_date']))?></td>
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

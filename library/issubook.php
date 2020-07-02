


<?php
require_once './header.php';

if (isset($_POST['issu_book'])) {
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $book_id = $_POST['book_id'];
    $book_issu_date = $_POST['book_issu_date'];

    $sql = "INSERT INTO `bookissu`( `student_name`, `student_id`, `book_id`, `book_issu_date`) 
                VALUES ('$student_name','$student_id','$book_id','$book_issu_date')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        ?>
        <script type="text/javascript">
            alert('Success Fully Book Issu Complete');
        </script>
        <?php
    } else {
        ?>
        <script type="text/javascript">
            alert(' Book Issu Not Complete');
        </script>
        <?php
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
                <li><i class="" aria-hidden="true"></i><a href="javascript:avoid(0)">Issu Book</a></li>

            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="POST" class="form-inline">
                                <div class="form-group">
                                    <select class="form-control" name="student_select" >
                                        <option value="">Select</option>
                                        <?php
                                        $sql = "SELECT * FROM `student` where student_status = 1 ";
                                        $query = mysqli_query($conn, $sql);
                                        while ($assoc = mysqli_fetch_assoc($query)) {
                                            ?>

                                            <option value="<?= $assoc['id'] ?>"><?= ucfirst($assoc['student_name'] . ' - ' . $assoc['student_roll']) ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button name="search_button" type="search" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['search_button'])) {
                        $student_id = $_POST['student_select'];
                        $search_sql = "SELECT * FROM `student` WHERE `id` = '$student_id'";
                        $search_query = mysqli_query($conn, $search_sql);
                        $search_assoc = mysqli_fetch_assoc($search_query);
                        ?>
                        <div class="panel">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label for="student_name">Student Name</label>
                                                <input type="text" readonly="" class="form-control" id="student_name" name="student_name" value="<?= ucfirst($search_assoc['student_name']) ?>">
                                                <input type="hidden" name="student_id" value="<?= $search_assoc['id'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <label for="book_name">Book Name</label>
                                                <select class="form-control" name="book_id">
                                                    <option value="">Select</option>
                                                    <?php
                                                    $sql = "SELECT * FROM `book` where abailavily_quenty > 0";
                                                    $query = mysqli_query($conn, $sql);
                                                    while ($assoc_book = mysqli_fetch_assoc($query)) {
                                                        ?>

                                                        <option value="<?= $assoc_book['id'] ?>"><?= ucfirst($assoc_book['book_name']) ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" readonly="" type="text" name="book_issu_date" value="<?= date('d-M-Y') ?>"/>

                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="issu_book" class="btn btn-primary">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>

<?php require_once './footer.php'; ?>
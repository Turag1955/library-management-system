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
                <li><a href="javacript:avoid(0)">Book Management</a></li>

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
                                    <th>Book Name</th>
                                    <th>Book Author Name</th>
                                    <th>Book publication Name </th>
                                    <th>Book Purchase Date</th>
                                    <th>Book Price </th>
                                    <th>Book Quantity</th>
                                    <th>Book Available</th>
                                    <th>User Name</th>
                                    <th>Book Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `book`";
                                $query = mysqli_query($conn, $sql);
                                while ($assoc = mysqli_fetch_assoc($query)) {
                                    ?>

                                    <tr>
                                        <td><?= ucfirst($assoc['book_name']) ?></td>
                                        <td><?= ucfirst($assoc['book_author']) ?></td>
                                        <td><?= ucfirst($assoc['book_pub_name']) ?></td>
                                        <td><?= date('d-M-Y', strtotime($assoc['book_purchase_date'])) ?></td>
                                        <td><?= ucfirst($assoc['book_price']) ?></td>
                                        <td><?= ucfirst($assoc['book_quenty']) ?></td>
                                        <td><?= ucfirst($assoc['abailavily_quenty']) ?></td>
                                        <td><?= ucfirst($assoc['user_name']) ?></td>
                                        <td><img src="../assets/upload/book//<?= $assoc['book_image'] ?>" alt="studentpicture" style="width: 50px;" /></td>
                                        <td>

                                            <a href="javascript:avoid(0)" class="btn btn-primary"  data-toggle="modal" data-target="#book-<?= $assoc['id'] ?>"><i class="fa fa-eye"></i></a>
                                            <a href="javascript:avoid(0)" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $assoc['id'] ?>"><i class="fa fa-pencil"></i></a>
                                            <a href="delete.php?delete-book=<?= base64_encode($assoc['id']) ?>" class="btn btn-danger" onclick="return confirm('Are You sure..?')"><i class="fa fa-trash-o"></i></a>
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
<!--Modal view-->
<?php
$sql = "SELECT * FROM `book`";
$query = mysqli_query($conn, $sql);
while ($assoc = mysqli_fetch_assoc($query)) {
    ?>
    <div class="modal fade" id="book-<?= $assoc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-primary">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped table-hover table-bordered">
                        <tr>
                            <td>Book Name</td>
                            <td><?= $assoc['book_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Book Author Name</td>
                            <td><?= $assoc['book_author'] ?></td>
                        </tr>
                        <tr>
                            <td>Book publication Name</td>
                            <td><?= $assoc['book_pub_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Book Purchase Date</td>
                            <td><?= date('d-M-Y', strtotime($assoc['book_purchase_date'])) ?></td>
                        </tr>
                        <tr>
                            <td>Book Price</td>
                            <td><?= $assoc['book_price'] ?></td>
                        </tr>
                        <tr>
                            <td>Book Quantity</td>
                            <td><?= $assoc['book_quenty'] ?></td>
                        </tr>
                        <tr>
                            <td>Book Availabl</td>
                            <td><?= $assoc['abailavily_quenty'] ?></td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td><?= $assoc['user_name'] ?></td>
                        </tr>
                        <tr>
                            <td>Book Image</td>
                            <td><img src="../assets/upload/book//<?= $assoc['book_image'] ?>" alt="studentpicture" style="width: 50px;" /></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php }
?>
<!--update modal-->
<?php
$sql = "SELECT * FROM `book`";
$query = mysqli_query($conn, $sql);
while ($assoc = mysqli_fetch_assoc($query)) {
    $id = $assoc['id'];
    $sql_update = "SELECT * FROM `book` where id = '$id'";
    $query_update = mysqli_query($conn, $sql_update);
    $assoc_update = mysqli_fetch_assoc($query_update);
    ?>
    <div class="modal fade" id="book-update-<?= $assoc['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-warning">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                    <h4 class="modal-title" id="modal-warning-label"><i class="fa fa-book"></i>Book Update Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($errors)) {
                                        foreach ($errors as $error) {
                                            ?>
                                            <div class="alert alert-danger">
                                                <?= $error ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <form action="" method="POST">
                                        <input type="hidden" name="id" value="<?= $assoc_update['id'] ?>"  />
                                        <div class="form-group">
                                            <label for="name">Book Name</label>
                                            <input type="text" class="form-control" id="name" placeholder="Book Name" name="book_name" value="<?= $assoc_update['book_name'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="book_author">Book Author Name</label>
                                            <input type="text" class="form-control" id="book_author" placeholder="Book Author Name" name="book_author_name" value="<?= $assoc_update['book_author'] ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publication_name">Book publication Name</label>
                                            <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name" value="<?= $assoc_update['book_pub_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Book Purchase Date</label>
                                            <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date" value="<?= $assoc_update['book_purchase_date'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Book Price</label>
                                            <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price" value="<?= $assoc_update['book_price'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_quantity">Book Quantity</label>
                                            <input type="number" class="form-control" id="book_quantity" placeholder="Book Quantity" name="book_quantity" value="<?= $assoc_update['book_quenty'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_available">Book Available</label>
                                            <input type="number" class="form-control" id="book_available" placeholder="Book Available" name="book_available" value="<?= $assoc_update['abailavily_quenty'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <button name="update_button" type="submit" class="btn btn-warning">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
?>
<?php
$errors = [];
if (isset($_POST['update_button'])) {

    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $book_available = $_POST['book_available'];


    if (empty($book_name)) {
        $errors [] = 'Book Name Feild Is Required..!';
    }
    if (empty($book_author_name)) {
        $errors [] = 'book_author Name Feild Is Required..!';
    }
    if (empty($book_publication_name)) {
        $errors [] = 'book publication Name Feild Is Required..!';
    }
    if (empty($book_purchase_date)) {
        $errors [] = 'Book Purchase date Feild Is Required..!';
    }
    if (empty($book_price)) {
        $errors ['name'] = 'Book price Feild Is Required..!';
    }
    if (empty($book_quantity)) {
        $errors ['name'] = 'Book quantity Feild Is Required..!';
    }
    if (empty($book_available)) {
        $errors ['name'] = 'Book available Feild Is Required..!';
    }
    if (!$errors) {


        $sql = "UPDATE  book SET 
                                book_name = '$book_name',
                                book_author = '$book_author_name',
                                book_pub_name = '$book_publication_name',
                                book_purchase_date = '$book_purchase_date',
                                book_price = '$book_price',
                                book_quenty = '$book_quantity',
                                abailavily_quenty = '$book_available'
                                where 
                                id = '$id'
                                ";

        $query = mysqli_query($conn, $sql);
        if ($query) {
            header("Location:book_manage.php");
        }
    }
}
?>
<?php require_once './footer.php'; ?>
<?php
require_once './header.php';
require_once '../database.php';

$errors = [];
if (isset($_POST['book_submit'])) {

    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_quantity = $_POST['book_quantity'];
    $book_available = $_POST['book_available'];
    $libriyan_username = $_SESSION['librayian_username'];
  
  
    $pictureofbook = $_FILES['pictureofbook'];
    $picture_name = $pictureofbook['name'];
    $picture_tmp = $pictureofbook['tmp_name'];
    $picture_size = $pictureofbook['size'];

    $explode = explode(".", $picture_name);
    $extention = strtolower(end($explode));
    $extention_list = ['jpg', 'jpeg', 'png'];

    if (!in_array($extention, $extention_list)) {
        $errors ['extention'] = 'Please upload image with jpg/jpeg/png Formate';
    }
    if ($picture_size > 1024 * 1024 * 3) {
        $errors ['size'] = 'Please upload image within 3Mb';
    }

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
          //$success = 'Book Entry success';
       
         
        $newpicturename = $book_name . '-' . time() . '-' . '.' . $extention;

        $sql = "INSERT INTO book (book_name, book_author,book_pub_name, book_purchase_date, book_price, book_quenty, abailavily_quenty,user_name,book_image)
                 VALUES ('$book_name','$book_author_name','$book_publication_name','$book_purchase_date','$book_price','$book_quantity','$book_available','$libriyan_username','$newpicturename')";
        
        $query = mysqli_query($conn, $sql);
        if($query){
            move_uploaded_file($picture_tmp,"../assets/upload/book/" .$newpicturename);
            $success = 'Book Entry success';
        }
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
                <li><a href="javascript:avoid(0)">Book Add</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-8 col-sm-offset-2 ">
            <h4 class="section-subtitle"><b>Book Add</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php
                            if (isset($errors)) {
                                foreach ($errors as $error) {
                                    ?>
                                    <div class="alert alert-danger text-center">
                                        <?= $error ?>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <?php 
                                if(isset($success)){
                                    ?>
                            <div class="alert alert-success text-center"><?=$success?></div>
                            <?php
                                }
                            ?>
                            <form class="form-horizontal form-stripe" action="" method="POST" enctype="multipart/form-data">
                                <br /><br />
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Book Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" placeholder="Book Name" name="book_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_author" class="col-sm-2 control-label">Book Author Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="book_author" placeholder="Book Author Name" name="book_author_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_publication_name" class="col-sm-2 control-label">Book publication Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="book_publication_name" placeholder="Book Publication Name" name="book_publication_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_purchase_date" class="col-sm-2 control-label">Book Purchase Date</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="book_purchase_date" placeholder="Book Purchase Date" name="book_purchase_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_price" class="col-sm-2 control-label">Book Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_quantity" class="col-sm-2 control-label">Book Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="book_quantity" placeholder="Book Quantity" name="book_quantity">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_available" class="col-sm-2 control-label">Book Available</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="book_available" placeholder="Book Available" name="book_available">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="book_image" class="col-sm-2 control-label">Book Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" class="form-control" id="book_image" name="pictureofbook" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" value="Save" name="book_submit" class="btn btn-primary" />
                                    </div>
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
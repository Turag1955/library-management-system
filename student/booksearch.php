<?php require_once './header.php'; ?>
<div class="content">
    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><i class="" aria-hidden="true"></i><a href="#">book list</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-content">
                    <form action="" method="POST" class="">
                        <div class="row pt-md">
                            <div class="form-group col-sm-9 col-lg-10">
                                <span class="input-with-icon">
                                    <input type="text" class="form-control" id="lefticon" placeholder="Search" name="search_name" required="">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                            <div class="form-group col-sm-3  col-lg-2 ">
                                <button type="submit" class="btn btn-primary btn-block" name="search">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        if (isset($_POST['search'])) {
        $search = $_POST['search_name'];
        ?>
        <div class="col-sm-12 ">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <?php
                        $qery = mysqli_query($conn, "SELECT * FROM `book` WHERE `book_name` LIKE '%$search%'");
                        if(mysqli_num_rows($qery) > 0){
                        while ($assoc = mysqli_fetch_assoc($qery)) {
                        ?>
                        <div class="col-sm-3">
                            <img src="../assets/upload/book/<?= $assoc['book_image'] ?>"  alt="" style="width: 100px; height: 150px;" />
                            <h4 class=""><?= $assoc['book_name'] ?></h4>
                            <h6>Available Quantity: <?= $assoc['abailavily_quenty'] ?></h6>
                            <hr />
                        </div>
                        <?php
                        }
                        } else {
                            echo '<span class="text-danger">Book not found</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
      
        } else {
        ?>
        <div class="col-sm-12 ">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <?php
                        $qery = mysqli_query($conn, "SELECT * FROM `book`");
                        while ($assoc = mysqli_fetch_assoc($qery)) {
                            ?>
                            <div class="col-sm-3">
                                <img src="../assets/upload/book/<?= $assoc['book_image'] ?>"  alt="" style="width: 100px; height: 150px;" />
                                <h4 class=""><?= $assoc['book_name'] ?></h4>
                                <h6>Available Quantity: <?= $assoc['abailavily_quenty'] ?></h6>
                                <hr />
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>


        </div>

        <?php
        }
        ?>


    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>
<?php require_once './footer.php'; ?>
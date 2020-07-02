<?php

require_once '../database.php';

$id = $_GET['id'];


if ($id == 3) {
    ?>
    <script type="text/javascript">
       alert('Administer Not InActive');
       javascript:history.go(-1);
        </script>
    <?php

   
} else {
    $update = "UPDATE `librariyan` SET `librariyan_status`= '1' where `id` = '$id'";
    $query = mysqli_query($conn, $update);
    if ($query) {
        header("Location:subadmin_manage.php");
    }
}


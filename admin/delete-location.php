<?php include('../config/constantsAdmin.php'); ?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM tbl_location WHERE id=$id";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1){
        $rows = mysqli_fetch_assoc($res);
        
        $id = $rows['id'];
        $name = $rows['name'];
        $active = $rows['active'];

        $sql2 = "DELETE FROM tbl_location WHERE id=$id";
        $res2 = mysqli_query($conn, $sql2);

        if($res2==TRUE){
            $_SESSION['delete-location'] = "<div class='success'>Location Deleted Succesfully</div>";
            header("location:".SITEURL."admin/manage-location.php");
        }else{
            $_SESSION['delete-location'] = "<div class='fail'>Failed to Delete Location</div>";
            header("location:".SITEURL."admin/manage-location.php");
        }
    }else{
        header("location:".SITEURL."admin/manage-location.php");
    }
}else{
    header("location:".SITEURL."admin/manage-location.php");
}
?>
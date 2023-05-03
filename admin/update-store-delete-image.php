<?php include('../config/constantsAdmin.php'); ?>

<?php
    if(isset($_GET['image_name'])&&isset($_GET['id'])){
        echo $id = $_GET['id'];
        echo $image_name = $_GET['image_name'];
        
        $sql = "SELECT * FROM tbl_store WHERE id=$id AND image_name='$image_name'";
        $res = mysqli_query($conn, $sql);

        $count = mysqli_num_rows($res);
        if($count == 1){
            $rows = mysqli_fetch_assoc($res);

            $id = $rows['id'];
            $image_name = $rows['image_name'];
            
            //Delete the Image from Storage
            $delete_path = "../images/store/".$image_name;

            $remove_image = unlink($delete_path);

            if($remove_image==FALSE){
                $_SESSION['delete-image'] = "<div class='fail'>Failed to delete image file. Try Again</div>";
                header('location:'.SITEURL.'admin/update-store.php?id='.$id);
                die();
            }else{
                $image_name = "";
            }


            //Change the Database's 'image_name' for this id to ""
            $sql2 = "UPDATE tbl_store SET
            image_name = '$image_name'
            WHERE id = $id
            ";

            $res2 = mysqli_query($conn, $sql2);

            if($res2==TRUE){
                $_SESSION['delete-image'] = "<div class='success'>Image deleted succesful.</div>";
                header('location:'.SITEURL.'admin/update-store.php?id='.$id);

            }else{
                $_SESSION['delete-image'] = "<div class='fail'>Failed to delete image from database. Try Again</div>";
                header('location:'.SITEURL.'admin/update-store.php?id='.$id);
            }


        }else{
            header('location:'.SITEURL.'admin/update-store.php?id='.$id);
        }

    }else{
        header('location:'.SITEURL.'admin/update-store.php?id='.$id);
    }
?>
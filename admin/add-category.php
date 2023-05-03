<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="" placeholder="E.g. College" required>
                    </td>
                </tr>
                <tr>
                    <td>Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Featured: </td>
                    <td>
                        <input type="radio" name="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active: </td>
                    <td>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="Add Category" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        //print_r($_FILES['image']);
        if(!isset($_POST['featured'])){
            $featured = "No";
        }else{
            $featured = $_POST['featured'];
        }

        if(!isset($_POST['active'])){
            $active = "No";
        }else{
            $active = $_POST['active'];
        }

        
        if(!isset($_FILES['image']['name'])){
            $image_name = "";
        }else{
            $image_name = $_FILES['image']['name'];
        }

        if($image_name!=""){
            $ext = end(explode('.',$image_name));

            echo $image_name = "Category_Image_".rand(0000, 9999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = '../images/category/'.$image_name;

            $upload = move_uploaded_file($source_path, $dest_path);

            if($upload==FALSE){
                $_SESSION['add-category'] = "<div class='fail'>Image Upload Failed.</div>";
                header("location:".SITEURL."admin/manage-category.php");
                die();
            }
        }

        $sql = "INSERT INTO tbl_category SET
        title='$title',
        image_name='$image_name',
        featured='$featured',
        active='$active'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['add-category'] = "<div class='success'>Category Added Succesfully</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }else{
            $_SESSION['add-category'] = "<div class='fail'>Failed Adding Category</div>";
            header("location:".SITEURL."admin/manage-category.php");
        }

        

    }
?>

<?php include('partials/footer.php'); ?>
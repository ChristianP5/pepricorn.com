<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Featured Image</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Title: </td>
                    <td>
                        <input type="text" name="title" id="">
                    </td>
                </tr>
                <tr>
                    <td>Image: </td>
                    <td>
                        <input type="file" name="image" id="">
                    </td>
                </tr>
                <tr>
                    <td>Section Name: </td>
                    <td>
                        <input type="text" name="section-name" id="">
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
                        <input type="submit" value="Add Featured Image" name='submit' class='btn-secondary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit'])){
        $title = $_POST['title'];

        if(!isset($_POST['active'])){
            $active = "No";
        }else{
            $active = $_POST['active'];
        }

        if(!isset($_POST['section-name'])){
            $section_name = "UNSET";
        }else{
            $section_name = $_POST['section-name'];
        }

        $image_name = $_FILES['image']['name'];
        if($image_name != ""){
            //Image added
            $ext = end(explode('.', $image_name));

            $image_name = "Featured-Image-".rand(0000,9999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = '../images/featured/'.$image_name;
            $upload = move_uploaded_file($source_path, $dest_path);

            if($upload==FALSE){
                $_SESSION['add-featured-images'] = "<div class='fail'>Failed to upload image.</div>";
                header("location:".SITEURL."admin/manage-featured-images.php");
                die();
            }

        }else{
            $image_name == "";
        }

        $sql = "INSERT INTO tbl_featuredimages SET
        title = '$title',
        image_name = '$image_name',
        active = '$active',
        section_name = '$section_name'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE){
            $_SESSION['add-featured-images'] = "<div class='success'>Featured Image added succesfully.</div>";
            header("location:".SITEURL."admin/manage-featured-images.php");  
        }else{
            $_SESSION['add-featured-images'] = "<div class='fail'>Failed to add featured image.</div>";
            header("location:".SITEURL."admin/manage-featured-images.php"); 
        }

    }
?>
<?php include('partials/footer.php');?>
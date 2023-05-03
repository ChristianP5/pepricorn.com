<?php
//Get User info based on $_SESSION['logged-in-user-id'];
if(isset($_SESSION['logged-in-user-id'])){
    $user_id = $_SESSION['logged-in-user-id'];

    //Get User info from user database
    $user_sql = "SELECT * FROM tbl_user WHERE id=$user_id";
    $user_res = mysqli_query($conn, $user_sql);

    $user_count = mysqli_num_rows($user_res);
    if($user_count==1){
        $user_rows = mysqli_fetch_assoc($user_res);
        
        $user_id = $user_rows['id'];
        $user_username = $user_rows['username'];
        $user_fullname = $user_rows['full_name'];
        $user_address = $user_rows['address'];
        $user_contact = $user_rows['contact'];
        $user_email = $user_rows['email'];
        $user_isAdmin = $user_rows['isAdmin'];
        $user_image_name = $user_rows['image_name'];
        $user_isSeller = $user_rows['isSeller'];
        $user_dob = $user_rows['DoB'];

        if($user_image_name == ""){
            $user_image_name = "default.png";
        }

    }else{
        echo "Error. User is not availbale!";
    }
}
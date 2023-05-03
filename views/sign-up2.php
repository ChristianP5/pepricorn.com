<?php include('../config/constantsViewer.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style src="../admin/css/admin.css"></style>
  </head>
  <body class="bg-gray-50 overflow-hidden">
    <section class="bg-whtie" data-aos="fade-up">
      <div
        class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"
      >
        <a
          href="../views/hero.php"
          class="flex items-center mb-6 text-2xl text-blue-600 font-bold"
        >
          <span class="text-gray-700">P</span>epricorn.com
        </a>
        <div
          class="w-full bg-white rounded-lg shadow-xl border-2 border-gray-200 md:mt-0 sm:max-w-md xl:p-0"
        >
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
            <h1
              class="text-xl font-bold leading-tight tracking-tight text-gray-700 md:text-2xl"
            >
              Sign up account
            </h1>
            <br>
            <?php
            if(isset($_SESSION['not-match'])){
              echo $_SESSION['not-match'];
              unset($_SESSION['not-match']);
            }
            ?>
            <div>
              <form action="" method="post">
              <table>
              <tr>
                <td>
                <label for="Full Name" class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
                  <input type="Name" name="fullname" id="Name" class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5" placeholder="John" required="" value="<?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname']; }?>">
                </td>
                <td>
                <label for="Username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
                  <input type="Name" name="username" id="Name" class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5" placeholder="User5555" required="" value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username']; }?>">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <label for="dob" class="block mb-2 text-sm font-medium text-gray-700">Date of Birth</label>
                  <input type="date" name="dob" id="dob" class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5" required="" value="<?php if(isset($_SESSION['dob'])){ echo $_SESSION['dob']; }?>">
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <label
                      for="email"
                      class="block mb-2 text-sm font-medium text-gray-700"
                      >Your email</label
                    >
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5"
                      placeholder="name@company.com"
                      required="" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>"
                    />
                </td>
              </tr>
              <tr>
                <td colspan="2">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="contact" id="phone" class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5" placeholder="+62-0817-555-3212" required="" value="<?php if(isset($_SESSION['contact'])){ echo $_SESSION['contact']; }?>">
                    
                </td>
              </tr>
              <tr>
                <td>
                <label
                      for="password"
                      class="block mb-2 text-sm font-medium text-gray-700"
                      >Password</label
                    >
                    <input
                      type="password"
                      name="password"
                      id="password"
                      placeholder="••••••••"
                      class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5"
                      required=""
                    />
                </td> 
                <td>
                <label
                      for="password"
                      class="block mb-2 text-sm font-medium text-gray-700"
                      >Confirm Password</label
                    >
                    <input
                      type="password"
                      name="confirm-password"
                      id="password"
                      
                      class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5"
                      required=""
                    />
                </td>  
              </tr>
              <tr>
                <td colspan="2">
                  <label for="Address" class="block mb-2 text-sm font-medium text-gray-700">Address</label>
                  <input type="Address" name="address" id="Address" class="bg-gray-50 border border-gray-300 text-gray-700 sm:text-sm rounded-lg focus:outline-none focus:border focus:border-blue-600 block w-full p-2.5" placeholder="The Great Road" required="" value="<?php if(isset($_SESSION['address'])){ echo $_SESSION['address']; }?>">
                </td>
              </tr>
              <tr>
                <td>
                  <input type="submit" name = 'submit' value="Create Account" class="block text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 transition duration-250 ease-in text-center">
                </td>
              </tr>
              </table>
              </form>
              <?php
              if(isset($_POST['submit'])){
                //Get Data from forms
                $username = $_POST['username'];
                $full_name = $_POST['fullname'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm-password'];
                $address = $_POST['address'];
                $contact = $_POST['contact'];
                $email = $_POST['email'];
                $DoB = $_POST['dob'];
                
                //Initialize Values
                $active = "Yes";
                $isAdmin = "No";
                $isSeller = "No";
                $image_name = "";

                //Check if Password Matches Confirm Password
                if($password!=$confirm_password){
                  //Save Data before Reset
                  $_SESSION['fullname'] = $full_name;
                  $_SESSION['username'] = $username;
                  $_SESSION['address'] = $address;
                  $_SESSION['contact'] = $contact;
                  $_SESSION['email'] = $email;
                  $_SESSION['dob'] = $DoB;

                  //Reset
                  $_SESSION['not-match'] = "<div class='fail'>Password and Confirm Password does not match!</div>";
                  if(headers_sent()){
                    echo '<script type="text/javascript">window.location.href="sign-up2.php";</script>';
                  }else{
                      header("location:../views/sign-up2.php");
                  }
                  die();

                }else{
                  //Password and Confirm Password matches
                  $password = md5($password);
                  $active = 'Yes';
                  $isAdmin = 'No';
                  $isSeller = 'No';

                  //Remove saved data
                  unset($_SESSION['fullname']);
                  unset($_SESSION['username']);
                  unset($_SESSION['address']);
                  unset($_SESSION['contact']);
                  unset($_SESSION['email']);
                  unset($_SESSION['dob']);

                  //Add user to database
                  $sql = "INSERT INTO tbl_user SET
                  username = '$username',
                  full_name = '$full_name',
                  active = '$active',
                  password = '$password',
                  address = '$address',
                  contact = '$contact',
                  email = '$email',
                  isAdmin = '$isAdmin',
                  isSeller= '$isSeller',
                  DoB = '$DoB'";

                  $res = mysqli_query($conn, $sql);

                  if($res==FALSE){
                    if(headers_sent()){
                      $_SESSION['add-user'] = "<div class='fail'>Failed to add user to database</div>";
                      echo '<script type="text/javascript">window.location.href="sign-up2.php";</script>';
                    }else{
                        header("location:../views/sign-up2.php");
                    }
                    die();
                  }


                  //Set as logged in
                  $sql_login = "SELECT * FROM tbl_user WHERE username = '$username'";

                  $res_login = mysqli_query($conn, $sql_login);

                  $rows_login = mysqli_fetch_assoc($res_login);
                  $login_id = $rows_login['id'];

                  $_SESSION['logged-in-user-id'] = $login_id;

                  
                  //Redirect to Hero page
                  if(headers_sent()){
                    echo '<script type="text/javascript">window.location.href="hero.php";</script>';
                  }else{
                      header("location:../views/hero.php");
                  }
                }
              }
              ?>
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
  </body>
</html>

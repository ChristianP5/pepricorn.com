<?php include('partials/head.php') ?>
<body class="text-xs">
  <?php 
        if(isset($_SESSION['logged-in-user-id'])){
            include('partials/navbar-registered.php'); 
        }else{
            include('partials/navbar.php');
        }
        ?>
  <div class="lg:h-screen mb-32 px-4 md:px-8 lg:px-16" id="mainsection">
    <main class="mt-20 lg:mt-52" data-aos="fade-up">
      <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
          <li class="inline-flex items-center">
            <a
              href="hero.php"
              class="inline-flex items-center lg:text-sm font-medium text-gray-700 hover:text-blue-600 transition duration-250 ease-in"
            >
              <svg
                aria-hidden="true"
                class="w-4 h-4 mr-2"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"
                ></path>
              </svg>
              Home
            </a>
          </li>
          <li>
            <div class="flex items-center">
              <svg
                aria-hidden="true"
                class="w-6 h-6 text-gray-400"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <a
                href="#"
                class="ml-1 lg:text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 transition duration-250 ease-in"
                >My Account</a
              >
            </div>
          </li>
        </ol>
      </nav>
    </main>

    <main class="mt-10">
      <div class="flex">
        <div class="w-1/6">
          <h1 class="text-gray-700 font-bold text-3xl">My Account</h1>
          <div class="flex flex-col mt-10">
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <p>My details</p>
            </div>
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <p>My address book</p>
            </div>
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <p>My orders</p>
            </div>
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <p>My newsletters</p>
            </div>
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <p>Account settings</p>
            </div>
            <div
              class="flex gap-x-2 mt-2 py-1 px-2 font-semibold hover:bg-blue-100 hover:text-blue-600 transition duration-250 ease-in"
            >
              <a href="logout.php"><p>Logout</p></a>
            </div>
          </div>
        </div>

        <div
          class="bg-white shadow-xl mt-10 w-full border border-gray-200 rounded-lg py-10 px-8 w-5/6"
        >
          <h1 class="text-gray-700 font-bold text-3xl">My details</h1>
          <p class="text-gray-700 font-semibold text-base mt-8">
            Personal Information
          </p>
          <form action="" method="post">
          <div class="w-full border border-gray-200 mt-2"></div>
          <div class="flex gap-x-8 mt-4">
            <img
              src="../images/user/<?php echo $user_image_name;?>"
              class="rounded-md object-cover w-1/3 aspect-square"
            />
            <div class="w-2/3">
              <div>
                <div class="flex gap-x-8">
                  <div class="w-full">
                    <p class="font-bold mb-2">FULL NAME</p>
                    <input
                      type="text"
                      class="w-full rounded-md border border-gray-300 py-2 px-2 bg-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                      name="fullname"
                      value="<?php echo $user_fullname;?>"
                    />
                  </div>
                  <div class="w-full">
                    <p class="font-bold mb-2">LAST NAME</p>
                    <input
                      type="text"
                      class="w-full rounded-md border border-gray-300 py-2 px-2 bg-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                      placeholder="Last"
                    />
                  </div>
                </div>
              </div>
              <div class="mt-8 mr-8">
                <p class="font-bold mb-2">BIRTH DATE</p>
                <input
                  type="date"
                  class="w-1/2 rounded-md border border-gray-300 py-2 px-2 bg-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                  name="dob"
                  value="<?php echo $user_dob;?>"
                  />
              </div>
              <div class="mt-8 mb-4 w-1/2 pr-4">
                <p class="font-bold mb-2">PHONE NUMBER</p>
                <input
                  type="text"
                  class="w-full mb-2 rounded-md border border-gray-300 py-2 px-2 bg-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                  name="contact"
                  value="<?php echo $user_contact;?>"
                />
                <p>Keep 9-digit format with not spaces and dashes</p>
              </div>
              <input type="submit" value="SAVE" name="submit" class="text-blue-600 border-2 border-blue-600 px-12 py-2 rounded-lg hover:bg-blue-600 hover:text-white transition duration-250 ease-in font-bold"
                id="sign-in">
            </div>
          </div>

          <p class="text-gray-700 font-semibold text-base mt-8">
            E-mail address
          </p>
          <div class="w-full border border-gray-200 mt-2"></div>
          <div class="flex gap-x-8 mt-4">
            <p class="w-1/3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint cum
              deserunt ipsam, ipsa molestiae quasi. Ducimus blanditiis sed eum
              quae, mollitia obcaecati sequi! Animi quas voluptate ab nobis
              voluptas quo!
            </p>
            <div class="w-1/3">
              <p class="font-bold mb-2">E-MAIL ADRESS</p>
              <input
                type="text"
                class="w-full rounded-md border border-gray-300 py-2 px-2 bg-gray-100 focus:outline-none lg:focus:border lg:focus:border-blue-600"
                name="email"
                value="<?php echo $user_email;?>"
              />
              <input type="hidden" name="id" value="<?php echo $user_id;?>">
            </div>
          </div>
        </form>

        <?php
        if(isset($_POST['submit'])){
          //Get data from forms
          $forms_id = $_POST['id'];
          $forms_fullname = $_POST['fullname'];
          $forms_dob = $_POST['dob'];
          $forms_contact = $_POST['contact'];
          $forms_email = $_POST['email'];

          //Update Database
          $update_sql = "UPDATE tbl_user SET
          full_name = '$forms_fullname',
          DoB = '$forms_dob',
          contact = '$forms_contact',
          email = '$forms_email'
          WHERE id = $forms_id";

          $update_res = mysqli_query($conn, $update_sql);
          if($update_res==TRUE){
            $_SESSION['update-user-info'] = "<div class='success'>User info updated succesdfully</div>";
          }else{
            $_SESSION['update-user-info'] = "<div class='fail'>Failed to update user info.</div>";
          }
          //Redirect to Profile page
          if(headers_sent()){
            echo '<script type="text/javascript">window.location.href="../views/profile.php?id=$user_id";</script>';
          }else{
              header("location:../views/profile.php?id=$user_id");
          }
        }
        ?>
        </div>
      </div>
    </main>
  </div>
  <?php include('partials/footer.php') ?>
</body>

<?php include('partials/head.php') ?>

  <body class="text-xs">

    <div class="mb-16 overflow-hidden px-4 md:px-8 lg:px-16" id="mainsection">
    <?php 
        if(isset($_SESSION['logged-in-user-id'])){
            include('partials/navbar-registered.php'); 
        }else{
            include('partials/navbar.php');
        }
        ?>
    </div>

    <?php
  
  
  if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
  }else{
    $keyword = $_POST['search'];
  }

  //Manage SQL Query by filter
  if(isset($_GET['sort']) && $_GET['sort']=="price_asc"){
    $search_result_sql = "SELECT *, (price - (price * discount/100)) AS final_price FROM tbl_product
    WHERE active='Yes' AND (name LIKE '%$keyword%' OR description LIKE '%$keyword%') ORDER BY final_price ASC
    ";
  }else if(isset($_GET['sort']) && $_GET['sort']=="price_desc"){
    $search_result_sql = "SELECT *, (price - (price * discount/100)) AS final_price FROM tbl_product
    WHERE active='Yes' AND (name LIKE '%$keyword%' OR description LIKE '%$keyword%') ORDER BY final_price DESC
    ";
  }else{
    $search_result_sql = "SELECT * FROM tbl_product WHERE active='Yes' AND name LIKE '%$keyword%' OR description LIKE '%$keyword$%'";
  }

  $search_result_res = mysqli_query($conn, $search_result_sql);

  $search_result_count = mysqli_num_rows($search_result_res);
  ?>
  <p class="mt-20 lg:mt-56 px-4 sm:px-8 lg:px-16">Menampilkan 1-* barang dari total <b><?php echo $search_result_count; ?></b> untuk <span class="font-bold"><?php echo $keyword;?></span></p>
  <div class="lg:flex lg:gap-x-8 mt-6 lg:items-start px-4 sm:px-8 lg:px-16">
      <div class="text-base w-1/6 font-bold text-gray-600 hidden lg:block" style="z-index: 1;">
        <p>Filter</p>
        <div class="bg-white rounded-lg border border-gray-200 mt-2 shadow-md text-sm ">
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer" id="category-dropdown">
            <p>Sort By Price</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div id="category-dropdown-menu" class="hidden bg-white py-2 transition-all max-h-0 overflow-hidden">
            <a href="../views/search.php?sort=price_asc&keyword=<?php echo $keyword;?>" class="block px-4 py-2 hover:bg-gray-100">Ascending</a>
            <a href="../views/search.php?sort=price_desc&keyword=<?php echo $keyword;?>" class="block px-4 py-2 hover:bg-gray-100">Descending</a>
            <a href="../views/search.php?keyword=<?php echo $keyword;?>" class="block px-4 py-2 hover:bg-gray-100">Default</a>
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>

          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
          <div class="flex justify-between items-center py-2 px-3 cursor-pointer">
            <p>Category</p>
            <img src="../public/img/down-arrow.png" class="w-3">
          </div>
          <div class="w-full border-b border-gray-300 mt-2"></div>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3 lg:w-5/6 lg:grid-cols-5">
        
  <?php
  if(isset($_SESSION['keyword'])){
    unset($_SESSION['keyword']);
  }
  if($search_result_count > 0){
    
    while($search_result_rows = mysqli_fetch_assoc($search_result_res)){
      $search_result_product_id = $search_result_rows['id'];
      $search_result_product_name = $search_result_rows['name'];
      $search_result_product_price = $search_result_rows['price'];
      $search_result_product_rating = $search_result_rows['rating'];
      $search_result_product_stock = $search_result_rows['stock'];
      $search_result_product_active = $search_result_rows['active'];
      $search_result_product_sold = $search_result_rows['sold'];
      $search_result_product_featured = $search_result_rows['featured'];
      $search_result_product_description = $search_result_rows['description'];
      $search_result_product_store_id = $search_result_rows['store_id'];
      $search_result_product_discount = $search_result_rows['discount'];

      //Get the Store Data from the Product's Store_id
      $get_store_data_sql = "SELECT * FROM tbl_store WHERE id=$search_result_product_store_id";
      $get_store_data_res = mysqli_query($conn, $get_store_data_sql);

      $get_store_data_count = mysqli_num_rows($get_store_data_res);
      if($get_store_data_count == 1){
        $get_store_data_rows = mysqli_fetch_assoc($get_store_data_res);
        
        $get_store_data_location_id = $get_store_data_rows['location_id'];

        //Get the Location Data from the Store's Location_id
        $get_location_data_sql = "SELECT * FROM tbl_location WHERE id=$get_store_data_location_id";
        $get_location_data_res = mysqli_query($conn, $get_location_data_sql);

        $get_location_data_count = mysqli_num_rows($get_location_data_res);
        if($get_location_data_count == 1){
          $get_location_data_rows = mysqli_fetch_assoc($get_location_data_res);

          $get_location_data_name = $get_location_data_rows['name'];

          $search_result_product_location_name = $get_location_data_name;
        }else{
          $search_result_product_location_name = "NA";
        }
      }else{
        $search_result_product_location_name = "NA";
      }

      //Get the Images Data from the Product Images Table
      $search_result_product_images_sql = "SELECT * FROM tbl_product_images WHERE active='Yes' AND product_id = $search_result_product_id LIMIT 1";

      $search_result_product_images_res = mysqli_query($conn, $search_result_product_images_sql);
      $search_result_product_images_count = mysqli_num_rows($search_result_product_images_res);

      if($search_result_product_images_count==1){
        $search_result_product_images_rows = mysqli_fetch_assoc($search_result_product_images_res);

        $search_result_product_images_image_name = $search_result_product_images_rows['image_name'];

      }else{
        $search_result_product_images_image_name = "default.png";
      }

      ?>
      <a href="item.php?id=<?php echo $search_result_product_id;?>">
            <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full " data-aos="fade-up">
              <img src="../images/product/<?php echo $search_result_product_images_image_name;?>" class="min-w-full aspect-square">
              <p class="px-4 mt-2"><?php echo $search_result_product_name;?> </p>
              
              
              <?php
              //If item is discounted ot not
              if($search_result_product_discount>0 && $search_result_product_discount !=""){
                
                $search_result_discounted_price = $search_result_product_price - ($search_result_product_price * ($search_result_product_discount/100));
                ?>
                <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $search_result_discounted_price;?></p>
                <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs"><?php echo $search_result_product_discount;?>%</div>
                <p class="text-gray-500 strike line-through">Rp<?php echo $search_result_product_price;?></p>
              </div>
                <?php
              }else{
                ?>
                <p class="mt-1 px-4 font-bold text-sm">Rp<?php echo $search_result_product_price;?></p>
                <?php
              }
              ?>
              
              <p class="px-4 mt-1"><?php echo $search_result_product_location_name;?></p>
              <div class="flex items-center px-4 mt-1 gap-x-2">
                <img src="../public/img/star.png" class="w-4 h-4">
                <div class="flex items-center">
                  <p class="mr-2"><?php echo $search_result_product_rating;?></p>
                  <div class="border-l border-gray-700 h-4"></div>
                </div>
                <p>Sold <?php echo $search_result_product_sold;?></p>
              </div>
            </div>
          </a>
          <?php
    }
  }else{
    ?>
    <!-- Item Start -->
    <a href="item.php?id=<?php echo $search_result_product_id;?>">
          <div
            class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full"
            data-aos="fade-up">
            <img src="../public/img/Product/kahf2.png" class="min-w-full">
            <p class="px-4 mt-2">Kahf Humbling Forest Personal Care Set </p>
            <p class="mt-1 px-4 font-bold text-sm">Rp94.901</p>
            <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
              <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">22%</div>
              <p class="text-gray-500 strike line-through">Rp122.100</p>
            </div>
            <p class="px-4 mt-1">Tangerang</p>
            <div class="flex items-center px-4 mt-1 gap-x-2">
              <img src="img/star.png" class="w-4 h-4">
              <div class="flex items-center">
                <p class="mr-2">4.9</p>
                <div class="border-l border-gray-700 h-4"></div>
              </div>
              <p>Sold 3k+</p>
            </div>
          </div>
        </a>
        <!-- Item End -->
    <?php
  }
  ?>

    

    
        
        <div class="col-span-2 lg:col-span-5 mt-5 text-sm" data-aos="fade-up">
          <div class="lg:flex items-center justify-between">
            <div class="flex gap-x-2 items-center">
              <img src="https://assets.tokopedia.net/assets-tokopedia-lite/v2/zeus/kratos/90ab1b43.png" class="w-12">
              <p>Ada masalah saat cari barang? <span class="font-bold text-blue-600">Beri saran ke Pepricorn!</span></p>
            </div>
            <div class="flex gap-x-6 items-center font-semibold mt-4 lg:mt-0">
              <img src="../public/img/left-arrow.png" class="w-3">
              <div>
                <p class="text-blue-600">1</p>
                <div class="w-full border-b border-blue-600"></div>
              </div>
              <p>1</p>
              <p>1</p>
              <p>1</p>
              <p>1</p>
              <p>1</p>
              <p>1</p>
              <p>...</p>
              <p>242.906</p>
              <img src="../public/img/right-arrow.png" class="w-3">
            </div>
          </div>
        </div>
        <img src="https://images.tokopedia.net/img/WVCyGU/2023/4/4/5c396310-206b-4347-8dac-b71e9b60c657.jpg" class="col-span-2 lg:col-span-5 rounded-lg mt-5" data-aos="fade-up">
      </div>
    </div>

    <script>
      const dropdownButton2 = document.getElementById('category-dropdown');
      const dropdownMenu = document.getElementById('category-dropdown-menu');

      dropdownButton2.addEventListener('click', function () {
        dropdownMenu.classList.toggle('hidden');
        if (dropdownMenu.classList.contains('hidden')) {
          dropdownMenu.classList.remove('max-h-96');
        } else {
          dropdownMenu.classList.add('max-h-96');
        }
      });
    </script>


    <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />

    <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Enjoy the Ease of Online Selling on Pepricorn.com</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">Pepricorn.com is an e-commerce platform in Indonesia that offers
        a
        variety of products and has become the preferred marketplace for many Indonesians. With Pepricorn, online
        shopping has become more comfortable, secure, and efficient. You can choose from various features and payment
        methods to ensure a smooth shopping experience. These options include bank transfers using accounts from various
        banks, electronic money like OVO, and installment payments. Pepricorn's shopping system is integrated with
        several shipping services, allowing them to offer free shipping and enabling buyers to track the status of their
        purchases. Whether you're buying skincare products, beauty accessories, makeup, bath and body essentials, hair
        care products, or even fragrance, you can track your order's whereabouts to ensure safe delivery. Pepricorn's
        privacy policy protects your personal data and all transactions, ensuring that your information remains secure
        and not misused. Because of these features, Pepricorn.com provides a safe and convenient solution for online
        shopping.</p>
    </div>
    <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Shop for Original Products with Ease & Secure</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">With a user-friendly interface and efficient search filters, you
        can easily find the products you need and make secure online purchases with a variety of payment options.
        Pepricorn.com is committed to providing a safe and hassle-free shopping experience for its customers. The
        platform is equipped with advanced security measures to protect your personal and financial information during
        transactions. Additionally, their customer service team is always ready to assist you with any concerns or
        issues you may have.</p>
    </div>
    <div class="px-4 md:px-8 lg:px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Fast Delivery & Great Customer Service</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">One of the standout features of Pepricorn.com is their fast and
        reliable delivery service. With a wide network of shipping partners, they offer fast and efficient delivery
        options throughout Indonesia. You can track the progress of your order in real-time and rest assured that your
        purchases will be delivered to your doorstep safely and on time. In addition to their fast and reliable delivery
        service, Pepricorn.com also offers excellent customer support. If you have any questions or concerns about your
        order, you can easily reach out to their customer service team via phone or email. Their dedicated support team
        is available to assist you with any issues or inquiries you may have, ensuring a smooth and hassle-free shopping
        experience. With a commitment to quality, affordability, and customer satisfaction, Pepricorn.com is a trusted
        online retailer for original products in Indonesia. Shop with confidence knowing that you're getting authentic
        and high-quality products, backed by excellent customer support and a fast and reliable delivery service. Start
        browsing their website today to discover a wide range of products at affordable prices!</p>
    </div>

    <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />

    <section class="bg-white">
      <div class="px-4 md:px-8 lg:px-16 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <h2 class="mb-8 text-2xl lg:text-4xl tracking-tight font-extrabold text-blue-600" data-aos="fade-up">Frequently
          Asked
          Questions</h2>
        <div class="grid pt-8 text-left border-t border-gray-200 md:gap-16 md:grid-cols-2">
          <div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                What payment methods do you accept?
              </h3>
              <p class="text-gray-500">We accept a variety of payment methods for your convenience, including
                credit/debit cards, PayPal, Apple Pay, and Google Pay. You can select your preferred payment
                method during the checkout process. If you encounter any issues with payment, please contact our
                customer support team for assistance.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                How long will it take to receive my order?
              </h3>
              <p class="text-gray-500">Delivery times may vary depending on your location and the products you
                ordered. You can check the estimated delivery time for your order during the checkout process.
                Once your order has shipped, you will receive a tracking number via email or text message. You
                can track your order's progress using the tracking number provided. If you have any questions
                about your delivery, please contact our customer support team for assistance.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                Do you offer free shipping?
              </h3>
              <p class="text-gray-500">Yes, we offer free shipping on orders over a certain amount. The threshold
                for free shipping may vary depending on your location. You can check the free shipping threshold
                for your location on our website. If your order qualifies for free shipping, the option will be
                available during the checkout process.</p>
              <p class="text-gray-500">Feel free to <a href="#"
                  class="font-medium underline text-primary-600 hover:no-underline" target="_blank"
                  rel="noreferrer">contact us</a> and we'll help you out as soon as we can.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                Can I track my order?
              </h3>
              <p class="text-gray-500 ">Yes, you can track your order through the tracking information provided to
                you via email or by logging into your account on our website. If you have any issues with
                tracking your order, please contact our customer support team for assistance.</p>
              <p class="text-gray-500">Find out more information by <a href="#"
                  class="font-medium underline text-primary-600 hover:no-underline">order tracking</a>.</p>
            </div>
          </div>
          <div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                What is your return policy?
              </h3>
              <p class="text-gray-500">We offer a hassle-free return policy. If you're not satisfied with your
                purchase, you can return it within a certain timeframe for a refund or exchange. Please refer to
                our <a href="" class="font-medium underline text-primary-600 hover:no-underline">return
                  policy</a> for more details.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                Do you offer international shipping?
              </h3>
              <p class="text-gray-500">Yes, we offer international shipping to select countries. You can check if
                your country is eligible for international shipping during the checkout process. International
                shipping rates and delivery times may vary depending on your location. If you have any questions
                about international shipping, please contact our customer support team for assistance.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                Can I cancel my order?
              </h3>
              <p class="text-gray-500 ">You may be able to cancel your order before it ships. Please refer to our
                <a href="" class="font-medium underline text-primary-600 hover:no-underline">cancellation
                  policy</a> for more details.
              </p>
              <p class="text-gray-500 "> This is to ensure that the cancellation is properly processed and that
                you receive the appropriate refund if applicable. If you need to cancel your order, we recommend
                contacting our customer support team as soon as possible to minimize any delays or issues.</p>
            </div>
            <div class="mb-10" data-aos="fade-up">
              <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                    clip-rule="evenodd"></path>
                </svg>
                How can I contact customer support?
              </h3>
              <p class="text-gray-500">You can reach out to our customer support team by email or phone. Our
                contact information is available on our website under the "Contact Us" section. You can also
                submit a support ticket on our website, and our team will get back to you as soon as possible.
                For urgent matters, we recommend calling our customer support team directly.</p>
              <p class="text-gray-500">With that being said, feel free to use this website for your self care
                needs.</p>
              <p class="text-gray-500">Find out more information by <a href="#"
                  class="font-medium underline text-primary-600 hover:no-underline">reading the license</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
    <script src="../public/js/hero.js"></script>
    <?php include('partials/footer.php') ?>
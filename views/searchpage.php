<?php include('../views/partials/head.php');?>
<body class="text-xs">

<div class= "mb-16 overflow-hidden px-16" id="mainsection">
  <?php include('../views/partials/navbar.php');?>

         
    
  <main class="flex items-start mt-72 px-8">
        <div class="w-1/2 h-full">
          <a href="hero.html" class="font-bold text-xl"
            ><span class="text-blue-600"></span></a
          >

            </div>
          </div>
        </div>
        <img>
  <div class="grid grid-cols-5 gap-3 mt-4 px-16">

  <?php
  $keyword = $_POST['search'];
  echo "<div class='success'>Search Keyword is $keyword</div>";

  $search_result_sql = "SELECT * FROM tbl_product WHERE active='Yes' AND name LIKE '%$keyword%' OR description LIKE '%$keyword$%'";
  $search_result_res = mysqli_query($conn, $search_result_sql);

  $search_result_count = mysqli_num_rows($search_result_res);
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
            <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full" data-aos="fade-up">
              <img src="../images/product/<?php echo $search_result_product_images_image_name;?>" class="min-w-full">
              <p class="px-4 mt-2"><?php echo $search_result_product_name;?> </p>
              
              
              <?php
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
    <a href="item.html">
            <div class="bg-white hover:bg-gray-200 rounded-lg shadow-xl border-2 border-gray-200 overflow-hidden cursor-pointer pb-2 transition duration-250 ease-in text-sm h-full" data-aos="fade-up">
              <img src="img/product/kahf.jpg" class="min-w-full">
              <p class="px-4 mt-2"><?php echo $_POST['search'];?> </p>
              <p class="mt-1 px-4 font-bold text-sm">Rp108.450</p>
              <div class="flex px-4 py-1 items-center gap-x-1 mt-1">
                <div class="bg-red-200 rounded-md py-1 px-1 font-bold text-red-600 text-xs">25%</div>
                <p class="text-gray-500 strike line-through">Rp144.600</p>
              </div>
              <p class="px-4 mt-1">Tangerang</p>
              <div class="flex items-center px-4 mt-1 gap-x-2">
                <img src="img/star.png" class="w-4 h-4">
                <div class="flex items-center">
                  <p class="mr-2">4.9</p>
                  <div class="border-l border-gray-700 h-4"></div>
                </div>
                <p>Sold 1k+</p>
              </div>
            </div>
          </a>
        <!-- Item End -->
    <?php
  }
  ?>
      
  
  
          <div class="flex justify-center mt-8">
            <button class="border-2 border-blue-600 text-blue-600 px-24 py-1 text-xl rounded-lg font-semibold hover:bg-blue-600 hover:text-white transition duration-250 ease-in" id="load-more">Load More</button>
          </div>
      </div>
    </div>
  
    <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />
  
    <div class="px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Enjoy the Ease of Online Selling on Pepricorn.com</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">Pepricorn.com is an e-commerce platform in Indonesia that offers a variety of products and has become the preferred marketplace for many Indonesians. With Pepricorn, online shopping has become more comfortable, secure, and efficient. You can choose from various features and payment methods to ensure a smooth shopping experience. These options include bank transfers using accounts from various banks, electronic money like OVO, and installment payments. Pepricorn's shopping system is integrated with several shipping services, allowing them to offer free shipping and enabling buyers to track the status of their purchases. Whether you're buying skincare products, beauty accessories, makeup, bath and body essentials, hair care products, or even fragrance, you can track your order's whereabouts to ensure safe delivery. Pepricorn's privacy policy protects your personal data and all transactions, ensuring that your information remains secure and not misused. Because of these features, Pepricorn.com provides a safe and convenient solution for online shopping.</p>
    </div>
    <div class="px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Shop for Original Products with Ease & Secure</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">With a user-friendly interface and efficient search filters, you can easily find the products you need and make secure online purchases with a variety of payment options. Pepricorn.com is committed to providing a safe and hassle-free shopping experience for its customers. The platform is equipped with advanced security measures to protect your personal and financial information during transactions. Additionally, their customer service team is always ready to assist you with any concerns or issues you may have.</p>
    </div>
    <div class="px-16 mt-8 text-sm">
      <p class="font-bold text-gray-700" data-aos="fade-up">Fast Delivery  & Great Customer Service</p>
      <p class="text-gray-400 mt-2" data-aos="fade-up">One of the standout features of Pepricorn.com is their fast and reliable delivery service. With a wide network of shipping partners, they offer fast and efficient delivery options throughout Indonesia. You can track the progress of your order in real-time and rest assured that your purchases will be delivered to your doorstep safely and on time. In addition to their fast and reliable delivery service, Pepricorn.com also offers excellent customer support. If you have any questions or concerns about your order, you can easily reach out to their customer service team via phone or email. Their dedicated support team is available to assist you with any issues or inquiries you may have, ensuring a smooth and hassle-free shopping experience. With a commitment to quality, affordability, and customer satisfaction, Pepricorn.com is a trusted online retailer for original products in Indonesia. Shop with confidence knowing that you're getting authentic and high-quality products, backed by excellent customer support and a fast and reliable delivery service. Start browsing their website today to discover a wide range of products at affordable prices!</p>
    </div>
  
    <hr class="my-6 border-gray-300 sm:mx-auto lg:my-8" />
  
    <section class="bg-white">
      <div class="px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
          <h2 class="mb-8 text-4xl tracking-tight font-extrabold text-blue-600" data-aos="fade-up">Frequently asked questions</h2>
          <div class="grid pt-8 text-left border-t border-gray-200 md:gap-16 md:grid-cols-2">
              <div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          What payment methods do you accept?
                      </h3>
                      <p class="text-gray-500">We accept a variety of payment methods for your convenience, including credit/debit cards, PayPal, Apple Pay, and Google Pay. You can select your preferred payment method during the checkout process. If you encounter any issues with payment, please contact our customer support team for assistance.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">                        
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          How long will it take to receive my order?
                      </h3>
                      <p class="text-gray-500">Delivery times may vary depending on your location and the products you ordered. You can check the estimated delivery time for your order during the checkout process. Once your order has shipped, you will receive a tracking number via email or text message. You can track your order's progress using the tracking number provided. If you have any questions about your delivery, please contact our customer support team for assistance.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          Do you offer free shipping?
                      </h3>
                      <p class="text-gray-500">Yes, we offer free shipping on orders over a certain amount. The threshold for free shipping may vary depending on your location. You can check the free shipping threshold for your location on our website. If your order qualifies for free shipping, the option will be available during the checkout process.</p>
                      <p class="text-gray-500">Feel free to <a href="#" class="font-medium underline text-primary-600 hover:no-underline" target="_blank" rel="noreferrer">contact us</a> and we'll help you out as soon as we can.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          Can I track my order?
                      </h3>
                      <p class="text-gray-500 ">Yes, you can track your order through the tracking information provided to you via email or by logging into your account on our website. If you have any issues with tracking your order, please contact our customer support team for assistance.</p>
                      <p class="text-gray-500">Find out more information by <a href="#" class="font-medium underline text-primary-600 hover:no-underline">order tracking</a>.</p>
                  </div>
              </div>
              <div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          What is your return policy?
                      </h3>
                      <p class="text-gray-500">We offer a hassle-free return policy. If you're not satisfied with your purchase, you can return it within a certain timeframe for a refund or exchange. Please refer to our <a href="" class="font-medium underline text-primary-600 hover:no-underline">return policy</a> for more details.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          Do you offer international shipping?
                      </h3>
                      <p class="text-gray-500">Yes, we offer international shipping to select countries. You can check if your country is eligible for international shipping during the checkout process. International shipping rates and delivery times may vary depending on your location. If you have any questions about international shipping, please contact our customer support team for assistance.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          Can I cancel my order?
                      </h3>
                      <p class="text-gray-500 ">You may be able to cancel your order before it ships. Please refer to our <a href="" class="font-medium underline text-primary-600 hover:no-underline">cancellation policy</a> for more details.</p>
                      <p class="text-gray-500 "> This is to ensure that the cancellation is properly processed and that you receive the appropriate refund if applicable. If you need to cancel your order, we recommend contacting our customer support team as soon as possible to minimize any delays or issues.</p>
                  </div>
                  <div class="mb-10" data-aos="fade-up">
                      <h3 class="flex items-center mb-4 text-lg font-medium text-gray-700 ">
                          <svg class="flex-shrink-0 mr-2 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                          How can I contact customer support?
                      </h3>
                      <p class="text-gray-500">You can reach out to our customer support team by email or phone. Our contact information is available on our website under the "Contact Us" section. You can also submit a support ticket on our website, and our team will get back to you as soon as possible. For urgent matters, we recommend calling our customer support team directly.</p>
                      <p class="text-gray-500">With that being said, feel free to use this website for your self care needs.</p>
                      <p class="text-gray-500">Find out more information by <a href="#" class="font-medium underline text-primary-600 hover:no-underline">reading the license</a>.</p>
                  </div>
              </div>
          </div>
      </div>
      </section>
  
    <footer class="bg-blue-900 mt-16 px-16 py-6">
        <div class="mx-auto w-full container">
            <div class="md:flex md:justify-between">
              <div class="mb-6 md:mb-0">
                  <a href="hero.html" class="flex items-center">
                      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" />
                      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Pepricorn</span>
                  </a>
              </div>
              <div class="grid grid-cols-5 gap-8 sm:gap-6 sm:grid-cols-3">
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-gray-700 uppercase dark:text-white">Resources</h2>
                      <ul class="text-gray-600 dark:text-gray-400">
                          <li class="mb-4">
                              <a href="https://flowbite.com/" class="hover:text-white transition duration-250 ease-in">Flowbite</a>
                          </li>
                          <li class="mb-4">
                              <a href="https://www.flaticon.com/" class="hover:text-white transition duration-250 ease-in">Flaticon</a>
                          </li>
                          <li class="mb-4">
                              <a href="https://tailwindcss.com/" class="hover:text-white transition duration-250 ease-in">Tailwind CSS</a>
                          </li>
                          <li>
                              <a href="https://michalsnik.github.io/aos/" class="hover:text-white transition duration-250 ease-in">Animate on Scroll<br>Library</a>
                          </li>
                      </ul>
                  </div>
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-gray-700 uppercase dark:text-white">Follow us</h2>
                      <ul class="text-gray-600 dark:text-gray-400">
                          <li class="mb-4">
                              <a href="https://github.com/themesberg/flowbite" class="hover:text-white transition duration-250 ease-in">Github</a>
                          </li>
                          <li>
                              <a href="https://discord.gg/4eeurUVvTy" class="hover:text-white transition duration-250 ease-in">Discord</a>
                          </li>
                      </ul>
                  </div>
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-gray-700 uppercase dark:text-white">Legal</h2>
                      <ul class="text-gray-600 dark:text-gray-400">
                          <li class="mb-4">
                              <a href="#" class="hover:text-white transition duration-250 ease-in">Privacy Policy</a>
                          </li>
                          <li>
                              <a href="#" class="hover:text-white transition duration-250 ease-in">Terms &amp; Conditions</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
          <div class="sm:flex sm:items-center sm:justify-between">
              <span class="text-sm text-gray-400 sm:text-center">© 2023 <a href="hero.html" class="hover:text-white transition">Pepricorn™</a>. All Rights Reserved.
              </span>
              <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                  <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition duration-250 ease-in">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                      <span class="sr-only">Facebook page</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition duration-250 ease-in">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                      <span class="sr-only">Instagram page</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition duration-250 ease-in">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                      <span class="sr-only">Twitter page</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition duration-250 ease-in">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                      <span class="sr-only">GitHub account</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-gray-700 dark:hover:text-white transition duration-250 ease-in">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" /></svg>
                      <span class="sr-only">Dribbble account</span>
                  </a>
              </div>
          </div>
        </div>
      </footer>
  
      <script src="hero.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
    </body>
  </html>
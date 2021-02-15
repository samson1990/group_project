<?php
  
    include("includes/db_connection.php");
    include("includes/functions.php");

    $successMessage = "";
    
    include("includes/header.php");

?>

	
<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
          <?php

// $spec = "";
              $query = "SELECT * FROM users WHERE user_type = 0";
              $result = mysqli_query($conn, $query);
              while ($row = mysqli_fetch_assoc($result)){
                $firstname = $row['first_name'];
                $address = $row['address'];
                $email = $row['email'];
                $lastname = $row['last_name'];
                $phone = $row['phone_num'];
                $specialty = $row['specialty'];
                $sql = "SELECT * FROM category WHERE id ='$specialty'";
                $spec_result = mysqli_query($conn, $sql);
                while ($rows = mysqli_fetch_assoc($spec_result)){
                  $spec = $rows['name'];
                }

          ?>
          <div class="col-md-6 col-lg-4 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20 d-flex align-items-end" style="background-image: url('');">
								
              </a>
              <div class="text bg-white p-4">
                <h3 class="text-center text-danger "><?=$address ?></h3>
               <hr> 

               <h4><i class="fa fa-user"></i><?=$firstname ?>&nbsp;<?=$lastname ?></h4>
               <h4><i class="fa fa-car"></i> <?=$spec ?></h4>
               <h5><i class="fa fa-phone"></i> <?=$phone ?></h5>
               <h6><i class="fa fa-envelope"></i> <a href=""><?=$email ?></a> </h6>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-instagram"></i></a>
                <a href=""><i class="fa fa-snapchat"></i></a>
                <a href=""><i class="fa fa-github"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
              </div>
            </div>
          </div>
          <?php

            }

          ?>
        </div>
			</div>
      
		</section>    
        

        <?php
        
        include("includes/footer_page.php");
        
        ?>
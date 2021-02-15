<?php
    session_start();
    // print_r($_SESSION); exit();
     
    $usertype = $_SESSION['TypeOfUser'];

    if($usertype == 0){
        $edit = "<a href='admin/users.php?action>edit profile</a>
";
    }else{
        $edit = "<a href='admin/user_profile.php?action'>edit profile</a>
        ";
    }
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixit</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">



    

    

    <link rel="stylesheet" href="cs/animate.css">
    
    <link rel="stylesheet" href="cs/owl.carousel.min.css">
    <link rel="stylesheet" href="cs/owl.theme.default.min.css">
    <link rel="stylesheet" href="cs/magnific-popup.css">

    <link rel="stylesheet" href="cs/ionicons.min.css">
    
    <link rel="stylesheet" href="cs/flaticon.css">
    <link rel="stylesheet" href="cs/icomoon.css">
    <link rel="stylesheet" href="cs/style.css">

</head>
<body>

    <div class="container pt-5">
		<div class="row justify-content-between">
            <div class="col">
                <a class="navbar-brand" href="index.php">Fix<span>It.</span></a>
            </div>
                <!-- <div class="col d-flex justify-content-end">
                    <div class="social-media">
                        <p class="mb-0 d-flex">
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i class="sr-only">Facebook</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-twitter"><i class="sr-only">Twitter</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-instagram"><i class="sr-only">Instagram</i></span></a>
                            <a href="#" class="d-flex align-items-center justify-content-center"><span class="fa fa-dribbble"><i class="sr-only">Dribbble</i></span></a>
                        </p>
                    </div>
                </div> -->
        </div>
    </div>
		<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	    
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="fa fa-bars"></span> Menu
	      </button>
		
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	        	<li class="nav-item"><a href="index.php#about" class="nav-link">About</a></li>
	        	<!-- <li class="nav-item"><a href="team.html" class="nav-link">Our team</a></li>
	        	<li class="nav-item"><a href="project.html" class="nav-link">Project</a></li> -->
	        	<li class="nav-item"><a href="request.php" class="nav-link">Services</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>

            <div class="dropdown">
                    <button class="mt-3 btn btn-warning dropdown-toggle mod" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                OTHER
                    </button>
                    <div class="dropdown-menu p-4" aria-labelledby="triggerId">
                        <a class="dropdown-item" href="#">
                        
                        </a>
                        <!-- <a class="dropdown-item disabled" href="#">Disabled action</a> -->
                        <!-- <h6 class="dropdown-header">Edit profile</h6> -->
                        <a class="dropdown-item btn btn-warning" href=" ?>"><b>Edit Profile </b> <i class="fa fa-edit"></i></a><hr>
                        <!-- <a class="dropdown-item btn " href="#">Edit Profile</a><hr> -->
                        <!-- <a class="dropdown-item btn btn-outline-warning" href="#"> <b>Donate</b> <i class="fa fa-map"></i></a><hr> -->

                        <div class="dropdown-divider"></div>
                        <button type="button" class="btn btn-outline-danger btn-block  btn-sm " data-toggle="modal" data-target="#modelId">
                        <b>Signout </b><i class ="fa fa-sign-out"></i>
                    </button>  
                                <!-- <a class="dropdown-item" href="#">After divider action</a> -->
                            </div>
            </div>
            
            </ul>
    <!-- <p class="col-md-1"></p> -->
        </div>

	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
  

           <!-- Modal -->
           <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
               <div class="modal-dialog" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title text-warning">Sign out</h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                               </button>
                       </div>
                       <div class="modal-body">
                           <h2 class="text-danger">Are you sure you want to signout?</h2>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">No!</button>
                           <a href="signout.php" class="btn btn-danger">Yes</a>
                           <!-- <button type="button" class="btn btn-danger"> Yes!</button> -->
                       </div>
                   </div>
               </div>
           </div>



<?php

include ("includes/header.php");
  
include("includes/db_connection.php");
include("includes/functions.php");

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <style>

        img{
            height:300px;
            width:100%;
        }
       .icon{
            color:green;
            font-weight:39%;
        }
        #move{
            position:relative;
            float:left;
            color:white;
        }
        #contact{
            position:relative;
            transform: translate(40%, -400%);
            
        }
        /* #quick{
            background:lightgrey;
            height:30px;
            width:30px;
            border-radius:50%;
            padding:8px;
            margin-left:1000px;
        } */
    </style>
</head>
<body>|
    <i class="fa fa-facebook text-primary fa-spin"></i>  |
    <i class="fa fa-instagram text-danger fa-spin"></i>  |
    <i class="fa fa-twitter text-info fa-spin"></i>  |
    <i class="fa  fa-pinterest-p text-danger fa-spin" ></i> | 
    <i class="fa fa-snapchat text-warning fa-spin"></i>  |
    <i class="fa fa-linkedin text-secondary fa-spin"></i> |
    <p id = "move">
    |||
    </p>
    <!-- <i class="fa fa-phone " id="quick">
        <p>1567</p>
    </i> -->


    <br>
    <div class="">
               <img src="image/IMG_20200916_102806_990.jpg" alt="" srcset="">
               <h1 class="text-info " id="contact">Contact-Us <i class="fa fa-book"></i></h1>
    </div><br>
        <div class="container">
            <div class="row">
                <!-- <div class="col-md-"></div> -->
                    <div class="col-md-2"> 
                        <i class="fa fa-phone fa-3x  icon"></i><hr>
                        <h2>Phone</h2>
                        <p6>+234-9-0888-6868</p6>
                    </div>
                <div class="col-md-1"></div>
                            <div class="col-md-2">  
                                <i class="fa fa-clock-o fa-3x   icon"></i> <hr>
                                <h2>Open time</h2>  
                        <p6>10:00 am to 23:00pm</p6>


                            </div>
                <div class="col-md-1"></div>
                        <div class="col-md-2">
                        <i class="fa fa-envelope  fa-3x   icon"></i><hr>
                        <h2>Email</h2>
                        <p>fixit24/7@gmail.com</p>
                        </div>
                <div class="col-md-1"></div>
                <div class="col-md-2">
                <i class="fa fa-map-marker fa-3x  icon "></i><hr>
                <h2>Location</h2>
                <p6>Suit no.2 Jos Plateau club</p6>

                

                </div>
                <!-- <div class="col-md-1"></div> -->



                
            </div>
            
        </div>
        <hr>

            <div class="container">
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2">                 
                           <!-- <button type="submit" class=""></button>  -->
                           <!-- Button trigger modal -->
                           <button type="button" class="bg-primary btn btn-lg" data-toggle="modal" data-target="#modelMessage">
                           SEND MESSAGE
                           </button>
                           
                           <!-- Modal -->
                           <div class="modal fade" id="modelMessage" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                               <div class="modal-dialog" role="document">
                                   <div class="modal-content">
                                       <div class="modal-header">
                                           <h5 class="modal-title text-primary">Message!</h5>
                                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                   <span aria-hidden="true">&times;</span>
                                               </button>
                                       </div>
                                       <div class="modal-body">
                                            <form action="contact.php" method="post">
                                            <input type="text" class="form-control mb-2" placeholder="Full name ">
                                            <input type="email" class="form-control mb-2" placeholder="Email ">
                                            <textarea class="form-control mb-2" name="txtMessage"  id="" cols="30" rows="03" placeholder="Type in your message....."></textarea>
                                            <button type="submit" class="btn btn-info form-control" > <b>SEND</b> <i class="fa fa-send"></i></button>

                                            </form>
                                            
                                       </div>
                                      
                                   </div>
                               </div>
                           </div>
                     </div>
                    <div class="col-5"></div>

                </div><hr>
            </div>

            

<?php include("includes/footer_page.php") ?>

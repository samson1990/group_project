<?php

session_start();

    include("./includes/db_connection.php");
    include("./includes/functions.php");

    $new_file_name = "";

    if (isset($_POST['btnAsk'])){
        $question = sanitize_data($_POST['txtQuestion']);
        $author = $_SESSION['logged_in'];

        $file_name = $_FILES['image']['name'];
            $file_type = $_FILES['image']['type'];
            $file_size = $_FILES['image']['size'];
            $temp_location = $_FILES['image']['tmp_name'];
            $error= $_FILES['image']['error'];
            $upload_path="uploads/";

            if(empty( $file_name)){
                $img = "no-image-e.png";
            }
                elseif ($file_size > 1000000000) {
                exit("File too, large please upload only file lower than 1MB");
            }
            else{
                $file_extension = explode(".",$file_name );

                $permited_extentions = ["jpg","png","gif","jpeg", "mp4"];


                if (!in_array(strtolower($file_extension[1]), $permited_extentions)) {
                    exit("Unsupported File type");
                }else{
                    $new_file_name = uniqid();

                    $new_file_name = $upload_path.$new_file_name.".".strtolower($file_extension [1]);

                    // exit($new_file_name);
                    move_uploaded_file($temp_location, $new_file_name);
                    // echo "Image uploaded successfully!";
                }
            }




        $sql = " INSERT INTO posts (image, body, author_id) VALUES ('$new_file_name', '$question', '$author')";

        $result = mysqli_query ($conn, $sql);

        if(!$result){
            die("ERROR OCCURED" . mysqli_error($conn));
        }else{
      
            header("location: home.php");
        }


    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
  
</head>
<body>

    <div class="container-fluid">
        <h1>Fix<span class ="text-danger">it.</span></h1>
    </div>

    <!-- NAVBAR STARTS HERE  -->
    <nav class="navbar navbar-expand-sm navbar-light bg-dark">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>

            </ul>
            

        </div>
    </nav> 

    <div class="container height mt-3">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-inline col-md-12" method="post" enctype="multipart/form-data">  
        <div class="form-group">
                <textarea name="txtQuestion" id="txtQuestion" cols="150" rows="10" class="form-control" placeholder="Enter your question here" required autofocus></textarea>
            </div>

<!-- 
            <fieldset>
                You can also ask using image or video
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
                <small class="text-warning">Note: File should not be more than 5MB</small>
            </fieldset> -->
            
            <div class="form-group">
                <button type="submit" name="btnAsk" class="btn btn-success mt-2">Submit</button>
            </div>
        </form>
    </div>

    <footer class="sticky">
        <p class="d-flex justify-content-center">All Rights Reservered &copy;2020</p>
    </footer>
    <?php include("includes/footer.php") ?>

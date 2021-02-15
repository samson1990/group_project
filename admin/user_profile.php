
<?php

    include ("../includes/header.php");

    $user = $_SESSION['logged_in'];

    include("../includes/db_connection.php");
    include("../includes/functions.php");

    if (isset($_POST['btnUpdate'])){
        $phoneno = sanitize_data($_POST['phoneno']);
        $address = sanitize_data($_POST['address']);
        $spec = sanitize_data($_POST['spec']);
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $temp_location = $_FILES['image']['tmp_name'];
        $error= $_FILES['image']['error'];
        $upload_path="uploads/";

        if(empty( $file_name)){
            $img = "no-image-e.png";
        }elseif ($file_size > 1000000000) {
            exit("File too, large please upload only file lower than 1MB");
        }
        else{
            $file_extension = explode(".",$file_name );

            $permited_extentions = ["JPG","png","gif","jpeg"];


            if (!in_array(strtolower($file_extension[1]), $permited_extentions)) {
                exit("Unsupported File type");
            }else{
                $new_file_name = uniqid();

                $new_file_name = $upload_path.$new_file_name.".".strtolower($file_extension [1]);

                // exit($new_file_name);
                move_uploaded_file($temp_location, $new_file_name);
                // echo "Image uploaded successfully!";
            }
            $sql = "UPDATE users SET
                    image = '$new_file_name',
                    phone_num = '$phoneno',
                    address = '$address',
                    WHERE id = '$user'
            ";

            $result = mysqli_query ($conn, $sql);
    
            if(!$result){
                die("ERROR OCCURED" . mysqli_error($conn));
            }else{
                // while($row = mysqli_fetch_assoc($result)){
    
                // }
            }
    
    
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
</head>
<body>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fixit</title>
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../bs4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../vendors/chartist/chartist.min.css">
  

    </head>
<body class="col-md-12 col-sm-12 col-lg-12 col-xl-12 col-xs-12">
<div class="container-fluid">
        <h1>Fix<span class ="text-danger">it</span></h1>
    </div>


    <!-- NAVBAR STARTS HERE  -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../index.php#about">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../request.php">Services</a>
                </li>

                
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact</a>
                </li>

            </ul>
            <?= $edit?>
            <a href="../signout.php" class="btn btn-primary">Sign out</a>


        </div>
    </nav>
    <!-- NAVBAR ENDS HERE -->



    <?php
// print_r($_SESSION);
// exit();
$spec = "";
        $query = "SELECT * FROM users WHERE id = '$user' AND user_type = 1";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo "Error: " .mysqli_error($conn);
        }
        while ($row = mysqli_fetch_assoc($result)){

            $userid = $row['id'];
            $image = $row['image'];
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
            $email = $row['email'];
            $phone = $row['phone_num'];
            $address = $row['address'];


        echo "
        <table class='table'>
        <thead>
            <tr>
                <th>Image</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form class='form-horizontal' action='users.php' method='post' enctype='multipart/form-data'>
                    <td scope='row'>
                        <img style='border-radius: 20px;' src='$image' width='100' height='100' >
                    </td>
                    <td>$firstname
                    </td>
                    <td>$lastname
                    </td>
                    <td>$email
                    </td>
                    <td>$phone
                    </td>
                    <td>$address
                    </td>
                    <td>
                        <a class='btn btn-primary btn-lg' href='edit_user.php?action=$userid'>Edit</a>
                    </td>
                </form>
            </tr>
        </tbody>
    </table>
                ";

        }

    ?>


    <script src="../bs4/J_query/jquery-3.5.1.js"></script>
    <script src="../bs4/js/bootstrap.min.js"></script>

</body>
</html>

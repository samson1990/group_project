
<?php
    session_start();
    $user = $_SESSION['logged_in'];

    include("../includes/db_connection.php");
    include("../includes/functions.php");

    if (isset($_POST['btnUpdate'])){
        $phone = sanitize_data($_POST['phone']);
        $address = sanitize_data($_POST['address']);
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $temp_location = $_FILES['image']['tmp_name'];
        $error= $_FILES['image']['error'];
        $upload_path="uploads/";

        if(empty($file_name)){
            $img_query = "SELECT * FROM users WHERE id = '$user'";
            $img_result = mysqli_query($conn, $img_query);
            while($img_row = mysqli_fetch_assoc($img_result)){
                $new_file_name = $img_row['image'];
            }
        }elseif ($file_size > 1000000000) {
            exit("File too, large please upload only file lower than 1MB");
        }
        else{
            $file_extension = explode(".",$file_name );

            $permited_extentions = ["jpg","png","gif","jpeg"];


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
                $query = "UPDATE users SET `image` = '$new_file_name', phone_num = '$phone', `address` = '$address' WHERE id = '$user' ";
                $result = mysqli_query($conn, $query);

                if(!$result){
                    exit("Error: " .mysqli_error($conn));
                }else {
                    header("location: user_profile.php");
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
    <form action="edit_user.php" enctype="multipart/form-data" method="post">
        <?php
            if(isset($_GET['action'])){
                $id = $_GET['action'];
                $sql = "SELECT * FROM users WHERE id = '$id'";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $phone = $row['phone_num'];
                    $address = $row['address'];
                }
            }
        
        ?>
        <div class="form-group">
          <label for="">Image</label>
          <input type="file" name="image" id="image"  class="form-control" placeholder="" aria-describedby="helpId">
          <label for="">Phone Number</label>
          <input type="text" name="phone" value="<?=$phone?>" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
          <textarea name="address" value="" id="address" cols="30" rows="3" class="form-control" placeholder="Enter your Adderess"><?=$address?></textarea>
          <br>
          <button name="btnUpdate" class="btn btn-primary">Update</button>
        </div>
    </form> <br><br>

     
</body>
</html>




     

<?php
    session_start();
    $user = $_SESSION['logged_in'];
    $spec = "";

    include("../includes/db_connection.php");
    include("../includes/functions.php");

    if (isset($_POST['btnUpdate'])){
        $phone = sanitize_data($_POST['phone']);
        $address = sanitize_data($_POST['address']);
        $spec = sanitize_data($_POST['ddlspec']);
        $fileName = $_FILES['image']['name'];
        $fileType = $_FILES['image']['type'];
        $fileLocation = $_FILES['image']['tmp_name'];
        $fileSize = $_FILES['image']['size'];
        $path = "uploads/";

        if(empty($fileName)){
            $test = "SELECT * FROM users WHERE id ='$user'";
            $testResult = mysqli_query($conn,$test);
            while($rows = mysqli_fetch_assoc($testResult)){
                $new_file_name = $rows['image'];
           
            }
        }else{
        if($fileSize > 1000000){
            exit("file too large");
        }else{
            $fileExtension = explode(".",$fileName);
            $permittedExtension = ['jpg','jpeg','png'];

            if(!in_array($fileExtension[1],$permittedExtension)){
                exit("unsupported file type");
            }else{

            $fileName = uniqid();
            $new_file_name = $path.$fileName.".".strtolower($fileExtension[1]);
            move_uploaded_file($fileLocation,$new_file_name);
        }}}
        $query = "UPDATE users SET `image` = '$new_file_name', phone_num = '$phone', `address` = '$address', specialty='$spec' WHERE id = '$user' ";
        $result = mysqli_query($conn, $query);

        if(!$result){
            exit("Error: " .mysqli_error($conn));
        }else {
            header("location: users.php");
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
    <form action="edit.php" method="post" enctype="multipart/form-data">
    <?php
        if(isset($_GET['action'])){
            $id = $_GET['action'];
            $sql = "SELECT * FROM users WHERE id = '$id'";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
                $phone = $row['phone_num'];
                $specialty = $row['specialty'];
                $address = $row['address'];
                $image = $row['image'];
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];

                $query = "SELECT * FROM category WHERE id ='$specialty'";
                $query_result = mysqli_query($conn,$query);
                while($rows = mysqli_fetch_assoc($query_result)){
                    $spec = $rows['name'];
                }
            }
        }
    
    ?>
        <div class="form-group">
        <div class="form-group">
            <img src="<?=$image ?>" alt="" height="200" width="200" class="img-fluid img-resp rounded" />
        </div>
        <div class="form-group">
            <p><?=$firstname ?>&nbsp;<?=$lastname ?></p>
        </div>
          <label for="">Image</label>
          <input type="file" name="image" id="image" value="<?=$image?>" class="form-control" placeholder="" aria-describedby="helpId">
          <label for="">Phone Number</label>
          <input type="text" name="phone" value="<?=$phone?>" id="phone" class="form-control" placeholder="" aria-describedby="helpId">
          <select name="ddlspec" id="" class="form-control" required>
            <option value="">-- choose a specialty --</option>
            <?php

                $query = "SELECT * FROM category";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)){
                    $ddlspec = $row['name'];
                echo '<option value="'.$row['id'].'">'.$ddlspec.'</option>';
                }


            ?>
          </select>
          <textarea name="address" value="" id="address" cols="30" rows="3" class="form-control" placeholder="Enter your Adderess"><?=$address?></textarea>
          <br>
          <button name="btnUpdate" class="btn btn-primary">Update</button>
        </div>
    </form> 
</body>
</html>




     
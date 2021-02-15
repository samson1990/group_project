<?php  

    include("./includes/db_connection.php");
    include("./includes/functions.php");

    $errorMessage = $username = "";
if (isset($_POST['btnLogin'])){
    
    $username = sanitize_data($_POST['txtUser']);
    $password = sanitize_data($_POST['txtpassword']);

    if ($username & $password){
        $query = "SELECT * FROM users WHERE email = '$username'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) < 1 ){
            $errorMessage = '<div class="errorMsg alert alert-danger" role="alert">
                                <strong>Incorrect Username/Email or Password</strong><a class="close" data-dismiss="alert">&times;</a>
                            </div>';
                              
          }elseif(mysqli_num_rows($result) > 0){
    
            while($row =  mysqli_fetch_assoc($result)){
              $hashed_password = $row['password'];
              $id = $row['id'];
              $user_type = $row['user_type'];
    
            }
    
            // dehash password and compare
            $check_password = password_verify($password, $hashed_password);
    
            if(!$check_password){
              
              $errorMessage = '<div class=" errorMsg alert alert-danger" role="alert">
                                    <strong>Incorrect Username/Email or Password</strong><a class="close" data-dismiss="alert">&times;</a>
                                </div>';
                              
                             
            }else{
    
              // User is valid, create sessions
              session_start();
    
              $_SESSION['user_identity'] = $user_id;
              $_SESSION['id']=TRUE;
              $_SESSION['logged_in'] = $id;
              $_SESSION['TypeOfUser'] = $user_type; 
    
              $duration = time(60 * 60 * 24 * 365);
    
              
            
              setcookie('User', $user_id, $duration);
              setcookie('Password', $password, $duration);
    
              header("Location: home.php");
    
            }
          }    
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <title>Login</title>
</head>
<body>
    <div class="container-fluid">
        <h1>Fix<span class ="text-danger">it.</span></h1>
    </div>

    <div class="container col-md-3 h-25">
        <div class="container h-25">
            <form action="login.php" method="post" class = "form-horizontal h-25 col-md-12 form">
                <?=$errorMessage ?>
                <div class="form-group ">
                    <input required autofocus type="text" name="txtUser" id="" value="<?=$username ?>" class="form-control mb-2" placeholder="Enter Username/Email" aria-describedby="helpId">   
                </div>
                <div class="form-group ">
                    <input required type="password" name="txtpassword" id="" class="form-control mb-2" placeholder="Enter password" aria-describedby="helpId">
                </div>
                <div class="form-group ">
                    <button type="submit" name ="btnLogin" class = "btn btn-info btn-block">Login</button>
                </div>
                <footer class="footer text-center">
                    <div class="container one">
                        <p>Don't have an account?&nbsp;<a href="signup.php" class="account">Signup</a></p>
                    </div>
                    <section class="container two">
                        <p>Click <a href="index.php">here</a> to go back!</p>
                    </section>
                </footer>
            </form>
        </div>
    </div>

    <script src="./bs4/J_query/jquery-3.5.1.js"></script>
    <script src="./bs4/js/bootstrap.min.js"></script>
</body>
</html>
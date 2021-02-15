 <?php 
include("includes/db_connection.php");
include("includes/functions.php");
$errorMessage =$firstName = $lastName = $email= "";

    if(isset($_POST['btnSubmit'])){
      
      $firstName = sanitize_data($_POST['txtFirstname']);
      $lastName = sanitize_data($_POST['txtLastname']);
      $email = sanitize_data($_POST['txtEmail']);
      $user_type = sanitize_data($_POST['user-type']);
      $password1 = sanitize_data($_POST['txtPassword1']);
      $password2 = sanitize_data($_POST['txtPassword2']);

        if ($password1 != $password2) {

          $errorMessage = " Ooop's Password do not match Try Again !";
          $pass = 'no match';

        }else {
          $match = "match";

          $hashed_password = password_hash($password1, PASSWORD_DEFAULT);    
          $sql = "INSERT INTO users (first_name,last_name,email, user_type, `password`) VALUES('$firstName','$lastName','$email', '$user_type', '$hashed_password')";
          $result = mysqli_query($conn,$sql);
          // header("Location:signup.php");

          if (!$result) {
              die("Ooops! Something went wrong: " .mysqli_error($conn));
          }else{

              header("location: login.php");
          }
        }        
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Fixit</title>
    <link rel="stylesheet" href="bs4/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">

</head>
<body class="body d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">
      <h1>Fix<span class ="text-danger">it</span></h1>
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>

  <div class="container">
    <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-5">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
          Signup As A Driver
        </button>
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelIdmech">
          Signup As A Mechanic
        </button><hr>

        <p>Already have an account <a class="btn btn-primary" href="login.php">Login</a></p>
      </div>

      <div class="col-md-3">
        <!-- Button trigger modal -->
        
      </div>
    </div>
  </div>
  <footer class="bg-light p-3 mt-auto text-center">
    <p class="mb-0" style="font-size: 0.9rem;">COPYRIGHT © 2019–2020 Cloudify</p>
  </footer>

        <script src="./bs4/J_query/jquery-3.5.1.js"></script>
        <script src="./bs4/js/bootstrap.min.js"></script>
</body>
</html>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title">Signup</h5>
                <!-- <p>Signing up is easy! Just some few step and you will be added!</p> -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
              <div class="container mt-5 ms">
                <form style="width: 400px; margin: auto" action="signup.php" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group   ">
                                <label for="exampleInputFirstName">First Name</label>
                                <input type="text" class="form-control text" id="exampleInputFirstName" value="<?php echo $firstName; ?>" aria-describedby="emailHelp" name="txtFirstname" autofocus required>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputLastName">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputLastName" value="<?php echo $lastName; ?>" aria-describedby="emailHelp" name="txtLastname" required>
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" aria-describedby="emailHelp" name="txtEmail" required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div><div class="form-group">
                      <input type="hidden" value="1" name="user-type" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password"  class="form-control
                      
                      <?php
                      
                      if($pass== 'no match')
                      {echo 'is-invalid';
                      }else if ($match == 'match')
                      {echo 'is-valid';}
                      
                      ?>
                      
                      
                      " id="exampleInputPassword1" name="txtPassword1"  required>
                      <small class="is-invalid-feedback text-danger"><?=$errorMessage; ?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword">Confirm Password</label>
                      <input type="password"  class="form-control
                      
                      
                    
                      <?php
                      
                      if($pass== 'no match')
                      {echo 'is-invalid';
                      }else if ($match == 'match')
                      {echo 'is-valid';}
                      
                      ?>
                      
                        id="exampleInputConfirmPassword" name="txtPassword2"   required>
                      <small class="is-invalid-feedback text-danger"><?=$errorMessage; ?></small>
                    </div>
                    <button type="submit" name="btnSubmit" class="btn btn-block btn-primary">Submit</button>
                    <div class="container mt-3">
                      <p>Already have an account?<a href="login.php" id="login-link" class="ml-2">&nbsp;Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modelIdmech" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Signup</h5>
                <br>
                <!-- <p>Signing up is easy! Just some few step and you will be added!</p> -->
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
              <div class="container mt-5 ms">
                <form style="width: 400px; margin: auto" action="signup.php" method="post">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputFirstName">First Name</label>
                                <input type="text" class="form-control text" id="exampleInputFirstName" value="<?php echo $firstName; ?>" aria-describedby="emailHelp" name="txtFirstname" autofocus required>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputLastName">Last Name</label>
                                <input type="text" class="form-control" id="exampleInputLastName" value="<?php echo $lastName; ?>" aria-describedby="emailHelp" name="txtLastname" required>
                              </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $email; ?>" aria-describedby="emailHelp" name="txtEmail" required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    </div><div class="form-group">
                      <input type="hidden" value="0" name="user-type" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password"  class="form-control
                      
                      <?php
                      
                      if($pass== 'no match')
                      {echo 'is-invalid';
                      }else if ($match == 'match')
                      {echo 'is-valid';}
                      
                      ?>
                      
                      
                      " id="exampleInputPassword1" name="txtPassword1"  required>
                      <small class="is-invalid-feedback text-danger"><?=$errorMessage; ?></small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword">Confirm Password</label>
                      <input type="password"  class="form-control
                      
                      
                    
                      <?php
                      
                      if($pass== 'no match')
                      {echo 'is-invalid';
                      }else if ($match == 'match')
                      {echo 'is-valid';}
                      
                      ?>
                      
                        id="exampleInputConfirmPassword" name="txtPassword2"   required>
                      <small class="is-invalid-feedback text-danger"><?=$errorMessage; ?></small>
                    </div>
                    <button type="submit" name="btnSubmit" class="btn btn-block btn-primary">Submit</button>
                    <div class="container mt-3">
                      <p>Already have an account?<a href="login.php" id="login-link" class="ml-2">&nbsp;Log in</a></p>
                    </div>
                  </form>
                </div>
              </div>
            
            </div>
          </div>
        </div>
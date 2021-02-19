<?php include ("./includes/header.php"); ?>

<?php
    include("./includes/db_connection.php");
    include("./includes/functions.php");

    $new_file_name = "";

    if (isset($_POST['btnAsk'])){
        $question = sanitize_data($_POST['txtQuestion']);
        $author = $_SESSION['logged_in'];
    
        $sql = " INSERT INTO posts (image, body, author_id) VALUES ('$new_file_name', '$question', '$author')";

        $result = mysqli_query ($conn, $sql);

        if(!$result){
            die("ERROR OCCURED" . mysqli_error($conn));
        }else{
    
        }
    }

    // if(!$_SESSION)  {
    //     header("location: signup.php");
    // }
    
    

    $name = $successMessage= "";
    if (isset($_GET['login'])){

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>'.$_SESSION['user_identity'].'Success</strong> 
        </div>
        
        <script>
        $(".alert").alert();
        </script>';
    }

    if (isset($_GET['action'])){
        if ($_GET['action'] == 'reply'){
            $successmsg = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>You replied to this his/her comment</strong> 
            </div>
            
            <script>
            $(".alert").alert();
            </script>';
        }
    }

    echo $_SESSION['user_identity'];

?>

        <div class="container">
            <div id="top">
                <h1 id="heading-1">All Questions <?php echo $_SESSION['user_identity']; ?></h1>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">  
                    <div class="form-group">
                        <textarea name="txtQuestion" id="txtQuestion" cols="10" class="form-control" rows="4" placeholder="Enter your question here" required autofocus></textarea>

                        <!-- 
                        <fieldset>
                            You can also ask using image or video
                            <div class="form-group">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <small class="text-warning">Note: File should not be more than 5MB</small>
                        </fieldset> -->
                        
                        <button type="submit" name="btnAsk" class="btn btn-success mt-2"> <b>ASK </b><i class="fa fa-paper-plane"></i></button>
                    </div>
                </form>
            </div>
                <?php

                    $query="SELECT * FROM posts";
                    $results = mysqli_query($conn,$query);
                    $counter = mysqli_num_rows($results);

                ?>
                <h2 id='header' class='text-danger'><?=$counter ?>&nbsp;<span>Questions</span></h2>

            <div id="section">
                <section id="question-section" class="container">
                    <div class="container-fluid p-3">
                        <?php
                            $auth = "";
                            $author = $_SESSION['logged_in'];
                            $query = "SELECT * FROM posts ORDER BY id DESC";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)){
                                $authID = $row['author_id'];
                                $postid = $row['id'];
                                $time = $row['created_at'];
                                $query="SELECT * FROM reply WHERE post_id = '$postid'";
                                $results = mysqli_query($conn,$query);
                                $reply_counter = mysqli_num_rows($results);
                                

                                $authQuery="SELECT * FROM users WHERE id = '$authID'";
                                $authresult=mysqli_query($conn, $authQuery);
                                while($authrow = mysqli_fetch_assoc($authresult)){
                                    $auth = $authrow['first_name'];
                                }

                                    $query="SELECT * FROM reply WHERE post_id = '$postid'";
                                    $results = mysqli_query($conn,$query);
                                    $counter = mysqli_num_rows($results);

                        ?>
                            <div class="question answer">                              
                                <h3 class="text-primary" > <b><?=$auth ?></b> ask a question <a href="reply.php?action=<?=$row['id'] ?>" alt="" class="text-dark"><?=$row['body'] ?></a></h3>
                                    <p class="text-info">You have <?=$counter ?> message</p>
                                <p id="para"><a class="text-info" href="reply.php?action=<?=$row['id'] ?>"><?=$auth ?>&nbsp;<span>replied to your post <?=time_ago($time) ?></span></a></p>
                                <div>
                                <p> </p>
                                </div>
                                <small class="text-info">React</small>
                                <span class="fa fa-thumbs-up text-primary"> 
                                |
                                <span class="fa fa-thumbs-down text-danger"></span>
                                |
                                <span class="fa fa-heart text-danger"></span>
                                |
                                <span class="fa fa-smile-o text-warning"></span>
                                |

                                <div class="image row">
                                    <div>
                                        <!-- <p>asked&nbsp;<span>12 min</span>&nbsp;ago</p> -->
                                        <div id="info">
                                            <h6><?=$_SESSION['user_identity'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                        <?php

                            }

                        ?>
                    </div>

                </section>
            </div>
        </div>
        <hr>
<?php include("includes/footer_page.php") ?>

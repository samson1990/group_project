<?php

    include("./includes/db_connection.php");
    include("./includes/functions.php");
    include ("includes/header.php");    
    $id = $successMessage = "";

        if (isset($_POST['btnReply'])){
            $postid = sanitize_data($_POST['postid']);
            $comment = sanitize_data($_POST['txtreply']);
            $author_id = $_SESSION['logged_in'];

            if($comment && $postid) {
                $query = "INSERT INTO reply (post_id, reply_comment, author_id) VALUES ('$postid', '$comment', '$author_id')";
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    exit ("Error: " .mysqli_error($conn));
                }else {

                    header("location: home.php");
                }
            }
        }     

?>

    <?php 

        $body = "";

        if (isset($_GET['action'])){
            $id = $_GET['action'];

            $query = "SELECT * FROM posts WHERE id = '$id'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)){
                $body=$row['body'];
                $authID = $row['author_id'];
    ?>
    <div class="container">
        <form action="home.php" method="post" class="form-horizontal">
            <div class="form-group">
                <h1><?=$body?></h1>
            </div>
            <div class="form-group">
                <textarea autofocus class="form-control col-md-6" name="txtreply" placeholder="Write you answer"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" value="<?=$id ?>" name ="postid">
            </div>
            <div class="form-group">
                <button class="btn col-md-6 btn-info" type="submit" name="btnReply">Submit Answer</button>
            </div>
        </form>
    </div>
<hr>
    <?php
      
            }
        }
    ?>
<?php
        $query = "SELECT * FROM reply WHERE post_id = '$id' ORDER BY id DESC";
        $result = mysqli_query ($conn, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $auth = $row['author_id'];

            $authquery = "SELECT * FROM users WHERE id = '$auth'";
            $authresult = mysqli_query($conn, $authquery);
            while($authrow = mysqli_fetch_assoc($authresult)){
                $autho = $authrow['first_name'];

                ?>

            
                    <div class="container">
                        <div class="card">
                            <img src="" alt="" class="img-fluid">
                        </div>
                        <div class="reply"><?=$row['reply_comment']?></div>
                        <div class="name"><?=$autho ?></div>
                        <div class="date"><?=$row['created_at']?></div>
                    </div>
<?php

                }
            }

?>

<?php include("includes/footer_page.php") ?>

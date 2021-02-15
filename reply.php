<?php

    include("./includes/db_connection.php");
    include("./includes/functions.php");
    include ("includes/header.php");   


    $id = $successMessage = "";
    if (isset($_POST['btnReply'])){
        $postid = sanitize_data($_POST['postid']);
        $comment = sanitize_data($_POST['txtreply']);
        $author = $_SESSION['logged_in'];

        if($comment && $postid) {
            $query = "INSERT INTO reply (post_id, reply_comment, author_id) VALUES ('$postid', '$comment', '$author')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                exit ("Error: " .mysqli_error($conn));
            }else {
                // header("location: home.php?action=Reply");
            }
        }
    }


?>

<?php 
    $author = "";
    $body = "";

    if (isset($_GET['action'])){
        $id = $_GET['action'];

        $query = "SELECT * FROM posts WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)){
            $body=$row['body'];

?>

    <div class="container">
        <form action="reply.php" method="post" class="form-horizontal">
            <div class="form-group">
                <h1><?=$body?></h1>
            </div>
            <div class="form-group">
                <textarea autofocus class="form-control col-md-6" name="txtreply" placeholder="Write you answer"></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" value = "<?=$id?>" name ="postid">
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
                        $query = "SELECT * FROM posts ORDER BY id DESC";
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($result)){
                            $author = $row['author_id'];               
                            $authQuery="SELECT * FROM users WHERE id = '$author'";
                            $authresult=mysqli_query($conn, $authQuery);
                            while($authrow = mysqli_fetch_assoc($authresult)){
                                $auth = $authrow['first_name'];
                            }
                        }
    $query = "SELECT * FROM reply WHERE post_id = '$id' ORDER BY id DESC";
    $result = mysqli_query ($conn, $query);
    while ($row = mysqli_fetch_assoc($result)){

?>

        <div class="container">
            <div class="card">
                <img src="" alt="" class="img-fluid">
            </div>
    <div class="name text-warning"><?=$auth ?> replied to your post.</div>
            <div class="reply text-info" ><?=$row['reply_comment']?></div>
            <div class="date "><?=time_ago($row['created_at'])?></div>
        </div>

<?php
    }    
?>

<?php include("includes/footer_page.php") ?>
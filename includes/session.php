<?php
    session_start();
    if (!isset($_SESSION['id'])){
    header('location:index.php');
    }

    $user_id=$_SESSION['id'];
    $member_query = mysqli_query($conn,"SELECT * FROM users WHERE id = '$user_id'")or die(mysqli_error($conn));
    $member_row = mysqli_fetch_array($member_query);

    $fullname = $member_row['first_name']." ".$member_row['last_name'];
?>
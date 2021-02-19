<?php 
include ('./includes/db_connection.php');
$id=$_GET['id'];

mysqli_query($conn,"delete from post where id='$id'") or die (mysqli_error($conn));
header ('location:comment.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>POST AND COMMENT SYSTEM</title>
	<?php include('./includes/db_connection.php'); ?>
	<?php include('./includes/session.php'); ?>
	
	<script src="vendors/jquery-1.7.2.min.js"></script>
    <script src="vendors/bootstrap.js"></script>


</head>
<body>
	<div id="container">

		<br>
		WELCOME!
			<a href="logout.php">
				<button>
					<?php
						echo $member_row['firstname']." ".$member_row['lastname'];
					?> - Log Out
				</button>
			</a>
			
		<br>
		<br>
		
		<form method="post" action="comment.php" class="form-horizontal"> 
			<textarea name="post_content" class="form-control" rows="7" cols="64" placeholder=".........Write Someting here ........" required></textarea>
			<br>
			<button type="submit" class="btn btn-info" name="post">&nbsp;POST</button>
			<br>
			<hr>
		</form>
			<?php	
				$query = mysqli_query($conn,"SELECT *,UNIX_TIMESTAMP() - created_at AS TimeSpent FROM post LEFT JOIN users ON users.id = post.author_id order by id DESC")or die(mysqli_error($conn));
				while($post_row=mysqli_fetch_array($query)){
					$id = $post_row['id'];	
					$upid = $post_row['author_id'];	
					$posted_by = $post_row['first_name']." ".$post_row['last_name'];
			?>
		<a style="text-decoration:none; float:right;" href="deletepost.php<?php echo '?id='.$id; ?>">
			<button><font color="red">x</button></font>
		</a>
		<h3>Posted by: <a href="#"> <?php echo $posted_by; ?></a>
					-
			<?php				
				$days = floor($post_row['TimeSpent'] / (60 * 60 * 24));
				$remainder = $post_row['TimeSpent'] % (60 * 60 * 24);
				$hours = floor($remainder / (60 * 60));
				$remainder = $remainder % (60 * 60);
				$minutes = floor($remainder / 60);
				$seconds = $remainder % 60;
				if($days > 0)
				echo date('F d, Y - H:i:sa', $post_row['date_created']);
				elseif($days == 0 && $hours == 0 && $minutes == 0)
				echo "A few seconds ago";		
				elseif($days == 0 && $hours == 0)
				echo $minutes.' minutes ago';
			?>
			<br>
			<br>
			<?php
				echo $post_row['content'];
			?>
		</h3>

		<form method="post">
			<hr>
			Comment:<br>
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<textarea name="comment_content" rows="2" cols="44" style="" placeholder=".........Type your comment on <?=$member_row['lastname'] ?> post........" required></textarea><br>
			<input type="submit" name="comment">
		</form>
		</br>

			<?php 
				$comment_query = mysqli_query($conn,"SELECT * ,UNIX_TIMESTAMP() - date_posted AS TimeSpent FROM comment LEFT JOIN user on user.user_id = comment.user_id where post_id = '$id'") or die (mysqli_error($conn));
				while ($comment_row=mysqli_fetch_array($comment_query)){
					$comment_id = $comment_row['comment_id'];
					$comment_by = $comment_row['firstname']." ".  $comment_row['lastname'];
			?>
			<br>
				<a href="#"><?php echo $comment_by; ?></a> - 
				
					<?php echo $comment_row['content']; ?>
					<br>
					<?php				
						$days = floor($comment_row['TimeSpent'] / (60 * 60 * 24));
						$remainder = $comment_row['TimeSpent'] % (60 * 60 * 24);
						$hours = floor($remainder / (60 * 60));
						$remainder = $remainder % (60 * 60);
						$minutes = floor($remainder / 60);
						$seconds = $remainder % 60;
						if($days > 0)
						echo date('F d, Y - H:i:sa', $comment_row['date_posted']);
						elseif($days == 0 && $hours == 0 && $minutes == 0)
						echo "A few seconds ago";		
						elseif($days == 0 && $hours == 0)
						echo $minutes.' minutes ago';
					?>
					<br>
					<?php
						}
					?>
					<hr
					&nbsp;
					<?php 
						if ($u_id = $id){
					?>
					<?php
						}else{ 
					?>
					<?php
						}
							} 
					?>
					
				
					<?php
						if (isset($_POST['post'])){
							$post_content  = $_POST['post_content'];
							
							mysqli_query($conn,"insert into post (body,author_id) values ('$post_content','$user_id') ")or die(mysqli_error($conn));
							header('location:comment.php');
						}
					?>

							<?php
							
								if (isset($_POST['comment'])){
								$comment_content = $_POST['comment_content'];
								$post_id=$_POST['id'];
								
								mysqli_query($conn,"insert into comment (content,user_id,post_id) values ('$comment_content','".strtotime(date("Y-m-d h:i:sa"))."','$user_id','$post_id')") or die (mysqli_error($conn));
								header('location:home.php');
								}
							?>

</body>

  <?php// include('footer.php');?>

</html>
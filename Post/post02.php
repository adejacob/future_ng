
<?php
require('confi/config.php');
require('confi/db.php');

if(isset($_POST['delete'])){
	$delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

	$query = "DELETE FROM jacob WHERE id = {$delete_id}";

	if(mysqli_query($conn, $query)){
		header('location: post.php');
	}else{
		echo 'ER: ' .mysqli_error($conn);
	} 
}

$id = mysqli_real_escape_string($conn, $_GET['id']);

$query = 'SELECT * FROM jacob WHERE id = '.$id;

$result = mysqli_query($conn, $query);

$jacob = mysqli_fetch_assoc($result);
//var_dump($jacob);
mysqli_free_result($result);

mysqli_close($conn);

?>
<?php include('inc/header.php'); ?>
<body>
	<div class="container">
		<a href="<?php echo ROOT_URL; ?>post.php?id=<?php echo $jacob['id']; ?> " class="btn btn-default"><font color="green">back</a></font>
	<h1><font color="green"><?php echo $jacob['title']; ?></h1></font>
			<small>Created on <?php echo $jacob['created_at']; ?> by <?php echo $jacob['author']; ?> </small>
			<p><?php echo $jacob['body']; ?> </p>
			<hr>
			<form class="pull-right" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<input type="hidden" name="delete_id" value="<?php echo $jacob['id']; ?> ">
				<input type="submit" name="delete" value="Delete" class="btn btn-danger">
			</form>
			<a href="<?php echo ROOT_URL; ?>editpost.php?id=<?php echo $jacob['id']; ?>" class="btn btn-default"><font color="green">Edit</a></font>
</div>
	
<?php include('inc/footer.php'); ?>

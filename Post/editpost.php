
<?php
require('confi/config.php');
require('confi/db.php');

if(isset($_POST['submit'])){
	$update_id = mysqli_real_escape_string($conn, $_POST['update_id']);
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$author = mysqli_real_escape_string($conn, $_POST['author']);
	$body = mysqli_real_escape_string($conn, $_POST['body']);

	$query = ("UPDATE jacob SET title='$title', author='$author', body='$body' WHERE id = {$update_id}");

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
	<div class="container">
	<h1><font color="green">Add Post</h1></font>
	<form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
		<div class="form-group">
		<label><font color="green">Title</label></font>
		<input type="text" name="title" class="form-control" value="<?php echo $jacob['title']; ?>">
	</div>
	<div class="form-group">
		<label><font color="green">Author</label></font>
		<input type="text" name="author" class="form-control" value="<?php echo $jacob['author']; ?>">
	</div>
	<div class="form-group">
		<label><font color="green">Body</label></font>
		<textarea  name="body" class="form-control"><?php echo $jacob['body']; ?></textarea>
	</div>
	<input type="hidden" name="update_id" value="<?php echo $jacob['id']; ?>">
	<font color="green"><input type="submit" name="submit" value="Add Post" class="btn btn-primay"></font>
	</form>

</div>
	
<?php include('inc/footer.php'); ?>


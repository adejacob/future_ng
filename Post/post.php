
<?php
require('confi/config.php');
require('confi/db.php');

$query = 'SELECT * FROM jacob ORDER BY created_at DESC';

$result = mysqli_query($conn, $query);

$jacob = mysqli_fetch_all($result, MYSQLI_ASSOC);
//var_dump($jacob);
mysqli_free_result($result);

mysqli_close($conn);

?>

<?php include('inc/header.php'); ?>
	<div class="container">
	<h1><font color="green">Drop Your Post</h1></font>
	<?php foreach ($jacob as $jacob) : ?>
		<div class="well">
			<h3><font color="green"><?php echo $jacob['title']; ?></h3></font>
			<small>Created on <?php echo $jacob['created_at']; ?> by <?php echo $jacob['author']; ?> </small>
			<p><?php echo $jacob['body']; ?> </p>
			<a class="btn btn-default" href="post02.php?id=<?php echo $jacob['id']; ?>"><font color="green">Read More</a></font>
	</div>
	<?php endforeach; ?>
</div>
	
<?php include('inc/footer.php'); ?>


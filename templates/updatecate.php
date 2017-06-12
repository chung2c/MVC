<?php 
	session_start();
	if(!isset($_SESSION["user_info"])){
		header("Location: index.php?action=login&mes=");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Update MVC</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
	<script src="../bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>

	<div class="col-md-4">	
		<form action="index.php?action=doUpdateCate&id=<?= $categories["id"]?>" method="post" enctype="multipart/form-data">
			<h3>Update Category</h3>
					<div class="form-group">

						<label for="name">Category name:</label>
						
						<input class="form-control" type="text" id="name" name="name" value="<?= $categories["name"]?>"/>

					</div>

					<div class="form-group">
	
						<label for="img">Category image:</label>

						<input type="file" id="images" name="image" value="<?= $categories["image"]?>" />

					</div>

					<div class="form-group">

						<label for="desc">Category description</label>

						<textarea class="form-control" name="desc" rows="5" cols="50" id="desc"><?= $categories["description"]?></textarea>

					</div>

						<button class="btn btn-success" type="submit">Update</button>

		</form>
	</div>

</body>
</html>

		


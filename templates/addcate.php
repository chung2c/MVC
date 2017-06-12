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
	<title>MVC</title>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
	<script src="../bootstrap/js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>

	<div class="col-md-4">	
		<form  action="?action=doAddCate" method="post" enctype="multipart/form-data">
			<h3>Create Category</h3>
					<div class="form-group">
						<label for="name">Category name:</label>
						
						<input class="form-control" type="text" id="name" name="name" />
					</div>
					
					<div class="form-group">
						<label for="img">Category image:</label>

						<input type="file" id="image" name="image" />
					</div>
					
					<div class="form-group">
						<label for="desc">Category description</label>

						<textarea class="form-control" name="desc" rows="5" cols="50" id="desc"></textarea>
					</div>

						<button class="btn btn-success" type="submit">Create</button>

						<button class="btn btn-warning" type="reset">Reset</button>

			</table>
		</form>
	</div>

</body>
</html>

		
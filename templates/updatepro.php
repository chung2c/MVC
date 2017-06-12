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
		<form action="?action=doUpdatePro&id=<?= $products["id"]?>" method="post" enctype="multipart/form-data">
			<h3>Create Product</h3>


					<div class="form-group">
						<label for="name">Product name:</label>
						
						<input class="form-control" type="text" id="name" name="name" value="<?= $products["name"]?>" />
					</div>

					<div class="form-group">

						<label for="id">Category:</label>
						
						<select class="form-control" name="cate_id">
							<?php
								if(count($categories) > 0){
									foreach($categories as $value){
										if($value["id"] == $products["cate_id"]){
											?>
												<option selected value="<?= $value["id"]?>"><?= $value["name"]?></option>
											<?php
										}else{
											?>
												<option value="<?= $value["id"]?>"><?= $value["name"]?></option>
											<?php
										}
									}
								}
							?>
						</select>
					</div>

					<div class="form-group">

						<label for="img">Product image:</label>

						<input  type="file" id="image" name="image"  />
					</div>

					<div class="form-group">

						<label for="desc">Product description</label>

						<textarea class="form-control" name="desc" rows="5" cols="50" id="desc"><?= $products["description"]?></textarea>
					</div>

					<div class="form-group">

						<label for="id">Price:</label>
						

						<input class="form-control" type="number" step="0.1" id="price" name="price" value="<?= $products["price"]?>" />

					</div>

						<button class="btn btn-success" type="submit">Update</button>

						
		</form>
	</div>

</body>
</html>

	
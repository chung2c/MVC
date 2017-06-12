

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

	<div class="container">	
		<table class="table">
			<caption>Demo</caption>
			<thead>
				<tr>
					<th class="info">ID</th>
					<th class="info">Name</th>
					<th class="info">Description</th>
					<th class="info"abbr="">Image</th>
					<th class="info">Category name</th>
					<th class="info">Price</th>
					<th class="info">Edit</th>
					<th class="info">Add to cart</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Đếm xem trong bảng product có dữ liệu rồi mới hiển thị
					if(count($products) > 0){
						foreach($products as $value){
							?>
							<tr>
								<td><?= $value['product_id'];?>   </td>
								<td><?= $value['product_name'];?></td>
								<td><?= $value['product_description'];?></td>
								<td>
									<img height="50" width="50" src="<?= $value['product_image'];?>">
								</td>
								<td><?= $value['cate_name'];?></td>
								<td><?= $value['product_price'];?></td>
								
								<td>
									<a class="btn btn-success" href="index.php?action=updatePro&id=<?= $value['product_id'];?>"><span class="glyphicon glyphicon-pencil"></a>
									<a class="btn btn-danger" href="index.php?action=removePro&id=<?= $value['product_id']?>"><span class="glyphicon glyphicon-trash"></a>
								</td>
								<td>
									<a class="btn btn-info" href="index.php?action=addCart&id=<?= $value['product_id']?>"><span class="glyphicon glyphicon-shopping-cart"></a>
								</td>
							</tr>
							<?php
						}
					}
				?>

			</tbody>
		</table>

			<a class="btn btn-success" href="index.php?action=addPro"><span class="glyphicon glyphicon-plus"></span> Create Product</a>
	</div>

</body>
</html>
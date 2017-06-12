
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


	
	<div align="center" >
            <form action="?action=search" method="post">
                Search: <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form>
    </div>

	</div>
	<div class="container">	
		<table class="table">
			<caption>Demo</caption>
			<thead>
				<tr>
					<th class="info">ID</th>
					<th class="info">Name</th>
					<th class="info">Description</th>
					<th class="info">Image</th>
					<th class="info">Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					// Đếm xem trong bảng Category có dữ liệu rồi mới hiển
					if(count($cates) > 0){
						while($cates){

							?>
							<tr>
								<td class=""><?= $cates['id'];?>   </td>
								<td>
									<a href="index.php?action=pro&id=<?= $cates['id'];?>"><?= $cates['name'];?></a> <!--Link đến bảng product -->
								</td>
								<td><?= $cates['description'];?></td>
								<td>
								<img height="50" width="50" src="<?= $cates['image'];?>">
								</td>
								<td>
									<a class="btn btn-success" href="index.php?action=updateCate&id=<?= $cates['id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
									<a class="btn btn-danger" href="index.php?action=removeCate&id=<?= $cates['id']?>"><span class="glyphicon glyphicon-trash"></span></a>
								</td>
								
							<?php
							break;
						}
					}
				?>
			</tbody>
		</table>
									
	</div>

</body>
</html>
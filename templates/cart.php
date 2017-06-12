<?php



	$sessionValue = isset($_SESSION["cart"]) == true ? $_SESSION["cart"] : [];

?>
<table>
	<h1>Cart</h1>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Image</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Total Unit Price</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$totalCartPrice = 0;
			if(count($sessionValue) > 0){ // Tính tổng số tiền phải trả
				foreach ($sessionValue as $value) {
					$totalCartPrice += $value["quantity"] * $value["price"];
				}

				foreach ($sessionValue as $value){
				?>
				<tr>
						<td><?= $value['id'];?>   </td>
						<td><?= $value['name'];?></td>
						<td>
							<img height="50" width="50" src="<?= $value['image'];?>">
						</td>
						<td><?= $value['price'];?></td>
						<td><?= $value['quantity'];?></td>
						<td><?= $value['price'] * $value["quantity"];?></td>
						<td>
							<a href="index.php?action=addCart&id=<?= $value['id']?>">+1</a>
							<a href="index.php?action=minusCart&id=<?= $value['id']?>">-1</a>
							<a href="index.php?action=deleteCart&id=<?= $value['id']?>">X</a>
						</td>
					</tr>
				<?php
			}
			}
		?>
		<tr>
			<td colspan="5">Total Cart Price</td>
			<td colspan="2"><?= $totalCartPrice?></td>
		</tr>
	</tbody>
</table>
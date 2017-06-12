<?php
	require("views/CartView.php");
	require("models/CartModel.php");
	

	class CartController {
		public function showCart(){

			$arrayValue = $this->addCart();

			$showCart = new CartView();
			$showCart -> showCart($arrayValue);
		}

		public function addCart(){

			session_start();
			if(isset($_GET["id"])){
				$proId = $_GET["id"];
				if(is_numeric($proId)){ // Check ID có phải số ko??
					$cartModel = new CartModel();
					$products = $cartModel->showProById($proId);

					if(!$products){ // Kiểm tra sản phẩm có tồn tại ko
						echo "Lỗi Product";
					}
					$arrayValue = [];
					if(!isset($_SESSION["cart"])){ // Check giỏ hàng Session có tồn tại ko.
							$products["quantity"] = 1;
							array_push($arrayValue, $products); // Thêm sản phẩm có quantity = 1 vào session. 
					}else{
						$arrayValue = $_SESSION["cart"];
						$index = -1;

						for ($i=0; $i < count($arrayValue); $i++){ // sử dụng vòng lặp check xem product có ko
							$item = $arrayValue["$i"];
							if($item["id"] == $proId){ // Nếu tồn tại thì đổi giá trị của biến index
								$index = $i; 
								break;
							}  
						}

						if($index >= 0){
							$arrayValue[$index]["quantity"] += 1; // Nếu tồn tại rồi thì thêm 1
						}else{
							$products["quantity"] = 1;
							array_push($arrayValue, $products); // Nếu chưa thì SET quantity = 1 và thêm vào Session
						}
					}

					$_SESSION["cart"] = $arrayValue;

				}
					header("Location: index.php?action=cart");
			}

		}


		public function minusCart(){
			session_start();
			if(isset($_GET["id"])){
					$proId = $_GET["id"];
					if(is_numeric($proId)){ // Check ID có phải số ko??
						$cartModel = new CartModel();
						$products = $cartModel->showProById($proId);

						if(!$products){ // Kiểm tra sản phẩm có tồn tại ko
							echo "Lỗi Product";
						}
						$arrayValue = [];
						if(isset($_SESSION["cart"])){  // Check giỏ hàng Session có tồn tại ko.
							$arrayValue = $_SESSION["cart"];
							$index = -1;

							for ($i=0; $i < count($arrayValue); $i++){ // sử dụng vòng lặp check xem produtc có ko
								$item = $arrayValue["$i"];
								if($item["id"] == $proId){ // Nếu tồn tại thì đổi giá trị của biến index
									$index = $i; 
									break;
								}  
							}

							if($index >= 0){
								// Nếu có tồn tại thì check số lượng trong Session
								$quantity = $arrayValue[$index]["quantity"];
								if($quantity > 1){
									$arrayValue[$index]["quantity"] -= 1; // Nếu tồn tại rồi thì từ 1
								}else{
									array_splice($arrayValue, $index ,1);
								}
							}else{
								echo "products not exited in the cart!";
							}
						}

						$_SESSION["cart"] = $arrayValue;

					}
					header("Location: index.php?action=cart");
			}

		}


		public function deleteCart(){
			session_start();
			if(isset($_GET["id"])){
				$proId = $_GET["id"];
				if(is_numeric($proId)){ // Check ID có phải số ko??
					$cartModel = new CartModel();
					$products = $cartModel->showProById($proId);

					if(!$products){ // Kiểm tra sản phẩm có tồn tại ko
						echo "Lỗi Product";
					}
					$arrayValue = [];
					if(isset($_SESSION["cart"])){  // Check giỏ hàng Session có tồn tại ko.
						$arrayValue = $_SESSION["cart"];
						$index = -1;

						for ($i=0; $i < count($arrayValue); $i++){ // sử dụng vòng lặp check xem produtc có ko
							$item = $arrayValue["$i"];
							if($item["id"] == $proId){ // Nếu tồn tại thì đổi giá trị của biến index
								$index = $i; 
								break;
							}  
						}

						if($products){
							array_splice($arrayValue, $index ,1); // Xóa luôn
							}
						}else{
							echo "products not exited in the cart!";
						}
					

					$_SESSION["cart"] = $arrayValue;

				}
				header("Location: index.php?action=cart");
			}

		}
		


		
	}
?>
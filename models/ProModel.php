<?php

class ProModel{

		public function connDb() {
			$servername 	= "localhost";
			$username 		= "root";
			$password 		= "";
			$dbname 		= "demo";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			    // set the PDO error mode to exception
			    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			    }
			catch(PDOException $e)
			    {
			    echo "Connection failed: " . $e->getMessage();

			    }

			    return $conn;

			}

		public function getProOfCate($id){
			
					$conn = $this->connDb();

					$stmt = $conn->prepare("SELECT 
											p.id as product_id,
											p.name as product_name,
											p.description as product_description,
											p.image as product_image,
											p.price as product_price,
											c.name as cate_name
										FROM product as p 
										INNER JOIN category as c
											ON p.cate_id = c.id 
										WHERE p.cate_id = :cate_id");
		 			$stmt->bindParam(":cate_id", $id["cate_id"]);
		 			$stmt->execute();
					$products = $stmt->fetchAll();
					return $products;
		}

		public function getAllPro(){

			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT 
									p.id as product_id,
									p.name as product_name,
									p.description as product_description,
									p.image as product_image,
									p.price as product_price,
									c.name as cate_name
								FROM product as p 
								INNER JOIN category as c
									ON p.cate_id = c.id");
			$stmt->execute();
			$products = $stmt->fetchAll();
			return $products;
			
		}

		public function cateOption(){
			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT id, name FROM category");
			$stmt->execute();
			$categories = $stmt->fetchAll();
			return $categories;
		}

		public function addPro($pro){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("INSERT INTO product(name, cate_id, description, image, price) VALUES(?, ?, ?, ?, ?)");

				$stmt -> bindParam(1, $pro["name"]);
				$stmt -> bindParam(2, $pro["cate_id"]);
				$stmt -> bindParam(3, $pro["description"]);
				$stmt -> bindParam(4, $pro["image"]);
				$stmt -> bindParam(5, $pro["price"]);
				$stmt -> execute();

		}

		public function showUpdatePro($proId){


			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT id, name, cate_id, description, image, price FROM product WHERE id = $proId");
			$stmt->execute();
			$products = $stmt->fetch();
			return $products;
		}

		public function updatePro($upPro){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("UPDATE product SET name=?, cate_id=?, description=?, price=? WHERE id=?");

				$stmt -> bindParam(1, $upPro["name"]);
				$stmt -> bindParam(2, $upPro["cate_id"]);
				$stmt -> bindParam(3, $upPro["description"]);
				$stmt -> bindParam(4, $upPro["price"]);
				$stmt -> bindParam(5, $upPro["id"]);
				$stmt -> execute();

		}

		public function updateProi($upPro){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("UPDATE product SET name=?, cate_id=?, description=?, image=?, price=? WHERE id=?");

				$stmt -> bindParam(1, $upPro["name"]);
				$stmt -> bindParam(2, $upPro["cate_id"]);
				$stmt -> bindParam(3, $upPro["description"]);
				$stmt -> bindParam(4, $upPro["image"]);
				$stmt -> bindParam(5, $upPro["price"]);
				$stmt -> bindParam(6, $upPro["id"]);
				$stmt -> execute();

		}

		public function removePro($id){
			
				$conn = $this->connDb();

			 	$stmt = $conn->prepare("DELETE FROM product WHERE id=$id");
				$stmt->execute();

		}

}


?>
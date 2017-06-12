<?php
	Class CartModel {

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

			public function showProById($proId){


			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT id, name, cate_id, description, image, price FROM product WHERE id = $proId");
			$stmt->execute();
			$products = $stmt->fetch();
			return $products;
		}

	}
?>
<?php
	
	class CateModel {

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

		public function getCate() {


				$conn = $this->connDb();

			    $stmt = $conn -> prepare("SELECT id, name, description, image FROM category");
				$stmt -> execute();
				// Tạo biến để trả dữ liệu
				$cates = $stmt -> fetchAll();
				return $cates;
		}

		public function addCate($cate){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("INSERT INTO category(name, description, image) VALUES(?, ?, ?)");

				$stmt -> bindParam(1, $cate["name"]);
				$stmt -> bindParam(2, $cate["description"]);
				$stmt -> bindParam(3, $cate["image"]);
				$stmt -> execute();

		}

		public function showUpdateCate($cateId){


			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT id, name, description, image FROM category WHERE id = $cateId");
			$stmt->execute();
			$categories = $stmt->fetch();
			return $categories;
		}

		public function updateCate($upCate){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("UPDATE category SET name=?, description=? WHERE id=?");

				$stmt -> bindParam(1, $upCate["name"]);
				$stmt -> bindParam(2, $upCate["description"]);
				$stmt -> bindParam(3, $upCate["id"]);
				$stmt -> execute();

		}

		public function updateCatei($upCate){


				$conn = $this->connDb();

			 	$stmt = $conn->prepare("UPDATE category SET name=?, description=?, image=? WHERE id=?");

				$stmt -> bindParam(1, $upCate["name"]);
				$stmt -> bindParam(2, $upCate["description"]);
				$stmt -> bindParam(3, $upCate["image"]);
				$stmt -> bindParam(4, $upCate["id"]);
				$stmt -> execute();

		}

		public function removeCate($id){
			
				$conn = $this->connDb();

			 	$stmt = $conn->prepare("DELETE FROM category WHERE id=$id");
				$stmt->execute();

		}

		
		
	}
?>
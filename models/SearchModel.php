<?php
	class SearchModel {

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


		public function search($search){

			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT * FROM category WHERE name LIKE :keyword");
			$stmt->bindValue(':keyword', '%' .$search. '%');
			$stmt->execute();
			$cates = $stmt->fetch();
			return $cates;
		}
	}
?>
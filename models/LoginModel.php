<?php
	class LoginModel {

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

		public function login($login){

			$conn = $this->connDb();

			$stmt = $conn->prepare("SELECT  id, username, email FROM user WHERE (username=:username OR email=:username) AND password=:password");
			$stmt->bindParam(":username", $login["username"]);
			$stmt->bindParam(":password", $login["password"]);
			$stmt->execute();
			$user_info = $stmt->fetchAll();
			return $user_info;
		}
	}
?>
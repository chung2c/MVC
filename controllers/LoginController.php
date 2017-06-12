<?php

	require("views/LoginView.php");
	require("models/LoginModel.php");

	class LoginController {

		public function login(){

			session_start();
				if($_SERVER["REQUEST_METHOD"] === "GET"){
					if(isset($_GET["mes"])){
						$messenger = $_GET["mes"];
					}
					$loginView = new LoginView();
					$loginView -> login($messenger);

					}else{
						$username = isset($_POST["username"]) == true ? $_POST["username"] : "";
						$password = isset($_POST["password"]) == true ? $_POST["password"] : "";
						$passwordHash = sha1($password);

						$login = array(
								"username" => $username,
								"password" => $passwordHash
							);

						$loginModel = new LoginModel();
						$user_info = $loginModel -> login($login);

						if(count($user_info) > 0){
								$_SESSION["user_info"] = $user_info;
								header("Location: index.php");
						}else{
							header("Location: index.php?action=login&mes=wrong user name and password");
						}

				}
		}

		public function logout(){
			session_start();// Check xem có Session đăng nhập ko. Ko có -> login
			unset($_SESSION["user_info"]);
			header("Location: index.php");
		}
	}
?>
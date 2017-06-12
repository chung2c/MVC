<?php
require("models/ProModel.php");
require("views/ProView.php");
	class ProController {

		public function getPro(){

			if(isset($_GET["id"])){
				$cate_id = $_GET["id"];

				$id = array("cate_id" => $cate_id);

				$proModel = new ProModel();
				$products = $proModel -> getProOfCate($id);
			}else{
				$proModel = new ProModel();
				$products = $proModel -> getAllPro();
			}
			
			$proView = new ProView();
			$proView -> showPro($products);
 
		}


		public function addPro(){
			$proModel = new ProModel();
			$categories = $proModel->cateOption();

			$addPro = new ProView();
			$addPro->formAddPro($categories);
		}

		public function doAddPro(){

			$name = $_POST["name"];
			$cate_id = $_POST["cate_id"];
			$desc = $_POST["desc"];
			$price = $_POST["price"];

			
			// Lấy ra mili giây rồi thay kiểu tên duy nhất
			$microtime = microtime();
			$microtime = str_replace(" ", "_", $microtime);
			$microtime = str_replace(".", "_", $microtime);
			
			$target_dir = "uploads/"; // Thư mục chứa ảnh trên Server
			$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // Lấy dữ liệu ảnh bằng $_FILES rồi lấy ra đuôi file
			$file_name = $target_dir . $microtime . "." . $extension; // Tạo ra tên file mới = Thư mục + Tên duy nhất + đuôi file.

			//$file_name = str_replace("../", "", $file_name); - Nếu muốn lưu sang thư mục khác thì phải xóa đi đường dẫn ../ trong tên ảnh.
			$uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $file_name);
			$pro = array(
				"name" => $name,
				"description" => $desc,
				"image" => $file_name,
				"price" => $price,
				"cate_id" => $cate_id

				);

			$proModel = new ProModel();
			$proModel->addPro($pro);

			header("Location: index.php?action=pro");
		}


		public function updatePro(){

			$proId = $_GET["id"];

			$proModel = new ProModel();
			$products = $proModel->showUpdatePro($proId);

			$proModel = new ProModel();
			$categories = $proModel->cateOption();

			$proView = new ProView();
			$proView -> showUpdatePro($products, $categories);
			
		}

		public function doUpdatePro(){

			$id = $_GET['id'];

			$name 	= $_POST['name'];
			$cate_id 	= $_POST['cate_id'];
			$desc 	= $_POST['desc'];
			$price 	= $_POST['price'];

			$microtime = microtime();
			$microtime = str_replace(" ", "_", $microtime);
			$microtime = str_replace(".", "_", $microtime);
			
			$target_dir = "uploads/"; // Thư mục chứa ảnh trên Server
			$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // Lấy dữ liệu ảnh bằng $_FILES rồi lấy ra đuôi file
			$file_name = $target_dir . $microtime . "." . $extension; // Tạo ra tên file mới = Thư mục + Tên duy nhất + đuôi file.

			//$file_name = str_replace("../", "", $file_name); - Nếu muốn lưu sang thư mục khác thì phải xóa đi đường dẫn ../ trong tên ảnh.
			$uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $file_name); 
			// Sử dụng hàm "move_uploaded_file" để chuyển ảnh từ tmp -> thư mục uploads.

			$upPro = array(
					"id" => $id,
					"name" => $name,
					"cate_id" => $cate_id,
					"description" => $desc,
					"image" => $file_name,
					"price" => $price
				);

			if($uploaded){

				$proModel = new ProModel();
				$proModel->updateProi($upPro);

			}else{

				$proModel = new ProModel();
				$proModel->updatePro($upPro);
				
			}

			header("Location: index.php?action=pro");
		}

		public function removePro(){

			session_start();
			if(!isset($_SESSION["user_info"])){
				header("Location: index.php?action=login&mes=");
			}else{

				$id = $_GET['id'];

				$proModel = new ProModel();
				$proModel->removePro($id);

				Header("Location: index.php?action=pro");

			}
		}
	}
?>
<?php

require("models/CateModel.php");
require("views/CateView.php");

	class CateController {

		public function getCate(){

			
			

			$cateModel = new CateModel();
			$cates = $cateModel->getCate();


			$cateView = new CateView();
			$cateView->showAllCate($cates);
		}

		public function addCate(){


			$addCate = new CateView();
			$addCate->formAddCate();
		}

		public function doAddCate(){

			
			$name 	= $_POST['name'];
			$desc 	= $_POST['desc'];

			$microtime = microtime();
			$microtime = str_replace(" ", "_", $microtime);
			$microtime = str_replace(".", "_", $microtime);
			
			$target_dir = "uploads/"; // Thư mục chứa ảnh trên Server
			$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // Lấy dữ liệu ảnh bằng $_FILES rồi lấy ra đuôi file
			$file_name = $target_dir . $microtime . "." . $extension; // Tạo ra tên file mới = Thư mục + Tên duy nhất + đuôi file.

			//$file_name = str_replace("../", "", $file_name); - Nếu muốn lưu sang thư mục khác thì phải xóa đi đường dẫn ../ trong tên ảnh.
			$uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $file_name); 
			// Sử dụng hàm "move_uploaded_file" để chuyển ảnh từ tmp -> thư mục uploads.
			$cate = array(
				"name" => $name,
				"description" => $desc,
				"image" => $file_name
				);
			


			$cateModel = new CateModel();
			$cateModel->addCate($cate);

			header("Location: index.php");


		}

		public function updateCate(){

			$cateId = $_GET['id'];


			$cateModel = new CateModel();
			$categories = $cateModel->showUpdateCate($cateId); 


			$cateView = new CateView();
			$cateView->showUpdateCate($categories);
		}

		public function doUpdateCate(){
			$id = $_GET['id'];
			$name 	= $_POST['name'];
			$desc 	= $_POST['desc'];
			$microtime = microtime();
			$microtime = str_replace(" ", "_", $microtime);
			$microtime = str_replace(".", "_", $microtime);
			
			$target_dir = "uploads/"; // Thư mục chứa ảnh trên Server
			$extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION); // Lấy dữ liệu ảnh bằng $_FILES rồi lấy ra đuôi file
			$file_name = $target_dir . $microtime . "." . $extension; // Tạo ra tên file mới = Thư mục + Tên duy nhất + đuôi file.

			//$file_name = str_replace("../", "", $file_name); - Nếu muốn lưu sang thư mục khác thì phải xóa đi đường dẫn ../ trong tên ảnh.
			$uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $file_name); 
			// Sử dụng hàm "move_uploaded_file" để chuyển ảnh từ tmp -> thư mục uploads.

			$upCate = array(
					"id" => $id,
					"name" => $name,
					"description" => $desc,
					"image" => $file_name
				);

			if($uploaded){

				$cateModel = new CateModel();
				$cateModel->updateCatei($upCate);

			}else{

				$cateModel = new CateModel();
				$cateModel->updateCate($upCate);
				
			}

			header("Location: index.php");
		}
		
		public function removeCate(){
			session_start();
			if(!isset($_SESSION["user_info"])){
				header("Location: index.php?action=login&mes=");
			}else{
				
				$id = $_GET['id'];

				$cateModel = new CateModel();
				$cateModel->removeCate($id);

				Header("Location: index.php");
			}
		}

		
	}
?>
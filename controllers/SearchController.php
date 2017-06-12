<?php
require("models/SearchModel.php");
require("views/SearchView.php");

	class SearchController {

		public function search(){

			if (isset($_REQUEST['ok'])) 
		        {
		            // Gán hàm addslashes để chống sql injection
		            $search = addslashes($_POST['search']);
		 
		            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
		            if (empty($search)) {
		                echo "Yeu cau nhap du lieu vao o trong";
		            } 
		            else
		            {
		                
		            	$searchModel = new SearchModel();
		            	$cates = $searchModel->search($search);

		            	$searchView = new SearchView();
		            	$searchView -> showSearch($cates);
		 
		            }

		        }

		}

	}
?>
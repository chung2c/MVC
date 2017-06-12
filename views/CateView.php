<?php
	
	class CateView {
		public function showAllCate($cates){
			require_once("templates/cate.php");
		}

		public function formAddCate(){
			require_once("templates/addcate.php");
		}

		public function showUpdateCate($categories){
			require_once("templates/updatecate.php");
		}


	}
?>
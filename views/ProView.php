<?php
	
	class ProView {

		public function showPro($products){
			require_once("templates/product.php");
		}

		public function formAddPro($categories){
			require_once("templates/addpro.php");
		}

		public function showUpdatePro($products, $categories){
			require_once("templates/updatepro.php");
		}
	}

?>
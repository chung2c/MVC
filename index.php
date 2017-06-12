<?php
	
	require("controllers/CateController.php");
	require("controllers/ProController.php");
	require("controllers/LoginController.php");
	require("controllers/CartController.php");
	require("controllers/SearchController.php");


	$cateController = new CateController();
	$proController = new ProController();
	$loginController = new LoginController();
	$cartController = new CartController();
	$searchController = new SearchController();


	

	if(isset($_GET["action"])){
		switch ($_GET["action"]) {
			case "addCate":
				$cateController->addCate();
				break;
			case "doAddCate":
				$cateController->doAddCate();
				break;
			case "updateCate":
				$cateController->updateCate();
				break;
			case "doUpdateCate":
				$cateController->doUpdateCate();
				break;
			case "removeCate":
				$cateController->removeCate();
				break;
			case "pro":
				$proController->getPro();
				break;
			case "addPro":
				$proController->addPro();
				break;
			case "doAddPro":
				$proController->doAddPro();
				break;
			case "updatePro":
				$proController->updatePro();
				break;
			case "doUpdatePro":
				$proController->doUpdatePro();
				break;
			case "removePro":
				$proController->removePro();
				break;
			case "login":
				$loginController->login();
				break;
			case "logout":
				$loginController->logout();
				break;
			case "cart":
				$cartController->showCart();
				break;
			case "addCart":
				$cartController->addCart();
				break;
			case "minusCart":
				$cartController->minusCart();
				break;
			case "deleteCart":
				$cartController->deleteCart();
				break;
			case "search":
				$searchController->search();
				break;

		}

	}else{
			
			$cateController->getCate();
		}
?>
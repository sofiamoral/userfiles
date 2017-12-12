<?php 

include_once(dirname(__FILE__) . '/../controller/maincontroller.php');
include_once(dirname(__FILE__) . '/../controller/usercontroller.php');
include_once(dirname(__FILE__) . '/../controller/filescontroller.php');

use Controller\MainController;
use Controller\UserController;
use Controller\FilesController;

if(isset($_GET['m'])){
	if($_GET['m']=='users'){
		$userController = new \Controller\UserController\UserController($_POST);		
	}
	else if($_GET['m']=='files'){
		$filesController = new \Controller\FilesController\FilesController($_FILES,$_POST);		
	}	
}
else {
	$mainController = new \Controller\MainController\MainController();	
}
<?php
/**
* 
**/
namespace Controller\MainController;
include_once(dirname(__FILE__) . '/viewcontroller.php');

use Controller\ViewController;

class MainController{

	public function __construct(){	
		$this->index();
	}

    public function index(){
		$this->show('main','main', '');			
    }	
    
    public function show($template,$varname,$values){
		$this->view = new \Controller\ViewController\View($template);
		$this->view->assign($varname, $values);			
    }	
}
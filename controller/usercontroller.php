<?php
/**
* 
**/
namespace Controller\UserController;
include_once(dirname(__FILE__) . '/../model/usermodel.php');
include_once(dirname(__FILE__) . '/viewcontroller.php');

use Model\UserModel;
use Controller\ViewController;

class UserController{
	public $error;
	public $user;
	public $view;
	public $template;
	public $users;

	public function __construct($post){
    	$this->user = new \Model\UserModel\User($post);
        if($_GET['m'] == 'users'){
            isset($post['s'])?$this->index($post['s']):$this->index('list');
        }		
	}

    public function index($section){
    	if ($section=='list'){
    		$this->users=$this->getAll();
    		$this->show('useradmin','users', $this->users);
    	} else if($section=='useradd'){
			$this->show('useraddform','user', $this->user);    		
    	} else if($section=='useraddform'){
    		$this->add();
			$this->users=$this->getAll();    		
    		$this->show('useradmin','users', $this->users);
    	} else if($section=='useredit'){
			$this->getOne();
			$this->show('usereditform','user', $this->user);
    	} else if($section=='usereditform'){
			$this->edit();
			$this->users=$this->getAll();
			$this->show('useradmin','users', $this->users);
    	} else if($section=='userdelete'){
			$this->delete();
			$this->users=$this->getAll();
			$this->show('useradmin','users', $this->users);			
    	} 
    }	

    public function add(){
    	return $this->user->addUser();
    }

    public function edit(){
    	return $this->user->updateUser();
    }

    public function delete(){
    	return $this->user->deleteUser();
    }    

    public function getOne(){
    	$result= $this->user->getOneUser();
		$this->user->setParams($result); 
		return $result;   	
    } 

    public function getAll(){
    	return $this->user->getAllUsers();
    }    

    public function show($template,$varname,$values){
		$this->view = new \Controller\ViewController\View($template);
		$this->view->assign($varname, $values);			
    }	
}
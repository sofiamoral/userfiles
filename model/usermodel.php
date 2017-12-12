<?php
/**
* 
**/
namespace Model\UserModel;
include_once(dirname(__FILE__) . '/../database/database.php');

use Database\Database;


class User{
	private $id;
	private $username;
	private $fullname;
	private $email;
	private $password;
	private $isAdmin;
	private $db;
	private $query;
	private $table = "users";
	public $error;

	public function __construct($params){
		$this->db = new \Database\Database\Database();
		$this->setParams($params);
	}

	public function setParams($params){
	    if(isset($params['id'])) $this->setId($params['id']);				
	    if(isset($params['username'])) $this->setUsername($params['username']);
	    if(isset($params['fullname'])) $this->setFullname($params['fullname']);
	    if(isset($params['email'])) $this->setEmail($params['email']);
	    if(isset($params['password'])) $this->setPassword($params['password']);
	    if(isset($params['isAdmin'])) $this->setIsAdmin($params['isAdmin']);		
	}

	public function addUser(){
		$this->query='insert into '.$this->table.'(username,fullname,email,password,isadmin) values("'.$this->getUsername().'","'.$this->getFullname().'","'.$this->getEmail().'","'.$this->getPassword().'","'.$this->getIsAdmin().'");';
		return $this->db->execute($this->query);
	}

	public function updateUser(){
		$this->query='update '.$this->table.' set username="'.$this->getUsername().'", fullname="'.$this->getFullname().'", email="'.$this->getEmail().'", password="'.$this->getPassword().'", isadmin="'.$this->getIsAdmin().'" where id = '.$this->getId().';';
		return $this->db->execute($this->query);
	}
	public function deleteUser(){
		$this->query='delete from '.$this->table.' where id ='.$this->getId().';';
		return $this->db->execute($this->query);
	}

	public function getAllUsers(){
		$this->query='select * from '.$this->table.';';
		return $this->db->getAll($this->query);
	}

	public function getOneUser(){
		$this->query='select * from '.$this->table.' where id = '.$this->getId().';';
		return $this->db->getOne($this->query);
	}

	public function getId(){
		return $this->id;
	}	

	public function getUsername(){
		return $this->username;
	}

	public function getFullname(){
		return $this->fullname;
	}

	public function getEmail(){
		return $this->email;
	}	

	public function getPassword(){
		return $this->password;
	}

	public function getIsAdmin(){
		return $this->isAdmin;
	}	

	private function setId($id){
		$this->id = $id;
	}	

	private function setUsername($username){
		$this->username = $username;
	}

	private function setFullname($fullname){
		$this->fullname = $fullname;
	}

	private function setEmail($email){
		$this->email = $email;
	}	

	private function setPassword($password){
		$this->password = $password;
	}

	private function setIsAdmin($isAdmin){
		$this->isAdmin = $isAdmin;
	}				
}
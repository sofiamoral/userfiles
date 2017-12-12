<?php
/**
* 
**/
namespace Model\FileModel;
include_once(dirname(__FILE__) . '/../database/database.php');

use Database\Database;


class File{
	private $id;
	private $filename;
	private $date;
	private $viewed = 0;
	private $users;
	private $db;
	private $query;
	private $table = "files";
	public $error;

	public function __construct($params,$post){
		$this->db = new \Database\Database\Database();
		$this->setParams($params,$post);
	}

	public function setParams($params,$post){
		if(isset($post['id'])) {
			$this->setId($post['id']);
			$file = $this->getOneFile();
			$this->setViewed($file['viewed'] + 1);
			$this->updateFile();
		}	
		if(isset($post['users'])) 
			$this->setUsers(implode(",", $post['users']));		
	    if(isset($params['name'])) 
	    	$this->setFilename($params['name']);				
	    $this->setDate(date("Y-m-d h:i:s",strtotime('now')));
	}

	public function addFile(){
		$this->query ='insert into '.$this->table.'(filename,date,viewed,users) values("'.$this->getFilename().'","'.$this->getDate().'",'.$this->getViewed().',"'.$this->getUsers().'");';
		return $this->db->execute($this->query);
	}

	public function updateFile(){
		$this->query='update '.$this->table.' set viewed="'.$this->getViewed().'" where id = '.$this->getId().';';
		return $this->db->execute($this->query);
	}

	public function getAllFiles(){
		$this->query='select * from '.$this->table.';';
		return $this->db->getAll($this->query);
	}

	public function getOneFile(){
		$this->query='select * from '.$this->table.' where id = '.$this->getId().';';
		return $this->db->getOne($this->query);
	}

	public function getId(){
		return $this->id;
	}	

	public function getFilename(){
		return $this->filename;
	}

	public function getDate(){
		return $this->date;
	}

	public function getViewed(){
		return $this->viewed;
	}	

	public function getUsers(){
		return $this->users;
	}		

	private function setId($id){
		$this->id = $id;
	}	

	private function setFilename($filename){
		$this->filename = $filename;
	}

	private function setDate($date){
		$this->date = $date;
	}

	private function setViewed($viewed){
		$this->viewed = $viewed;
	}

	private function setUsers($users){
		$this->users = $users;
	}						
}
<?php
/**
* 
**/
namespace Controller\FilesController;
include_once(dirname(__FILE__) . '/../model/filemodel.php');
include_once(dirname(__FILE__) . '/viewcontroller.php');
include_once(dirname(__FILE__) . '/../controller/usercontroller.php');

use Model\FileModel;
use Controller\UserController;
use Controller\ViewController;

class FilesController{
    public $src;
    public $tmp;
    public $filename;
    public $type;
    public $uploadfile;
    public $files;
    public $users;     

    public function __construct($files,$post){  
        $file = isset($files['file'])?$files['file']:'';
        $this->files = new \Model\FileModel\File($file,$post);     
        $this->index($files, $post);
    }

    public function index($files,$post){
        if(isset($post['s'] )){
            if ($post['s'] == 'fileadd') {
                $this->users = new \Controller\UserController\UserController('');
                $this->show('filesupload','users', $this->users->getAll()); 
                return true;
            } else if ($post['s'] == 'fileview'){
                $this->show('filesadmin','files', $this->getAll()); 
                return true;
            }            
        }

        if(isset($files['file'])) {
            $this->setParams($files);           
            if(!($this->uploadfile())) {
                $this->users = new \Controller\UserController\UserController('');
                $this->show('filesupload','users', $this->users->getAll());                  
                return false;
            } else {
                $this->files->addFile();
                $this->show('filesadmin','files', $this->getAll()); 
                return true;
            }
        } 
        $this->users = new \Controller\UserController\UserController('');
        $this->show('filesadmin','files', $this->files->getAllFiles());          
    }  

    private function setParams($files){
        $this->src = realpath(dirname(dirname($_SERVER['SCRIPT_FILENAME'])).'/uploads/'); 
        $this->filename = $files["file"]["name"];
        $this->tmp = $files["file"]["tmp_name"];
        $this->uploadfile = $this->src .'/'. basename($this->filename); //echo  $this->uploadfile; die;       
    }     

    private function uploadfile(){
        if(move_uploaded_file($this->tmp, $this->uploadfile)){
            return true;
        }
        return false;
    }

    public function getAll(){
        return $this->files->getAllFiles();
    } 

    public function show($template,$varname,$values){
        $this->view = new \Controller\ViewController\View($template);
        $this->view->assign($varname, $values);         
    }   
}

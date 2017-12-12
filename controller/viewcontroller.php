<?php
/**
* 
**/
namespace Controller\ViewController;

class View{

    private $data = array();

    private $render = FALSE;

    public function __construct($template){
        $file = dirname(__FILE__).'/../views/templates/' . strtolower($template) . '.tpl.php';

        if (file_exists($file)) {
            $this->render = $file;
        } else {
            echo 'Error: Template ' . $file . ' not found!';
        }

    }

    public function assign($variable, $value){
        $this->data[$variable] = $value;
    }

    public function __destruct(){
        extract($this->data);
        include($this->render);

    }
}
?>
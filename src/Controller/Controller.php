<?php
// ./src/Controller/Controller.php

namespace src\Controller;

use \src\View\View;
use \src\Service\FlashBag;

// Parent controller
class Controller{

    private $em; // doctrine object

    public function __construct($em){
        $this->em = $em;
    }

    public function getDoctrine(){
        return $this->em;
    }

    // Shortcut to render method
    public function render($folder, $file, $data = []){
        $view = new View($folder,$file);
        return $view->renderView($data);
    }

    public function getFlashBag(){
        return FlashBag::getInstance();
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 11:38
 */
namespace src\Controller;

use src\View\View;

class DefaultController
{
    public function indexAction(){
        $view = new View('default','index');
        return $view->renderView(['default'=>null]);

    }

}
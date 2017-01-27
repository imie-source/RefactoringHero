<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 23/12/2016
 * Time: 09:42
 */

namespace src\Controller;

use src\Model\PowerDAO;
use src\Model\PowerDTO;
use src\View\View;

class PowerController
{
    private $powerDAO;
    private $powerDTO;

    public function __construct()
    {
        $this->powerDAO = new PowerDAO();
        $this->powerDTO = new PowerDTO();
    }

    public function getAllAction($datas=null,$powerUpdate=null)
    {
        $powers = $this->powerDAO->getAllPower();
        $view = new View('power','allPower');
        return $view->renderView(['powers'=>$powers,'powerUpdate'=>$powerUpdate]);
    }

    public function getOneAction($datas=null)
    {
        if(isset($datas[2])) {
            $this->powerDTO->setPowerId($datas[2]);
            $powerDTO = $this->powerDAO->getOnePower($this->powerDTO);
            return $this->getAllAction($datas,$powerDTO);
        }else{
            header("location: /".PATH."/index.php/power/getAll");
        }
        return null;
    }

    public function InsertAction()
    {
        $this->powerDTO->hydrate($_POST);
        $this->powerDAO->insertPower($this->powerDTO);
        header("location: /". PATH . "/index.php/power/getAll");
    }

    public function UpdateAction($datas=null)
    {
        if(isset($datas[2])) {
            $this->powerDTO->setPowerId($datas[2]);
            $this->powerDTO->hydrate($_POST);
            $this->powerDAO->updatePower($this->powerDTO);
        }
        header("location: /".PATH."/index.php/power/getAll");

    }

    public function deleteAction($datas=null)
    {
        if(isset($datas[2])) {
            $this->powerDTO->setPowerID($datas[2]);
            $this->powerDAO->deletePower($this->powerDTO);
        }
        header("location: /".PATH."/index.php/power/getAll");
    }

}
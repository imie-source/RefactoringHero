<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 23/12/2016
 * Time: 09:42
 */

namespace src\Controller;


use src\Model\TeamDAO;
use src\Model\TeamDTO;
use src\View\View;

class TeamController
{
    private $teamDTO;
    private $teamDAO;

    public function __construct()
    {
        $this->teamDAO = new TeamDAO();
        $this->teamDTO = new TeamDTO();
    }

    public function getAllAction($datas = null,$teamUpdate=null){
        $teams = $this->teamDAO->getAllTeam();
        $view = new View('team','allTeam');
        return $view->renderView(['teams' => $teams,'teamUpdate'=>$teamUpdate]);
    }

    public function getOneAction($datas=null){
        if(isset($datas[2])) {
            $this->teamDTO->setTeamId($datas[2]);
            $team = $this->teamDAO->getOneTeam($this->teamDTO);
            return $this->getAllAction($datas,$team);
        }else{
            header("location: /".PATH."/index.php/team/getAll");
        }
        return null;
    }

    public function insertAction($datas=null)
    {
        $this->teamDTO->hydrate($_POST);
        $this->teamDAO->insertTeam($this->teamDTO);
        header("location: /".PATH."/index.php/team/getAll");
    }

    public function updateAction($datas=null)
    {
        if(isset($datas[2])) {
            $this->teamDTO->setTeamId($datas[2]);
            $this->teamDTO->hydrate($_POST);
            $this->teamDAO->updateTeam($this->teamDTO);
        }
        header("location: /".PATH."/index.php/team/getAll");
    }

    public function deleteAction($datas=null)
    {
        if(isset($datas[2])) {
            $this->teamDTO->setTeamID($datas[2]);
            $this->teamDAO->deleteTeam($this->teamDTO);
        }
        header("location: /".PATH."/index.php/team/getAll");
    }

}
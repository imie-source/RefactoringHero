<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 23/12/2016
 * Time: 09:42
 */

namespace src\Controller;


use src\Model\TeamDTO;
use src\View\View;

class TeamController extends Controller
{

    public function getAllAction($datas = null,$teamUpdate=null){
        $em = $this->getDoctrine();
        $modif = false;
        $team = new TeamDTO();

        if(isset($datas[2])){
            $modif = true;
            $team = $this->getDoctrine()->getRepository('\src\Model\TeamDTO')->find($datas[2]);
        }

        if(isset($_POST['teamName'], $_POST['teamLogo'])){
            $team->hydrate($_POST);

            $em->persist($team);
            $em->flush();
            header("location: ".PATH."/index.php/team/getAll");
            die();
        }
        
        $teams = $em->getRepository('\src\Model\TeamDTO')->findAll();

        return $this->render('team', 'allTeam', [
            'teams'=>$teams,
            'teamUpdate' => $team
        ]);
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
            $em = $this->getDoctrine();
            $repo = $em->getRepository('src\Model\TeamDTO');
            $this->getDoctrine()->remove($repo->find($datas[2]));
            $em->flush();
        }

        header("location: ".PATH."/index.php/team/getAll");
        die();
    }

}
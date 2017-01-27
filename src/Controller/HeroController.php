<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 14:24
 */

namespace src\Controller;

use src\Model\HeroPowerDTO;
use src\Model\PowerDAO;
use src\Model\SuperHeroDAO;
use src\Model\SuperHeroDTO;
use src\Model\TeamDAO;
use src\Model\TeamDTO;
use src\View\View;

class HeroController
{
    private $heroDAO;
    private $heroDTO;

    public function __construct()
    {
        $this->heroDAO = new SuperHeroDAO();
        $this->heroDTO = new SuperHeroDTO();
    }

    /**
     * TODO passer en anglais
     * function qui demande au model tous les super heros
     * affiche ensuite la vue heroView.php avec les heros
     */
    public function getAllAction($datas=null){
        $heroes = $this->heroDAO->getAllHero();

        foreach ($heroes as $hero){
            $team = new TeamDAO();
            $teamDTO = new TeamDTO();
            $teamDTO->setTeamId($hero->getHeroTeamId());
            $teamDTO = $team->getOneTeam($teamDTO);
            $hero->setHeroTeamId($teamDTO);
        }
        $teamDAO = new TeamDAO();
        $teams = $teamDAO->getAllTeam();

        $powerDAO = new PowerDAO();
        $powers = $powerDAO->getAllPower();

        $view = new View('hero','allHero');
        return $view->renderView(['heroes'=>$heroes,'teams'=>$teams,'powers'=>$powers]);
    }

    /**
     * @param null $datas
     */
    public function getOneAction($datas=null){
        if(isset($datas[2])) {
            $this->heroDTO->setHeroID($datas[2]);
            $this->heroDTO = $this->heroDAO->getOneHero($this->heroDTO);
            $teamDAO = new TeamDAO();
            $teams = $teamDAO->getAllTeam();
            $view = new View('hero','oneHero');
            return $view->renderView(['heroDTO'=>$this->heroDTO,'teams'=>$teams]);
        }
    }

    /**
     * @param null $data
     */
    public function insertAction($data=null){
        if (isset($_POST)&&!empty($_POST)){
            var_dump($_POST);
            $powerLevels = [];
            foreach ($_POST['heroPower']as $powerDetail){
                foreach ($_POST as $key => $value){
                    if('heroPowerLevel'.$powerDetail===$key){
                        $heropower = new HeroPowerDTO();
                        $heropower->setHeroPowerHeroID($this->heroDTO->getHeroID());
                        $heropower->setHeroPowerPowerId($powerDetail);
                        $heropower->setHeroPowerLevel($value);
                        $powerLevels[]= 2;
                    }
                }
            }
            die();
            $this->heroDTO->hydrate($_POST);
            $this->heroDAO->insertHero($this->heroDTO);
            header("location: /".PATH."/index.php/hero/getAll");
        }
    }

    /**
     * @param null $datas
     */
    public function updateAction($datas=null){
        if(isset($datas[2])) {
            $heroDTO = new SuperHeroDTO();
            $heroDTO->setHeroID($datas[2]);
            $heroDTO->hydrate($_POST);
            $heroDAO = new SuperHeroDAO();
            $heroDAO->updateHero($heroDTO);
        }
        header("location: /".PATH."/index.php/hero/getAll");
    }

    /**
     *
     * @param null $datas
     */
    public function deleteAction($datas=null){
        if(isset($datas[2])) {
            $this->heroDTO->setHeroID($datas[2]);
            $this->heroDAO->deleteHero($this->heroDTO);
        }
        header("location: /".PATH."/index.php/hero/getAll");
    }

}
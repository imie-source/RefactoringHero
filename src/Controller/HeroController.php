<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 14:24
 */

namespace src\Controller;

use src\Model\HeroPowerDTO;
use src\Model\TeamDTO;
use src\Model\SuperHeroDTO;
use src\Model\PowerDTO;

class HeroController extends Controller
{
    public function getAllAction($datas=null){
        $em = $this->getDoctrine();
        $modif = false;
        $hero = new SuperHeroDTO();

        if(isset($datas[2])){
            $modif = true;
            $hero = $this->getDoctrine()->getRepository('\src\Model\SuperHeroDTO')->find($datas[2]);
        }

        if(isset($_POST['heroFirstName'], $_POST['heroLastName'], $_POST['heroPseudo'], $_POST['heroCountry'], $_POST['heroTeamId'])){
            $hero->hydrate($_POST);

            $team = $em->getRepository('\src\Model\TeamDTO')->find($_POST['heroTeamId']);

            $hero->setHeroTeam($team);

            if(isset($_POST['heroPower'])){
                foreach($_POST['heroPower'] as $power){
                    $p = $em->getRepository('src\Model\PowerDTO')->find((int)$power);

                    $heroPower = new HeroPowerDTO();
                    $heroPower->setPower($p);
                    $heroPower->setHeroPowerLevel($_POST['heroPowerLevel' . $power]);
                    $hero->addSuperPower($heroPower);
                    $em->persist($heroPower);
                }
            }            

            $em->persist($hero);

            $em->flush();
            header("location: ".PATH."/index.php/hero/getAll");
            die();
        }

        $heroes = $em->getRepository('src\Model\SuperHeroDTO')->findAll();
        $teams = $em->getRepository('src\Model\TeamDTO')->findAll();
        $powers = $em->getRepository('src\Model\PowerDTO')->findAll();

        return $this->render('hero', 'allHero', [
            'heroes'=>$heroes,
            'teams'=>$teams,
            'powers'=>$powers,
            'heroUpdate' => $hero
        ]);
    }

    /**
     * @param null $datas
     */
    public function getOneAction($datas=null){
        if(isset($datas[2])) {
            $em = $this->getDoctrine();

            $hero = $em->getRepository('src\Model\SuperHeroDTO')->find($datas[2]);

            return $this->render('hero', 'oneHero', [
                'heroDTO'=> $hero
            ]);
        }

        header("location: ".PATH."/index.php/hero/getAll");
        die();
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

    public function deleteAction($datas=null)
    {
       if(isset($datas[2])) {
            $em = $this->getDoctrine();
            $repo = $em->getRepository('src\Model\SuperHeroDTO');
            $this->getDoctrine()->remove($repo->find($datas[2]));
            $em->flush();
        }

        header("location: ".PATH."/index.php/hero/getAll");
        die();
    }

}
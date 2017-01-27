<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 23/12/2016
 * Time: 15:15
 */

namespace src\Model;


class HeoPowerDAO extends Connexion
{
    public function getAllPower(){
        $sql = "SELECT hero_power_id,hero_power_hero_id, hero_power_power_id,hero_power_level FROM super_hero.sh_hero_power;";
        $result = $this->requestDB($sql);
        $heroPowers = [];
        while ($row = $result->fetch()){
            $heroPower = new HeroPowerDTO();
            $heroPower->hydrate($row);
            $heroPowers[]=$heroPower;
        }
        return $heroPowers;
    }

    public function getOneHeroPower(HeroPowerDTO $heroPower){
        $sql = "SELECT hero_power_id,hero_power_hero_id, hero_power_power_id,hero_power_level FROM super_hero.sh_hero_power WHERE sh_hero_power.hero_power_id = ?;";
        $params = [$heroPower->getHeroPowerID()];
        $result = $this->requestDB($sql,$params);

        $row = $result->fetch();
        $heroPower = new HeroPowerDTO();
        $heroPower->hydrate($row);

        return $heroPower;
    }

    public function insertHeroPower(HeroPowerDTO $heroPower)
    {
        $sql = "INSERT INTO super_hero.sh_hero_power (	hero_power_hero_id, hero_power_power_id,hero_power_level)".
            "VALUES(?,?,?);";
        $params = [$heroPower->getHeroPowerHeroID(),$heroPower->getHeroPowerPowerId(),$heroPower->getHeroPowerLevel()];
//        var_dump($params);die();
        $this->requestDB($sql,$params);
    }

    public function updateHeroPower(HeroPowerDTO $heroPower)
    {
        $sql = "UPDATE sh_hero_power SET sh_hero_power.hero_power_hero_id = ?,sh_hero_power.hero_power_power_id = ?, sh_hero_power.hero_power_level=? WHERE sh_hero_power.hero_power_id = ?";
        $params = [$heroPower->getHeroPowerHeroID(),$heroPower->getHeroPowerPowerId(),$heroPower->getHeroPowerLevel(),$heroPower->getHeroPowerID()];
        $this->requestDB($sql,$params);

    }

    /**
     * @param HeroPowerDTO $heroPower
     * todo a supp
     */
    public function deleteHeroPower(HeroPowerDTO $heroPower)
    {
        $sqlTeam = "DELETE FROM sh_hero_power WHERE sh_hero_power.hero_power_id = ?;";
        $params = [$heroPower->getHeroPowerId()];
        $this->requestDB($sqlTeam,$params);

    }
}
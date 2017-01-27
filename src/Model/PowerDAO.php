<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 10:17
 */

namespace src\Model;




class PowerDAO extends Connexion
{
    public function getAllPower(){
        $sql = "SELECT power_id,power_name, power_desc FROM sh_power;";
        $result = $this->requestDB($sql);
        $powers = [];
        while ($row = $result->fetch()){
            $power = new PowerDTO();
            $power->hydrate($row);
            $powers[]=$power;
        }
        return $powers;
    }

    public function getOnePower(PowerDTO $power){
        $sql = "SELECT power_id,power_name, power_desc FROM sh_power WHERE sh_power.power_id = ?;";
        $params = [$power->getPowerId()];
        $result = $this->requestDB($sql,$params);
        
        $row = $result->fetch();
        $power = new PowerDTO();
        $power->hydrate($row);
       
        return $power;
    }
    
    public function insertPower(PowerDTO $power)
    {
        $sql = "INSERT INTO sh_power (	sh_power.power_name, sh_power.power_desc)".
            "VALUES(?,?);";
        $params = [$power->getPowerName(),$power->getPowerDesc(),];
//        var_dump($params);die();
        $this->requestDB($sql,$params);
    }

    public function updatePower(PowerDTO $power)
    {
        $sql = "UPDATE sh_power SET sh_power.power_name= ?, sh_power.power_desc=? WHERE sh_power.power_id = ?";
        $params = [$power->getPowerName(),$power->getPowerDesc(),$power->getPowerId()];
        $this->requestDB($sql,$params);

    }

    public function deletePower(PowerDTO $power)
    {
        $sqlTeam = "DELETE FROM sh_power WHERE sh_power.power_id = ?;";
        $params = [$power->getPowerId()];
        $this->requestDB($sqlTeam,$params);
        
    }
}
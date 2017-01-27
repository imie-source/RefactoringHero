<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 09:59
 */

namespace src\Model;

class TeamDAO extends Connexion
{

    public function getAllTeam(){
        $sql = "SELECT team_id, team_name,team_logo FROM sh_team;";
        $result = $this->requestDB($sql);
        $teams = [];
        while ($row = $result->fetch()){
            $team = new TeamDTO();
            $team->hydrate($row);
            $teams[]=$team;
        }
        return $teams;
    }

    public function getOneTeam(TeamDTO $team){
        $sql = "SELECT team_id, team_name,team_logo FROM sh_team WHERE team_id = ?;";
        $params  = [$team->getTeamId()];
        $result = $this->requestDB($sql,$params);
        $row = $result->fetch();
        $team->hydrate($row);
    return $team;
}

    public function insertTeam(TeamDTO $team){
       $sql = "INSERT INTO sh_team(team_name,team_logo) VALUES(?,?);";

       $params = [$team->getTeamName(),$team->getTeamLogo()];

       $this->requestDB($sql,$params);
       return null;
    }

    public function updateTeam(TeamDTO $team){
       $sql = "UPDATE sh_team SET team_name= ?,team_logo=? WHERE team_id = ?";
       $params = [$team->getTeamName(),$team->getTeamLogo(),$team->getTeamId()];
       $this->requestDB($sql,$params);
    }

    public function deleteTeam(TeamDTO $team){
       $sqlHeroes = "UPDATE sh_hero SET hero_team_id = 1 WHERE hero_team_id = ?;";
       $paramsHeroes= [$team->getTeamId()];
       $this->requestDB($sqlHeroes,$paramsHeroes);

       $sqlTeam = "DELETE FROM sh_team WHERE team_id = ?;";
       $params = [$team->getTeamId()];
       $this->requestDB($sqlTeam,$params);
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 11:29
 */
namespace src\Model;

use src\Model\SuperHeroDTO;

class SuperHeroDAO extends Connexion
{
    /**
     * insert a hero in the DB
     * @param $hero
     */

    public function getAllHero()
    {
        $sql = "SELECT  hero_id,
                        hero_first_name,
                        hero_last_name,
                        hero_pseudo,
                        hero_country,
                        hero_logo,
                        hero_team_id 
                        FROM super_hero.sh_hero;";
        $result = $this->requestDB($sql);
        $heroes = [];
        while ($row = $result->fetch()){
            $hero = new SuperHeroDTO();
            $hero->hydrate($row);
            $heroes[] = $hero;
        }
        return $heroes;
    }

    public function getOneHero(SuperHeroDTO $hero)
    {
        $sql = "SELECT hero_id,
                        hero_first_name,
                        hero_last_name,
                        hero_pseudo,
                        hero_country,
                        hero_logo,
                        hero_team_id 
                        FROM super_hero.sh_hero 
                        WHERE hero_id = ?;";
        $params = [$hero->getHeroID()];
        $result = $this->requestDB($sql,$params);
        $row = $result->fetch();
        $hero->hydrate($row);
        return $hero;
    }

    public function insertHero(SuperHeroDTO $hero)
    {

        $sql = "INSERT INTO sh_hero(hero_first_name,
                            hero_last_name,
                            hero_pseudo,
                            hero_country,
                            hero_team_id)
        VALUES (?,?,?,?,?)";
        $params = [
            $hero->getHeroFirstName(),
            $hero->getHeroLastName(),
            $hero->getHeroPseudo(),
            $hero->getHeroCountry(),
            $hero->getHeroTeamId()
        ];
        $this->requestDB($sql,$params);
    }

    public function updateHero(SuperHeroDTO $hero)
    {
        $sql = "UPDATE sh_hero SET hero_first_name=?,
                            hero_last_name=?,
                            hero_pseudo=?,
                            hero_country=?,
                            hero_team_id=? 
                            WHERE hero_id = ?;";
        $params = [
            $hero->getHeroFirstName(),
            $hero->getHeroLastName(),
            $hero->getHeroPseudo(),
            $hero->getHeroCountry(),
            $hero->getHeroTeamId(),
            $hero->getHeroID()
        ];

        $this->requestDB($sql,$params);
    }

    public function deleteHero(SuperHeroDTO $hero)
    {
        $sql = "DELETE FROM super_hero.sh_hero WHERE hero_id = ?;";
        $params = [$hero->getHeroID()];
        $this->requestDB($sql,$params);
    }

}
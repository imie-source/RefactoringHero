<?php

/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 20/12/2016
 * Time: 16:13
 */

namespace src\Model;

class SuperHeroDTO
{
    /******************* Attributs *******************/
    private $heroID;
    private $heroFirstName;
    private $heroLastName;
    private $heroPseudo;
    Private $heroCountry;
    private $heroTeamId;
    private $superPowers = [];

    /****************** Method ***********************/

    public function hydrate($datas){
        foreach ($datas as $key => $value){
            $newKey = '';
            $flag = false;
            $ii=0;
           while ( $ii < strlen($key)){
                if($key[$ii]==='_'){
                    $flag = true;
                }else{
                    if($flag){
                        $newKey .= strtoupper($key[$ii]);
                        $flag = false;
                    }else {
                        $newKey .= $key[$ii];
                    }
                }
               $ii++;
           }
           $newKey = 'set'.ucfirst($newKey);
            if(method_exists($this,$newKey)){
                $this->$newKey($value);
            }
        }
    }

    /**
     * @return mixed
     */

    /****************** Getters and Setters *********/


    /**
     * @return mixed
     */
    public function getHeroID()
    {
        return $this->heroID;
    }

    /**
     * @param mixed $heroID
     */
    public function setHeroID($heroID)
    {
        $this->heroID = $heroID;
    }

    public function getHeroFirstName()
    {
        return $this->heroFirstName;
    }

    /**
     * @param mixed $heroFirstName
     */
    public function setHeroFirstName($heroFirstName)
    {
        $this->heroFirstName = $heroFirstName;
    }

    /**
     * @return mixed
     */
    public function getHeroLastName()
    {
        return $this->heroLastName;
    }

    /**
     * @param mixed $heroLastName
     */
    public function setHeroLastName($heroLastName)
    {
        $this->heroLastName = $heroLastName;
    }

    /**
     * @return mixed
     */
    public function getHeroPseudo()
    {
        return $this->heroPseudo;
    }

    /**
     * @param mixed $heroPseudo
     */
    public function setHeroPseudo($heroPseudo)
    {
        $this->heroPseudo = $heroPseudo;
    }

    /**
     * @return mixed
     */
    public function getHeroCountry()
    {
        return $this->heroCountry;
    }

    /**
     * @param mixed $heroCountry
     */
    public function setHeroCountry($heroCountry)
    {
        $this->heroCountry = $heroCountry;
    }

    /**
     * @return mixed
     */
    public function getHeroTeamId()
    {
        return $this->heroTeamId;
    }

    /**
     * @param mixed $heroTeamId
     */
    public function setHeroTeamId($heroTeamId)
    {
        $this->heroTeamId = $heroTeamId;
    }



}
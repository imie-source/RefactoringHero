<?php

namespace src\Model;

/**
* @Entity
* @Table(name="hero_power")
**/
class HeroPowerDTO
{
    //************************** Attributes ****************************************/

    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    private $id;

    /**
    * @ManyToOne(targetEntity="HeroPowerDTO", inversedBy="superPowers")
    **/
    private $hero;

    /**
    * @ManyToOne(targetEntity="PowerDTO")
    **/
    private $power;

    /**
    * @Column(type="integer", name="hero_power_level")
    **/
    private $heroPowerLevel;


    //************************** Method ********************************************/

    /**
     * @param $datas for hydrate the DTO from the database
     * @return nothing
     */
    public function hydrate($datas){
        foreach ($datas as $key => $value){
            $newKey = '';
            $underScore = false;
            $ii=0;
            while ( $ii < strlen($key)){
                if($key[$ii]==='_'){
                    $underScore = true;
                }else{
                    if($underScore){
                        $newKey .= strtoupper($key[$ii]);
                        $underScore = false;
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
        return null;
    }

    //***************************Getters and setters *******************************/


    /**
     * @return mixed
     */
    public function getHeroPowerID()
    {
        return $this->heroPowerID;
    }

    /**
     * @param mixed $heroPowerID
     */
    public function setHeroPowerID($heroPowerID)
    {
        $this->heroPowerID = $heroPowerID;
    }

    /**
     * @return mixed
     */
    public function getHeroPowerHeroID()
    {
        return $this->heroPowerHeroID;
    }

    /**
     * @param mixed $heroPowerHeroID
     */
    public function setHeroPowerHeroID($heroPowerHeroID)
    {
        $this->heroPowerHeroID = $heroPowerHeroID;
    }

    /**
     * @return mixed
     */
    public function getHeroPowerPowerId()
    {
        return $this->heroPowerPowerId;
    }

    /**
     * @param mixed $heroPowerPowerId
     */
    public function setHeroPowerPowerId($heroPowerPowerId)
    {
        $this->heroPowerPowerId = $heroPowerPowerId;
    }

    /**
     * @return mixed
     */
    public function getHeroPowerLevel()
    {
        return $this->heroPowerLevel;
    }

    /**
     * @param mixed $heroPowerLevel
     */
    public function setHeroPowerLevel($heroPowerLevel)
    {
        $this->heroPowerLevel = $heroPowerLevel;
    }




}
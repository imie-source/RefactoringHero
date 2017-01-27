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
    * @ManyToOne(targetEntity="SuperHeroDTO", inversedBy="superPowers")
    **/
    private $hero;

    /**
    * @ManyToOne(targetEntity="PowerDTO", inversedBy="heroesPower")
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
    public function getId()
    {
        return $this->id;
    }

    public function getHero(){
        return $this->hero;
    }

    public function setHero(SuperHeroDTO $hero){
        $this->hero = $hero;
    }

    public function getPower(){
        return $this->power;
    }

    public function setPower(PowerDTO $power){
        $this->power = $power;
        $power->addHero($this);
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
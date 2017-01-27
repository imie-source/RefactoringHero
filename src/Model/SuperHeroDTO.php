<?php

namespace src\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity(repositoryClass="SuperHeroRepository")
* @Table(name="super_hero")
**/
class SuperHeroDTO
{
    /******************* Attributs *******************/
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    private $id;
    /**
    * @Column(type="string", name="hero_firstname")
    **/
    private $heroFirstName;
    /**
    * @Column(type="string", name="hero_lastname")
    **/
    private $heroLastName;
    /**
    * @Column(type="string", name="hero_pseudo")
    **/
    private $heroPseudo;
    /**
    * @Column(type="string", name="hero_country")
    **/
    private $heroCountry;
    /**
    * @ManyToOne(targetEntity="TeamDTO")
    * @JoinColumn(name="hero_team_id")
    **/
    private $heroTeam;
    /**
    * @OneToMany(targetEntity="HeroPowerDTO", mappedBy="hero")
    **/
    private $superPowers;

    public function __construct(){
        $this->superPowers = new ArrayCollection();
    }

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
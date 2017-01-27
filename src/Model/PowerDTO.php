<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 10:18
 */

namespace src\Model;

use Doctrine\Common\Collections\ArrayCollection;

/**
* @Entity
* @Table(name="power")
**/
class PowerDTO
{
    //************************** Attributes ****************************************/
    /**
    * @Id
    * @GeneratedValue
    * @Column(type="integer")
    **/
    private $id;
    /**
    * @Column(type="string", name="power_name")
    **/
    private $powerName;
    /**
    * @Column(type="string", name="power_desc")
    **/
    private $powerDesc;

    /**
    * @OneToMany(targetEntity="HeroPowerDTO", mappedBy="power")
    **/
    private $heroesPower;

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

    public function __construct(){
        $this->heroesPower = new ArrayCollection();
    }

    public function addHero(HeroPowerDTO $heroPower){
        $this->heroesPower[] = $heroPower;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPowerName()
    {
        return $this->powerName;
    }

    /**
     * @param mixed $powerName
     */
    public function setPowerName($powerName)
    {
        $this->powerName = $powerName;
    }

    /**
     * @return mixed
     */
    public function getPowerDesc()
    {
        return $this->powerDesc;
    }

    /**
     * @param mixed $powerDesc
     */
    public function setPowerDesc($powerDesc)
    {
        $this->powerDesc = $powerDesc;
    }



}
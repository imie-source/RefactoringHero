<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 10:18
 */

namespace src\Model;


class PowerDTO
{
    //************************** Attributes ****************************************/
    private $powerId;
    private $powerName;
    private $powerDesc;

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
    public function getPowerId()
    {
        return $this->powerId;
    }

    /**
     * @param mixed $powerId
     */
    public function setPowerId($powerId)
    {
        $this->powerId = $powerId;
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
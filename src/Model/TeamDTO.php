<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 08/11/2016
 * Time: 09:36
 */

namespace src\Model;


class TeamDTO
{
    //************************** Attributes ****************************************/
    private $teamId;
    private $teamName;
    private $teamLogo;

    //************************** Method ********************************************/

    /**
     * @param $datas for hydrate the DTO from the database
     * @return null
     */
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
        return null;
    }

    public function __toString()
    {
        return $this->getTeamName();
    }

    //***************************Getters and setters *******************************/

    /**
     * @return mixed
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @param mixed $teamId
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return mixed
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * @param mixed $teamName
     */
    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;
    }

    /**
     * @return mixed
     */
    public function getTeamLogo()
    {
        return $this->teamLogo;
    }

    /**
     * @param mixed $teamLogo
     */
    public function setTeamLogo($teamLogo)
    {
        $this->teamLogo = $teamLogo;
    }







}
<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 23/12/2016
 * Time: 09:42
 */

namespace src\Controller;

use src\Model\PowerDTO;
use src\View\View;

class PowerController extends Controller
{

    public function getAllAction($datas = null)
    {
        $em = $this->getDoctrine();
        $modif = false;
        $power = new PowerDTO();

        if(isset($datas[2])){
            $modif = true;
            $power = $this->getDoctrine()->getRepository('\src\Model\PowerDTO')->find($datas[2]);
        }

        if(isset($_POST['powerName'], $_POST['powerDesc'])){
            $power->hydrate($_POST);

            $em->persist($power);
            $em->flush();
            header("location: ".PATH."/index.php/power/getAll");
            die();
        }
        
        $powers = $em->getRepository('\src\Model\PowerDTO')->findAll();

        return $this->render('power', 'allPower', [
            'powers'=>$powers,
            'powerUpdate' => $power
        ]);
    }

    public function deleteAction($datas=null)
    {
        if(isset($datas[2])) {
            $em = $this->getDoctrine();
            $repo = $em->getRepository('src\Model\PowerDTO');
            $this->getDoctrine()->remove($repo->find($datas[2]));
            $em->flush();
        }

        header("location: ".PATH."/index.php/power/getAll");
        die();
    }

}
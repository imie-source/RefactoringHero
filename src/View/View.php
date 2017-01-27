<?php
/**
 * Created by PhpStorm.
 * User: r-1
 * Date: 21/12/2016
 * Time: 12:20
 */

namespace src\View;


class View
{
    private $file;

    public function __construct($nameFolder, $nameFile)
    {
        $this->file = "./src/View/".$nameFolder."/".$nameFile."View.php";
    }

    public function renderView($datas){
        $content = $this->generateFile($this->file,$datas);
        return $this->generateFile('./src/View/layout.php', ['content'=>$content]);
    }

    private function generateFile($view, $datas){
        if(file_exists($view)){
            if(isset($datas)){
                extract($datas);
                ob_start();
                require_once ($view);
                return ob_get_clean();

            }
        }else{
            throw new \Exception("le fichier $view est introuvable mon lapin...");
        }
    }

}
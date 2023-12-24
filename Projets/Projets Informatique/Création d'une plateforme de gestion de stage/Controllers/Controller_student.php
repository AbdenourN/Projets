<?php
class Controller_student extends Controller
{
    public function action_default()
    {
        
        // $this->action_recherche();
      
    }

    public function action_profile()
    {   //Complexité algorithmique de ce code est O(1) car il effectue une seule opération de 
        //vérification de la présence d'un paramètre dans un tableau $_GET 
        if(isset($_GET["id"]) and preg_match("/^[0-9]+$/",$_GET["id"]))
        {
            $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
            $res=$bd->getStudentinfo($_GET["id"]);
            $docs=$bd->getStudentdoc($_GET["id"]);

            $data=[
                "res"=>$res[0],
                "docs"=>$docs
            ];
            $this->render("student",$data);
        }
        
    }

}
<?php
class Controller_research extends Controller
{
    public function action_default()
    {
        //complexite algorithmique : O(1) car elle fais 1 action recherche
        $this->action_recherche();
      
    }

    public function action_recherche()
    {
        //complexite algorithmique :  O(n) car elle utilise deux fonctions (getUserinfo() et research_student()) 
        //qui ont chacune une complexité O(n) où n est le nombre d'utilisateurs et étudiants dans la base de données 
        //qui répondent aux critères de recherche.
        $bd= Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
        $user=$bd->getUserinfo();
        // var_dump($_GET);
        $tab=[];
        $attr=["name","formation","Stage","group","Niveau"];
        foreach($attr as $v){
            if (isset($_POST[$v]) and !empty($_POST[$v]))
            {
                $tab[$v]=$_POST[$v];
            }
        }
        $data=$bd->research_student($tab);
        $this->render("recherche",["title"=>"Recherche étudiant","user_info"=>$user,"data"=>$data]);
        
    }

    
}
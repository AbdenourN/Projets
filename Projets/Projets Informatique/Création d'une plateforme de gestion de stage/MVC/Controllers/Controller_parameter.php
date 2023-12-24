<?php
class Controller_parameter extends Controller
{
    public function action_default()
    {
        //complexite algorithmique : O(1) car elle fais 1 action parametre 
        $this->action_parametre();
      
    }

    public function action_parametre()
    {    
        //complexite alghorimique : O(n) car elle utilise une fonction getUserinfo() 
        //qui a une complexité O(n) où n est le nombre d'utilisateurs dans la base de données.
        $bd= Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
        $user=$bd->getUserinfo();
        $this->render("parametre",["title"=>e($user["Nom"])." ".e($user["Prenom"]),"user_info"=>$user]);
    }

    // La complexité de code est de O(1) , car elle affiche seulement grâce à un render la view modif mot de passe
    public function action_modif_mdp()
    {
        $this->render("modif_mdp",["title"=>"Modifier le mot de passe"]);
    }
    
    // La complexité de code est de O(1) , car elle affiche seulement grâce à un render la view modif e-mail.
    public function action_modif_mail()
    {
        $this->render("modif_mail",["title"=>"Modifier l'email"]);
    }


}



?>
<?php
class Controller_User extends Controller
{
    public function action_default()
    {
        //complexite algorithmique : O(1) car elle fait 1 action recherche

        $this->action_connexion();
      
    }

    public function action_connexion()
    
    {   //complexité algorithmique : O(n) car il vérifie si la présence de la session connected et de username 
        if (isset($_SESSION["connected"]) and $_SESSION["connected"]==true)
        {
            $this->action_dashbord();
        }
        else
        {
            if (isset($_POST["username"]) and isset($_POST["password"]))
            {
                $bd=Model::getModel($_POST["username"], $_POST["password"]);
                if(!$bd->isconnected())
                    {
                        return $this->render("login",["title"=>"Connexion","error"=>"Les informations entrées ne nous ont pas permis de vous trouver la base de données"]);
                    }
                else
                    {
                        $bd->setco(true);
                        $_SESSION["connected"] = true;
                        $_SESSION["us"]=$_POST["username"];
                        $_SESSION["mdp"]=$_POST["password"];
                        $_SESSION["role"]=$bd->getRole();
                        return $this->action_dashbord();
            }
        }
            else
            {
                return $this->render("login",["title"=>"Connexion"]);
            }
        
    }
    }

    public function action_dashbord()
    {
      //complexite algorithmique : o(n^3)car elle utilise trois fonctions (GetBOS, getUserinfo, GetCount) 
      //qui ont chacune une complexité O(n) où n est le nombre d'utilisateurs et BOS dans la base de données.

        $bd= Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
        
        if (!$bd->getRole())
        {
            $res=$bd->GetBOS(3);
            $user=$bd->getUserinfo();
            $data=[
                    "title"=>"Acceuil",
                    "boss"=>$res,
                    "total_bos"=> $bd->GetCount("bos"),
                    "bos_accepte"=>$bd->GetCount("bos validé"),
                    "bos_refused"=>$bd->GetCount("bos refusé"),
                    "user_info"=>$user
                ];
            return $this->render("dashboard",$data);
        }
        else
        {
            $this->render("message",["title"=>"Vue étudiant","message"=>"Dashboard du profil étudiant"]);
        }
    }

    public function action_logout()
    {   //Complexité algorithmique : O(n) car il fait appel à la fonction setco qui est de O(log n) et 
        //vérifie la présence de la session connected
        if (isset($_SESSION["connected"]) and $_SESSION["connected"]==true)
        {

            $bd= Model::getModel($_SESSION["us"],$_SESSION["mdp"]);   
            $bd->setco(false);
            $bd->close_co();
            unset($bd);
            $_SESSION["connected"] = false;
            unset($_SESSION["us"]);
            unset($_SESSION["mdp"]);
            foreach($_POST as $v)
            {
                unset($v);
            }
        }
        header('Location: index.php');
        exit;
    }

    public function action_mdpo()
    {   
        //complexite algorithmique : O(1) car elle fait 1 action recherche

        $this->render("mdp_oublie");
    }
} 
?>
<?php
class Controller_set extends Controller
{
    public function action_default()
    {
    
        header("Location: ?controller=user");        
        exit; 
    }

    public function action_status()
        {
            
            //Complexité algorithmique: O(1). Cela signifie que le temps d'exécution de ce code ne dépend pas de la taille 
            //des données. Cela est dû au fait que le code effectue un nombre fixe d'opérations indépendamment de la taille des 
            //données.
            if(isset($_SESSION["connected"]))
            {
                
                
                if(isset($_POST["bosid"]) and preg_match("/^[0-9]+$/",$_POST["bosid"])  and isset($_POST["state"]))
                    {
                        $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
                        if($bd->isindbbos($_POST["bosid"]))
                        {
                            
                            $bd->change_status($_POST["bosid"],$_POST["state"]);
                            $pp=$_POST["bosid"];
                            unset($_POST["state"]);
                            unset($_POST["bosid"]);
                            
                            header('Location: ?controller=bos&action=info&id='.$pp);
                            
                            exit;
                        }
                        else
                        {
                            header("Location: ?controller=bos");
                            exit;
                        }
                    }
                    else
                    {
                        header("Location :?controller=bos");
                        exit;
                    }
            }
            else
            {
                $this->action_default();
            }
        }

    public function action_mail()
    {
        $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
        if( isset($_POST["email"]) and $_POST["email"]== $bd->getMail() and $bd->verifpswd($_POST["pswd"])

            and isset($_POST["new_email"]) and filter_var($_POST['new_email'], FILTER_VALIDATE_EMAIL) == true){

            $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
            $bd->change_mail($bd->getUserID(),$_POST["new_email"]);
            $StringExplo=explode("?",$_SERVER['REQUEST_URI']);
            $host='http://' . $_SERVER['HTTP_HOST'];
                $HeadTo=$host.$StringExplo[0]."/?controller=parameter";
                Header("Location: ".$HeadTo);
                exit;
            
            
        }

    }
    public function action_psw()
    {
      //complexite algorithmique : o(n^3) car elle utilise trois fonctions (verifpswd, preg_match et password_hash) 
      //qui ont chacune une complexité O(n) où n est la longueur de la chaîne de caractères passée en entrée.
        $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
        if(isset($_POST["new_pswd"]) and isset($_POST["confirm_new_pswd"]) and $_POST["new_pswd"]== $_POST["confirm_new_pswd"]and $bd->verifpswd($_POST["pswd"])and
        preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",$_POST["new_pswd"])){
            
            $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
            $bd->change_mdp($bd->getUserID(),password_hash($_POST["new_pswd"], PASSWORD_DEFAULT));
            $StringExplo=explode("?",$_SERVER['REQUEST_URI']);
            $host='http://' . $_SERVER['HTTP_HOST'];
                $HeadTo=$host.$StringExplo[0]."?controller=parameter";
                Header("Location: ".$HeadTo);
                exit;
            
        }
        else{
            $StringExplo=explode("?",$_SERVER['REQUEST_URI']);
            $host='http://' . $_SERVER['HTTP_HOST'];
                $HeadTo=$host.$StringExplo[0]."?controller=parameter&action=modif_mdp";
                Header("Location: ".$HeadTo);
                exit;
        }


    }

   public function action_forgot()
   
   {
    //complexite algorimique : O(n) car elle utilise une fonction isexist() 
    //qui a une complexité O(n) où n est le nombre d'utilisateurs dans la base de données.
        if(isset($_POST["mdpo"]) and filter_var($_POST["mdpo"], FILTER_VALIDATE_EMAIL))
        
        {
            $bd = Model::getModel("abdenour le bg","tkt");
            $res=$bd->isexist($_POST["mdpo"]);
            if($res != null)
            {
                sendmail($_POST["mdpo"],$res[0]);
                
                $this->render("message",["title"=>"Message","message"=>"Message envoyé"]);
            }
            else{
                $StringExplo=explode("/",$_SERVER['REQUEST_URI']);
                $HeadTo=$StringExplo[0]."/?controller=user&action=mdpo";
                Header("Location: ".$HeadTo);
                exit;
        }
        }
        else
        {
            $StringExplo=explode("/",$_SERVER['REQUEST_URI']);
            $HeadTo=$StringExplo[0]."/?controller=user&action=mdpo";
            Header("Location: ".$HeadTo);
            exit;
        }
   }
   
}
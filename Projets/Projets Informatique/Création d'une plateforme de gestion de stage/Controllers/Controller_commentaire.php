<?php
class Controller_commentaire extends Controller
{
    public function action_default()
    {
        
        //La complexité de ce est O(n) , Il déclenche une autre méthode action_addComment() 
        // qui elle gére l'ajout de commentaires,
        $this->action_addComment();
      
    }

    public function action_addComment()
    {
        //La complexité de ce code est O(n). Il vérifie si une session est connectée, si c'est le cas, 
        // il utilise les informations de la session pour se connecter à la base de données.
        if(isset($_SESSION["connected"]) and $_SESSION["connected"]==true)
            {
                $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
                if (isset($_POST["visibility"]) and $_POST["comment"] and !empty($_POST["comment"]) and isset($_POST["bos_id"]))
                {
                    $comment = $_POST["comment"];
                    $doc_id=$_POST["bos_id"];
                    $perso_id = $bd->getUserinfo()["Personnel_ID"];
                    $visibility = $_POST["visibility"];
                    $bd->add_comment($comment,$doc_id,$perso_id,$visibility);
                    header("Location: ?controller=bos&action=info&id=".e($_POST["bos_id"]));
                    var_dump($comment,$doc_id,$perso_id,$visibility);
                    exit;
            }
                else
                {
                    header("Location: ?controller=user");
                    exit;
                }
            }
        else
        {
            $this->render("message",["title"=>"Non connecté","message"=>"Vous n'êtes pas connecté"]);
        }
    }

}
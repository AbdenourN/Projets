<?php
class Controller_bos extends Controller
{
    public function action_default()
    {
        
        $this->action_list();
      
    }

    public function action_list()
    {
        // La complexité de ce code est O(n^3), où "n" est le nombre de lignes de table BOS.
        if(isset($_SESSION["connected"]) and $_SESSION["connected"]==true)
            {
                $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
                $res=$bd->GetBOS($bd->GetCount("bos"));

                $user=$bd->getUserinfo();
                $data=[
                        "title"=>"Liste bos",
                        "boss"=> $res,
                        "user_info"=>$user
                    ];
                $this->render("bos_list",$data);
            }
        else
        {
            $this->render("message",["title"=>"Non connecté","message"=>"Vous n'êtes pas connecté"]);
        }
    }

    public function action_info()
    {
        //La complexité de ce code PHP est O(1), car dans le if il vérifie si un paramètre "id" est
        // présent dans l'URL, si ce paramètre existe alors il utilise ce paramètre et effectue
        // une requêtes dans la base de données et affiche les résultats.
        if(isset($_GET["id"]) and preg_match("/^[0-9]+$/",$_GET["id"]))
        {
            $bd=Model::getModel($_SESSION["us"],$_SESSION["mdp"]);
            if($res=$bd->GetBOS_info($_GET["id"]))
            {
                $user=$bd->getUserinfo();
                $comments=$bd->get_comment($res["Document_ID"]);
                $this->render("bos",["infos"=>$res,"user_info"=>$user,"comments"=>$comments]);
                
            }
            else
            {
                $this->action_list();
            }
        }

        else
        {
            $this->action_list();
        }
    }

    

}
?>
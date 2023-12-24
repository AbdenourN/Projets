<?php
class Controller_notif extends Controller
{
    // La complexité de ce code est O(1), il appel seulement la function action_notif()
    public function action_default()
    {
        
        $this->action_notif();
      
    }

    // La complexité de ce code est O(1), il effectue seulement un render 
    // qui affiche la vue notifications.
    public function action_notif()
    {
        $this->render("notifications",["title"=>"Notifications"]);
    }


}



?>
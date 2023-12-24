<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/Notification.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Notification</title>
    <script src="Content/js/darkmmode.js"></script>
</head>
        <!-- Partie 1 -->
<body>
    <div class="divider">   
        <div class="menu"> 

            <div class="submenu"> 

                <div class="button">  
                    <a href="?controller=user&action=dashboard"> Accueil</a>
                </div>

                <div class="button">  
                    <a href="?controller=parameter"> <?= e($user_info["Nom"])." ".e($user_info["Prenom"])?></a>
                </div>

                <div class="button">  
                    <a href="?controller=research"> Recherche étudiant</a>
                </div>

                <div class="button">  
                    <a href="?controller=bos">BOS</a>
                </div>

            </div>
        </div>
        <!-- Partie 2 -->
        <div class="divider2">

            <div class="bos_list">
            
                <div class="titre">
                    <h1><strong> Notification</strong></h1>
                </div>
                <hr>
                <div class = "Etat_msg">
                    <div class="button2">
                        <a href="">tous </a>
                    </div>
                    <div class="button2">
                        <a href="">pas lu  </a>
                    </div>
                    <div class="button2">
                        <a href="">lu  </a>
                    </div>
                    <div class="button2">
                        <a href="">suivi  </a>
                    </div>
                          
                </div>
             
                <hr>
                <div class = "menu_bos">
                    <img class="image" src ="profil_vide.jpg">    

                    <div class="notif_suivi">
                        L’élève <a href="">NOM PRENOM</a> que vous suivez a déposé un BOS
                        <div class="notif_date">
                              16:28
                            04/03/2023
                        </div>
                    </div>
                
              
                </div>
                <hr> 

                <div class = "menu_bos">
                    <img class="image" src ="profil_vide.jpg">    

                    <div class="notif_suivi">
                        L’élève <a href="">NOM PRENOM</a> à répondu à votre commentaire
                        <div class="notif_date">
                            12:11
                            02/03/2023
                      </div> 
                        
                    </div>
                    
                </div>
                <hr> 

                <div class = "menu_bos"  onclick="location.href='';" style="cursor: pointer;" >
                    <img class="image" src ="profil_vide.jpg">    

                    <div class="notif_suivi">
                        L’élève <a href="">NOM PRENOM</a> vous a mentionné : (message)
                        <div class="notif_date">
                            14:48
                            01/03/2023
                      </div>
                    </div>
                    
              
                </div>
                <hr>
                <div class = "menu_bos"  onclick="location.href='';" style="cursor: pointer;" >
                    <img class="image" src ="profil_vide.jpg">    

                    <div class="notif_suivi">
                        L’élève <a href="">NOM PRENOM</a> que vous suivez a déposé un CV
                        <div class="notif_date">
                            17:52
                            27/02/2023
                      </div>
                    </div>
                    
              
                </div>

                
            </div>
    





</body>
</html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Content/css/dashboard.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <title>Document</title>
    <script src="Content/js/darkmmode.js"></script>

</head>
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
                <div class="mode">
                    <img class="change" src="Content/Img/lune.png" alt="lune" onclick="lance()">
                </div>
                <div class="button1">  
                    <a href="?controller=user&action=logout">Se déconnecter</a>
                </div>
                
                
            </div>

            
        </div>
        <!-- Partie 2 -->
        <div class="divider2">  
            <div class="dashmenu">  
                <div class="menu_info">  
                    <div class="info">  
                        <h2><?= $total_bos ?> <br>B.O.S</h2>
                    </div>
                    <div class="info"> 
                        <h2><?=$bos_accepte ?><br> B.O.S accepté(s)</h2>
                    </div>
                    <div class="info">  
                       <h2><?= $bos_refused ?><br>B.O.S refusé(s)</h2>
                    </div>
                </div>
            </div>
                <!-- Partie 3 -->
            <div class="divider3">
                <div class="bos_list">
                    
                    <?php foreach($boss as $bos):?>
                        <!-- Vérifier BOS FLAG trkl -->
                        <?php if($bos != NULL and 1==1): ?>
                            <div class="menu_bos"  onclick="location.href='?controller=bos&action=info&id=<?= e($bos['BOS_ID'])?>';" style="cursor: pointer;">  
                                <div class="bos_infos">
                                    <a href=""> <?= e($bos["Nom"])." ".e($bos["Prenom"])  ?></a> </br></br></br>
                                    <a><?= e($bos["Date_heure"])?></a></br></br></br>
                                </div>
                                <div class="bos_status">
                                    <a><?=e($bos["Status"])?></a>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php endforeach ?>
                    
                  

                </div>
            
                     <!-- Partie Notif-->
               <div class="notification">
                    <div class="list_notif">
                        <center></br><p>Notifications</p>
                        </center></br>
                        <hr>
                        
                    </div> 
                
               </div>
                
            </div>
        </div>
        
    </div>
  
       
</body>
</html>
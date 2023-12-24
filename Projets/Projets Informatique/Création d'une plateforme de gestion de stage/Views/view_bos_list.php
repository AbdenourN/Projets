<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/listebos.css" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Content/js/darkmmode.js"></script>
    <title><?=$title?></title>
</head>
<body>
    <!-- Partie 1 -->
    <div class="divider">   
        <div class="menu"> 

            <div class="submenu"> 

                <div class="button">  
                    <a href="?controller=user"> Accueil</a>
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

        <div class="divider2">  
            <div class="bosmenu">  
                <?php foreach($boss as $bos):?>
                    <?php if($bos["BOS_FLAG"]==1):?>
                    <div class="menu_liste"  onclick="location.href='?controller=bos&action=info&id=<?= e($bos['BOS_ID'])?>';" style="cursor: pointer;">  
                    
                        <div class="bos_infos">
                            <a href=""> <?= e($bos["Nom"])." ".e($bos["Prenom"])  ?></a> </br></br></br>
                            <a><?= e($bos["Date_heure"])?></a></br></br></br>
                        </div>
                        
                        <div class="bos_status">
                            <a><?=e($bos["Status"])?></a>
                        </div>

                    </div>
                    <?php endif?>
                <?php endforeach ?>
            </div>
        </div>

   
</body>
</html>
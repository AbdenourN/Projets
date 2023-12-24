<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Content/css/BOS.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Content/js/darkmmode.js"></script>
</head>



<body>
    <!-- Partie 1 -->
    <?php //var_dump($infos)?>
    <div class="divider">
        <div class="menu">

            <div class="submenu">

                <div class="button">
                    <a href="?"> Accueil</a>
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

            <div class="dashmenu">

                <div class="menu_info">

                    <div class="info">
                        <p> <?= e($infos["Nom"])." ".e($infos["Prenom"])?></br> </p>
                    </div>

                    <div class="info1">
                        <p> Bos n° :<?= e($infos["BOS_ID"] )?></p></br>
                    </div>
                    <form class="statut" method="post" action="?controller=set&action=status" >
                        <div >
                            <p>Status</p>
                            <select name="state">
                                <option value="<?=e($infos["Status"])?>"> <?=e($infos["Status"])?> </option>
                                <?php foreach(["Non analysé","Attente","Validé","Refusé"] as $v):?>
                                    <?php if($v != $infos["Status"]): ?>
                                        <option value="<?=e($v)?>"> <?=e($v)?> </option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>

                            <input type="submit" value="Changer Statut">
                            <input type="hidden" name="bosid"  value=<?= e($infos["Document_ID"])?>>
                        </div>
                    </form>
                </div>
            </div>
            

            <!-- Partie 3 -->
            <div class="divider3">


                        <iframe class="menu_bos" src="<?= e($infos["URL"])?>" frameborder="0"></iframe>
                           



                <!-- Partie Commentaire-->
                <div class="notification">
                    <div class="list_notif">
                        </br>
                        <form class="visibilite2" action="?controller=commentaire&action=addComment" method="post">
                            <div class="p1">
                                <p>Visibilité</p>
                                <select name="visibility">
                                    <option value="0"> Profs</option>
                                    <option value="1"> Tous </option>
                                </select>
                            </div>
                            <textarea name="comment" placeholder="Entrez un commentaire"></textarea>
                            <input type="hidden" name ="bos_id"value="<?= e($infos["BOS_ID"] )?>">
                            <input type="submit" value="Envoyer">
                        </form>
                        </br>
                        <hr>
                        <div class="cha">

                            <div class="ch">
                                <p>Zone des anciens commentaires</p>
                            </div>

                            <div class="com3">
                                <?php foreach($comments as $com): ?>
                                <p><?= e($com["commentaire"])?><br><br><small><?= e($com["Nom"] ." ".$com["Prenom"])?></small></p><br>
                                <?php endforeach ?>
                            </div>


                        </div>


                    </div>

                </div>

            </div>
        </div>

    </div>


       
</body>
</html>
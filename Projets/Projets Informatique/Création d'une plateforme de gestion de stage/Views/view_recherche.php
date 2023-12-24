<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/recheche.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Content/js/darkmmode.js"></script>
    <link rel="stylesheet" href="Content/css/mdb.min.css" />

</head>

<body>
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

         <!-- Partie 2 -->
        <div class="divider5">
            <form action='?controller=research' method="post">
                    <div>
                        <label> Nom :</label>
                        <input id ="form"  type="text" placeholder="Entrer le nom de l'étudiant" name="name">
                    </div>
                    <div>
                        <label> Formation :</label>
                        <input id ="form"  type="text" placeholder="Entrer la formation" name="formation">
                    </div>
                    <div>
                        <label> Nom de groupe :</label>
                        <input id ="form"  type="text" placeholder="Entrer le groupe" name="group">
                    </div>
                    <div>
                        <label> Niveau :</label>
                        <input id ="form"  type="text" placeholder="Entrer le niveau" name="Niveau">
                    </div>
                    <div>
                        <label> À trouvé un stage</label>
                        <input id ="form1" type="radio" name="Stage" value="1">
                        <label for="form1">Oui</label>
                        <input id ="form1" type="radio" name="Stage" value="0">
                        <label for="form1">Non</label>
                    </div>
                    <input type="submit" value="recherche">
            </form>
            <div class ="students">
                <table id="dtDynamicVerticalScrollExample" class="table table-striped table-bordered table-sm table-hover " cellspacing="0"
                width="100%">
                <thead>
                    <tr>
                    <th class="th-sm">Id</th>
                    <th class="th-sm">Nom</th>
                    <th class="th-sm">Prénom</th>
                    <th class="th-sm">Groupe</th>
                    <th class="th-sm">Niveau</th>
                    <th class="th-sm">A un Stage :</th>
                    </tr>
                </thead>
                <tbody>

                            <?php foreach($data as $row):?>
                                <tr class="table-Default" onclick="location.href='?controller=student&action=profile&id=<?= e($row['Student_ID'])?>';" style="cursor: pointer;">
                                <td><?= e($row["Student_ID"])?></td>
                                <td><?= e($row["Nom"])?></td>
                                <td> <?=e($row["Prenom"])?> </td>
                                <td><?= e($row["group_name"]) ?> </td>
                                <td> <?= e($row["Niveau"]) ?> </td>
                                <?php if($row["Stage_detention"]):?>
                                    <td>Oui</td>
                                <?php else: ?>
                                    <td>Non</td>
                                <?php endif ?>
                                </tr>

                            <?php endforeach ?>
                </tbody>
                </table>
            </div>
        </div>
        </div>
        
        
    </div>
  


       
</body>
</html>
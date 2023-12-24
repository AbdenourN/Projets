<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/profil.css">
    <title><?= e($res["Nom"])." ".e($res["Prenom"])?></title>
</head>


<body>
    <header>
        <a href="?controller=user"><img src="Content/Img/home.png"></a>
       
        <h1>Profil Étudiant</h1>
        <img src="Content/Img/LOGOTYPE-Officiel-Universite-Sorbonne-Paris-Nord.png" alt="Logo" class="logo">
    </header>
    <main>
        <img src="https://digitalpainting.school/static/img/default_avatar.png" class="profile-image" alt="Image de profil">
        <div class="profile-info">
            <h2><?= e($res["Nom"])." ".e($res["Prenom"])?></h2>
            <p>Groupe : <?= e($res["groupe_name"])?></p>
            <p>Numéro étudiant : <?= e($res["Student_ID"])?></p>
            <p>A un Stage :  <?php if($res["Stage_detention"]==1):?>
                    Oui
                    <?php else:?>
                        Non
                    <?php endif ?>
            </p>
        </div>
        <div class="skills">
            <h3>Documents</h3>
            <table>
                <tr>
                    <th> Type</th>
                    <th>Date et heure</th>    
                </tr>
            <tbody>
                <?php foreach($docs as $doc):?>
                    <tr>
                        <td> <?= $doc["Type"]?> </td>
                        <td> <?= $doc["Date_heure"]?> </td>
                    </tr>

                <?php endforeach ?>
            </tbody>

            </table>
        </div>
    </main>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/Mdpo.css">
    <title>Mot de passe oubliée </title>
</head>

<body>
    <img src="Content/Img/logouniv.png" alt="logoUniversité" class="logo-univ">
    <img src="Content/Img/logosorbonne.jpg" alt="logosorbonne" class="logo-sorb">

    <div class="divider1">
        <h2> Réinitialiser le mot de passe </h2>
            <form id="formu" method="post" action="?controller=set&action=forgot">
            <p> Indiquer votre adresse mail</p>
            <input type="text" placeholder="Entrer votre adresse mail" name="mdpo" required>
            </br>
            </br>
                <input href="?controller=user" type="submit" value="Réinitialiser" id="bouton">
            </form>
    </div>
</body>

</html>
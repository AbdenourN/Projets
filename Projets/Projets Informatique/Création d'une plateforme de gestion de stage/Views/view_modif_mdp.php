<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/modif.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Content/js/darkmmode.js"></script>
</head>
        <!-- Partie 1 -->
        <body>
    <div class="divider">
        <div class="menu">

            <div class="submenu">

                <div class="button">
                    <a href="?controller=parameter&action=modif_mdp"> Modifier le mot de passe</a>
                </div>

                <div class="button">
                    <a href="?controller=parameter"> Informations personnelles</a>
                </div>

                <div class="button">
                    <a href="?controller=parameter&action=modif_mail"> Modifier l'email</a>
                </div>

            </div>
        </div>          
        <!-- Partie 3 -->
            <div class="divider_form">
                <div class="form_mdp">
                <form action="?controller=set&action=psw" method="post">

                    <div class="form">
                        <label> Mot de passe actuel :</label>
                        <input id ="form"  type="password" placeholder="Entrer votre mot de passe actuel" name="pswd" required >
                    </div>
                    
                    <div class="form">
                      <label> Nouveau mot de passe :</label>
                      <input id ="form"  type="password" placeholder="Entrer votre nouveau mot de passe" name="new_pswd" required >
                  </div>

                    <div class="form">
                        <label> Confirmer nouveau mot de passe : </label>
                        <input id ="form"  type="password" placeholder="Entrer votre adresse mail" name="confirm_new_pswd" >
                    </div>
                    <input type="submit" value="Confirmer"/> </br>

                </br>
                <input type=button onclick=window.location.href="?controller=user"; value="Annuler" /> </br>
                </form>
                </div>
               
                

            </div>

   
</body>
</html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
                    <a href="?controller=parameter&action=modif_mail"> Modifier l'email</a>
                </div>

                <div class="button">
                    <a href="?controller=parameter"> Informations personnelles</a>
                </div>

                <div class="button">
                    <a href="?controller=parameter&action=modif_mdp"> Modifier le mot de passe</a>
                </div>

            </div>
        </div>          
        <!-- Partie 3 -->
            <div class="divider_form">
                <div class="form_mdp">
                <form action="?controller=set&action=mail" method="post">

                    <div class="form">
                        <label> Email actuel :</label>
                        <input id ="form"  type="text" placeholder="Entrer votre adresse mail actuel" name="email" required >
                    </div>
                    
                   

                    <div class="form">
                        <label> Nouveau email : </label>
                        <input id ="form"  type="text" placeholder="Entrer votre nouvelle adresse mail" name="new_email" >
                    </div>

                    <div class="form">
                      <label> Mot de passe actuel :</label>
                      <input id ="form"  type="password" placeholder="Entrer votre mot de passe actuel" name="pswd" required >
                  </div>

                  <input type="submit"  value="Confirmer" />
                  <input type="button" onclick=window.location.href="?controller=user"; value="Annuler" /> </br>
                </form> 
                </div>

                    <form>
                    <div class="formulaire">
        
                    </br>
                     </br>

                    </br>
                    
                    </div>
                    </form>

            </div>
   
</body>
</html>
            
        


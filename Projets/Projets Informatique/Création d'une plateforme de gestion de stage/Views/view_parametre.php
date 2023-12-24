<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=*, initial-scale=1.0">
    <link rel="stylesheet" href="Content/css/parametre.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="Content/js/darkmmode.js"></script>
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
        <div class="divider4">

            <div class="menu2">

                <div class="submenu">
                

                    <div class="button2">
                       
                        <a href="?controller=parameter">Informations personnelles</a>
                    </div>

                    <div class="button2">
                        
                        <a href="?controller=parameter&action=modif_mdp"> Modifier le mot de passe</a>
                    </div>

                    <div class="button2">
                        
                        <a href="?controller=parameter&action=modif_mail"> Modifier l'email</a>
                    </div>

                </div>

            </div>
                 <!-- Partie 3 -->
            <div class="divider_form">
                <form>

                    <div class="form">
                        <label> Nom :</label>
                        <p><?= e($user_info["Nom"])?></p>
                    </div>
                    
                    <div class="form">
                      <label> Prénom :</label>
                      <p><?= e($user_info["Prenom"])?></p>
                  </div>

                    <div class="form">
                        <label> Email : </label>
                        <p><?= e($user_info["Mail"])?></p>
                    </div>

                    <div class="form">
                        <label> Identifiant enseignant : </label>
                        <p><?= e($user_info["Personnel_ID"])?></p>
                    </div>

                    <div class="form">
                        <label> Rôle : </label>
                        <p><?= e($user_info["Role"])?></p>
                    </div>

                </form>

            </div>


   
</body>
</html>
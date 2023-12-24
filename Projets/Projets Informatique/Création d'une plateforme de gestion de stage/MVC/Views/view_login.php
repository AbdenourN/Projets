<?php require_once "view_begin.php"?>
<link rel="stylesheet" href="Content/css/login.css">
</head>

<body>

    <img class="uspn1" src="Content/Img/logoUSPN.jpg" alt="Logo Sorbonne Paris Nord">

    <img class="photo1" src="Content/Img/devant.jpg" alt="photo Sorbonne Paris Nord" width=100% height=10%>

    <div class="formulaire"></div>
    <form method="post" action="?controller=user">
        <h1>Ouvrir une session </h1>

        <label><b>Identifiant</b></label></br>
        <div class="ligne">
            <img src="Content/Img/images.png" alt="cadena" />
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
        </div> </br>


        <label><b>Mot de passe</b></label></br>
        <div class="ligne">
            <img src="Content/Img/cadena.png" alt="cadena" />
            <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        </div></br>
        </br>

        <p><a href="?controller=user&action=mdpo"> Mot de passe oublié ? </a></p></br>

        </br>
        <input type="submit" value="Me connecter"> </br>
        <?php if(isset($error)):?>
            <center><p class="error">Les informations transmises n'ont pas permis de vous authentifier.</p></center>
        <?php endif?>
    </form>
   
    </div>

    <img class="Content/Img/uspn" src="fondateurCC-ASPC.png" alt="Université Sorbonne Paris Nord">

<?php require_once "view_end.php"?>
<?php
use PHPMailer\PHPMailer\PHPMailer;


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/**
 * Fonction échappant les caractères html dans $message
 * @param string $message chaîne à échapper
 * @return string chaîne échappée
 */
function e($message)
{
    return htmlspecialchars($message, ENT_QUOTES);
}


function sendmail($email,$res)
{
   
   $nwmdp=generate_password(15);
   $bd = Model::getModel("m","test");

   $bd->mdpforgot($res["Username"],$nwmdp);
   $mail = new PHPMailer(true);
   $mail->isSMTP();                                            // Set mailer to use SMTP
   $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'email';                  // SMTP username
   $mail->Password   = 'email_receveur';                         // SMTP password
   $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
   $mail->Port       = 587;                                    // TCP port to connect to

   //Recipients
   $mail->setFrom('email', 'name');
   $mail->addAddress($email,$res["Username"]);     // Add a recipient
   $mail->isHTML(true);                                  // Set email format to HTML
   $mail->Subject = 'Réinitialisation de votre mot de passe';
   $mail->Body    = "<!DOCTYPE html>
   <html>
   
   <head>
       <title>Email de mon entreprise</title>
       <style>
           /* Mise en forme de la page */
           body {
               font-family: Arial, sans-serif;
               margin: 0;
               padding: 0;
   
           }
   
           /* Mise en forme de l'en-tête */
           header {
               background-color: #3498DB;
               color: white;
               padding: 20px;
               text-align: center;
           }
   
           /* Mise en forme du contenu */
           main {
               padding: 20px;
               display: flex;
               flex-direction: column;
               /* Pour conserver l'ordre des éléments */
               align-items: center;
               /* Pour centrer verticalement le contenu */
               justify-content: center;
               /* Pour centrer horizontalement le contenu */
               margin-top: 90px;
           }
   
           /* Mise en forme du contenu du mail */
           main p,
           main h2 {
               text-align: center;
               /* Pour centrer le contenu */
               font-size: 150%;
               /* Pour agrandir le contenu */
           }
   
   
           /* Mise en forme des titres */
           h1,
           h2,
           h3 {
               margin-bottom: 10px;
           }
   
           /* Mise en forme des liens */
           a {
               color: blue;
               text-decoration: none;
           }
       </style>
   </head>
   
   <body>
       <header>
           <h1>Mon entreprise</h1>
       </header>
       <main>
           <p>Votre mot de passe est le suivant : $nwmdp</p>
           <p>Merci de nous avoir contacté.</p>
           <p>Cordialement, <br> L'équipe 6 Athos</p>
       </main>
   </body>
   
   </html>";
   $mail->AltBody = 'Nouveau mot de passe';

   $mail->send();

}

function generate_password($length = 8) {
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#&!-_$*';
    $count = mb_strlen($chars);
    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}
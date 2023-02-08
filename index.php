<?php
//http://localhost/exo/J13-EXO-OBJET-MAIL/index.php

require "classes/classmail.php";

//Test :
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
//__construct($destinataire, $objet, $message, $expediteur, $copie, $copie_cachee )
/*
$monMail = new mail ("christian.mareau@gmail.com", "Mail de test","Bonjour", "christian.mareau@gmail.com","christian.mareau@gmail.com","christian.mareau@gmail.com" );

if ($monMail->envoyerMail()) echo 'Votre message a bien été envoyé ';
else echo "Votre message n'a pas pu être envoyé";
// Failed to connect to mailserver at &quot;localhost&quot; port 25, 
//verify your &quot;SMTP&quot; and &quot;smtp_port&quot; setting in php.ini

*/
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>TP EMAIL</title>
    <meta content="width=device-width, initial-scale=1" name="viewport"/> <!--Responsive-->
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div id="container">
    <header>
        <h1 id="p-title" class="text-center py-2">Envoyer email</h1>
    </header>
    <div class="row">
    
        <div class="col-12 col-md-1"></div>

        <div class="col-12 col-md-11">
        
            <form action="index.php" method="POST">

                <label for="format">Format : </label>
                <select name="format" id="format">
                    <option value="html">html</option>
                    <option value="text">texte</option>
                </select>
                <br>
                <label for="expediteur">Expéditeur : </label><input type="email" name="expediteur" id="expediteur" ><br>
                <label for="destinataire">Destinataire : </label><input type="email" name="destinataire" id="destinataire" required><br>
                <label for="destinataire">Copie : </label><input type="email" name="copie" id="copie"><br>
                <label for="destinataire">Copie cachée : </label><input type="email" name="copie_cachee" id="copie_cachee"><br>
                <label for="objet">Objet : </label><input type="text" name="objet" id="objet" required><br>
                <label for="message">Message : </label><textarea rows="5" cols="60" name="message" id="message" required></textarea><br>
                
                <input type="hidden" name="postedform" value="1">
                <button type="submit" id='bt-envoyer' name='bt-envoyer'>Envoyer</a></button>
                
            </form>
            <div>
                <?php
                if (isset($_POST["postedform"]) and $_POST["postedform"] == 1) {
                    $message = $_POST["message"];
                    if ($_POST["format"] == "html"){
                        $message = '<div style="width: 100%; text-align: center; font-weight: bold">'.$message."</div>";
                    }
                    $monMail = new mail ($_POST["destinataire"], $_POST["objet"],$message, $_POST["expediteur"], $_POST["copie"], $_POST["copie_cachee"]);
                    
                    if ($monMail->envoyerMail()) echo 'Votre message a bien été envoyé ';
                    else echo "Votre message n'a pas pu être envoyé";
                }
                ?>
            </div>
        </div>

        <div class="col-12 col-md-1"></div>
    </div>
    <footer></footer>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous">
</script>
<!-- <script type="text/javascript" src="deconnexion.js"></script>  -->
</body>
</html>


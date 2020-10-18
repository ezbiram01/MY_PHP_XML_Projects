<!--

        auteur : Joel Boudreau
        date :2020
        but :
-->



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Devoir 1</title>
        <style type="text/css">
            input {
                height : 30px;
                font-size : 18pt;
            }

        </style>
    </head>
    <body>
        <h1>Devoir 1 Fonctions pour String</h1>
        <form action="devoir1.php" method="get">
            <input type="text" name="txtChaine" size="40"/>
            <input type="submit" value="Traiter" />
        </form>
        <hr />
        <?php
        if (isset($_GET['txtChaine']) && !empty($_GET['txtChaine'])) {

            $chaine = htmlspecialchars($_GET['txtChaine']);

            echo "La chaine est : $chaine <br />";

            echo 'La chaine en majuscule est : ' . strtoupper($chaine) . '<br />';

            echo 'La chaine est d\'une longueur de ' . strlen($chaine) . ' caractère(s)<br />';

            echo 'La chaine affichée à l\'envers : ' . strrev($chaine) . '<br />';

            echo 'La chaine embellie avec des * sur 20 caractères totals :' . str_pad($chaine, 20, '*', STR_PAD_BOTH) . '<br />';

            echo 'La chaine en initcap : ' . ucwords($chaine) . '<br />';

            $compteurE = substr_count(strtoupper($chaine), 'E');

            echo "La chaine possède $compteurE 'e' <br />";

            echo 'Les mots de la chaine tapée sont :';

            $mots = explode(' ', $chaine);

            echo '<ul>';

            for ($i = 0; $i < count($mots); $i++) {
                echo '<li>' . $mots[$i] . '</li>';
            }

            echo '</ul>';

            echo 'Il y a ' . count($mots) . ' mot(s) dans la phrase';
        }
        ?>

    </body>
</html>

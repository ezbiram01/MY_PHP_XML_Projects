<!-- 
        auteur : Joel Boudreau
        date :  2020
        but :
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Recettes</title>
        <style type="text/css">
            h1 {
                text-align :center;
            }
            body {
                margin : 100px;
            }
        </style>
        <script src="https://kit.fontawesome.com/d2397623ae.js" ></script>
        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#ddlRecettes").change(afficherRecette);
                $("#printBtn").click(print);

            });

            function afficherRecette() {
                var fichier = $("#ddlRecettes").val();
                if (fichier != "aucune") {
                    
                    var xhr = new XMLHttpRequest();

                    xhr.open("GET", "getRecette.php?recette=" + fichier, true);
                    
                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4) {
                            $("#container").html(xhr.responseText);
                            $("#container").hide();
                            $("#container").fadeIn();

                            console.log(xhr.responseText);
                        }

                    };


                    xhr.send();
                    
                } else {
                    
                    $("#container").html("");
                    
                }
            }

            function print() {
                if ($("#container").html() != "") {
                    var w = window.open();
                    w.document.write($('#container').html());
                    w.print();
                    w.close();
                }
            }
        </script>
    </head>
    <body>
        <h1>Affichage des recettes</h1>
        <h2>Voici la liste des recettes disponibles</h2>
        <?php
        $aFiles = scandir('xmlRecettes', 1);

        //enleve les 2 derniers items de mon array --> . et ..
        array_pop($aFiles);
        array_pop($aFiles);


        echo '<ul>';
        foreach ($aFiles as $fichier) {
            $nomRecette = substr($fichier, 0, strlen($fichier) - 4); //enleve .xml
            $nomRecette = str_replace('_', ' ', $nomRecette); //enleve les _
            echo "<li>$nomRecette</li>";
        }
        echo '</ul>';


        echo '<h3>Sélectionner une recette afin d\'afficher les ingrédients</h3>';

        echo '<select id="ddlRecettes">';
        echo '<option value="aucune">Choisir une recette</option>';
        foreach ($aFiles as $fichier) {
            $nomRecette = substr($fichier, 0, strlen($fichier) - 4); //enleve .xml
            $nomRecette = str_replace('_', ' ', $nomRecette); //enleve les _
            echo "<option value=\"$fichier\">$nomRecette</option>";
        }
        echo '</select>';
        ?>  

        <input type="button" value="imprimer" id="printBtn" />
        <hr />
        <div id="container"></div>
    </body>
</html>
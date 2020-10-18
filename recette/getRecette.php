
<?php

if (isset($_GET['recette']) && !empty($_GET['recette'])) {


    $file = "xmlRecettes/{$_GET['recette']}";

    if (file_exists($file)) {
        $recette = simplexml_load_file($file);

        echo '<h1>Liste des ingrédients</h1>';
        echo "<h2>$recette->nom</h2>";

        echo "<h3>Catégorie : {$recette['plat']}</h3>";

        echo "<h3>Calories : {$recette['calories']}</h3>";

        $prepDureeQty = $recette->étapes->préparation->durée['quantité'];
        $prepDureeUnite = $recette->étapes->préparation->durée['unité'];
        echo "<h3>Temps de préparation : $prepDureeQty $prepDureeUnite</h3>";


        $cuissonDureeQty = $recette->étapes->cuisson->durée['quantité'];
        $cuissonDureeUnite = $recette->étapes->cuisson->durée['unité'];
        echo "<h3>Temps de cuisson : $cuissonDureeQty $cuissonDureeUnite</h3>";

        echo "<p>$recette->description</p>";

        if ($recette->notes) {
            echo '<h3>Notes</h3>';
            echo '<ul>';
            foreach ($recette->notes->note as $note) {
                echo "<li><i class=\"fas fa-clipboard-list\"> $note</i></li>";
            }
            echo '</ul>';
        }
        echo '<h3>Liste des ingrédients</h3>';
        echo '<ul>';
        foreach ($recette->liste_ingrédients->ingrédient as $ing) {
            echo '<li><i class="fas fa-utensils"></i> ' . $ing['quantité'] . ' ' . $ing['unité'] . ' ' . $ing . '</li>';
        }
        echo '</ul>';

        echo '<h3>Étapes pour préparation et cuisson</h3>';
        echo '<ul>';
        foreach ($recette->étapes->étape as $etape) {
            echo "<li>$etape->alinéa</li>";
        }
        echo '</ul>';
    } else {

        echo "<p>Le fichier $file est introuvable</p>";
    }
} else {
    echo '<p>Problème au niveau du transfert d\'info</p>';
}
?>
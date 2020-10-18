<!--
    Programmeur: Ziad Biram
    Date       : 25 mai 2020
    Bute:      Test2_question2
-->


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Pays</title>


         <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function () {
              

            });
        </script>
    </head>
    <body>
        <h1>Affichage des Pays</h1>
        <h2>Pays avec au moins 170,000,000 de population</h2>
        <?php
              $fichier = "country.xml";
      
              if (file_exists($fichier)) {

                  $pays = simplexml_load_file($fichier);

                  $popAvg = 0;
                  $espAvg = 0;
                  $compteur = 0;

                    echo "<ol>";
                      foreach ($pays->country as $pay170) {
                          if (intval($pay170->Population) >= intval(170000000))
                            { 
                                echo "<li> <a href='http://fr.wikipedia.org/wiki/$pay170->Name'>$pay170->Code</a> $pay170->Name</li>";
                                                            
                                echo "<ul>";
                                $val = number_format (floatval($pay170->Population),'0','', "," );
                                    echo"<li>Espérance de vie: $pay170->LifeExpectancy</li>";
                                    echo"<li>Poulation: $val</li>";
                                    echo"<li>Gouvernement: $pay170->GovernmentForm</li>";
                                    echo"<li>Continent: $pay170->Continent</li>";
                                echo "</ul>"; 
                                $popAvg += floatval($pay170->Population);
                                $espAvg += floatval($pay170->LifeExpectancy);
                                $compteur++;
                            }
                        }
                    echo "</ol>";
                    echo "Population Moyenne = ".number_format ($popAvg/$compteur,'0','', "," )."<br /><br />";
                    echo "Espérance de vie Moyenne = ".round((number_format ($espAvg/$compteur,'2','.', "," )),2);
                    
                }
                else {
                  echo "<h2>Problème avec la lecture du fichier</h2>";
              }  
			?>
    </body>
</html>

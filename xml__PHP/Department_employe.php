<!--
    Programmeur: Ziad Biram
    Date       : 25 mai 2020
    Bute       : Test2_question1
-->



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Question 1</title>
        <style type="text/css">
            body {
                margin : 100px;
            }
            h1 {
                text-align: center;

            }
        </style>
         <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" >
            $(document).ready(function () {
                $("input").click(getInfo);
            });

            function getInfo(){
               var aRadios = document.forms[0].elements["rdDept"];   

               for (var intCompteur = 0; intCompteur < aRadios.length; intCompteur++)
               {
                    if (aRadios[intCompteur].checked)
                    var valeur = aRadios[intCompteur].value;
               }

               var xhr = new XMLHttpRequest();

                xhr.open("GET", "traitement_question1.php?Info=" + valeur, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        $("#employe_container").html(xhr.responseText);
                    }
                };
                xhr.send(null);

                //alert();
            }

        </script>
    </head>
    <body>
        <h1>Informations Départements et Employés</h1>
        <hr />
        <p>Veuillez sélectionner un département afin d'avoir l'information de ses employés</h1>
        <h2>Départements</h2>   
        <form method="POST">
			<?php
                $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'scott');

                $query = "SELECT deptno, dname, loc from dept ORDER BY dname";
                
                $result = mysqli_query($conn, $query);
                if (!$result) {  
                    echo mysqli_error($conn);  
                    exit; 
                }
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['deptno'];
                    $name = $row['dname'];
                    $location = $row['loc'];
                    //echo "<option value='{$id}'>{$nom}</option>";
                    echo "<label><input type=\"radio\" name=\"rdDept\" value=\"{$id}\" />{$id} – {$name} – {$location}</label><br />";                    
                }
               
                echo '<br />';
    
                mysqli_close($conn);
			?>
		</form>
		<hr />
		<div id="employe_container"></div>

    </body>
</html>

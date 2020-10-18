<!-- 
        auteur : Ziad Biram
        date :  30 avril 2020
        but : Test1
        Fichier:villes.php
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Question1</title>
        <style type="text/css">
            table {margin-left:auto; margin-right:auto;}
            table, td{

                border-style : solid ;
                border-color : black;
                border-width : 1px;
                text-align : right;

            }

            td , th {padding : 20px;}
            th  {
                background-color : lightblue;
                font-weight : bold;
                text-align : center;
                border-style : solid ;
                border-color : black;
                border-width : 1px;
            }



            h1 ,h2, h3{text-align:center;}

        </style>

        <script type="text/javascript">


        </script>
    </head>
    <body>

        <?php
        if (isset($_GET['CountryCode'])) {


            $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'world');

            echo "<h2>Ville du Payer " . htmlspecialchars($_GET['contryName']) . '('.htmlspecialchars($_GET['CountryCode']).')'."</h2>";

            $payer = mysqli_real_escape_string($conn, $_GET['CountryCode']);

            $query = "SELECT * FROM city  WHERE CountryCode='$payer' ORDER BY population DESC";

            $result = mysqli_query($conn, $query);

            if (!$result) {  
                echo mysqli_error($conn);
                exit; 
            }

            echo '<hr />';
            if(mysqli_fetch_assoc($result)!=null)
            {
            echo "<table align='center'>";

                echo "<tr>";
               
                    echo "<th>ID</th>";
                    echo "<th>Name</th>";
                    echo "<th>District</th>";
                    echo "<th>Population</th>";
               
                echo "</tr>";
            }
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo "<tr>";

                echo "<td>{$row['ID']}</td>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['District']}</td>";
                echo "<td>".number_format($row['Population'],0,"",",")."</td>";
                echo "</tr>";
            }
            echo "</table>";

            $enregistrement = mysqli_num_rows($result);

            if($enregistrement==0)
            {
                echo "il n'y aucune ville dans le pays ".$_GET['contryName'];
            }
            else {
                echo "<h2>"."il y a ".$enregistrement." villes(s) dans le pays ".$_GET['contryName']."<h2>";
            }

            mysqli_close($conn);
        } else {
            echo '<h2>Problème au niveau du transfert</h2>';
        }
        ?>

    </body>
</html>

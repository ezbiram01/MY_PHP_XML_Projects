<!-- 
        auteur : Ziad Biram
        date :  30 avril 2020
        but : Test1
        Fichier:pays.php
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

        <h1>Pays</h1>
        <br/>
        <?php
        $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'world');


        $query = 'SELECT * FROM country ORDER BY name';

        $result = mysqli_query($conn, $query);

        if (!$result) { 
            echo mysqli_error($conn);
            exit; 
        }
        
            echo "<table align='center'>";

                echo "<tr>";
               
                    echo "<th>CODE</th>";
                    echo "<th>Name</th>";
                    echo "<th>CONTINENT</th>";
                    echo "<th>REGION</th>";
                    echo "<th>POPULATION</th>";
                    echo "<th>VILLE</th>";
               
                echo "</tr>";
           
            while ($row = mysqli_fetch_assoc($result)) 
            {
                echo "<tr>";
                echo "<td>{$row['Code']}</td>";
                echo "<td>{$row['Name']}</td>";
                echo "<td>{$row['Continent']}</td>";
                echo "<td>{$row['Region']}</td>";
                echo "<td>".number_format($row['Population'],0,"",",")."</td>";
                ?>
                <td><a href="villes.php?CountryCode=<?php echo $row['Code']; ?>&contryName= <?php echo $row['Name']; ?>">Afficher les villes</a></td>
                
                <?php echo "</tr>";
            }
            echo "</table>";

            mysqli_close($conn);
        
        ?>
        
    </body>
</html>

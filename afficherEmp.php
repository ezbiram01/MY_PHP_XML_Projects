<!--
        auteur  : ziad Biram
        date    :16 avril 2020
        but     :Devoir Afficher Emp
-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Pays Continent</title>
        <style type="text/css">
            body { margin : 60px;
            background-color :#778899;}
            h1, p{text-align:center;}
            table{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  border: 1px solid black;
}

td, th {
  border: 1px solid #ddd;
  padding: 8px;
}

tr:nth-child(even){background-color: #DCDCDC;}

tr:hover {background-color: #ddd;}

th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #696969;
  color: white;
}

    </style>
    </head>
    <body>
        <h1 >Affichage des employes</h1>
            <?php
            $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'scott');

            $query = 'SELECT * FROM emp ORDER BY sal DESC';

            $result = mysqli_query($conn, $query);
            $tableHeadre = mysqli_query($conn, $query);

            $conteur = 0;

            echo "<table align='center'>";

            while ($row = mysqli_fetch_assoc($tableHeadre)) 
            {
                $column = array_keys($row);
                echo "<tr>";
                foreach($column as $_header) {
                    echo "<th>".strtoupper($_header)."</th>";
                }
                echo "</tr>";
            break;
            }
            while ($row = mysqli_fetch_row($result)) 
            {
                
                echo "<tr>";
                foreach($row as $_column) {
                    echo "<td>{$_column}</td>";
                }
                echo "</tr>";

                $conteur++;
            }

            echo "</table>";
            echo "</br><p>Il y a {$conteur} enregistrement(s) dans la table EMP</p>";
            mysqli_close($conn);
            ?>
    </body>
</html>

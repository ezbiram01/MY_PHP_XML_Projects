<!--
    Programmeur: Ziad Biram
    Date       : 25 mai 2020
    Bute:      Test2_question1
-->
<?php
    if (isset($_GET['Info']) && !empty($_GET['Info'])) {

        $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'scott');

        mysqli_set_charset($conn, "utf8");

        $chaine = mysqli_real_escape_string($conn, $_GET['Info']);
        $query = "SELECT ename, job, sal from emp WHERE deptno like '$chaine' ORDER BY ename";


        $result = mysqli_query($conn, $query);
        if (!$result) {  
            echo mysqli_error($conn); 
            exit; 
        }

        echo '<ol>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>Employé: {$row['ename']} emploi: {$row['job']} salaire: \${$row['sal']}</li>";
        }
        echo '</ol>';
        echo '<br/>';
        echo'Il y a '. mysqli_num_rows($result).' employés Dans le departement '.$chaine;

        mysqli_close($conn);
    } else {
        echo '<p>Problème au niveau du transfert d\'info</p>';
    }

?>
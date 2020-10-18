<!-- 
        auteur : Joel Boudreau
        date :  2020
        but :
-->
<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <style type="text/css">
            h1,h2 {
                text-align : center;
            }

            body {
                margin : 100px;
                background-color : silver;
            }

            p {
                text-align : center;
            }

            hr {
                width : 50%;
            }

            .important {
                font-weight: bold;
            }
            div {
                margin : 0 auto;
            }
        </style>
    </head>
    <body>
        <h1>Système des ressources humaines</h1>
        <br />
        <h2>Liste des départements</h2>
        <br />
        <?php
        $conn = mysqli_connect('localhost', 'webuser', 'webuser', 'scott');


        $query = 'SELECT * FROM dept ORDER BY loc';

        $result = mysqli_query($conn, $query);

        if (!$result) {  // si le $result est NULL
            echo mysqli_error($conn);  //affichage du message
            exit; //sortie de notre programme.
        }



//        while ($row = mysqli_fetch_assoc($result)) {
//            echo '<div class="card" style="width: 18rem;">';
//            echo '<div class="card-body">';
//            echo "<h5 class=\"card-title\">{$row['dname']}</h5>";
//            echo "<h6 class=\"card-subtitle mb-2 text-muted\">No : {$row['deptno']} </h6>";
//            echo "<p class=\"card-text\">Emplacement : {$row['loc']} </p>";
//            echo "<a href=\"employes.php?deptno={$row['deptno']}\" class=\"card-link\">Employés</a>";
//
//            echo "</div>";
//            echo "</div>";
//            echo "<br />";
//        }

        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['dname']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">No : <?php echo $row['deptno']; ?></h6>
                    <p class="card-text">Emplacement : <?php echo $row['loc']; ?> </p>
                    <a href="employes.php?deptno=<?php echo $row['deptno']; ?>" class="card-link">Employés</a>
                </div>
            </div>
            <br />

        <?php
        }
        echo '<p class="important">Il y a ' . mysqli_num_rows($result) . ' département(s)</p>';

        mysqli_close($conn);
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
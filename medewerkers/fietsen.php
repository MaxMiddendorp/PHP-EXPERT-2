<?php
include "../db.php";
// if(!isset($_SESSION["memail"])){
//     header("Location: ../mlogin.php");
//     exit();
//   }
$email = $_SESSION["memail"];

// try {
//     $sql = "SELECT * FROM users WHERE email=:email";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute(array(":email" => $email));
//     $klant = $stmt->fetch();
//     $_SESSION["klant"] = $klant;
// } catch (PDOException $e) {
//     echo "Error: " . $e->getMessage();
// }
?>
<!doctype html>
<html lang="en">

<head>
    <title></title>
    <?php
        include "../head.php";
    ?>
    <link href="../css/kieslogin.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body id="body">
    <?php
        include "./header.php";
    ?>
    <main class="container">
        <div class="kieslogin-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        </div>

        <br>
        <h2>Alle fietsen:</h2>
        <?php
                try {
                    $query = "SELECT * FROM fietsen";
                    $statement = $pdo->prepare($query);
                    $statement->execute();
                    $out = $statement->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class=\"table\">";
                        echo "<tr>";
                        echo "<th>id</th>";
                        echo "<th>Klant id</th>";
                        echo "<th>Merk</th>";
                        echo "<th>Model</th>";
                        echo "<th>Type</th>";
                        echo "<th>Kleur</th>";
                        echo "<th>Soort rem</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "</tr>";
                        foreach ($out as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['klantid'] . "</td>";
                            echo "<td>" . $row['merk'] . "</td>";
                            echo "<td>" . $row['model'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['kleur'] . "</td>";
                            echo "<td>" . $row['soortRem'] . "</td>";
                            echo "<td><a href=\"editfiets.php?id=$id\"><i class=\"bi bi-pencil-fill\"></i></a></td>";
                            echo "<td><a href=\"deletefiets.php?id=$id\"><i class=\"bi bi-trash-fill\"></i></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        unset($out);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>



        <footer class="pt-3 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block">&copy; 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='addfiets.php'"><i class="bi bi-plus-square"></i>  Voeg fiets toe</button>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='index.php'">Terug naar menu</button>
                    </ul>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>
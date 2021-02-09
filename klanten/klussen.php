<?php
include "../db.php";
if(!isset($_SESSION["email"])){
    header("Location: ../login.php");
    exit();
  }
$email = $_SESSION["email"];

try {
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $klant = $stmt->fetch();
    $_SESSION["klant"] = $klant;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
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
        <h2>Uw klussen:</h2>
        <?php
                try {
                    $stuk = "SELECT * ,time_format(tijdstip,'%H:%i') AS time FROM reparaties WHERE klantid=:klantid";
                    $query = $pdo->prepare($stuk);
                    $query->execute(array(":klantid" => $_SESSION['klant']['id']));
                    $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class=\"table\">";
                        echo "<tr>";
                        echo "<th>Klus id</th>";
                        echo "<th>Titel</th>";
                        echo "<th>Datum</th>";
                        echo "<th>Tijd</th>";
                        echo "<th>Opmerkingen</th>";
                        echo "<th>Kosten</th>";
                        echo "<th>Fiets id</th>";
                        // echo "<th></th>";
                        // echo "<th></th>";
                        echo "</tr>";
                        foreach ($fix as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['titel'] . "</td>";
                            echo "<td>" . $row['datum'] . "</td>";
                            echo "<td>" . $row['time'] . "</td>";
                            echo "<td>" . $row['opmerkingen'] . "</td>";
                            echo "<td>" . "€" . $row['kosten'] . "</td>";
                            echo "<td>" . $row['fietsid'] . "</td>";
                            // echo "<td><a href=\"editklus.php?id=$id\"><i class=\"bi bi-pencil-fill\"></i></a></td>";
                            // echo "<td><a href=\"deleteklus.php?id=$id\"><i class=\"bi bi-trash-fill\"></i></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        unset($fix);
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
                    <!-- <h5></h5>
                    <ul class="list-unstyled text-small">
                        <li>
                            <div>
                                <button type="button" class="w-100 btn btn-lg"
                                    onclick="window.location.href='addklus.php'" id="kleur3"><i
                                        class="bi bi-tools"> </i>
                                    Klus toevoegen</button>
                            </div>
                        </li>
                    </ul> -->
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary" onclick="window.location.href='index.php'"
                            id="kleur3">Terug naar menu</button>
                    </ul>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>
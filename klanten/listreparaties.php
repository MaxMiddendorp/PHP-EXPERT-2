<?php
require '../db.php';
if(!isset($_SESSION["email"])){
    header("Location: ../login.php");
    exit();
  }
try {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM reparaties WHERE id=:ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":ID" => $ID));
    $editklus = $stmt->fetch();
    $_SESSION["editklus"] = $editklus;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
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
            <?php
                try {
                    $stuk = "SELECT * FROM fietsen WHERE id=:fietsid";
                    $query = $pdo->prepare($stuk);
                    $query->execute(array(":fietsid" => $ID));
                    $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($fix as $row) {
                            $id=$row['id'];
                            echo "<h4>" . "Fiets:" . $row['id'] . " " . "Merk:" . $row['merk'] . " " . "Model:" . $row['model'] . "</h4>";
                        }
                        echo "</table>";
                        unset($fix);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
            <?php
                try {
                    $stuk = "SELECT * FROM reparaties WHERE fietsid=:fietsid";
                    $query = $pdo->prepare($stuk);
                    $query->execute(array(":fietsid" => $ID));
                    $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class=\"table\">";
                        echo "<tr>";
                        echo "<th>Reparatie id</th>";
                        // echo "<th>Fiets id</th>";
                        echo "<th>Titel</th>";
                        echo "<th>Datum</th>";
                        echo "<th>Tijd</th>";
                        echo "<th>Opmerkingen</th>";
                        echo "<th>Kosten</th>";
                        // echo "<th></th>";
                        echo "</tr>";
                        foreach ($fix as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            // echo "<td>" . $row['fietsid'] . "</td>";
                            echo "<td>" . $row['titel'] . "</td>";
                            echo "<td>" . $row['datum'] . "</td>";
                            echo "<td>" . $row['tijdstip'] . "</td>";
                            echo "<td>" . $row['opmerkingen'] . "</td>";
                            echo "<td>" . "€" . $row['kosten'] . "</td>";
                            // echo "<td><a href=\"listreparaties.php?id=$id\"><i class=\"bi bi-list-ol\"></i></a></td>";
                            // echo "<td><a href=\"deleteklus.php?id=$id\"><i class=\"bi bi-trash-fill\"></i></a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        unset($fix);
                } catch (PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                ?>
        </div>
        <footer class="pt-3 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block">&copy; 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary" onclick="window.location.href='index.php'"
                            >Terug naar menu</button>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary" onclick="window.location.href='fietsen.php'"
                            >Terug naar uw fietsen</button>
                    </ul>
                </div>
            </div>
        </footer>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID = $_GET['id'];
            $sql = "UPDATE users SET voornaam = :voornaam, achternaam = :achternaam, email = :email, telefoonnummer = :telefoonnummer, adres = :adres WHERE ID = $ID ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":voornaam", $_POST['voornaam']);
            $stmt->bindParam(":achternaam", $_POST['achternaam']);
            $stmt->bindParam(":email", $_POST['email']);
            $stmt->bindParam(":telefoonnummer", $_POST['telefoonnummer']);
            $stmt->bindParam(":adres", $_POST['adres']);
            $stmt->execute();
            header("location: ./klanten.php");
            }
?>

</body>

</html>
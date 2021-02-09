<?php
include "../db.php";
if(!isset($_SESSION["memail"])){
    header("Location: ../login.php");
    exit();
  }
$email = $_SESSION["memail"];

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
        <h2>Alle klanten:</h2>
        <?php
                try {
                    $stuk = "SELECT * FROM users WHERE rol='1'";
                    $query = $pdo->prepare($stuk);
                    $query->execute();
                    $fix = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<table class=\"table\">";
                        echo "<tr>";
                        echo "<th>Id</th>";
                        echo "<th>Voornaam</th>";
                        echo "<th>Achternaam</th>";
                        echo "<th>Email</th>";
                        echo "<th>Telefoonnummer</th>";
                        echo "<th>Contact</th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        // echo "<th></th>";
                        echo "</tr>";
                        foreach ($fix as $row) {
                            $id=$row['id'];
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['voornaam'] . "</td>";
                            echo "<td>" . $row['achternaam'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['telefoonnummer'] . "</td>";
                            echo "<td>" . $row['contact'] . "</td>";
                            // echo "<td>" . $row['klantid'] . "</td>";
                            echo "<td><a href=\"editklant.php?id=$id\"><i class=\"bi bi-pencil-fill\"></i></a></td>";
                            echo "<td><a href=\"deleteklant.php?id=$id\"><i class=\"bi bi-trash-fill\"></i></a></td>";
                            // echo "<td><a href=\"doneklus.php?id=$id\"><i class=\"bi bi-check-square\"></i></a></td>";
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
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='addklant.php'"><i class="bi bi-plus-square"></i>  Voeg klant toe</button>
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
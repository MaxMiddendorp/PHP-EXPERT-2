<?php

// if (isset($_SESSION["email"])) {
//     header("location: ../klant/index.php");
//     exit();
// }

include "../db.php";

$email = $_SESSION["memail"];

try {
    $sql = "SELECT voornaam, achternaam FROM users WHERE email=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":email" => $email));
    $user = $stmt->fetch();
    $_SESSION["user"] = $user;
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
    <!-- <title>PDF</title> -->
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        /* @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      } */
    </style>
</head>

<body>
    <?php
        include "./header.php";
    ?>

    <main class="container">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Voeg klus toe</h1>
            <form class="" method="post">
                <table class="table">
                    <br>
                    <br>
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Titel</td>
                            <td><input type="text" class="form-control" name="titel" id="titel" required></td>
                        </tr>
                        <tr>
                            <td>Datum</td>
                            <td><input type="date" class="form-control" name="datum" id="datum" required></td>
                        </tr>
                        <tr>
                            <td>Tijd</td>
                            <td><input type="time" class="form-control" name="tijdstip" id="tijdstip" required></td>
                        </tr>
                        <tr>
                            <td>Opmerkingen</td>
                            <td><input type="text" class="form-control" name="opmerkingen" id="opmerkingen" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Kosten</td>
                            <td><input type="text" class="form-control" name="kosten" id="kosten" required></td>
                        </tr>
                        <tr>
                            <td>Fiets:</td>
                            <td>
                                <select class="form-select" required name="fietsid" id="fietsid">
                                    <option disabled selected value=""></option>
                                    <?php
                                    $sql = "SELECT * FROM fietsen";
                                    $result = $pdo->query($sql);
                                    foreach ($result as $index => $row) {
                                        echo "<option value=\"$row[id]\">$row[id] $row[merk] $row[model]</option>" . PHP_EOL;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Klant:</td>
                            <td>
                                <select class="form-select" required name="klantid" id="klantid">
                                    <option disabled selected value=""></option>
                                    <?php
                                    $sql = "SELECT * FROM users";
                                    $result = $pdo->query($sql);
                                    foreach ($result as $index => $row) {
                                        echo "<option value=\"$row[id]\">$row[id] $row[voornaam] $row[achternaam]</option>" . PHP_EOL;
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="w-100 btn btn-lg btn-primary" type="submit">Voeg klus toe</button>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button class="w-100 btn btn-lg btn-primary" onclick="window.location.href='./klussen.php'">Terug naar de klussen</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>

        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">

        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2021</small>
                </div>
            </div>
        </footer>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titel = $_POST["titel"];
            $datum = $_POST["datum"];
            $tijdstip = $_POST["tijdstip"];
            $opmerkingen = $_POST["opmerkingen"];
            $kosten = $_POST["kosten"];
            $fiets = $_POST["fietsid"];
            $klant = $_POST["klantid"];
            $stmt = $pdo->prepare("INSERT INTO reparaties (titel, datum, tijdstip, opmerkingen, kosten, fietsid, klantid) VALUES ('$titel', '$datum', '$tijdstip', '$opmerkingen', '$kosten', '$fiets', '$klant')");
            // var_dump($stmt);
            $stmt->execute();
            echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">De klus is succesvol aangemaakt! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
            }
?>


</body>

</html>
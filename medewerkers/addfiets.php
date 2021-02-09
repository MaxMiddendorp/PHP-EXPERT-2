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
            <h1 class="display-4">Voeg fiets toe</h1>
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
                            <td>Merk</td>
                            <td><input type="text" class="form-control" name="merk" id="merk" required></td>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td>
                                <div class="form-check">
                                    <input id="Herenfiets" name="model" type="radio" class="form-check-input" checked
                                        required value="Herenfiets">
                                    <label class="form-check-label" for="Herenfiets">Herenfiets</label>
                                </div>
                                <div class="form-check">
                                    <input id="Damesfiets" name="model" type="radio" class="form-check-input" required
                                        value="Damesfiets">
                                    <label class="form-check-label" for="Damesfiets">Damesfiets</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>
                                <div class="form-check">
                                    <input id="Elektrisch" name="type" type="radio" class="form-check-input" checked
                                        required value="Elektrisch">
                                    <label class="form-check-label" for="Elektrisch">Elektrisch</label>
                                </div>
                                <div class="form-check">
                                    <input id="Niet-elektrisch" name="type" type="radio" class="form-check-input" required
                                        value="Niet-elektrisch">
                                    <label class="form-check-label" for="Niet-elektrisch">Niet-elektrisch</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kleur</td>
                            <td><input type="text" class="form-control" name="kleur" id="kleur" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Soort rem</td>
                            <td>
                                <div class="form-check">
                                    <input id="Terugtrap" name="soortRem" type="radio" class="form-check-input" checked
                                        required value="Terugtrap">
                                    <label class="form-check-label" for="Terugtrap">Terugtrap</label>
                                </div>
                                <div class="form-check">
                                    <input id="Handrem" name="soortRem" type="radio" class="form-check-input" required
                                        value="Handrem">
                                    <label class="form-check-label" for="Handrem">Handrem</label>
                                </div>
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
                            <td><button class="w-100 btn btn-lg btn-primary" onclick="window.location.href='./fietsen.php'">Terug naar de fietsen</button>
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
            $merk = $_POST["merk"];
            $model = $_POST["model"];
            $type = $_POST["type"];
            $kleur = $_POST["kleur"];
            $soortRem = $_POST["soortRem"];
            $klant = $_POST["klantid"];
            $stmt = $pdo->prepare("INSERT INTO fietsen (merk, model, type, kleur, soortRem, klantid) VALUES ('$merk', '$model', '$type', '$kleur', '$soortRem', '$klant')");
            // var_dump($stmt);
            $stmt->execute();
            echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">De fiets is succesvol toegevoegd! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
            }
?>


</body>

</html>
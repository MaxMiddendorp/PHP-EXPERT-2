<?php
include "../db.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php
        include "../head.php";
    ?>
    <!-- <title>PDF</title> -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body id="body">
    <?php
        include "./header.php";
    ?>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <!-- <img class="d-block mx-auto mb-4" src="./img/logo.png" alt="" width="150" height="150" height="57"> -->
            </div>
            <h4 class="mb-3">Voeg klant toe</h4>

            <form class="" method="post">
                <table class="table">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Voornaam</td>
                            <td><input type="text" class="form-control" name="voornaam" id="voornaam"
                                    placeholder="Vul hier uw voornaam in" required></td>
                        </tr>
                        <tr>
                            <td>Achternaam</td>
                            <td><input type="text" class="form-control" name="achternaam" id="achternaam"
                                    placeholder="vul hier uw achternaam in" required></td>
                        </tr>
                        <tr>
                            <td>Telefoonnummer</td>
                            <td><input type="text" class="form-control" name="telefoonnummer" id="telefoonnummer"
                                    placeholder="Vul hier uw telefoonnummer in" required></td>
                        </tr>
                        <tr>
                            <td>E-mailadres</td>
                            <td><input type="text" class="form-control" name="email" id="email"
                                    placeholder="Vul hier uw E-mailadres in" required></td>
                        </tr>
                        <tr>
                            <td>Wachtwoord</td>
                            <td><input type="password" class="form-control" name="password" id="password"
                                    placeholder="Vul hier uw wachtwoord in" required></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>
                                <div class="form-check">
                                    <input id="SMS" name="contact" type="radio" class="form-check-input" checked
                                        required value="SMS">
                                    <label class="form-check-label" for="SMS">SMS</label>
                                </div>
                                <div class="form-check">
                                    <input id="Whatsapp" name="contact" type="radio" class="form-check-input" required
                                        value="Whatsapp">
                                    <label class="form-check-label" for="Whatsapp">Whatsapp</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <button class="w-100 btn btn-lg btn-primary" type="submit">Voeg klant toe</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </main>

        <footer class="pt-3 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block">&copy; 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='klanten.php'">Terug naar klanten</button>
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
    </div>

    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $voornaam = $_POST["voornaam"];
            $achternaam = $_POST["achternaam"];
            $telefoonnummer = $_POST["telefoonnummer"];
            $email = $_POST["email"];
            $contact = $_POST["contact"];
            $options = ['cost'=>12, "*XlDqoNYgfM73P7Iv^BL1!"];
            $password = password_hash($_POST["password"], PASSWORD_BCRYPT, $options);
            $stmt = $pdo->prepare("INSERT INTO users (voornaam, achternaam, telefoonnummer, email, password, contact) VALUES ('$voornaam', '$achternaam', '$telefoonnummer', '$email', '$password', '$contact')");
            $stmt->execute();
            echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">Het account is succesvol aangemaakt.<button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
            }
?>
</body>

</html>
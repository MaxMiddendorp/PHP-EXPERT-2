<?php
include "./db.php";
?>

<!doctype html>
<html lang="en">

<head>
    <?php
        include "./head.php";
    ?>
    <!-- <title>PDF</title> -->
    <link href="./css/style.css" rel="stylesheet">
</head>

<body id="body">
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">Fietsenmaker Snelle Jelle</p>
        <nav class="my-2 my-md-0 me-md-3">
            <!-- <a class="btn btn-outline-primary" href="register.php">Registreer</a> -->
            <a class="btn btn-outline-primary" href="tussenpagina.php">Log in</a>
        </nav>
    </header>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <!-- <img class="d-block mx-auto mb-4" src="./img/logo.png" alt="" width="150" height="150" height="57"> -->
                <h2>Registratieformulier</h2>
            </div>
            <h4 class="mb-3">Uw gegevens</h4>

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
                            <td> <button class="w-100 btn btn-lg btn-primary" type="submit">Registreer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2021</small>
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
            echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">Uw account is succesvol aangemaakt, u kunt nu inloggen! <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button></div>";
            }
?>
</body>

</html>
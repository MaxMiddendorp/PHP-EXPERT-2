<?php

if (isset($_SESSION["email"])) {
    header("location: ../klant/index.php");
    exit();
}

include "./db.php";
unset($message);

if (isset($_POST["login"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        $message = "<html><script>alert('Vul alle velden in');</script></html>";
    } else {
        $query = "SELECT * FROM users WHERE email = :email and rol='1'";
        $statement = $pdo->prepare($query);
        $statement->execute(
            array(
                ':email' => $_POST["email"],
            )
        );


        $count = $statement->rowCount();
        if ($count > 0) {
            $user = $statement->fetch();
            if (!password_verify($_POST['password'], $user['password'])) {
                // wachtwoord klopt niet
                $message = "Foute Login informatie";
            } else {
                $_SESSION["email"] = $_POST["email"];
                header("location: ./klanten/index.php");
                exit();
            }
        } else {
            // email niet gevonden
            $message = "Foute Login informatie";
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <?php
        include "./head.php";
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


    <!-- Custom styles for this template -->
    <!-- <link href="pricing.css" rel="stylesheet"> -->
    <link href="./css/signin.css" rel="stylesheet">

</head>

<body>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">Fietsenmaker Snelle Jelle</p>
        <nav class="my-2 my-md-0 me-md-3">
            <!-- <a class="btn btn-outline-primary" href="register.php">Registreer</a> -->
            <a class="btn btn-outline-primary" href="tussenpagina.php">Log in</a>
        </nav>
    </header>

    <main class="container text-center form-signin">
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="form-signin">
                <?php  
                        if(isset($message)){
                            echo "<div class=\"alert alert-danger\" role=\"alert\">$message</div>";
                        }
                    ?>
                <form method="post" id="login">
                    <h1 class="h3 mb-3 fw-normal">Login</h1>
                    <label for="email" class="visually-hidden">E-mailadres</label>
                    <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus
                        name="email">
                    <label for="password" class="visually-hidden">Wachtwoord</label>
                    <input type="password" id="password" class="form-control" placeholder="password" required
                        name="password">
                    <button class="w-100 btn btn-lg btn-primary" value="login" type="submit" name="login">Log
                        In</button>
                </form>
            </div>
        </div>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block mb-3 text-muted">&copy; 2021</small>
                </div>
            </div>
        </footer>
    </main>
</body>

</html>
<?php

// if (isset($_SESSION["email"])) {
//     header("location: ../klant/index.php");
//     exit();
// }

include "../db.php";

$email = $_SESSION["email"];

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
            <h1 class="display-4">Fietsenmaker Snelle Jelle</h1>
            <!-- <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap
                example. It’s built with default Bootstrap components and utilities with little customization.</p> -->
        </div>

        <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">
            <div class="col mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Klussen</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><i class="bi bi-list-ul"></i></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Ga hier naar toe om uw klussen te bekijken</li>
                            <!-- <li>Hier kunt u ook een klus toevoegen</li> -->
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='klussen.php'">Klussen</button>
                    </div>
                </div>
            </div>
            <div class="col mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Fietsen</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"><i class="bi bi-bicycle"></i></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Ga hier naar toe om uw fietsen te bekijken</li>
                            <!-- <li>Hier kunt u ook een fiets toevoegen</li> -->
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='fietsen.php'">Fietsen</button>
                    </div>
                </div>
            </div>
            <!-- <div class="col">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
                    </div>
                </div> -->
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
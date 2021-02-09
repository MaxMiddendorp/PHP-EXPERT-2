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
</head>

<body>

    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <p class="h5 my-0 me-md-auto fw-normal">Fietsenmaker Snelle Jelle</p>
        <nav class="my-2 my-md-0 me-md-3">
            <!-- <a class="btn btn-outline-primary" href="register.php">Registreer</a> -->
            <a class="btn btn-outline-primary" href="tussenpagina.php">Log in</a>
        </nav>
    </header>

    <main class="container">
        <div class="pricing-header px- py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4">Fietsenmaker Snelle Jelle</h1>
            <!-- <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap
                example. It’s built with default Bootstrap components and utilities with little customization.</p> -->
        </div>

        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
            <div class="col mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Klanten Login</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <br>
                            <li>Klik hier om als klant in te loggen</li>
                            <br>
                            <br>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='signin.php'">Log In</button>
                    </div>
                </div>
            </div>
            <div class="col mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Medewerkers Login</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <br>
                            <li>Klik hier om als medewerker in te loggen. Dit is alleen mogelijk als er een account bij de administrator is aangemaakt</li>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='msignin.php'">Log In</button>
                    </div>
                </div>
            </div>
            <div class="col mx-auto">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 fw-normal">Registreer</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title"></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <br>
                            <li>Klik hier als u een account wilt aanmaken</li>
                            <br>
                            <br>
                        </ul>
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='register.php'">Registreer</button>
                    </div>
                </div>
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
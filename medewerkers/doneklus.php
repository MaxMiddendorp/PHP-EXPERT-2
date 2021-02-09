<?php
require '../db.php';
if(!isset($_SESSION["memail"])){
    header("Location: ../login.php");
    exit();
  }
try {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM reparaties WHERE id=:ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":ID" => $ID));
    $doneklus = $stmt->fetch();
    $_SESSION["doneklus"] = $doneklus;
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
            Bericht is verzonden
        </div>
        <footer class="pt-3 my-md-5 pt-md-5 border-top">
            <div class="row">
                <div class="col-12 col-md">
                    <small class="d-block">&copy; 2021</small>
                </div>
                <div class="col-6 col-md">
                    <h5></h5>
                    <ul class="list-unstyled text-small">
                        <button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='klussen.php'">Terug naar klussen</button>
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
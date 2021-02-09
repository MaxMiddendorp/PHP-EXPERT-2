<?php
include "../db.php";
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
  <title>Fietsenmaker Snelle Jelle</title>

  <?php
        include "../head.php";
    ?>
  <link href="kieslogin.css" rel="stylesheet">
</head>

<body>
  <?php
        include "./header.php";
    ?>

  <main class="container">
    <div class="kieslogin-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Uw profiel</h1>
    </div>
    <form class="" method="">
      <div class="row g-3">
        <div class="col-sm-12">
          <label class="form-label">klantennummer:</label>
          <?php echo $_SESSION['klant']['id']; ?>
        </div>

        <div class="col-sm-6">
          <label class="form-label">Voornaam:</label>
          <?php echo $_SESSION['klant']['voornaam']; ?>
        </div>

        <div class="col-sm-6">
          <label class="form-label">Achternaam:</label>
          <?php echo $_SESSION['klant']['achternaam']; ?>
        </div>

        <div class="col-sm-6">
          <label class="form-label">E-mailadres:</label>
          <?php echo $_SESSION['klant']['email']; ?>
        </div>

        <div class="col-sm-6">
          <label class="form-label">Telefoonnummer:</label>
          <?php echo $_SESSION['klant']['telefoonnummer']; ?>
        </div>

        <div class="col-sm-6">
          <label class="form-label">Contactwijze:</label>
          <?php echo $_SESSION['klant']['contact']; ?>
        </div>
    </form>

    <footer class="pt-4 my-md-5 pt-md-5 border-top">
      <div class="row">
        <div class="col-12 col-md">
          <small class="d-block  text-muted">&copy; 2021 | Fietsenmaker Snelle Jelle</small>
        </div>
        <div class="col-6 col-md">
          <h5></h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#"></a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5></h5>
          <ul class="list-unstyled text-small">
            <li><a class="link-secondary" href="#"></a></li>
          </ul>
        </div>
        <div class="col-6 col-md">
          <h5></h5>
          <ul class="list-unstyled text-small">
            <button type="button" class="w-100 btn btn-lg btn-primary" onclick="window.location.href='index.php'">Terug
              naar menu</button>

          </ul>
        </div>
      </div>
    </footer>
</body>

</html>
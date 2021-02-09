<?php
require '../db.php';
if(!isset($_SESSION["memail"])){
    header("Location: ../login.php");
    exit();
  }
try {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=:ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":ID" => $ID));
    $editklant = $stmt->fetch();
    $_SESSION["editklant"] = $editklant;
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
        </div>
        <form method="post" id="login">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <td><input value="<?php echo $ID; ?>" type="text" id="id" name="id" class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                    </td>
                </tr>
                <tr>
                    <th>Voornaam</th>
                    <td><input value="<?php echo $_SESSION['editklant']['voornaam']; ?>" type="text" id="voornaam" name="voornaam"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Achternaam</th>
                    <td><input value="<?php echo $_SESSION['editklant']['achternaam']; ?>" type="text" id="achternaam" name="achternaam"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input value="<?php echo $_SESSION['editklant']['email']; ?>" type="text" id="email"
                            name="email" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Telefoonnummer</th>
                    <td><input value="<?php echo $_SESSION['editklant']['telefoonnummer']; ?>" type="text" id="telefoonnummer"
                            name="telefoonnummer" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><input value="<?php echo $_SESSION['editklant']['contact']; ?>" type="text" id="contact"
                            name="contact" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg btn-primary"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='./klanten.php'" id="kleur3">Ga terug</button></td>
                </tr>
            </table>
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID = $_GET['id'];
            $sql = "UPDATE reparaties SET titel = :titel, datum = :datum, tijdstip = :tijdstip, opmerkingen = :opmerkingen, kosten = :kosten WHERE ID = $ID ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":titel", $_POST['titel']);
            $stmt->bindParam(":datum", $_POST['datum']);
            $stmt->bindParam(":tijdstip", $_POST['tijdstip']);
            $stmt->bindParam(":opmerkingen", $_POST['opmerkingen']);
            $stmt->bindParam(":kosten", $_POST['kosten']);
            $stmt->execute();
            // header("location: ./klanten.php");
            }
?>

</body>

</html>
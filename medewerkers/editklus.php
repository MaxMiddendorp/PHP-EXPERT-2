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
    $editklus = $stmt->fetch();
    $_SESSION["editklus"] = $editklus;
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
                    <th>Titel</th>
                    <td><input value="<?php echo $_SESSION['editklus']['titel']; ?>" type="text" id="titel" name="titel"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Datum</th>
                    <td><input value="<?php echo $_SESSION['editklus']['datum']; ?>" type="date" id="datum" name="datum"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Tijd</th>
                    <td><input value="<?php echo $_SESSION['editklus']['tijdstip']; ?>" type="time" id="tijdstip"
                            name="tijdstip" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Opmerkingen</th>
                    <td><input value="<?php echo $_SESSION['editklus']['opmerkingen']; ?>" type="text" id="opmerkingen"
                            name="opmerkingen" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Kosten</th>
                    <td><input value="<?php echo $_SESSION['editklus']['kosten']; ?>" type="text" id="kosten"
                            name="kosten" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg btn-primary"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='./klussen.php'" id="kleur3">Ga terug</button></td>
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
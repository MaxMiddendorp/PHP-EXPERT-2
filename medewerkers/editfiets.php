<?php
require '../db.php';
if(!isset($_SESSION["memail"])){
    header("Location: ../login.php");
    exit();
  }
try {
    $ID = $_GET['id'];
    $sql = "SELECT * FROM fietsen WHERE id=:ID";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":ID" => $ID));
    $editfiets = $stmt->fetch();
    $_SESSION["editfiets"] = $editfiets;
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
                    <th>Merk</th>
                    <td><input value="<?php echo $_SESSION['editfiets']['merk']; ?>" type="text" id="merk" name="merk"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Model</th>
                    <td><input value="<?php echo $_SESSION['editfiets']['model']; ?>" type="text" id="model" name="model"
                            class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td><input value="<?php echo $_SESSION['editfiets']['type']; ?>" type="text" id="type"
                            name="type" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Kleur</th>
                    <td><input value="<?php echo $_SESSION['editfiets']['kleur']; ?>" type="text" id="kleur"
                            name="kleur" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th>Soort Rem</th>
                    <td><input value="<?php echo $_SESSION['editfiets']['soortRem']; ?>" type="text" id="soortRem"
                            name="soortRem" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><input type="submit" value="Opslaan" class="w-100 btn btn-lg btn-primary"></td>
                </tr>
                <tr>
                    <th></th>
                    <td><button type="button" class="w-100 btn btn-lg btn-primary"
                            onclick="window.location.href='./fietsen.php'" id="kleur3">Ga terug</button></td>
                </tr>
            </table>
        </form>
    </main>
    <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $ID = $_GET['id'];
            $sql = "UPDATE fietsen SET merk = :merk, model = :model, type = :type, kleur = :kleur, soortRem = :soortRem WHERE ID = $ID ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":merk", $_POST['merk']);
            $stmt->bindParam(":model", $_POST['model']);
            $stmt->bindParam(":type", $_POST['type']);
            $stmt->bindParam(":kleur", $_POST['kleur']);
            $stmt->bindParam(":soortRem", $_POST['soortRem']);
            $stmt->execute();
            // header("location: ./klanten.php");
            }
?>

</body>

</html>
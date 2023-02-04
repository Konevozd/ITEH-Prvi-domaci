<?php

require "connect.php";
require "classes/racunar.php";

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: logIn.php');
    exit();
}

$rezultat = Racunar::getAll($conn);

if(!$rezultat){
    echo "Nastala je greška prilikom izvođenja upitanja <br>";
    die();
}

if(isset($_POST['delete'])) {
    $naziv = trim($_POST['name']);

    if (Racunar::deleteRacunar($naziv, $conn)) {
        header('Location: index.php');
        exit();
    } else {
        $mess = "Doslo je do greske";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/delete.css">
    <title> Obrisite racunar </title>
</head>
<body>
<div class = "parent">
    <a href = "index.php" class = "link"> Pocetna </a>
    <a href = "add.php" class = "link"> Dodaj računar </a>
    <a href = "update.php" class = "link"> Izmeni podatke o računaru </a>
    <a href = "delete.php" class = "link"> Obriši računar </a>
</div>

<div class = "body">
    <h2> Obriši računar </h2><br><br>
    <form method = "POST" action = "">
        <label for = "naziv"> Naziv računara </label> <br><br>
        <select name = "name">
        <?php while($red = $rezultat->fetch_array()): ?>
            <option value = "<?php echo $red["naziv"] ?>"> <?php echo $red["naziv"] ?> </option>
        <?php endwhile; ?>
        </select>
        <br><br><br>
        <button type = "submit" name = "delete" class = "delete"> Obriši </button>
    </form>
</div>

</body>
</html>
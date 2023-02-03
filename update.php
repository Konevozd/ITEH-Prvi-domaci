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

if(isset($_POST['update'])) {
    $naziv = trim($_POST['name']);
    $newNaziv = trim($_POST['newName']);
    $specifikacija = trim($_POST['specs']);

    if (Racunar::updateRacunar($naziv, $newNaziv , $specifikacija, $conn)) {
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
    <link rel="stylesheet" href="css/updatePC.css">
    <title> Azurirajte racunar </title>
</head>
<body>
<div class = "parent">
    <a href = "index.php" class = "link"> Pocetna </a>
    <a href = "add.php" class = "link"> Dodaj računar </a>
    <a href = "update.php" class = "link"> Izmeni podatke o računaru </a>
    <a href = "delete.php" class = "link"> Obriši računar </a>
</div>

<div class = "body">
    <h2> Izmena podatka o racunaru </h2>
    <form method = "post" action = "">
    <label for = "name"> Naziv računara </label> <br>
    <select name = "name" id = "name"  onchange = "specifikacija()"> 
    <?php while($red = $rezultat->fetch_array()): ?>
        <option value = "<?php echo $red["naziv"]; ?>"> <?php echo $red["naziv"]; ?> </option>
    <?php endwhile; ?>
    </select>
    <br><br>
    <label for = "newName"> Novo ime </label>
    <br>
    <input type="text" name = "newName"> 
    <br><br>
    <div name = "specs" id = "specs">  </div> <br><br>
    <button type = "submit" name = "update" class = "updateButton"> Ažurirajte promene </button>
    </form>
</div>

<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>

<script>
    function specifikacija() {
        var naziv = $("#name").val();
        $.ajax({
          url: "specs.php",
          data: {
                naziv: naziv
            },
          success: function (podaci) {
              $("#specs").html(podaci);
          }
      });
    }
</script>
</body>
</html>
<?php

require "connect.php";
require "classes/racunar.php";
require "classes/kompanija.php";

session_start();

if (!isset($_SESSION['user'])) {
    header('Location: logIn.php');
    exit();
}

$rezultat = Kompanija::getAll($conn);

if(!$rezultat){
    echo "Nastala je greška prilikom izvođenja upitanja <br>";
    die();
}

if(isset($_POST['add'])) {
    $naziv = trim($_POST['naziv']);
    $specifikacija = trim($_POST['specifikacija']);
    $kompanija = trim($_POST['manufacturer']);
    $tip = trim($_POST['type']);

    if (Racunar::addNew($naziv, $specifikacija, $kompanija, $tip, $conn)) {
        header('Location: index.php');
        exit();
    } else {
        $mess = "Doslo je do greske";
    }

}

if($rezultat->num_rows==0){
    echo "Nema kompanija";
    die();
} else {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/addNew.css">
    <title> Dodajte nov racunar </title>
</head>
<body>
<div class = "parent">
    <a href = "index.php" class = "link"> Pocetna </a>
    <a href = "add.php" class = "link"> Dodaj računar </a>
    <a href = "update.php" class = "link"> Izmeni podatke o računaru </a>
    <a href = "delete.php" class = "link"> Obriši računar </a>
</div>

<div class = "add">
    <h1> Dodajte novi računar </h1>
    <div class = "bodyPart">
        Molimo unesite sve podatke o novom računaru <br><br>
    <form method = "post" action = "">
        <label for = "naziv"> Naziv računara </label> <br>
        <input type = "text" id = "naziv" size = "30" maxlength = "100" name = "naziv"> <br><br>
        <label for = "specifikacija"> Specifikacija </label> <br>
        <textarea id = "specifikacija" rows = "5" cols = "30" name = "specifikacija">  </textarea> <br><br>
        <label for = "manufacturer"> Pretražite po proizvođaču </label> <br>
    <select id = "manufacturer" name = "manufacturer"> 
        <option value = "SVI_TIPOVI"> </option>
            <?php
                while ($red = $rezultat->fetch_array()):
            ?>
            <option value ="<?php echo $red["nazivKompanije"]; ?>"> <?php echo $red["nazivKompanije"] ?> </option>
            <?php endwhile;
} ?>
    </select> <br><br>
    <label for = "type"> Tip </label> <br>
    <select name = "type" id = "type">
    </select>
    <br><br>
    <button type = "submit" name = "add" class = "addButton"> Dodaj </button>
    </form>
    </div>
</div>
<div class = "bottom">
</div>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<script>
    getTypes();
    function getTypes() {
        $.ajax({
          url: "tipovi.php",
          success: function (podaci) {
              $("#type").html(podaci);
          }
      });
    }
</script>
</body>
</html>
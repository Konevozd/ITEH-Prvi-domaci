<?php

require "connect.php";
require "classes/kompanija.php";

session_start();

if(!isset($_SESSION['user'])) {
    header('Location: logIn.php');
    exit();
}

$rezultat = Kompanija::getAll($conn);

if(!$rezultat){
    echo "Nastala je greška prilikom izvođenja upitanja <br>";
    die();
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

    <link rel="stylesheet" href="css/index.css">
    
    <title> Dobrodošli u svet računara </title>
</head>
<body>
<div class = "parent">
      <a href = "index.php" class = "link"> Pocetna </a>
      <a href = "add.php" class = "link"> Dodaj računar </a>
      <a href = "update.php" class = "link"> Izmeni podatke o računaru </a>
      <a href = "delete.php" class = "link"> Obriši računar </a>
</div>
<div class = "searching"> 
    <h2 class = "naslov"> 
        Pretraga svih računara
    </h2>
    <label for = "manufacturer"> Pretražite po proizvođaču </label> <br><br>
    <select id = "manufacturer"> 
        <option value = "SVI_TIPOVI"> </option>
            <?php
    while ($red = $rezultat->fetch_array()):
            ?>
            <option value ="<?php echo $red["nazivKompanije"]; ?>"> <?php echo $red["nazivKompanije"] ?> </option>
            <?php endwhile;
} ?>
    </select>

    <br> <br>
    <button name = "sort" onclick="pretrazi()"> Pretrazi </button>
</div>

<div class="row">
    <div class="span12" id="rezultat">

    </div>
</div>
<script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/custom.js"></script>
<script
  src="https://code.jquery.com/jquery-3.6.1.js"
  integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
  crossorigin="anonymous"></script>
<script>
    
    pretrazi();
    function pretrazi() {
        var kompanija = $("#manufacturer").val();
        // var e = document.getElementById('manufacturer').value;
        // var kompanija = e.options[e.selectedIndex].text;
        // document.write(kompanija);
        // alert(kompanija);
        $.ajax({
            url: "racunari.php",
            data: {
                kompanija: kompanija
            },
            success: function (podaci) {
                $("#rezultat").html(podaci);
            }
        });
    }
</script>

</body>
</html>
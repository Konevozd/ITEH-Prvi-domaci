<?php

require "connect.php";
require "classes/racunar.php";

$naziv = trim($_GET['naziv']);
$rezultat = Racunar::getSpecs($naziv, $conn);
?>
<label for = "specs"> Specifikacija računara </label> <br>
<?php
while ($red = $rezultat->fetch_array()):
?>
    <textarea rows = "10" cols = "30" name = "specs"> <?php echo $red["specifikacija"]; ?> </textarea>
<?php
endwhile;
?>
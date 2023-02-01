<?php
require 'connect.php';
require 'classes/racunar.php';

$kompanija = trim($_GET['kompanija']);
$racunari = Racunar::pretrazi($kompanija,$conn);
?>
<table class="show-table" style = "background-color: rgb(41, 41, 153); margin-top: 50px; color: white;">
    <thead style = "background-color: #967d5e;">
        <tr>
            <th>Kompanija</th>
            <th>Naziv</th>
            <th>Tip</th>
            <th style="width: 60%">Specifikacija</th>
        </tr>
    </thead>
    <tbody>
 <?php

 while ($red = $racunari->fetch_array()):
    ?>
    <tr>
        <td> <?php echo $red["nazivKompanije"] ?></td>
        <td><?php echo $red["naziv"] ?></td>
        <td><?php echo $red["nazivTipa"] ?></td>
        <td><?php echo $red["specifikacija"] ?></td>
    </tr>
<?php
 endwhile;
?>
    </tbody>
</table>
<?php

require "connect.php";
require "classes/tip.php";

$tipovi = Tip::vratiSve($conn);

while ($red = $tipovi->fetch_array()):
?>
    <option value ="<?php echo $red["nazivTipa"]; ?>"> <?php echo $red["nazivTipa"] ?> </option>
<?php
endwhile;
?>
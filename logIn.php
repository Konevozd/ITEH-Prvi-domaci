<?php

require "connect.php";
require "classes/korisnici.php";

session_start();

if(isset($_POST['username']) && isset($_POST['password'])) {
    $uname = $_POST['username'];
    $upass = $_POST['password'];

    $user = new Korisnici(1,$uname, $upass);
    $response = Korisnici::login($user, $conn);
    
    if($response->num_rows == 1) {
        $_SESSION['user'] = $user->korisnickoIme;
        header('Location: index.php');
        exit();
    } else {
        $mess = "Niste se lepo prijavili";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/logIn.css">
    <title>Log in</title>
</head>
<body>
    
    <div class = "main">
        <div class = "input"> 
            <form method = "post" action = "">
            <h2> Prijavite se </h2><br><br>
            Korisnicko ime <br>
            <input type = "text" class = "" name = "username" size = "30" maxlength="50" required> <br><br>
            Lozinka <br> 
            <input type = "password" class = "" size = "30" name = "password" maxlength="50" required> <br><br>
            <!-- <button type = "button" class ="logInButton" name = "submit"> Uloguj se </button> -->
            <button type="submit" class="logInButton" name="submit">Prijavi se</button>
            </form>
        </div>
    </div>

</body>
</html>
<?php

class Korisnici {

    public $korisnikID;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($korisnikID = null, $korisnickoIme = null, $lozinka = null) {
        $this->korisnikID = $korisnikID;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
    }

    public static function login($korisnik, mysqli $conn) {

        $upit = "select * from korisnik where korisnicko_ime = '$korisnik->korisnickoIme' and lozinka = '$korisnik->lozinka'";
        echo $upit;

        return $conn->query($upit);
    }

}

?>
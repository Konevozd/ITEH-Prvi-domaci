<?php

class Kompanija {

    public $kompanijaID;
    public $nazivKompanije;

    public function __construct($kompanijaID = null, $nazivKompanije = null) {
        $this->kompanijaID = $kompanijaID;
        $this->nazivKompanije = $nazivKompanije;
    }

    public static function getAll(mysqli $conn) {
        $query = "SELECT * FROM kompanija";
        return $conn->query($query);
    }

}

?>
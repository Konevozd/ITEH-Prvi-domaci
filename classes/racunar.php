<?php

class Racunar {

    public $id;
    public $naziv;
    public $specifikacija;
    public $kompanijaID;
    public $tipID;

    public function __construct($id = null, $naziv = null, $specifikacija = null, $kompanijaID = null, $tipID = null) {
        $this->id = $id;
        $this->naziv=$naziv;
        $this->specifikacija=$specifikacija;;
        $this->kompanijaID=$kompanijaID;
        $this->tipID=$tipID;
    }

    public static function getAll(mysqli $conn) {
        $upit = 'select * from racunar r join kompanija k on r.kompanijaID = k.kompanijaID join tip t on r.tipID = t.tipID';

        $rezultati = $conn->query($upit);

        return $rezultati;
    }

    public static function pretrazi($kompanija, mysqli $conn) {
        $upit = "select * from racunar r join kompanija k on r.kompanijaID = k.kompanijaID join tip t on r.tipID = t.tipID";
        
        if($kompanija != 'SVI_TIPOVI') {
            $upit .= " WHERE k.nazivKompanije = '" . $kompanija . "'";
        }

        $upit .= " ORDER BY k.nazivKompanije ASC";
        // echo $upit;

        // return $rezultati;
        return $conn->query($upit);
    }

    public static function addNew($naziv, $specifikacija, $nazivKompanije, $nazivTipa, mysqli $conn) {
        $upitTip = "select * from tip where nazivTipa = '$nazivTipa'";
        // echo $upitTip;
        $idTipa = 0;
        $queryTip = $conn->query($upitTip);
        while ($red = $queryTip->fetch_array()) {
            $idTipa = $red["tipID"];
        }
        // echo "ID tipa: $idTipa";
        $upitKompanija = "select kompanijaID from kompanija where nazivKompanije = '$nazivKompanije'";
        $idKompanije = 0;
        $queryKompanije = $conn->query($upitKompanija);
        while($red = $queryKompanije->fetch_array()) {
            $idKompanije = $red["kompanijaID"];
        }
        // echo "ID kompanije: $idKompanije";
        
        $upit = "insert into racunar(naziv, specifikacija, kompanijaID, tipId) values ('$naziv', '$specifikacija',$idKompanije, $idTipa)";
        // echo $upit;
        return $conn->query($upit);
    }

    public static function getSpecs($naziv, mysqli $conn) {
        $upit = "select * from racunar where naziv = '$naziv'";
        return $conn->query($upit);
    }



    public static function updateRacunar($naziv, $newNaziv , $specifikacija, mysqli $conn) {
        $idQuery = "select id from racunar where naziv = '$naziv'";
        $id = 0;
        $queryy = $conn->query($idQuery);
        while($red = $queryy->fetch_array()) {
            $id = $red["id"];
        }
        echo $id;
        $upit = "UPDATE racunar set naziv = '$newNaziv', specifikacija = '$specifikacija' 
         where id = $id";
        return $conn->query($upit);
    }

    public static function deleteRacunar($naziv, mysqli $conn) {
        $upit = "delete from racunar where naziv = '$naziv'";
        return $conn->query($upit);
    }

}

?>
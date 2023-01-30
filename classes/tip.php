<?php

class Tip {

    public $tipID;
    public $nazivTipa;

    public function __construct($tipID=null,$nazivTipa=null)
    {
        $this->tipID = $tipID;
        $this->nazivTipa=$nazivTipa;
    }

    public static function vratiSve(mysqli $conn)
    {
        $upit = "SELECT * FROM tip";
        // echo $upit;
        // $rezultati = [];

        // $rez = $konekcija->query($upit);

        // while ($red = $rez->fetch_object()){
        //     $rezultati[] = $red;
        // }

        return $conn->query($upit);
    }
}

?>
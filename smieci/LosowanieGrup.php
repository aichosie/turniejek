<?php
include 'Uczestnik.php';

class LosowanieGrup {
    
    public $koszyk;
    
    public function __construct($uczestnicy) {
        $liczba_uczestnikow = count($uczestnicy);
        $this->koszyk = array();
        $waz = array();
        $waz[] = new Uczestnik("koo", "54");
        $this->koszyk[0] = $waz;
        
        echo $this->koszyk[0][0]->ranking;
        echo "co jest kurwa?";
    }
    public function robCos()
    {
        echo "beka";
    }
}

?>
<?php


class Uczestnik {
    //put your code here
    public $nazwa;
    public $ranking;
    
    public function __construct($naz, $ran) {
        $this->nazwa = $naz;
        $this->ranking = $ran;
    }
}

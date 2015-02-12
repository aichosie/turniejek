<?php
function zapisz($sciezka, $string)
{
    $dane = $sciezka . " - " .(string)$string . "\n";

$file = "baza.txt"; 

// uchwyt pliku, otwarcie do dopisania 
$fp = fopen($file, "a"); 

// blokada pliku do zapisu 
flock($fp, 2); 

// zapisanie danych do pliku 
fwrite($fp, $dane); 

// odblokowanie pliku 
flock($fp, 3); 

// zamknięcie pliku 
fclose($fp); 
}
?>

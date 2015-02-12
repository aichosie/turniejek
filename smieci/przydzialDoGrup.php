<?php

include 'Uczestnik.php';
$uczestnicy = array();
//mysql_connect("mysql.cba.pl.", "aich_baza", "mamwrotki");
//mysql_select_db("luuuk_cba_pl");

$db = new mysqli("mysql.cba.pl.", "aich_baza", "mamwrotki", "luuuk_cba_pl");

$query="SELECT * FROM Uczestnicy ORDER BY Rank DESC";
$wynik = $db->query($query);
$ile = $wynik->num_rows;
echo $ile;

for($i = 0; $i < $ile; $i++)
{
    $rekord = $wynik->fetch_assoc();
    $nowy = new Uczestnik($rekord['Nick_name'], $rekord['Rank']);
    $uczestnicy[] = $nowy;
    echo "$nowy->nazwa"." $nowy->ranking <br>";
}
echo count($uczestnicy);

?>


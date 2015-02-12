<?php
session_start();
?>
<?php
include_once 'funkcje.php';
zapisz(__FILE__,"sessia - " . session_id() );

$wartosciPrzedmiotow =array();
$poziomPrzedmiotu = $_GET['poziom'];
$typPrzedmiotu = $_GET['typEq'];
$bazaObrazen = $_GET['bazaObrazen'];


$bazaPrzedmiotu = $poziomPrzedmiotu;
if($typPrzedmiotu == "unikat")
{
    $bazaPrzedmiotu += 5;
}
$bazaPrzedmiotu = $bazaPrzedmiotu * 1.1;
echo $bazaPrzedmiotu."<br>";

$bonusPrzedmiotow = array();
$bonusPrzedmiotow['przedmiot1'] = 0;
$bonusPrzedmiotow['przedmiot2'] = 0;


for($i = 1; $i < 3; $i++)
{
    if(isset($_GET['obrazenia'.$i]))
    {
        $wartosciPrzedmiotow['obrazenia'.$i] = $_GET['obrazenia'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += ($_GET['obrazenia'.$i] / $bazaObrazen) * 3;
        zapisz(__FILE__, "obr - ".$_GET['obrazenia'.$i]);
    }
    if(isset($_GET['hp'.$i]))
    {
        $wartosciPrzedmiotow['hp'.$i] = $_GET['hp'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += ($_GET['hp'.$i] / 20) / $bazaPrzedmiotu;
        zapisz(__FILE__, "hp - ".$_GET['hp'.$i]);
    }
    if(isset($_GET['mp'.$i]))
    {
        $wartosciPrzedmiotow['mp'.$i] = $_GET['mp'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += ($_GET['mp'.$i] / 2) / $bazaPrzedmiotu;
    }
    if(isset($_GET['atak'.$i]))
    {
        $wartosciPrzedmiotow['atak'.$i] = $_GET['atak'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['atak'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['obrona'.$i]))
    {
        $wartosciPrzedmiotow['obrona'.$i] = $_GET['obrona'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['obrona'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['atakMag'.$i]))
    {
        $wartosciPrzedmiotow['atakMag'.$i] = $_GET['atakMag'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['atakMag'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['obronaMag'.$i]))
    {
        $wartosciPrzedmiotow['obronaMag'.$i] = $_GET['obronaMag'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['obronaMag'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['szczescie'.$i]))
    {
        $wartosciPrzedmiotow['szczescie'.$i] = $_GET['szczescie'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['szczescie'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['szybkosc'.$i]))
    {
        $wartosciPrzedmiotow['szybkosc'.$i] = $_GET['szybkosc'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['szybkosc'.$i] / $bazaPrzedmiotu;
    }
    if(isset($_GET['celnosc'.$i]))
    {
        $wartosciPrzedmiotow['celnosc'.$i] = $_GET['celnosc'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['celnosc'.$i] * 0.03;
    }
    if(isset($_GET['unik'.$i]))
    {
        $wartosciPrzedmiotow['unik'.$i] = $_GET['unik'.$i];
        $bonusPrzedmiotow['przedmiot'.$i] += $_GET['unik'.$i] * 0.03;
    }
    echo $bonusPrzedmiotow['przedmiot'.$i]."<br>";
}
zapisz(__FILE__,"dlugosc - " . count($_SESSION) );
$_SESSION['daneItemow'] = $wartosciPrzedmiotow;
$_SESSION['bonus'] = $bonusPrzedmiotow;
$_SESSION['poziom'] = $poziomPrzedmiotu;
$_SESSION['obrazenia'] = $bazaObrazen;
$_SESSION['typEq'] = $typPrzedmiotu;
zapisz(__FILE__,"dlugosc - " . count($_SESSION) );

session_write_close();
header("Location: http://www.luuuk.cba.pl/index.php?si=".session_id());
exit();
?>
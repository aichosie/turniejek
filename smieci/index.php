<?php
if(isset($_GET['si']))
{
    session_id($_GET['si']);
}
session_start();
?>
<?php
include_once 'funkcje.php';
zapisz(__FILE__,"sessia - " . session_id() );
zapisz(__FILE__,"dlugosc - " . count($_SESSION) );
$stan = FALSE;

function zwrocWartosc($wartosc)
{
    $daneItemow = $_SESSION['daneItemow'];
    zapisz(__FILE__,$wartosc . " - ". $daneItemow["$wartosc"] );
    
    if(isset($daneItemow["$wartosc"]))
    {
        $zmienna = $daneItemow[$wartosc];
        return "value=\"$zmienna\"";
    }
    else
    {
        return "";
    }
}
function zwrocTyp($wartosc, &$stan)
{
    if(isset($_SESSION['typEq']))
    {
        if($wartosc == $_SESSION['typEq'])
        {
            return "checked=\"yes\"";
        }
        else {
            return "";
        }
    }
    elseif ($stan == FALSE) {
        $stan = TRUE;
        return "checked=\"yes\"";
    }
    else {
        return "";
    }
}
function zwrocWartosc1($wartosc)
{
    if(isset($_SESSION[$wartosc]))
    {
        return "value=\"$_SESSION[$wartosc]\"";
    }
    else {
        if($wartosc == "poziom")
        {
            return "value=\"50\"";
        } else {
            return "value=\"470\"";
        }
    }
}
?>
<html>
    <head>
      <title>Kowal MFO</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
   </head>
   <body>
       <h1>Kowal MFO</h1>
       <p>
           Skrypt umożliwiający obliczenie bonusu przedmiotów wybranych do połączenia.<br>
           W pola należy wpisać jedynie statystyki które są bonusowe w przedmiocie w celu poprawnego obliczenia bonusu.
       </p>
       <form action="obliczBonus.php">
           <table>
               <tr>
                   <td>Poziom przedmiotu:</td><td><input type="number" name="poziom" min="31" max="70" <?php echo zwrocWartosc1("poziom"); ?>></td>
               </tr>
               <tr>
                   <td>Typ przedmiotu:</td><td><input type="radio" name="typEq" value="unikat" <?php echo zwrocTyp("unikat", $stan); ?>>Unikat <input type="radio" name="typEq" value="zwykly" <?php echo zwrocTyp("zwykly", $stan); ?>>Zwykły</td>
               </tr>
               <tr>
                   <td>Baza obrażeń:</td><td><input type="number" name="bazaObrazen" min="200" max="700" <?php echo zwrocWartosc1("obrazenia"); ?>></td>
               </tr>
           </table>
           <table>
               <tr style="text-align: center; font-weight: bold;">
                   <td>Bonus w:</td><td> Przedmiot 1:</td><td>Przedmiot 2:</td><br>
               </tr>
               <tr>
                   <td>Obrażenia:</td><td> <input type="text" name="obrazenia1" pattern="^\d+$" <?php echo zwrocWartosc("obrazenia1"); ?>></td><td><input type="text" name="obrazenia2" <?php echo zwrocWartosc("obrazenia2"); ?>></td>
               </tr>
                <tr>
                   <td>HP:</td><td> <input type="text" name="hp1" <?php echo zwrocWartosc("hp1"); ?>></td><td><input type="text" name="hp2" <?php echo zwrocWartosc("hp2"); ?>></td>
               </tr>
               <tr>
                   <td>MP:</td><td> <input type="text" name="mp1" <?php echo zwrocWartosc("mp1"); ?>></td><td><input type="text" name="mp2" <?php echo zwrocWartosc("mp2"); ?>></td>
               </tr>
               <tr>
                   <td>Atak:</td><td> <input type="text" name="atak1" <?php echo zwrocWartosc("atak1"); ?>></td><td><input type="text" name="atak2" <?php echo zwrocWartosc("atak2"); ?>></td>
               </tr>
               <tr>
                   <td>Obrona:</td><td> <input type="text" name="obrona1" <?php echo zwrocWartosc("obrona1"); ?>></td><td><input type="text" name="obrona2" <?php echo zwrocWartosc("obrona2"); ?>></td>
               </tr>
               <tr>
                   <td>Atak magiczny:</td><td> <input type="text" name="atakMag1" <?php echo zwrocWartosc("atakMag1"); ?>></td><td><input type="text" name="atakMag2" <?php echo zwrocWartosc("atakMag2"); ?>></td>
               </tr>
               <tr>
                   <td>Obrona magiczna:</td><td> <input type="text" name="obronaMag1" <?php echo zwrocWartosc("obronaMag1"); ?>></td><td><input type="text" name="obronaMag2" <?php echo zwrocWartosc("obronaMag2"); ?>></td>
               </tr>
               <tr>
                   <td>Szczęście:</td><td> <input type="text" name="szczescie1" <?php echo zwrocWartosc("szczescie1"); ?>></td><td><input type="text" name="szczescie2" <?php echo zwrocWartosc("szczescie2"); ?>></td>
               </tr>
               <tr>
                   <td>Szybkość:</td><td> <input type="text" name="szybkosc1" <?php echo zwrocWartosc("szybkosc1"); ?>></td><td><input type="text" name="szybkosc2" <?php echo zwrocWartosc("szybkosc2"); ?>></td>
               </tr>
               <tr>
                   <td>Celność:</td><td> <input type="text" name="celnosc1" <?php echo zwrocWartosc("celnosc1"); ?>></td><td><input type="text" name="celnosc2" <?php echo zwrocWartosc("celnosc2"); ?>></td>
               </tr>
               <tr>
                   <td>Uniki:</td><td> <input type="text" name="unik1" <?php echo zwrocWartosc("unik1"); ?>></td><td><input type="text" name="unik2" <?php echo zwrocWartosc("unik2"); ?>></td>
               </tr>
               <tr>
                   <td></td><td colspan="2" style="text-align: center;"><input type="submit" value="Oblicz bonus"></td>
               </tr>
           </table>
           
</form>
       <table>
           <?php
                if(isset($_SESSION['bonus']))
                {
                    $bonusPrzed = $_SESSION['bonus'];
                    $bonus1 = $bonusPrzed["przedmiot1"];
                    $bonus2 = $bonusPrzed["przedmiot2"];
                    $bonus3 = $bonus1 + $bonus2;
                    $bonusCal1 = (int)($bonus1 * 25);
                    $bonusCal2 = (int)($bonus2 * 25);
                    $bonusCal3 = (int)($bonus3 * 25);
                    $wyraz1 = round($bonus1 * 100, 2)."% ( +".$bonusCal1." )";
                    $wyraz2 = round($bonus2 * 100, 2)."% ( +".$bonusCal2." )";
                    $wyraz3 = round($bonus3 * 100, 2)."% ( +".$bonusCal3." )";                   
                    
                    echo "<tr style=\"font-weight: bold;\">";
                    echo "<td style=\"width: 8em;\">Bonus Wynikowy:</td><td style=\"color: green; width: 10em; text-align: center; \">".$wyraz1."</td><td style=\"color: green; width: 10em; text-align: center; \">".$wyraz2."</td>";
                    echo "</tr>";
                    
                    if($bonusCal1 > 3 || $bonusCal2 > 3)
                    {
                        $wyraz3 = "Połączenie tych przedmiotów jest niemożliwe";
                        echo "<tr style=\"font-weight: bold; width: 8em;\"><td>Łączny bonus:</td><td colspan=\"2\" style=\"color: red; text-align: center; \">";
                    }
                    else {
                        echo "<tr style=\"font-weight: bold; width: 8em;\"><td>Łączny bonus:</td><td colspan=\"2\" style=\"color: green; text-align: center; \">";
                    }
                    echo $wyraz3."</td></tr>";
                    
                    zapisz(__FILE__,"dlugosc - " . count($_SESSION) );
                    $_SESSION = array();
                    zapisz(__FILE__,"dlugosc - " . count($_SESSION) );
                    session_destroy();
                } else {
                 $_SESSION = array();
                }
                
                ?>
       </table>

    </body>
</html>
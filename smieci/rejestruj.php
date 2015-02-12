<?php
include 'Uczestnik.php';

$nickName = $_GET['we_nick'];
$rankName = $_GET['we_rank'];
$nowy = new Uczestnik($nickName, $rankName);

mysql_connect("mysql.cba.pl.", "aich_baza", "mamwrotki");
mysql_select_db("luuuk_cba_pl");
/*
$query = "CREATE TABLE Uczestnicy 
(
ID int NOT NULL AUTO_INCREMENT,
Nick_name varchar(50), 
Rank int,
Status varchar(10),
Grupa varchar(10),
ID_Turniej int,
FOREIGN KEY (ID_Turniej) REFERENCES Turniej(ID),
PRIMARY KEY (ID)
)";
 
mysql_query($query);
*/
$query1 = "INSERT INTO Uczestnicy VALUES ('', '".$nowy->nazwa."', '".$nowy->ranking."', 'NIE', '0', '2')";
mysql_query($query1);

$query2="SELECT * FROM Uczestnicy";
$result=mysql_query($query2);
$num=mysql_numrows($result);

mysql_close();

echo 'udalo sie?<br>';
echo $num;
?>
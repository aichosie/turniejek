<?php

mysql_connect("mysql.cba.pl.", "aich_baza", "mamwrotki");
mysql_select_db("luuuk_cba_pl");

$query = "CREATE TABLE Turniej 
(
ID int NOT NULL AUTO_INCREMENT,
Turniej_name varchar(50), 
Miesiac varchar(50),
Rok int,
PRIMARY KEY (ID)
)";
 
mysql_query($query);

mysql_close();
echo "utworzono tabele turnieje";
?>


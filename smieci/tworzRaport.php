<?php

mysql_connect("mysql.cba.pl.", "aich_baza", "mamwrotki");
mysql_select_db("luuuk_cba_pl");

$query = "CREATE TABLE Raport 
(
ID int NOT NULL AUTO_INCREMENT,
UczestnikA varchar(50), 
UczestnikB varchar(50),
Link varchar(50),
Zywciezca varchar(50),
Data varchar(50),
PRIMARY KEY (ID),
FOREIGN KEY (UczestnikA) REFERENCES Uczestnicy(Nick_name),
FOREIGN KEY (UczestnikB) REFERENCES Uczestnicy(Nick_name)
)";
 


mysql_query($query);

mysql_close();
echo "utworzono tabele raport";
?>


<?php
//Datenbank Einstellungen
$pdo = new PDO('mysql:host=localhost;dbname=databasename', 'username', 'password');

//Anzahl der Personen im Stammbaum
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM wt_name WHERE n_type = ?");
$statement->execute(array('NAME'));  
$row = $statement->fetch();
$statement1 = $pdo->prepare("SELECT COUNT(*) AS doppelt FROM wt_name WHERE n_surname = ?");
$statement1->execute(array('@N.N.'));  
$row1 = $statement1->fetch();
$zahl1 = $row['anzahl'];
$zahl2 = $row1['doppelt'];
$personen = $zahl1 - $zahl2;
//Translate "Anzahl von..." into your language. Total Individuals in your tree.
echo "Anzahl von Personen im Stammbaum: $personen";
?>

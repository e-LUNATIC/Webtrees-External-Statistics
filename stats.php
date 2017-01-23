<!doctype html>  
<html lang="de">  
<head>  
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Webtrees Datenbankstatistiken | ollinet.org</title>  
<meta name="description" content="Webtrees Datenbankstatistiken | ollinet.org">  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">  
</head>  
<body>  
<div class="container">  
<div class="row">  
<div class="col-md-12">  
<table class='table table-hover'>  
<tr>  
</tr>  
<?php
/**
 * webtrees: online genealogy
 * Copyright (C) 2016 webtrees development team
 * Copyright (C) 2017 oliver erben https://ollinet.org>.
 */
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
//Mediacount
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahl FROM wt_media");
$statement->execute();  
$row = $statement->fetch(); { 
//
echo "<tr>";  
echo "<td>" . $personen . " Personen im Stammbaum</td>";  
echo "</tr>"; 
echo "<tr>";
echo "<td>" .$row['anzahl']. " Mediendateien (Bilder, Videos, Dokumente)</td>";  
echo "</tr>";   
}
?>

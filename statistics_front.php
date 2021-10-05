<!doctype html>  
<html lang="de">  
<head>  
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title>Webtrees Datenbankstatistiken | lioe.net</title>  
<meta name="description" content="Webtrees Datenbankstatistiken | lioe.net">  
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
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
$statement = $pdo->prepare("SELECT COUNT(*) AS anzahlpersonen FROM wt_individuals");
$statement->execute();  
$personen = $statement->fetch();
//Anzahl der Männlicher Personen im Stammbaum
$statement = $pdo->prepare("SELECT COUNT(*) AS sexm FROM wt_individuals WHERE i_sex = ?");
$statement->execute(array('M'));  
$sexm = $statement->fetch();
//Anzahl der Weiblicher Personen im Stammbaum
$statement = $pdo->prepare("SELECT COUNT(*) AS sexw FROM wt_individuals WHERE i_sex = ?");
$statement->execute(array('F'));  
$sexw = $statement->fetch();
//Mediacount
$statement = $pdo->prepare("SELECT COUNT(*) AS mediaanzahl FROM wt_media");
$statement->execute();  
$row = $statement->fetch(); { 
//
//Familycount
$statement = $pdo->prepare("SELECT COUNT(*) AS family FROM wt_families");
$statement->execute();  
$family = $statement->fetch();
//
//Sourcescount
$statement = $pdo->prepare("SELECT COUNT(*) AS quellen FROM wt_sources");
$statement->execute();  
$quellen = $statement->fetch();
//
//Placecount
$statement = $pdo->prepare("SELECT COUNT(*) AS orte FROM wt_places");
$statement->execute();  
$orte = $statement->fetch();
//
echo "<tr>";  
echo "<td>" .$personen['anzahlpersonen']. " Personen im Stammbaum</td>";  
echo "</tr>"; 
echo "<tr>";  
echo "<td>" .$sexm['sexm']. " Männliche Personen</td>";  
echo "</tr>"; 
echo "<tr>";  
echo "<td>" .$sexw['sexw']. " Weibliche Personen</td>";  
echo "</tr>"; 
echo "<tr>";
echo "<td>" .$row['mediaanzahl']. " Mediendateien (Bilder, Videos, Dokumente)</td>";  
echo "</tr>";
echo "<tr>";
echo "<td>" .$family['family']. " Familien</td>";  
echo "</tr>";
echo "<tr>";
echo "<td>" .$quellen['quellen']. " Quellenangaben</td>";  
echo "</tr>";
echo "<tr>";
echo "<td>" .$orte['orte']. " Wohnorte</td>";  
echo "</tr>";
}
?>
</table>  

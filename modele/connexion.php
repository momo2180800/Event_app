<?php
$nomServeur="localhost";
$utilisateur="root";
$motDePasse="";
try {
		$connexion=new PDO("mysql:host=$nomServeur;charset=utf8", $utilisateur, $motDePasse);
		$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$req="CREATE DATABASE IF NOT EXISTS evenement";
		$connexion->exec($req);
		$conn=new PDO("mysql:host=$nomServeur;dbname=evenement;charset=utf8", $utilisateur, $motDePasse);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (Exception $E) 
{
	$E->getMessage();
	exit();
}
?>
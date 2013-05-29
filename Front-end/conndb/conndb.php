<?php
$client = "localhost";
$utente = "daniele";
$passworddb = "daniele";
$nomedb = "videoteca";


$db=mysql_connect('localhost','root','');
if($db==FALSE){
	die("errore nella connessione");
}

mysql_select_db($nomedb, $db) or die ("Errore nella selezione del database");

?>
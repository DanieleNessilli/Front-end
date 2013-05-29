<?php                                    //file che si occupa della registrazione dell'utente
session_start();

$nome=$_POST['nome'];                    //dati ripresi dalla post fatta nella fase di registrazione
$cognome=$_POST['cognome'];
$email=$_POST['email'];
$password=$_POST['password'];

include('/conndb/conndb.php');          //crea la connessione al db

$tabella = "amministratori";

$ris=mysql_query("INSERT INTO amministratori (nome,cognome,email,password,ruolo) VALUES ('".$nome."','".$cognome."','".$email."','".$password."','client')");  //inserisce i dati nel db
                                                                                         //la registrazione crea un utente con ruolo "client", poi sarà l'amministratore a dare il ruolo di "admin" 
if($ris=1){                                //se la query ha buon fine crea una sessione utente con nome e cognome di chi ha fatto l'accesso
	$utente=$nome." ".$cognome;
	$_SESSION["user"]=$utente;
	header("location: home.php");	       //a registrazione effettuata reindirizza nella home
}else{
	$msg="registrazione non effettuata";
	$_SESSION["registrazione"]=$utente;
	header("location: registrazione.php");            
}


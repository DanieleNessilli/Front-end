<?php                                            //file che si occupa del login

session_start();                                 //inizializza la sessione  


$email=$_POST['email'];                          //estrae email e password dalla post fatta nel login
$password=$_POST['password'];

include('/conndb/conndb.php');                   //connessione al db 
$tabella = "amministratori";
$ris=mysql_query("select * from ".$tabella." where email='".$email."'");               //query che richiede al db tutti i dati dell'utente relativi all'email inserita nel login

$nr = mysql_num_rows($ris);

if ($nr != 0){                                      
	for($x = 0; $x < $nr; $x++){                                 //estrae i dati dalla risposta della query
		$row = mysql_fetch_assoc($ris);
		$nome=$row['nome'];
		$cognome=$row['cognome'];
		$pass=$row['password'];
	}
}

$utente=$nome." ".$cognome;                                    

if($pass==$password){                                         //se la password memorizzata nel db corrisponde a quella inserita crea la sessione utente e reindirizza alla home
	$_SESSION["user"]=$utente;
	header("location: home.php");
 }
else{
	header("location: index.php");                           //se la password non corrisponde  reindirizza alla pagina di login
}

?>

<?php                                               //file che si occupa di ricerccare i film del db
session_start();

$tiporicerca=$_POST['ricerca'];                     //riceve i dati dalla post (tipo di ricerca:attore,titolo,regia,genere) 
$nome=$_POST['nome'];                               //nome attore o titolo film o nome regista o genere

require_once ("classFilm.php");
include('/conndb/conndb.php');
$tabella = "elencofilm";

$ris=mysql_query("select * from ".$tabella." where ".$tiporicerca."='".$nome."'");            //query al db con i dati della ricerca
$nr = mysql_num_rows($ris);

if ($nr != 0){
	
	$arr=array();
	
	
	for($x = 0; $x < $nr; $x++){                                //estrae i dati dalla risposta del db e crea oggetti film contenenti i dati dei film cercati
		
		$film=new classFilm();
		
		$row = mysql_fetch_assoc($ris);                             
		$film->setTitolo($row['titolo']);
		$film->setAttore($row['attore']);
		$film->setRegia($row['regia']);
		$film->setDescrizione($row['descrizione']);
		$film->setTrailer($row['trailer']);
		$film->setLocandina($row['linkfoto']);
		
		$arr[$x]=$film;
	}
	
	$_SESSION['elencofilm']=serialize($arr);                   //crea la sessione elencofilm contente i film cercati
	header("location: mostraelenco.php");
}else{
	$film=new classFilm();                                    //se la ricerca non da nessun risultato crea un oggetto film con titolo "film non trovato" 
	$arr=array();
	
	//$row = mysql_fetch_assoc($ris);
	$film->setTitolo("film non trovato");
	$film->setAttore("");
	$film->setRegia("");
	$film->setDescrizione("");
	$film->setTrailer("");
	
	$arr[0]=$film;
	$_SESSION['elencofilm']=serialize($arr);
	header("location: mostraelenco.php");
}


?>
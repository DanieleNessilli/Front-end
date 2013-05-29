<?php                                                    //file che ricerca i film visualizzati nella home
session_start();

$titolo=$_GET['titolo'];

include('/conndb/conndb.php');
require_once ("classFilm.php");
$tabella = "elencofilm";

$ris=mysql_query("select * from ".$tabella." where titolo='".$titolo."'");                     //query di ricerca di tutte i film presenti nel db
$nr = mysql_num_rows($ris);

if ($nr != 0){                             

	$arr=array();                                                           


	for($x = 0; $x < $nr; $x++){

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

	$_SESSION['homeFilm']=serialize($arr);                        //crea la sessione che contiene i dati della ricerca effettuata
	header("location: mostrafilm.php");
	}
?>	

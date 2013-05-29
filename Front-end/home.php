<?php
	session_start();                                //inizializza la sessione
	if (isset($_SESSION['user'])) {                 //controlla se esiste la sessione utente, se esiste significa che il login è avvenuto con successo
		$rs=$_SESSION["user"];                      //quindi evita l'accesso senza login
	}else header("location: index.php");            //reindirizza alla pagina di login se si prova ad accedere saltando il login
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta content="text/html;charset=iso-8859-1" http-equiv="Content-Type"></meta>
<title>MovieTime</title>
<link href="css/styles2.css" type="text/css" rel="stylesheet"></link>
</head>
<body>
<div id="header">
		<p>
			<b> </b>
		</p>
		<br> </br>
		<div id="logo">
			<a href="home.php"><img width="261" height="130" src="images/header.jpg"></img>
			</a>
		</div>

		<div id="menu">
			<ul>
				<b>
					<li class="first"><a href="home.php"> HOME </a></li>
					<li><a href="cerca.php"> CERCA </a></li>
					<li><a href="logout.php"> LOGOUT </a></li>
				</b>
				<br></br>
				<li></li>
				<li></li>
				<li></li>
				<li></li>
			</ul>
		</div>
		<!-- end #menu -->
	</div>
	<!-- end #header -->
	<div id="page">
		<div class="copy">
			<div class="entry">
				<h1 class="title">HOME</h1>
				<h4 align="right">Benvenuto  <?php echo(" ".$rs); ?></h4>
				<p></p>
	
			
			     <?php
							include('/conndb/conndb.php');                //include il file che crea la connessione al db
							$tabella = "elencofilm";
							
							$ris=mysql_query("select * from ".$tabella." order by titolo ASC");    //query al db per mostrare l'elenco dei film nella home 
							
							$nr = mysql_num_rows($ris);                   //risposta della query
							
							if ($nr != 0){                              
							   for($x = 0; $x < $nr; $x++){              //parser che estrae i dati dalla risposta della query
                                 $row = mysql_fetch_assoc($ris);
                                 ?>
                <div id="wrapper">                 
                <div id="content">                 
			    <ul id="movieposters">
				<li><img a src="<?php echo($row['linkfoto'])?>" WIDTH="300" HEIGHT=400"></img>
					<div class="movieinfo">
						<h3><?php  echo($row['titolo']) ?></h3>
						<h3>Regia:<p><?php echo($row['regia']); ?></p></h3>
						<a href="ricercaHome.php?titolo=<?php  echo($row['titolo']) ?>">
							Info </a>
					</div></li>
				</ul>
				</div>
				</div>
					 <?php   
                               }
                            }
							?> 
							
			
</body>
</html>

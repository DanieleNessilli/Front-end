<?php
	session_start();                                  //inizializza la sessione
	if(isset($_SESSION["user"])){                     //controlla se esiste la sessione utente, se esiste significa che il login è avvenuto con successo
	$rs=$_SESSION["user"];                            //quindi evita l'accesso senza login
	}else header("location: index.php");              //reindirizza alla pagina di login se si prova ad accedere saltando il login
?>			

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
</meta>
<title>Videoteca</title>
<link media="screen" href="css/styles2.css" type="text/css" rel="stylesheet">
</link>

</head>
<body>
	<div id="header">
		<p>
			<b> </b>
		</p>
		<br> </br>
		<div id="logo">
			<a href="home.php"><img width="261" height="130"
				src="images/header.jpg"></img> </a>
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
				<h1 class="title">CERCA</h1>
				<h4 align="right">
					Benvenuto<?php echo(" ".$rs); ?>
				</h4>
				<p></p>
				<table>
					<tbody>
						<tr>
							<td>
							<fielset>
								<form method="post" action="ricerca.php">
									<select name="ricerca">
										<option value="titolo">titolo</option>
										<option value="regia">regia</option>
										<option value="attore">attore</option>
										<option value="tipologia">genere</option>
									</select> <label>Inserisci </label><input id="nome" type="text"name="nome"style="border: 1px solid rgb(153, 153, 153); color: #000000; height: 25px; width: 250px;"size="12";>
										<p></p>
										<p></p><div id="elenco">
										<input type="submit" value="Avvia Ricerca">
									</div>
									</div>
								</form>
								</fielset>
					<div class="row" align="left">
						<?php
						
						require_once ("classFilm.php");
						
						if(isset($_SESSION['elencofilm'])){                           //se esite la sessione elencofilm mostra tutti i dati relativi al film scelto
						$object =  unserialize($_SESSION['elencofilm']);
						
						$titolo=$_GET['titolo'];
						
						$i=count($object);
						
						?> 

						<table>
						<tbody>
						<?php 
						for($y=0;$y<$i;$y++){
						
                                if($object[$y]->getTitolo()==$titolo) {
                                   ?>
                                   <tr>
												<td><img src="<?php echo($object[$y]->getLocandina());?>"
													 HEIGHT="200" WIDTH="150" /></td>
	                               <td><h4>Titolo: <?php echo($object[$y]->getTitolo());?> </h4>
                                   <h4>Regia: <?php echo($object[$y]->getRegia());?></h4>
                                   <h4>Attore: <?php echo($object[$y]->getAttore());?></h4></td>
                                   </tr>
										</tbody>
									</table>
                                   <h4>Trama: </h4>
                                   <h4><?php echo($object[$y]->getDescrizione());?></h4>
                                   
                                   <p><iframe width="560" height="315" src="<?php echo($object[$y]->getTrailer()) ?>" frameborder="0" allowfullscreen></iframe></p>
                                   <?php 
                                }  
                                unset($_SESSION["elencofilm"]);
						}
						?>
						</td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
				<?php 
						}else if(isset($_SESSION['homeFilm'])){                                 //se esite la sessione home mostra i dati relativi al film scelto nella hom page
							$object =  unserialize($_SESSION['homeFilm']);

                            $i=count($object);
                            ?>
									<table>
										<tbody>
											<?php 
											for($y=0;$y<$i;$y++){
	                               ?>
											<tr>
												<td><img src="<?php echo($object[$y]->getLocandina());?>"
													 HEIGHT="200" WIDTH="150" /></td>
												<td><h4>
														Titolo:
														<?php echo($object[$y]->getTitolo());?>
													</h4>
													<h4>
														Regia:
														<?php echo($object[$y]->getRegia());?>
													</h4>
													<h4>
														Attore:
														<?php echo($object[$y]->getAttore());?>
													</h4></td>
											</tr>
										</tbody>
									</table>
											
											<h4>Trama:</h4>
											<h4>
												<?php echo($object[$y]->getDescrizione());?>
											</h4>
											
												
											
									<p><iframe width="560" height="315" src="<?php echo($object[$y]->getTrailer()) ?>" frameborder="0" allowfullscreen></iframe></p>
                                   <?php 
                                }  
						}
						?>
						</td>
						</tr>
						<tr>
							<td></td>
						</tr>
					</tbody>
				</table>
				<p></p>
			</div>
		</div>
		<!-- end #content -->

		<!-- end #sidebar -->
	</div>
	<!-- end #page -->
</body>
</html>
							
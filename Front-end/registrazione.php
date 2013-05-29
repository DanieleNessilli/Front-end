<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
				<h1 class="title">REGISTRAZIONE</h1>
				<p></p>
				<table>
					<tbody>
					  <tr>
					     <?php
					         if(isset($_SESSION["registrazione"])){
                                    ?>
                                    <h3><td><?php echo($_SESSION["registrazione"]); ?></td></h3>
                                    <?php 
                             }
					     ?>
					  </tr>
						<tr>
							<td>
							<form method="post" action="registradb.php" >
								Inserisci nome <input name="nome" type="text"  required>
								<p>
									inserisci cognome <input type="text" name="cognome" required >
								</p>
								<p>
									inserisci email <input type="email" name="email" required>
								</p>
								<p>
									inserisci password <input type="password" name="password" required>
								</p>
								<p>
									<input type="submit" value="Aggiungi &gt;&gt;" >
									
						       </p>
						   </form> 
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

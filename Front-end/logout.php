<?php                                 //chiude tutte le sessioni reindirizza alla pagina di login
session_unset();                       
session_destroy();
setcookie(session_name(), '', time()-42000, '/');
header("location: index.php");

?>
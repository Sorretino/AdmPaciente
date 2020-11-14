<?php
  session_start();

session_destroy();
//Remove todas as informações contidas na variaveis globais
unset($_SESSION['email'],			
$_SESSION['id_user']); 		

 		

//session_destroy();
//redirecionar o usuário para a página de login
header("Location: login.php");
exit();	
?>
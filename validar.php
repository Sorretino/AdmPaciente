
<?php
/*date_default_timezone_set('America/Sao_Paulo');
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))  session_start();
// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['email'])) {
  // Destrói a sessão por segurança
  session_destroy();
  // Redireciona o visitante de volta pro login
  header("Location: index.php"); 
  exit;
}*/

if(isset($_SESSION['id_user']) && empty($_SESSION['id_user']) == false){

  echo "Area Restrita";

}else{

header("Location: login.php");

}
?>

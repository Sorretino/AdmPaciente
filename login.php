<?php

session_start();

 include('conexao.php');

/*RECEBE TODAS AS INFORMÇÕES ENVIADA VIA METODO POST E JOGAR NA VARIAVEL DADOS*/
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!empty($dados) AND !empty($dados['bt_login'])): /*VERIFICA SE A VARIAVEL DADOS TEM INFORMAÇÕES E A VARIAVEL DADOS NO INDCIE BT_LOGIN TEM INFORMAÇÕES*/
  /*CASO NÃO AVER DADOS RETORNA PARA LOGIN*/

   $senha = md5($dados['senha']);

	$selec = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
	$sel = $PDO->prepare($selec);
	$sel->bindParam(1,$dados['email'],PDO::PARAM_STR);
	$sel->bindParam(2,$senha,PDO::PARAM_STR);
	$sel->execute();

	$verifica_user = $sel->rowCount();

	if($verifica_user > 0):
		$ms =  "Tem usuário sim";
		$dados_user = $sel->fetch(PDO::FETCH_ASSOC);
		$_SESSION['id_user'] = $dados_user['id'];
		$_SESSION['email'] = $dados_user['email'];
        $_SESSION['nome'] = $dados_user['nome'];
		header("location: index.php");		
	else:
		$ms = '<div style="position:absolute;z-index: 1;align-items: center;
    text-align: center;" class= "col-lg-12 bg-danger text-white">Alguns dos dados incorretos!  por favor verifique e tentar novamente.</div>';
	endif;
endif;   
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>OM30 Tecnologia</title>
  <!-- Bootstrap core CSS-->

   <link rel="stylesheet" href="css/3sdigitalStyle.css">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark"
 style="background-color: #8b2238 !important ">
 <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <p>OM30 Tecnologia</p>
                  </div>
                  <div class="logo">
                    <h1>Área Administrativa</h1>
                  </div>
                  <p>inovações tecnológicas.</p>
                </div>
              </div>
            </div>
            <?php
        if(!empty($dados) AND !empty($dados['bt_login'])):
          echo $ms;
        endif;
      ?>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate">
                    <div class="form-group">
                      <input id="login-username" type="text" name="email" required data-msg="Por favor insira seu nome de usuário" class="input-material">
                      <label for="login-username" class="label-material">Nome do usuário</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="senha" required data-msg="Por favor, insira sua senha" class="input-material">
                      <label for="login-password" class="label-material">Senha</label>
                    </div><input id="login" type="submit" class="btn btn-block btn-primary" name="bt_login"
                    style="background-color: #8b2238!important;border:none;" />
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form><a href="#" class="forgot-pass">Esqueceu a senha?</a><br><small>Não possui uma conta? </small><a href="#" class="signup">Inscrever-se</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p>Design  <a href="https://www.om30.com.br/" class="external">OM30 Tecnologia movida por pessoas 2020</a>
          <!-- <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a> -->
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        </p>
      </div>
    </div>
      <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
</body>

</html>

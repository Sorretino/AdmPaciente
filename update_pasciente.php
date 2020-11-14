<?php

session_start() ;
include('menu.php');

 include('conexao.php');

define("Versão"," 3.2  2018");
	


    $id = 0;

           
            if (isset($_GET['id']) && empty($_GET['id']) == false) {
            $id = addslashes($_GET['id']);
            }

            if (isset($_POST['nomecompleto']) && empty($_POST['nomecompleto']) == false) {
            $nomecompleto = addslashes($_POST['nomecompleto']);  
            $nomemae = addslashes($_POST['nomemae']);  
            $nascimento = addslashes($_POST['nascimento']);  
            $cpf = addslashes($_POST['cpf']);  
            $rg = addslashes($_POST['rg']);  
            $cns = addslashes($_POST['cns']);  
            $cep = addslashes($_POST['cep']);  
            $telefone = addslashes($_POST['telefone']);  
            $celular = addslashes($_POST['celular']);  
            $endereco = addslashes($_POST['endereco']);  
            $numero = addslashes($_POST['numero']);  
            $bairro = addslashes($_POST['bairro']); 
            $cidade = addslashes($_POST['cidade']); 
            $estado = addslashes($_POST['estado']); 
            $descricao_longa = addslashes($_POST['descricao_longa']); 
            $bairro = addslashes($_POST['bairro']); 

            if(!empty($_FILES['arquivo']['name'])):
            $extensao = strtolower(substr($_FILES['arquivo']['name'] , -4)); 

            $diretorio = "./upload/";
            move_uploaded_file($_FILES['arquivo']['tmp_name'],$diretorio.$_FILES['arquivo']['name'] );
            $nome_arquivo = $_FILES['arquivo']['name'];
            else:
            $nome_arquivo = $_POST['imagem_ant'];
            endif;

 $sql = "UPDATE pasciente SET nomecompleto = '$nomecompleto',nomemae = '$nomemae',nascimento='$nascimento',cpf='$cpf',rg='$rg',cns='$cns',cep='$cep',telefone='$telefone',celular='$celular',endereco='$endereco',numero='numero',bairro='$bairro',cidade='$cidade',estado='$estado',descricao_longa='$descricao_longa',imagem ='$nome_arquivo' WHERE id = '$id' ";
    $sql = $PDO->prepare($sql);
    $sql->execute();

    echo"<script>setTimeout(function(){alert('Paciente alterado com Sucesso! Sera Direcionado Setores paciente Aguarde..');location.href='Filter_pasciente.php'})</script>";

    }

    $sql = "SELECT *  FROM pasciente WHERE id = '$id'";
    $sql = $PDO->prepare($sql);
    $sql->execute();
    if ($sql->rowCount() >0) {
    $dado = $sql->fetch();




    }else{
    //header("Location:index.php");   

    }
	
?>

  
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Painel Administrativo</a>
        </li>
        <li class="breadcrumb-item active">Edição paciente OM30 </li>
      </ol>
      <div class="row">
        <div class="col-12">
          <?php if(isset($smg)): echo  $smg; endif; ?>
          
          <p>Todos os campos obrigatorio! OM30.</p>
        </div>
      </div>





    
    <form method="POST" enctype="multipart/form-data">

 <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationServer01">Nome completo:</label>
      <input type="text" name="nomecompleto"value="<?php  echo $dado ['nomecompleto']; ?>"  class="form-control is-valid" id="validationServer01" placeholder="Nome paciente"  required>
   
    </div>

     
   <div class="col-md-4 mb-3">
      <label for="validationServer02">Nome Completo da Mãe</label>
      <input type="text" name="nomemae" value="<?php  echo $dado ['nomemae']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Nome da mãe"  required>
     
    </div>
  

     <div class="col-md-4 mb-3">
      <label for="validationServer02">Documento CPF</label>
      <input type="text" id="cpf" name="cpf" value="<?php  echo $dado ['cpf']; ?>"  class="form-control is-valid" id="validationServer02" placeholder="Documento CPF"  required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationServer02">Documento RG</label>
      <input type="text" id="rg" name="rg" value="<?php  echo $dado ['rg']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Documento RG"  required="">
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationServer02">CNS*(Cartão nacional de saúde)</label>
      <input type="text"  name="cns" value="<?php  echo $dado ['cns']; ?>" class="form-control is-valid" id="validationServer02" placeholder="CNS*(Cartão nacional de saúde)"  required="">
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationServer02">Contato residêncial</label>
      <input type="text" id="telefone" name="telefone" value="<?php  echo $dado ['telefone']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Nº Telefone"  required="">
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationServer02">Contato Celular</label>
      <input type="text" id="celular" name="celular"value="<?php  echo $dado ['celular']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Nº celular"  required="">
    </div>
    
  
      <div class="col-md-4 mb-3">
      <label for="validationServer02">CEP</label>
      <input type="text" id="cep" name="cep" value="<?php  echo $dado ['cep']; ?>" class="form-control is-valid" id="validationServer02" placeholder="cep"  required>
    </div>
    
     <div class="col-md-4 mb-3">
      <label for="validationServer02">Endereço</label>
      <input type="text" id="rua" name="endereco" value="<?php  echo $dado ['endereco']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Endereço rua:"  required>
    </div>

   <div class="col-md-4 mb-3">
      <label for="validationServer02">Nº residência</label>
      <input type="text" id="casa" name="numero" value="<?php  echo $dado ['numero']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Nº residência"  required>
    </div>
    
     <div class="col-md-4 mb-3">
      <label for="validationServer02">Bairro</label>
      <input type="text" id="bairro" value="<?php  echo $dado ['bairro']; ?>" name="bairro"  class="form-control is-valid" id="validationServer02" placeholder="Bairro"  required>
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationServer02">Cidade</label>
      <input type="text"id="cidade" value="<?php  echo $dado ['cidade']; ?>" name="cidade"  class="form-control is-valid" id="validationServer02" placeholder="Cidade"  required>
    </div>
   

    <div class="col-md-4 mb-3">
      <label for="validationServer02">Estado</label>
      <input type="text" id="uf" name="estado" value="<?php  echo $dado ['estado']; ?>" class="form-control is-valid" id="validationServer02" placeholder="Estado"  required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationServerUsername">Data de Nascimento</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">D</span>
        </div>
        <input  type="date" name="nascimento"  value="<?php  echo $dado ['nascimento']; ?>"  class="form-control is-invalid" id="validationServerUsername" placeholder="Data nascimento" aria-describedby="inputGroupPrepend3" required>
      
      </div>
    </div>
                                         

    <div class="col-md-6">
      <label for="validationServer01">Nova Imagem</label>
      <input type="file"  name="arquivo"  value="<?php  echo $dado ['imagem']; ?>" class="form-control is-valid" id="validationServer01" placeholder="Imagem "  >
   
    </div>
   
      <div class="col-md-6">
      <label for="validationServer01">Imagem Atual paciente:</label>
     <img class="thumbnail" src="upload/<?php echo $dado ['imagem'];?>"style="width:100PX;;max-width:100px;height: 100PX;">
     
   <input type="hidden" name="imagem_ant" value="<?php echo $dado ['imagem'];?>">
    </div>
    
      <div class="form-group">
      <label for="inputEmail3" class="col-sm-12 control-label">Descrição Historio:</label>
      <div class="col-sm-12">
        <textarea class="form-control ckeditor" name="descricao_longa"  rows="5"  placeholder="Descrição Historio"><?php echo html_entity_decode($dado['descricao_longa']); ?></textarea>
      </div>
      </div>


    <div class="modal-footer">
         <button class="btn btn-success btn-lg btn-block" type="submit">Editar</button> 
         <button type="button" class="btn btn-danger btn-lg"><a href="Filter_pasciente.php" style="color:#ffffff;text-decoration:none;" >Cancelar</a></button>

       </div>
      </div>
  </div>
  </div>  
 </form>

 </div>
    </div>
</div>
            
    </div> 

    <!-- /.content-wrapper-->

     <!-- /.content-wrapper-->
       <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>OM30</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <script src="plugins/ckeditor/ckeditor.js"></script>

    <script src="css/jquery.js"></script>
<script src="plugins/mask/jquery.mask.js"></script>
<script>
        $('#cpf').mask('000.000.000-00');
        $('#rg').mask('00.000.000-0');
        $('#cep').mask('00000-000');
        $('#telefone').mask('(00)0000-0000');
        $('#celular').mask('(00)00000-0000');
        $('#casa').mask('0000000000');

</script>
<!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {  /*5432*/

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>


</div>

</div> <!-- /container -->

</body>
</html>



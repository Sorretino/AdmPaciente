<?php 
      session_start() ;
      include('menu.php');

      require_once('conexao.php');

      define("Versão"," 3.2  2018");

      $tempo = date('Y-m-d H:i');

      $dado_geral = filter_input_array(INPUT_POST, FILTER_DEFAULT);



    if(isset($_POST['nomecompleto']) && !empty($_POST['nomecompleto'])){

    $nomecompleto = $_POST['nomecompleto'] ? addslashes(htmlspecialchars($_POST['nomecompleto'])) : '';
    $nomemae = $_POST['nomemae'] ? addslashes(htmlspecialchars($_POST['nomemae'])) : '';

    $nascimento = $_POST['nascimento'] ? addslashes(htmlspecialchars($_POST['nascimento'])) : '';  

    $cpf = $_POST['cpf'] ? addslashes(htmlspecialchars($_POST['cpf'])) : ''; 
    $rg = $_POST['rg'] ? addslashes(htmlspecialchars($_POST['rg'])) : ''; 
    $cns = $_POST['cns'] ? addslashes(htmlspecialchars($_POST['cns'])) : '';             
    $cep = $_POST['cep'] ? addslashes(htmlspecialchars($_POST['cep'])) : '';             
    $telefone = $_POST['telefone'] ? addslashes(htmlspecialchars($_POST['telefone'])) : '';             
    $celular = $_POST['celular'] ? addslashes(htmlspecialchars($_POST['celular'])) : '';             
    $endereco = $_POST['endereco'] ? addslashes(htmlspecialchars($_POST['endereco'])) : '';             
    $numero = $_POST['numero'] ? addslashes(htmlspecialchars($_POST['numero'])) : '';             
    $bairro = $_POST['bairro'] ? addslashes(htmlspecialchars($_POST['bairro'])) : '';             
    $cidade = $_POST['cidade'] ? addslashes(htmlspecialchars($_POST['cidade'])) : '';             
    $estado = $_POST['estado'] ? addslashes(htmlspecialchars($_POST['estado'])) : '';  
    $descricao_longa = $_POST['descricao_longa'] ? htmlspecialchars(addslashes($_POST['descricao_longa'])) : null;
    /*INICIO**/
    $qt_img = count($_FILES['foto']);               
    $extensao  = substr($_FILES['foto']['name'], -4);
    $new_nome = $_FILES['foto']['name'];
    $destino   = "./upload/";
    $validos   = array(".jpg",".png",".gif");
    if(($extensao == $validos[0]) || ($extensao == $validos[1]) || ($extensao == $validos[2])){
    $mover = move_uploaded_file($_FILES['foto']['tmp_name'], $destino.$new_nome);
    if($mover){
    /* echo"<script>alert('Item Enviado com Sucesso!');</script>";*/
    }
    }else{
    echo"<script>alert('Formato de arquivo inválido!');</script>";
    }


    $verifica = "SELECT * FROM pasciente WHERE nomecompleto = '$nomecompleto'";
    $verifica = $PDO ->query ($verifica);
    if($verifica  -> rowCount() >0 ):

    $smg =  '<div class="p-3 mb-2 bg-danger text-white">Nome paciente ja cadastrado!</div>';  

    elseif($verifica  -> rowCount() < 1):
                  
                
      try{
      $INSERT = "INSERT INTO pasciente (nomecompleto,nomemae,nascimento,cpf,rg,cns,cep,celular,telefone,endereco,numero,bairro,cidade,estado,descricao_longa,created,imagem) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $GravaInsert = $PDO->prepare($INSERT);

      $GravaInsert->bindParam(1,$nomecompleto,PDO::PARAM_STR);             
      $GravaInsert->bindParam(2,$nomemae,PDO::PARAM_STR);                  
      $GravaInsert->bindParam(3,$nascimento,PDO::PARAM_STR);
      $GravaInsert->bindParam(4,$cpf,PDO::PARAM_STR);
      $GravaInsert->bindParam(5,$rg,PDO::PARAM_STR);
      $GravaInsert->bindParam(6,$cns,PDO::PARAM_STR);
      $GravaInsert->bindParam(7,$cep,PDO::PARAM_STR);
      $GravaInsert->bindParam(8,$celular,PDO::PARAM_STR);
      $GravaInsert->bindParam(9,$telefone,PDO::PARAM_STR);
      $GravaInsert->bindParam(10,$endereco,PDO::PARAM_STR);
      $GravaInsert->bindParam(11,$numero,PDO::PARAM_STR);
      $GravaInsert->bindParam(12,$bairro,PDO::PARAM_STR);
      $GravaInsert->bindParam(13,$cidade,PDO::PARAM_STR);
      $GravaInsert->bindParam(14,$estado,PDO::PARAM_STR);
      $GravaInsert->bindParam(15,$descricao_longa,PDO::PARAM_STR);
      $GravaInsert->bindParam(16,$tempo,PDO::PARAM_STR);
      $GravaInsert->bindParam(17,$new_nome,PDO::PARAM_STR);

      $GravaInsert->execute();
      }catch(PDOException $e){
      echo $e->getMessage();
      }

      if($GravaInsert):
      $smg =   
      '<div class="alert alert-success" role="alert">
      Cadastro de paciente realizado com sucesso!
      </div>';

      else:
      $smg =  '<div class="p-3 mb-2 bg-danger text-white">Nome  paciente já Cadastrado!</div>';
      endif;
      else:
      $smg =  "erro";
      endif;

      }

                 
                            

?>
<meta charset=" ISO-8859-1">
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
 
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Área Administrativa</a>
        </li>
        <li class="breadcrumb-item active">Cadastro de paciente  </li>
      </ol>
      <div class="row">
        <div class="col-12">
          <?php if(isset($smg)): echo  $smg; endif; ?>
          
          <p>Este é um exemplo de uma página de cadastro lembrando que será obrigatorio todos os campos preenchidos!</p>
        </div>
      </div>

      <form method="post" enctype="multipart/form-data">

 <div class="form-row">

    <div class="col-md-4 mb-3">
      <label for="validationServer01">Nome Completo </label>
      <input type="text" name="nomecompleto" class="form-control is-valid" id="validationServer01" placeholder="Nome completo"  required>
   
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServer02">Nome Completo da Mãe</label>
      <input type="text" name="nomemae"  class="form-control is-valid" id="validationServer02" placeholder="Nome da mãe"  required>
     
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationServer02">Documento CPF</label>
      <input type="text" id="cpf" name="cpf"  class="form-control is-valid" id="validationServer02" placeholder="Documento CPF"  required>
    </div>
     <div class="col-md-4 mb-3">
      <label for="validationServer02">Documento Nº RG</label>
      <input type="text" id="rg" name="rg"  class="form-control is-valid" id="validationServer02" placeholder="Documento Nº CPF"  required="">
    </div>
      <div class="col-md-4 mb-3">
      <label for="validationServer02">Contato Nº residencial</label>
      <input type="text" id="telefone" name="telefone"  class="form-control is-valid" id="validationServer02" placeholder="Nº residencia"  required="">
    </div>

     <div class="col-md-4 mb-3">
      <label for="validationServer02">Contato Nº Celular</label>
      <input type="text" id="celular" name="celular"  class="form-control is-valid" id="validationServer02" placeholder="Nº celular"  required="">
    </div>

  <div class="col-md-4 mb-3">
      <label for="validationServer02">CNS*(Cartão nacional de saúde);</label>
      <input type="text" name="cns"  class="form-control is-valid" id="validationServer02" placeholder="Documento cartão nacional de saúde"  required>
    </div>
      <div class="col-md-4 mb-3">
      <label for="validationServer02">CEP</label>
      <input type="text" id="cep" name="cep"  class="form-control is-valid" id="validationServer02" placeholder="Nº Cep"  required>
    </div>

   <div class="col-md-4 mb-3">
      <label for="validationServer02">Endereço</label>
      <input type="text" id="rua" name="endereco"  class="form-control is-valid" id="validationServer02" placeholder="Endereço rua:"  required>
    </div>

   <div class="col-md-4 mb-3">
      <label for="validationServer02">Nº residencia</label>
      <input type="number" name="numero"  class="form-control is-valid" id="validationServer02" placeholder="Nº residencia"  required>
    </div>
   
   <div class="col-md-4 mb-3">
      <label for="validationServer02">Bairro</label>
      <input type="text" id="bairro" name="bairro"  class="form-control is-valid" id="validationServer02" placeholder="Bairro"  required>
    </div>


    <div class="col-md-4 mb-3">
      <label for="validationServer02">Cidade</label>
      <input type="text"id="cidade"  name="cidade"  class="form-control is-valid" id="validationServer02" placeholder="Cidade"  required>
    </div>
   <div class="col-md-4 mb-3">
      <label for="validationServer02">Estado</label>
      <input type="text" id="uf" name="estado"  class="form-control is-valid" id="validationServer02" placeholder="Estado"  required>
    </div>

    <div class="col-md-4 mb-3">
      <label for="validationServerUsername">Data de Nascimento</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend3">D</span>
        </div>
        <input  type="date" name="nascimento"   class="form-control is-invalid" id="validationServerUsername" placeholder="Data nascimento" aria-describedby="inputGroupPrepend3" required>
      
      </div>
    </div>
    
    <div class="col-md-6 mb-3">
      <label for="validationServer01">Imagem paciente</label>
      <input type="file"  name="foto" class="form-control is-valid"   placeholder="Imagem" required >
    

    </div>
   

  </div>
  </div>

<div class="form-group">
      <label for="inputEmail3" class="col-sm-12 control-label">Descrição Historico </label>
      <div class="col-sm-12">
        <textarea class="form-control ckeditor" rows="5" name="descricao_longa" placeholder="Descrição longa do produto"></textarea>
      </div>
      </div>



      <div class="modal-footer">
         <button class="btn btn-primary btn-lg btn-block" type="submit">Cadastrar paciente</button> 
         <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal"><a href="index.php" style="color:#ffffff;text-decoration:none;  " >Sair</a></button>

</div>

        </form>


    </div>
           
    </div> </div>

    <!-- /.content-wrapper-->

     <!-- /.content-wrapper-->
       <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Fernando Sorrentino Araras-OM30 2020</small>
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

</script>
<script type="text/javascript">
// INICIO FUNÇÃO DE MASCARA MAIUSCULA
function maiuscula(z){
        v = z.value.toUpperCase();
        z.value = v;
    }
//FIM DA FUNÇÃO MASCARA MAIUSCULA
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
</body>

</html>

 <?php
 session_start();
  include('conexao.php');
 include('menu.php');
  $data=date("Y-m-d H:i");




if (isset($_GET['id']) && empty($_GET['id']) == false) {
  $id = addslashes($_GET['id']);

  
  $sql = $PDO->query("SELECT * FROM pasciente WHERE id = '$id'");
 
  if ($sql->rowCount() >0) {
    $dado = $sql->fetch();
    $_SESSION['id']=$dado;
   
 
   }else{
   // header("Location:visualiar_categ.php");   
   }
  }else{
//header("Location:index.php");   

  }
     

     
   ?>      
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Painel de controle</a>
        </li>
        <li class="breadcrumb-item active">Área de paciente</li>
      </ol>
                    
               
      <!-- Example DataTables Card-->
      <div class="card mb-3">
  <?php 



  ?>

<div class="container theme-showcase" role="main">      
  <div class="page-header">
    <h5 style="color:#ccc;"> Paciente Selecionado</h5>
  </div>

  <div class="row">
    <div class="col-md-12">
      
      <div class=" col-sm-9 col-md-11">
      <img src="upload/<?php echo $dado ['imagem']; ?>" width='100px' heigth='100px'>
       <hr>
      </div>
      <div class=" col-sm-3 col-md-6">
        <b></b>

         <hr>
      </div>
      <div class="col-sm-3 col-md-6">
        <p><h4>Paciente: <?php echo $dado['nomecompleto']; ?> </p></h4>
          <hr>
      </div>
      <div class="col-sm-9 col-md-11">
        
    <p> <h4>Nome da Mãe <?php echo $dado['nomemae']; ?></h4></p>
    <p> <h4>Documento CPF: <?php echo $dado['cpf']; ?></h4></p>
    <p> <h4>Numero RG: <?php echo $dado['rg']; ?></h4></p>
    <p> <h4>Numero CNS: <?php echo $dado['cns']; ?></h4></p>
    <p> <h4>Contato residencial: <?php echo $dado['telefone'].' / Celular : '.$dado['celular']; ?></h4></p>
   
    <p> <h4>Cep: <?php echo $dado['cep']; ?></h4></p>
    <p> <h4>Endereço: <?php echo $dado['endereco'].'/ N '.$dado['numero']; ?></h4></p>
 
    <p> <h4>Bairro: <?php echo $dado['bairro'].' / Cidade: '.$dado['cidade'].' / Estado: '.
    $dado['estado']; ?> </h4></p>
    <p> <h4>Bairro: <?php echo $dado['bairro']; ?></h4></p>
   
     <p><h4>Descrição: <?php echo html_entity_decode($dado['descricao_longa']); ?></p></h4>
    <p> <h4>Data cadastro: <?php echo date('d-m-Y', strtotime($dado['created'])); ?></h4></p>
    
          <hr>
      </div>
      
      <div class="row">
    <div class="pull-right">
      <a href='Filter_pasciente.php'><button type='button' class='btn btn-sm btn-info'> Retornar Lista completa</button></a>
              
     
    </div>
  </div>
      </div>
    </div>
  </div>
</div> <!-- /container -->
<!--event calender end -->
      </div>
    </div>
    
    <!-- /.content-wrapper-->
       <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Eventos Araras 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
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
  </div>
</body>

</html>

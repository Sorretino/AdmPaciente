
<?php 

session_start() ;


include('validar.php');
include('menu.php');

 include('conexao.php');

  
   $sql = "SELECT * FROM inscritos ";
   $sql =  $PDO->query($sql);
   if ($sql->rowCount() > 0 ){
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
   }

    $conectar = "SELECT * FROM inscritos";
   $conectar =  $PDO->query($conectar);
   if ($conectar->rowCount() > 0 ){
    $prod = $conectar->fetchAll(PDO::FETCH_ASSOC);
   }

      $conec = "SELECT * FROM pasciente";
   $conec =  $PDO->query($conec);
   if ($conectar->rowCount() > 0 ){
    $pacient = $conec->fetchAll(PDO::FETCH_ASSOC);
   }

   


?>
      
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Painel de controle</a>
        </li>
        <li class="breadcrumb-item active">Area Administrativa OM30 -<?php echo "Seja Bem Vindo Sr(a)  ", $_SESSION['nome'];?></li>
      </ol>
      <!-- Icon Cards-->


      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3"style="height: 20%;">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-12"><?php echo  $sql->rowCount(); ?> Paciente consultas!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="hist_inscritos.php">
              <span class="float-left">Ver Detalhes</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3"style="height: 20%;">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-12">23 total espera!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3"style="height: 20%;">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo  $conec->rowCount(); ?> total paciente!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3"style="height: 20%;">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5">2 Cancelados</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>              
      <!-- Example DataTables Card Agendamento Clinico Geral-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Horarios das consultas</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>E-mail</th>
                  <th>Contato</th>
                  <th>Clinico Geral</th>
                  <th>Data agendada</th>
                  <th>Valor/consulta</th>
                  <th>Ações</th>
                </tr>
              </thead>
           
              <tbody>
                <?php foreach( $data as $valor ): ?>
                <tr>
                  <td><?php echo $valor['nome']; ?></td>
                  <td><?php echo $valor['email']; ?></td>
                  <td><?php echo $valor['telefone']; ?></td>
                  <td><?php echo $valor['tipo']; ?></td>
                  <td><?php echo $valor['created']; ?></td>
                  <td>R$ <?php echo  number_format($valor['valor'], 2, '.', '') ; ?></td>
                  <td><?php  if ($valor['qtd'] <= 0) {
                    echo '<span class="badge badge-danger">Cancelado</span>';
                  }
                  if ($valor['qtd'] ==1) {
                    echo '<span class="badge badge-success">Confirmado</span>
                    ';
                  }
                  if ($valor['qtd'] >=2) {
                   echo '<span class="badge badge-warning">Encaixe</span>
                    ';

                  }
                  ?></td>
                   
                    <?php endforeach; ?>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Ultima Atualização de Dados -<?php echo date("d-m-Y"); ?>  as Horas- <?php echo date ("H:i") ?></div> 
      </div>

      <!-- Area Chart Example-->
      <div class="card mb-3">


        <div class="card-header">
          <i class="fa fa-area-chart"></i> Area Chart Example</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <div class="card-footer small text-muted">Atualizado hoje às 23h59</div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <!-- Example Bar Chart Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-bar-chart"></i> Exemplo de gráfico de paciente</div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8 my-auto">
                  <canvas id="myBarChart" width="100" height="50"></canvas>
                </div>
                <div class="col-sm-4 text-center my-auto">
                  <div class="h4 mb-0 text-primary">234</div>
                  <div class="small text-muted">Total consulta</div>
                  <hr>
                  <div class="h4 mb-0 text-warning">23</div>
                  <div class="small text-muted">desistencia</div>
                  <hr>
                  <div class="h4 mb-0 text-success">890</div>
                  <div class="small text-muted">Exames</div>
                </div>
              </div>
            </div>
            <div class="card-footer small text-muted">Atualizado ontem às 23h59</div>
          </div>
          <!-- Card Columns Example Social Feed-->
      
          <hr class="mt-2">
      
          <!-- /Card Columns-->
        </div>
  
      </div>
  
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>OM30 2020</small>
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
            <a class="btn btn-primary" href="sair.php">Logout</a>
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

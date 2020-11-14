 <?php
 session_start();
 include('conexao.php');
   include('menu.php');
  $data=date("Y-m-d H:i");
   ?>      
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Área Administrativa</a>
        </li>
        <li class="breadcrumb-item active">Área de agendamentos</li>
      </ol>
                    
    <?php 

        $sql = "SELECT * FROM inscritos ";
        $sql =  $PDO->query($sql);
        if ($sql->rowCount() > 0 ){
        $data = $sql->fetchAll(PDO::FETCH_ASSOC);
         } 
     ?>              
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Horario marcado</div>
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
                   echo '<span class="badge badge-warning">Confirmado</span>
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
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
       <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Fernando Sorrentino OM30 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
   
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

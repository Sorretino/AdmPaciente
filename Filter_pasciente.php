 <?php
 session_start();
  include('conexao.php');
   include('menu.php');
    $data=date("Y-m-d H:i");

    $result_usuarios = "SELECT * FROM pasciente ";
    $resultado_usuarios =  $PDO->query( $result_usuarios);

    $row_usuario = $resultado_usuarios->fetchAll(PDO::FETCH_ASSOC);



    $sql ="SELECT * FROM pasciente ORDER BY 'id'";    
    $sql =  $PDO->query($sql);
    if ($sql->rowCount() > 0 ){
    $data = $sql->fetchAll(PDO::FETCH_ASSOC);
    }


    if (isset($_GET['id']) && empty($_GET['id']) == false) {
    $id = addslashes($_GET['id']);
    $sql = "DELETE FROM pasciente WHERE id = '$id'";
    $pdo = $PDO->query($sql);
    header("Location: visualiar_categ.php");
    # code...
    }else{
    //header("Location:index.php");
    }
 ?>      
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Área Administrativa</a>
        </li>
        <li class="breadcrumb-item active">Área de OM30</li>
      </ol>
                    
               
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Visualição de pacientes</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome completo</th>     
                    <th>CPF</th>     
                    <th>RG</th>     
                    <th>Ações</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Nome completo</th>     
                    <th>CPF</th>     
                    <th>RG</th>     
                    <th>Ações</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach( $row_usuario as $resultado_usuarios ):  ?>
                <tr>
                  
                  <td><?php echo $resultado_usuarios['id']; ?></td>
                   <td><img class="img-thumbnail" width="80" height="40" alt="" src="<?= 'upload/'. $resultado_usuarios['imagem']; ?>"></td>
                  <td><?php echo $resultado_usuarios['nomecompleto']; ?></td>
                  <td><?php echo $resultado_usuarios['cpf']; ?></td>
                  <td><?php echo $resultado_usuarios['rg']; ?></td>
                  <td> 
            <a href='visual_id_pasciente.php?id=<?php echo $resultado_usuarios['id']; ?>'><button type='button' class='btn btn-sm btn-primary'><i class=" fa fa-arrows"></i></button></a>
                         
            
            <a href='update_pasciente.php?id=<?php echo $resultado_usuarios['id']; ?>'><button type='button' class='btn btn-sm btn-warning'>E</button></a>
            
            <a href='del_pasciente.php?id=<?php echo $resultado_usuarios['id']; ?>'><button type='button' class='btn btn-sm btn-danger'><i class="fa fa-calendar-times-o"></i></button></a>
             

            <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#myModal<?php echo $resultado_usuarios['id']; ?>"><i class="fa fa-eye "></i></button> 
            <!-- Modal -->
<div class="modal fade" id="myModal<?php echo $resultado_usuarios['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <center>  <div class="modal-header" style="border-bottom: 3px solid red;width: 160px;margin-left: 7px;">
   
       <p class="modal-title text-center" id="myModalLabel" style="font-weight:bold;margin-bottom:-15px;font-size:25px;" >Paciente </p>

      
      </div>
      <div class="modal-body">
        <center><img src="upload/<?php echo $resultado_usuarios ['imagem']; ?>" width='250px' heigth='100px'>
        
       <p><?php echo $resultado_usuarios['nomecompleto']; ?></p> 
       <p>Documento CPF:<?php echo $resultado_usuarios['cpf']; ?></p> 
       <p>Contato :<?php echo $resultado_usuarios['celular']; ?></p> 
       <p>NSC :<?php echo $resultado_usuarios['cns']; ?></p> 
        <p>Descrição <?php echo html_entity_decode($resultado_usuarios['descricao_longa']); ?>
      </div>
       <div class="modal-footer" style="display:flex;justify-content:center;align-items:  center; ">
       <button type="button" class="btn btn-danger" data-dismiss="modal" >Sair da Visualização</button>
      <!--   <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
<!-- FINAL MODAL -->     
         </td>                  
        </tr>
   <!-- iNICIO  modal -->
<?php endforeach; ?>

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

<?php 
 session_start();
  include('conexao.php');
  include('menu.php');
  $data=date("Y-m-d H:i");


 $excluir = filter_input_array(INPUT_GET, FILTER_DEFAULT);
            $ex = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            if(!empty($ex) and !empty($ex['yes'])):
                $idEx = $ex['id'];
                $x = "DELETE FROM pasciente WHERE id=?";
                $stm = $PDO->prepare($x);
                $stm->bindParam(1, $idEx , PDO::PARAM_STR);
                $exe = $stm->execute();
                    if($exe):                        
                        $URL = 'Filter_pasciente.php';
                        
                        echo "<form name='ok' action='{$URL}' method='post'>"
                                
                              . "</form>";

                        echo '<script language="JavaScript">document.ok.submit();</script>';
                        
                    else:                        

                        echo "<form name='erro' action='Filter_pasciente.php' method='post'>"
                              . "</form>";

                        echo '<script language="JavaScript">document.erro.submit();</script>';
                    endif;
                    
            elseif(!empty($ex) and !empty($ex['not'])):                  
                echo "<form name='not' action='Filter_pasciente.php' method='post'>"
                        
                    . "</form>";
                echo '<script language="JavaScript">document.not.submit();</script>';
                
            endif;            
            
            if(!empty($excluir) or !empty($ex['id'])):
                if(!empty($excluir)):
                  $idD = $excluir['id'];  
                else:
                   $idD = $ex['id']; 
                endif;
                
                  
            endif; 

?>

 <div class="content-wrapper">


                <!-- main -->
                <section class="content">
                <?php 
                   if(!empty($excluir) and !empty($excluir['id'])):
                   
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div class="box"><br>

                        <div class="divalert" style="text-align:center;	">
                            <center><h3 style="color:#333;"	>Sr <?php echo $_SESSION['nome'] ?>, você tem certeza que deseja deletar esse paciente?</b>
                            </h3></center>
                        </div>
                
                        <center><div class="box-footer">  <br><br>
                            <input type="hidden" name="id" value="<?php echo $idD; ?>" />                            
                                <input type="submit" class="btn btn-info" name="not" value="(Não) Quero Deletar!"/></input>   
                            <input type="submit" class="btn btn-danger" name="yes" value="(Sim) Quero deletar!"></input>
                            
                                              
                        </div><center>
                    </div>
                    </form>
                    <?php 
                        else:
                            $Error = new erro;
                            $Error->TrataErro('Voltar', 'Página não encontrada.', 'principal.php', 'bg-red');
                        endif;
                    
                    ?>
                </section>
            
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
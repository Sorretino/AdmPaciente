
<?php 


try{
    $PDO = new PDO ('mysql:host=localhost;dbname=om30fernando;charset=utf8','root','');
  }catch(PDOException $e){
    echo $e->getMessage();
  }


  //observe o charset=utf8 na DSN
/*try {
    $PDO = new PDO("mysql:host=$host;dbname=$database1;charset=utf8", $user, $password);
} catch(PDOException $e) {
    die('não conectou ao banco' . $e);
}*/
 ?>
<?php
  session_start();
	include 'database.php';

  if(isset($_POST['idfrais'])){
    $idfr=$_POST['idfrais'];
    $id=time()+ rand(1,100);
    $iduti=$_SESSION['iduti'];
    $frais=$_POST['frais'];
    $req_count="insert into tblfraistransaction values($id,$iduti,$idfr,0,'$frais',NOW())";
    $result_count=@mysqli_query($con, $req_count);
    if($result_count>0){
      echo 1;
    }else{
      echo 0;
    }
  }

  if(isset($_POST['frais'])){
    $frais=$_POST['frais'];
    $req_count="update tblfraistransaction set accept=1 where id_fr_tr=$frais";
    $result_count=@mysqli_query($con, $req_count);
  }

  if(isset($_POST['fraisconfi'])){
    $frais=$_POST['fraisconfi'];
    $id=time()+rand(1,100);
    echo $req_count="insert into tblconfirmerlivraison values($id,$frais,1,NOW())";
    $result_count=@mysqli_query($con, $req_count);
  }


?>

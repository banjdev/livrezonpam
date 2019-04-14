<?php
  session_start();
	include 'database.php';
	include 'sendmessage.php';

	if(isset($_POST['sec'])){
		  $sec=trim($_POST['sec']);
		  $com=trim($_POST['com']);
		  $dep=trim($_POST['dep']);
	  	$sadr=trim($_POST['adr']);
		  $eta=trim($_POST['eta']);
			$del=trim($_POST['del']);
			$det=trim($_POST['det']);
			$id=rand(1111,1000000000);
			$iduti=$_SESSION['iduti'];
		  $req_count="insert into tbldemande values($id,$iduti,'$dep','$com','$sec','$eta','$adr','$del','$det',1,NOW())";
	    $result_count=@mysqli_query($con, $req_count);
	    if($result_count > 0){
				$msg="Nouvo demand sevis nan ".$com;
        $push=new sendMessage();
        $push->push($msg);
	    }else{
	    	echo 0;
	    }
	}else{
		echo 0;
	}


?>

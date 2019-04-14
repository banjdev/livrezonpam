<?php
  session_start();
	include 'database.php';

	if(isset($_POST['nu'])){
		$username=trim($_POST['nu']);
		$password=trim(md5($_POST['mdp']));
		  $req_count="select u.nom_complet,w.sold,w.dernier,u.id_uti from tblutilisateur u inner join tblwallet w where (u.password='$password' and (u.telephone='$username' or u.email='$username') and u.id_uti=w.id_uti)";
	    $result_count=@mysqli_query($con, $req_count);
	    $ligne=@mysqli_fetch_row($result_count);
	    if($ligne!=null){
  		    setcookie("username","$username",time()+(365*24*3600));
          setcookie("password","$password",time()+(365*24*3600));
					$_SESSION['nom']=$ligne[0];
					$_SESSION['iduti']=$ligne[3];
          $_SESSION['solde']=$ligne[1];
          $_SESSION['dernier']=$ligne[2];
		    	echo $_SESSION['nom'].".".$_SESSION['solde'].".".$_SESSION['dernier'];
	    }else{
	    	echo 0;
	    }
	}else{
		echo 0;
	}


?>

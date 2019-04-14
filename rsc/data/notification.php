<?php
  session_start();
	include 'database.php';

  //if(isset($_POST['noti'])){
    $iduti=$_SESSION['iduti'];
    $req_count="select u.nom_complet,f.frais,d.id_dem,f.id_fr_tr,f.accept,d.id_uti,f.id_uti,d.id_uti,DATE(d.date_ajout) from tbldemande d inner join tblutilisateur u,tblfraistransaction f where (f.id_dem=d.id_dem and u.id_uti=f.id_uti)";
    $result_count=@mysqli_query($con, $req_count);$c=0;
    while($ligne=@mysqli_fetch_array($result_count)) {
      if($ligne[4]==0 && ($ligne[5] ==$iduti)){
        echo "<table class='$ligne[3]'><tr><td style='width:70%;'>";
        echo $ligne[0]." di lap fe sevis la pou ou pou ".$ligne[1]." goud. Si ou dako </td>";
        echo "<td><input type='submit' value='klike la' class='clic' id='$ligne[3]'/><a style='color:#dddddd;float:right;'>$ligne[8]</a></td></tr></table>";
      }elseif(($ligne[4]>0) && ($ligne[6]==$iduti)){
        $req="select c.id_fr_tr,f.id_fr_tr from tblconfirmerlivraison c inner join tblfraistransaction f where (c.id_fr_tr=f.id_fr_tr and f.id_fr_tr=$ligne[3])";
        $result=@mysqli_query($con, $req);
        $li=@mysqli_fetch_row($result);
        if($li==null){
          echo "<table class='$ligne[3]'><tr><td style='width:100%;'>";
          echo $ligne[0]." dako pou pote bagay la pou ".$ligne[1]." goud lan <a style='color:#dddddd;float:right;'>$ligne[8]</a></td></tr>";
          echo "<tr><td style='width:96%;padding-top:10px;padding-bottom:10px;'><input type='submit' value='Konfime livrezon an' class='cl' id='$ligne[3]'/></tr></table>";
        }
      }
     $c++;}
     if($c==0){
       echo "<p style='color:#dddddd;text-align:center;margin-top:100px;'>Ou pa gen okenn nouvo notifikasyon</p>";
     }
?>

<table class="confirmation" id="">
  <tr>
    <td><img src="rsc/profil/profil.png" alt="" width="80"> </td>
  </tr>
  <tr>
    <td>Roberson Pierre</td>
  </tr>
  <tr>
    <td><img src="rsc/icon/etoile.png" alt=""><img src="rsc/icon/etoile.png" alt=""><img src="rsc/icon/etoile.png" alt=""> </td>
  </tr>
  <tr>
    <td>
      <input type="submit" name="" value="Konfime" style="width:90%;" class="cli">
    </td>
  </tr>
</table>
<div class="back1"></div>
<script type="text/javascript">
  $('.cl').click(function(){
    va=$(this).attr('id');
    $(".confirmation,.back1").show();
    $(".confirmation").attr('id',va);
  });
  $('.clic').click(function(){
    va=$(this).attr('id');
    $.ajax({
      type: "POST",
      url: "rsc/data/transaction.php",
      data:'frais='+$(this).attr('id'),
      beforeSend: function(){
        $(".cli").css({
          'background-image':"url('rsc/icon/load.gif')",
          'background-repeat':'no-repeat',
          'background-position':'50% 50%'
        });
      },
      success: function(data){
        $("#confirmation").hide();
      },
      error : function(resultat, statut, error){
          alert("Verifye koneksyon entenet ou an");
      }
  });
  });

  $('.cli').click(function(){
    va=$('.confirmation').attr('id');
    $.ajax({
      type: "POST",
      url: "rsc/data/transaction.php",
      data:'fraisconfi='+va,
      beforeSend: function(){
        $("."+va).css({
          'background-image':"url('rsc/icon/load.gif')",
          'background-repeat':'no-repeat',
          'background-position':'50% 50%'
        });
      },
      success: function(data){
        $('.confirmation,.back1').hide();
        $("."+va).hide();
      },
      error : function(resultat, statut, error){
          alert("Verifye koneksyon entenet ou an");
      }
  });
  });
</script>

<?php
  session_start();
	include 'database.php';
  $iduti=$_SESSION['iduti'];
  $req_count="select d.departement,d.commune,d.nb_attente,d.detail,u.nom_complet,d.id_dem from tbldemande d inner join tblutilisateur u where (d.etat=1 and u.id_uti=d.id_uti) order by d.date_ajout DESC";
  $result_count=@mysqli_query($con, $req_count);
  while($ligne=@mysqli_fetch_row($result_count)){
    $req="select f.id_dem, d.id_dem from tblfraistransaction finner join tbldemande d where (f.accept=1 and d.id_dem=f.id_dem and d.id_dem=$ligne[5])";
    $result=@mysqli_query($con, $req);
    $li=@mysqli_fetch_row($result);
    if($li===null){
      ?>
      <table class="div_actu" id="<?php echo $ligne[5]; ?>">
        <tr>
          <td class="img_prof" ><img src="rsc/profil/profil.png" alt=""> </td>
          <td class="nom_uti"><span class="n_u"> <?php echo $ligne[4];?></span><a class="conteur_dem" style="margin-left:6px;font-size:0.9em;">min </a> <a class="conteur_dem compte<?php echo $ligne[5]; ?>"><?php echo $ligne[2];?></a></td>
        </tr>
        <tr>
          <td class="adresse_uti" colspan="2"><img src="rsc/icon/local.png" alt=""  ><?php echo $ligne[0].", ".$ligne[1]; ?></td>
        </tr>
        <tr>
          <td class="detail_dem" colspan="2"><?php echo $ligne[3];?></td>
        </tr>
      </table> 
    <?php //}
    }
    }
?>
<script type="text/javascript">
  $(".div_actu").click(function(){
    $("#idfrais").val($(this).attr('id'));
    $('.add_frais,.back').show(0);
  });
</script>

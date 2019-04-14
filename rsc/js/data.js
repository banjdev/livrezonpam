// <script type="text/javascript">
//methode de connexion
//CONNEXION
$(".btncon").click(function(){
          $.ajax({
            type: "POST",
            url: "rsc/data/connexion.php",
            data:'nu='+ $(".email").val()+'&mdp='+ $(".password").val(),
            beforeSend: function(){
                 $(".erreur").hide();
                 $(".konekte").val("");
                 $(".konekte").css({
                   'background-image':"url('rsc/icon/load.gif')",
                   'background-repeat':'no-repeat',
                   'background-position':'50% 50%'
                 });
            },
            success: function(data){
                if(data ==0){
                    $(".erreur").show();
                    $(".konekte").css({ 'background-image':"url('rsc/icon/load.gifd')" });
                    $(".konekte").val("konekte");
                    $(".erreur").html("Imel oubyen modpas ou an pa bon");
                }else{
                    var tab=data.split('.');
                    $('.solde1').text(tab[1]);
                    $('.dernier').text(tab[2]);
                    $('.nom_param').text(tab[0]);
                    $(".konekte,.start,.inscription").hide();
                }
            },
            error : function(resultat, statut, error){
                   $(".erreur").show();
                   $(".konekte").css({ 'background-image':"url('rsc/icon/load.gifd')" });
                   $(".konekte").val("konekte");
                   $(".erreur").html("Verifye koneksyon entenet ou");
            }
        });
});

//envoie d'une demande
$(".send_demande").click(function(){
         $.ajax({
           type: "POST",
           url: "rsc/data/demande.php",
           data:'dep='+$(".departement").val()+'&det='+$(".detail").val()+'&com='+$(".commune").val()+'&sec='+$(".sectioncommunale").val()+'&adr='+$(".addresse").val()+'&eta='+$(".etablissement").val()+'&del='+ $(".delai").val(),
           beforeSend: function(){
                $(".loa").show();
           },
           success: function(data){
               $(".loa").hide();
               if(data ==0){
                   alert("Byen verifye tout chan yo");
               }else{
                 $('.offer,.tete_offer').css({
                   'margin-left' : '-1000px', // couleur rouge
                   transition : '1s', // largeur de 300px
                 });
               }
           },
           error : function(resultat, statut, error){
                  alert("Byen verifye entenet ou an");
           }
       });
});
function loop(){
  $.ajax({
    type: "POST",
    url: "rsc/data/actualite.php",
    data:'loadactu',
    beforeSend: function(){
       $(".actu").html("<img src='rsc/icon/load.gif' style='margin-left:48%;margin-top:50%;'/> ");
    },
    success: function(data){
        $(".actu").html(data);
    },
    error : function(resultat, statut, error){
        $(".actu").html("<p style='text-align:center;color:white;margin-top:50%;'>Verifye koneksyon entenet ou a</p>");
    }
});
}

//appel de la fonction
$('.img_rech').click(function(){
  loop();
})

setTimeout('loop()',1000);
// </script>
$('.validefrais').click(function(){
  $.ajax({
    type: "POST",
    url: "rsc/data/transaction.php",
    data:'idfrais='+$("#idfrais").val()+'&frais='+$("#frais").val(),
    beforeSend: function(){
      $(".validefrais").val("");
      $(".validefrais").css({
        'background-image':"url('rsc/icon/load.gif')",
        'background-repeat':'no-repeat',
        'background-position':'50% 50%'
      });
    },
    success: function(data){
      $(".validefrais").val("valide");
      $(".validefrais").css({
        'background-image':"url('rsc/icon/load.gfif')",
      });
      if(data > 0){
        $(".add_frais").hide();
        $(".back").hide();
        $("#frais").val(100);
        var o=$("#idfrais").val();
        $("#"+o).hide(100);
      }else{
        alert("Gen yon ere ki komet, kontakte administrate a");
      }
    },
    error : function(resultat, statut, error){
        alert("Verifye koneksyon entenet ou an")
    }
});
})

//recherche des nouveaux notifications
$('.img_notif').click(function(){
  $.ajax({
    type: "POST",
    url: "rsc/data/notification.php",
    data:'noti',
    beforeSend: function(){
      $(".notif").css({
        'background-image':"url('rsc/icon/load.gif')",
        'background-repeat':'no-repeat',
        'background-position':'50% 30%'
      });
    },
    success: function(data){
      $(".notif").css({
        'background-image':"url('rsc/icon/load.gfif')",
      });
      $(".notif").html(data);
    },
    error : function(resultat, statut, error){
        alert("Verifye koneksyon entenet ou an");
    }
});
})

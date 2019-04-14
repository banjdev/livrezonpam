$("#leftbous,#leftoffer,#leftmessagerie,#leftnotification").click(function(){
  $('.wallet,.tete_wallet,.offer,.tete_offer,.tete_messagerie,.messagerie,.notification,.tete_notification').css({
    'margin-left' : '-1000px', // couleur rouge
    transition : '1s', // largeur de 300px
  });
});

$(".bous").click(function(){
  $('.wallet,.tete_wallet').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});

$(".div_mes_").click(function(){
  $('.messagerie,.tete_messagerie').css({
    'margin-left' : '-1000px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
  $('.detail_messagerie,.tete_detail_messagerie').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});

$("#leftdetailmessagerie").click(function(){
  $('.messagerie,.tete_messagerie').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
  $('.detail_messagerie,.tete_detail_messagerie').css({
    'margin-left' : '-1000px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});


$(".messa").click(function(){
  $('.messagerie,.tete_messagerie').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});

$(".img_notif").click(function(){
  $('.tete_notification,.notification').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});

// $(".img_para").click(function(){
//   $('.parametre').css({
//     'margin-left' : '0px', // couleur rouge
//     transition : '.8s', // largeur de 300px
//   });
// });

$(".demand").click(function(){
  $('.offer,.tete_offer').css({
    'margin-left' : '0px', // couleur rouge
    transition : '.8s', // largeur de 300px
  });
});

$(".back").click(function(){
  $('.add_frais,.back').hide(0);
});

$(".btndemare").click(function(){
  $('.start').fadeOut(0);
  $('.connexion,.inscription').fadeIn(0);
});

$(".backstart").click(function(){
  $('.start').fadeIn(0);
  $('.connexion').fadeOut(0);
});

$(".enskri").click(function(){
  $('.ins').fadeIn(0);
  $('.connexion').fadeOut(0);
});

$(".konekte,.backkonekte").click(function(){
  $('.ins').fadeOut(0);
  $('.connexion').fadeIn(0);
});


/* Open/Close Chat */
$('.chat-button').click(function() {
    $('.chat-room').toggleClass('open closed');
    $('.chat-button').toggleClass('open closed');
    $('.chat-button').toggleClass('fa-minus fa-plus');
    $('.mainbody').toggleClass('col-md-7 col-md-10');
});

/* Ajustar Layout ao abrir pagina consoante pagina tem chat ou nao */
$(window).load(function() {
      if($('body').children().hasClass( 'chat-room' )){
        $('.mainbody').toggleClass('col-md-7 col-md-10');
      }
});


/* Open/Close ScoreBoard */
$('.score-card-button').click(function() {
    $('.score-card').toggleClass('open closed');
    $('.score-card-button').toggleClass('open closed');
    $('.score-card-button').toggleClass('fa-minus fa-plus');
});


/*NAVBAR JS*/

$('.navbar-link').click(function() {
    $('.navbar-link').toggleClass('active');
});

/*TOOLTIP SCROREBOARD*/

$(document).ready(function(){
    $(".score-card-table").tooltip({
        placement : 'right'
    });
});

/* Open/Close Chat */
$('.chat-button').click(function() {
    $('.chat-room').toggleClass('open closed');
    $('.chat-button').toggleClass('open closed');
    $('.chat-button').toggleClass('glyphicon-minus glyphicon-plus');
    $('.mainbody').toggleClass('col-md-7 col-md-10');
});

/* Ajudar Layout ao abrir pagina consoante pagina tem chat ou nao */
$(window).load(function() {
      if($('body').children().hasClass( 'chat-room' )){
        $('.mainbody').toggleClass('col-md-7 col-md-10');
      }
});

/*Submit chat message on Enter*/
/*$('.chat-text').on('keydown', function(event) {
    if (event.keyCode == 13)
        if (!event.shiftKey) $('.chat-form').submit();
});*/


/* Open/Close ScoreBoard */
$('.score-card-button').click(function() {
    $('.score-card').toggleClass('open closed');
    $('.score-card-button').toggleClass('open closed');
    $('.score-card-button').toggleClass('glyphicon-minus glyphicon-plus');
});



/* Open/Close Chat Options */
$('.chat-button-options').click(function() {
    $('.chat-menu').toggleClass('open closed');
});

/* Color From Options to Username */

$('.chat-color').click(function() {
	var color = $('.chat-color').css('background-color');
	$('.chat-usermane-span').css('color', color);
	$('.chat-menu').toggleClass('open closed');
});


function updateScroll(){
    $('.chat-message-lines').scrollTop($('.chat-message-lines')[0].scrollHeight - $('.chat-message-lines').outerHeight());
}

function chatScrollbar(){

}


$('.chat-message-lines').scroll(function (event) {
    var scroll = $('.chat-message-lines').scrollTop();
    console.log('Scroll: '+ scroll);

    var scrollHeight = $('.chat-message-lines')[0].scrollHeight - $('.chat-message-lines').outerHeight();
    console.log('Scroll height: '+ scrollHeight);

    scrollHeightPercent = scrollHeight*0.9;
    console.log('Scroll height %: '+ scrollHeightPercent);

    if (scroll > scrollHeightPercent) {
        updateScroll();
    }
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
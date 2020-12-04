$('.message a').click(function(){
      $('form').animate({height: "toggle", opacity:"toggle"}, "slow");
      });
$('.current-year').html(new Date().getFullYear());
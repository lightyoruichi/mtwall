var effects=false;
var timestamp='';
function reload(){
  $('#mt-loader').fadeIn('slow');
  $.post('./update.php',
    {'timestamp':timestamp},
	
    function(data){
      $('#mt-loader').fadeOut('slow');
      if(data){
        $('.mt-marked').removeClass('mt-marked');
        $('.mt-wall').prepend(data);
        if(effects){
          $('.mt-updated').addClass('mt-marked').children().not('a,img').fadeOut().fadeIn().fadeOut().fadeIn().fadeOut().fadeIn();
        }else{
          effects=true;
        }
		/*
        $('.mt-updated>a>img').hover(function(){
          $(this).css({'z-index':10});
          $(this).stop().animate({top:-12,left:-40,width:48,height:48},100);
        }, function(){
          $(this).css({'z-index':0});
          $(this).stop().animate({top:0,left:-26,width:24,height:24},100);
        });
        */
        $('.mt-updated').removeClass('mt-updated');
        timestamp=/<!-- (\d*) -->/.exec(data)[1];
		//removing
		while($('.mt-item').length > 100) { $('.mt-item:last').remove();}
      }
      setTimeout(reload,10000);
    }
	
  );
};

$(function(){
  reload();
  $.getJSON('./proxy.php?url=tweetmeme',
    function(json){
      $('#mt-twitter').text(json.story.url_count).parent().parent().show();
    }
  );
  $.getJSON('./proxy.php?url=delicious',
    function(json){
      $('#mt-delicious').text(json[0]['total_posts']).parent().parent().show();
    }
  );
});

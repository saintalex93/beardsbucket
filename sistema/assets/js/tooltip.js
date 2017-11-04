$(function(){
    $("*[rel=tooltip]").hover(function(e){
    
    $("body").append('<p class="tooltip">'+$(this).attr('title')+'</p>');
        $('.tooltip').css({
            top:e.pageY - 10,
             right: e.pageX + 20,
            zIndex: 9999
            }).fadeIn();
        
        
    }, function(){
        $('.tooltip').remove();
        
    }).mousemove(function(e){
        
         $('.tooltip').css({
            top:e.pageY - 10,
            right: e.pageX + 20,
             zIndex: 9999
            
            
        });
        
    })
    
    
});
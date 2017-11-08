var $target = $('.anime-left'),
    animationClass = 'anime-start',
    offset = $(window).height() * 2/4;


function animeScrollDiv1(){
   
    var documentTop = $(document).scrollTop();
    
    $target.each(function(){
         console.log("ativa");
        var itemTop = $(this).offset().top;
        
        if(documentTop > itemTop - offset){
            $(this).addClass(animationClass);
            
        }/*else{
             console.log("desativa");
            $(this).removeClass(animationClass);
        }*/      
        
    })
}

 animeScrollDiv1();

$(document).scroll(function(){
    animeScrollDiv1();
});
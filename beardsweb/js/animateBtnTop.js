$(document).ready(function(){
        
        var _containerBtn = $(".jbtnVontar");
        var _btnLink = $ (".jbtnVoltarLink");
        
    $(window).scroll(function(){
        if($(this).scrollTop()>70){
            _containerBtn.fadeIn(0);
        }
        else{
            _containerBtn.fadeOut(0);
        }
        
    });    
        
        
    _btnLink.click(function(){
        $("html,body").animate({scrollTop: 0}, 1000);
        
     return false;   
        
    });    
        
    });
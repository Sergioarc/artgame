function resize(){
    var headerHeight = $('header').height();
    var footerHeight = $('footer').height();
    var windowHeight = $(window).height();
    var height = windowHeight - headerHeight - footerHeight;
    $('#carousel').height(height).css('overflow', 'hidden');
}

var step = 50;
var interval = undefined;

function scrollCarousel()
{
    var current = $('#carousel').scrollTop();
    var next = current + step;
    $('#carousel').animate({
        scrollTop : next,
    }, 790, 'linear', function(){
        if(step > 0){
            var scrollHeight = $("#carousel").prop('scrollHeight');
            var divHeight = $("#carousel").height();
            var scrollerEndPoint = scrollHeight - divHeight;

            var divScrollerTop =  $("#carousel").scrollTop();
            if(Math.abs(scrollerEndPoint - divScrollerTop) <= 3)
            {
                step *= -1;
            }
        }else{
            if($('#carousel').scrollTop() == 0){
                step *= -1;
            }
        }
        
    });
    
}

$(function(){
    $('#carousel .col-xs-6').css('margin-bottom', '10px');
    $('#carousel').imagesLoaded(function(){
        $('#carousel').masonry({
            'itemSelector' : '.col-xs-6',
            'columnWidth'  : 5,
            'glutter'  : 5,

        });

        resize();
        
        interval = setInterval(scrollCarousel, 800);
        $('#carousel img').hover(function(){
            clearInterval(interval);
        }, function(){
            interval = setInterval(scrollCarousel, 800);
        });    
    });
    

    
});
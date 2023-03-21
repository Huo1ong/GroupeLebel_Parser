/*LIST HOVER*/

$(".perso ul li").mouseenter(function() {
    $('.perso ul li').removeClass('hovered').addClass('adapt');
    $(this).addClass('hovered');
});


/*SWITCH TO CONTENT*/

$('ul li').on('click', function(){
    /*here we make a variable to get the name of the clicked li*/
    var elementName = $(this).attr('name');
    $('.showcontent').fadeOut(800);
    $('.global-wrapper').addClass('transition');
    $('.loading-bar').addClass('letsload');
    /*so we fadein the article which has the same class as li's name*/
    $('.showcontent.'+elementName).delay(3000).fadeIn(1000);
    setTimeout(function () {
        $('.global-wrapper').removeClass('transition');
        $('.loading-bar').removeClass('letsload');
    }, 4000);
});

/*BUTTON CLOSE*/

$('.close').click(function(){
    $('.showcontent').fadeOut(800);
    $('.global-wrapper').addClass('transition');
    $('.loading-bar').addClass('letsload');
    $('.perso').delay(1500).fadeIn(3000);
    setTimeout(function () {
        /*remove all animations*/
        $('.global-wrapper').removeClass('transition');
        $('.loading-bar').removeClass('letsload');
        $('.showcontent').removeClass('intro-content');
    }, 4000);
});


/*TOP NAVIGATION*/

$('nav ul li').on('click', function(){
    $('li.active').removeClass('active');
    $(this).addClass('active');
});

$(".hamburger").hover(function() {
    $('nav').addClass('hovered');
}, function() {
    $('nav').removeClass('hovered');
});
$(".hamburger, nav").hover(function() {
    $('.hamburger').addClass('hamburger-open');
    $('.showcontent').addClass('blured');
}, function() {
    $('.hamburger').removeClass('hamburger-open');
    $('.showcontent').removeClass('blured');
});

/*CTA SCROLL DOWN*/

$('.scrolldown').on('click', function(){
    $('.showcontent').addClass('intro-content');
});


/*MOUSEMOVE TRANSFORM 3D*/

!(function ($doc, $win) {
    var screenWidth = $win.screen.width / 2,
        screenHeight = $win.screen.height / 2,
        $elems = $doc.getElementsByClassName("elem"),
        validPropertyPrefix = '',
        otherProperty = 'perspective(1000px)',
        elemStyle = $elems[0].style;

    if(typeof elemStyle.webkitTransform == 'string') {
        validPropertyPrefix = 'webkitTransform';
    } else if (typeof elemStyle.MozTransform == 'string') {
        validPropertyPrefix = 'MozTransform';
    }


    $doc.addEventListener('mousemove', function (e) {
        var centroX = e.clientX - screenWidth,
            centroY = screenHeight - (e.clientY + 13),
            degX = centroX * 0.004,
            degY = centroY * 0.008,
            $elem

        for (var i = 0; i < $elems.length; i++) {
            $elem = $elems[i];
            $elem.style[validPropertyPrefix] = otherProperty + 'rotateY('+ degX +'deg)  rotateX('+ degY +'deg)';
        };
    });
})(document, window);

/*INTRO TEXT WITH LETTERING JS*/

$(document).ready(function() {
    $(".intro-text").lettering('words').children("span").lettering();
})


/*CONTACT CARD*/

$('.btn-title').on('click', function(){
    $('.transition-bar').addClass("barmove");
    $('.transition-bar p:nth-of-type(1)').addClass("inactive");
    $('.contact-content-1').addClass("inactive");
    $('.contact-content-1').delay(700).fadeOut(50);
    setTimeout(function () {
        $('.transition-bar p:nth-of-type(2)').removeClass("inactive");
        $('.contact-content-2').fadeIn(1000);
        $('.contact-content-2').removeClass('inactive');
    }, 1000);
    setTimeout(function () {
        $('.transition-bar').removeClass("barmove");
    }, 2000);
});


$('.close-contact').on('click', function(){
    $('.transition-bar').addClass("barmove");
    $('.transition-bar p:nth-of-type(2)').addClass("inactive");
    $('.contact-content-2').addClass("inactive");
    $('.contact-content-2').delay(700).fadeOut(200);
    setTimeout(function () {
        $('.transition-bar p:nth-of-type(1)').removeClass("inactive");
        $('.contact-content-1').fadeIn(1000).removeClass("inactive");
        $('.contact-content-2').addClass('inactive');
    }, 1000);
    setTimeout(function () {
        $('.transition-bar').removeClass("barmove");
    }, 2000);
});

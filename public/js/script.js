$(function () {

    //click menu
    $('#menu').click(function () {
        event.preventDefault();
        $('.sub-menu').toggleClass("show");
    });

    var $topSection = [];
    var heightNav =260, $section = $('section');

    $.each($section, function () {
        $topSection.push($(this).offset().top - 63);

    });
    $(window).scroll(function () {
        var wSroll = $(window).scrollTop();

        if (wSroll > heightNav) {
            $("body").addClass("menu-fixed");
        }
        if (wSroll < heightNav) {
            $("body").removeClass("menu-fixed");
        }
        $.each($section, function (i) {
            if ((wSroll >= $topSection[i]) && (wSroll <= $topSection[i] + $(this).height() + 20)) {
                var $id = $('#' + this.id + '-link');
                $id.addClass('current');
                console.log(this.id + ' - ' + window.location.hash.substring(1));

                if (window.location.hash.substring(1) !=  this.id){
                }

            } else {
                $('#' + this.id + '-link').removeClass('current');

            }
        });

    });
    $('.link').on('click', function (e) {
        e.preventDefault();
        var currTarget = $(this).data('menu');

        // update url
        $('html, body').stop().animate({
            scrollTop: $($('#' + currTarget)).offset().top - 54
        }, 500, function(){

            history.pushState(null, null, '#' + currTarget);
        });


    });

});


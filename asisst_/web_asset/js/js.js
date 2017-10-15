$(document).ready(function () {
    $('.thumbnail').click(function () {
        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({
            show: true
        });
    });
});
$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 10000
    })
    $('.fdi-Carousel .item').each(function () {
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        var next2 = next.next();
        if (!next2.length) {
            next2 = $(this).siblings(':first');
        }
        next2.children(':first-child').clone().appendTo($(this));

        var next3 = next2.next();
        if (!next3.length) {
            next3 = $(this).siblings(':first');
        }
        next3.children(':first-child').clone().appendTo($(this));
    });

});



$(function () {
    $(".demo1").bootstrapNews({
        newsPerPage: 3,
        autoplay: true,
        pauseOnHover: true,
        direction: 'up',
        newsTickerInterval: 4000,
        onToDo: function () {
            //console.log(this);
        }
    });

    $(".demo2").bootstrapNews({
        newsPerPage: 4,
        autoplay: true,
        pauseOnHover: true,
        navigation: false,
        direction: 'down',
        newsTickerInterval: 2500,
        onToDo: function () {
            //console.log(this);
        }
    });

    $("#demo3").bootstrapNews({
        newsPerPage: 5,
        autoplay: false,

        onToDo: function () {
            //console.log(this);
        }
    });
});



$(document).ready(function () {
    $('#myCarousel').carousel({
        interval: 4000
    });

    var clickEvent = false;
    $('#myCarousel').on('click', '.nav a', function () {
        clickEvent = true;
        $('.nav li').removeClass('active');
        $(this).parent().addClass('active');
    }).on('slid.bs.carousel', function (e) {
        if (!clickEvent) {
            var count = $('.nav').children().length - 1;
            var current = $('.nav li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if (count == id) {
                $('.nav li').first().addClass('active');
            }
        }
        clickEvent = false;
    });
});
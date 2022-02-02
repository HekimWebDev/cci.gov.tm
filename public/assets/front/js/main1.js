$(document).ready(function () {
    $("#galimages").owlCarousel({
        stagePadding: 120,
        loop: true,
        margin: 0,
        nav: true,
        lazyLoad: true,
        rewindNav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 4
            },
            1000: {
                items: 3
            }
        }
    });

    // $('.owl-dots').hidden()
    // $('.owl-nav').removeClass('disabled')


    $('.carousel').carousel({
        interval: 5000
    });


    // $(".partners").owlCarousel({
    //     stagePadding: 50,
    //     loop: true,
    //     margin: 10,
    //     nav: true,
    //     responsive: {
    //         0: {
    //             items: 1
    //         },
    //         600: {
    //             items: 5
    //         },
    //         1000: {
    //             items: 5
    //         }
    //     }
    // });


    // $(".flag").click(function (e) {
    //     e.preventDefault();
    //     var lang = $(this).attr('alt');
    //     var sitename = window.location.origin;
    //     var url = window.location.pathname;
    //     var token = $("input[name='csrfmiddlewaretoken']").val();
    //     $.ajax({
    //         method: "POST",
    //         url: "/i18n/setlang/",
    //         data: "language=" + lang + "&csrfmiddlewaretoken=" + token,
    //         success: function (data) {
    //             url = url.substr(3);
    //             // alert(sitename + '/' + lang + url);
    //             window.location.href = sitename + '/' + lang + url
    //         }
    //     })
    // })


    $(".image_link").click(function (e) {
        e.preventDefault();
        var image = $(this).find("img");
        var attrib = image.attr("src");
        $(".modal_image").attr("src", attrib);
    })

    // $(".owl-carousel").owlCarousel();

    $("#partners").owlCarousel({
        items: 7,
        margin: 10,
        lazyLoad: true,
        autoplay: true,
        autoplayTimeout: 5000,
        autoPlaySpeed: 5000,
        autoplayHoverPause: true,
        loop: true,
        items: 5,

        // autoplayHoverPause: true,
        stagePadding: 10,
        nav: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 4,
                nav: true
            },
            1000: {
                items: 5,
                nav: true,
            }
        }
    });


    $("#partners .owl-nav").css('display', 'none')


    $("#subscribe_form").submit(function (e) {
        e.preventDefault();
        // alert(1)
        window.open('mailto:muradoff101@gmail.com');
    })

});
var $window = $(window);
$(document).ready(function () {
    $(".animate-redirect a[href^='#']").click(function (t) {
        t.preventDefault();
        t = $($(this).attr("href")).offset().top;
        $("body, html").animate({ scrollTop: t }, 1e3);
    }),
        $window.on("scroll", function () {
            500 < $(this).scrollTop()
                ? $(".scroll-to-top").fadeIn(400)
                : $(".scroll-to-top").fadeOut(400);
        }),
        $(".scroll-to-top").on("click", function (t) {
            t.preventDefault(), $("html, body").animate({ scrollTop: 0 }, 600);
        }),
        $(".countup").counterUp({ delay: 50, time: 2e3 }),
        $(".current-year").text(new Date().getFullYear());
});

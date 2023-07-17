/*-----------------------------------------------------------------------------------

    Theme Name: Fabrex - Multipurpose Business and Admin Template
    Description: Multipurpose Business and Admin Template
    Author: Chitrakoot Web
    Version: 3.4

    ---------------------------------- */

!(function (g) {
    "use strict";
    var o,
        c = g(window);
    function a() {
        var e, o;
        (e = g(".full-screen")),
            (o = c.height()),
            e.css("min-height", o),
            (e = g("header").height()),
            (o = g(".screen-height")),
            (e = c.height() - e),
            o.css("height", e);
    }
    g("#preloader").fadeOut("normall", function () {
        g(this).remove();
    }),
        c.on("scroll", function () {
            var e = c.scrollTop(),
                o = g(".navbar-brand img"),
                a = g(".navbar-brand.logodefault img"),
                t = g(".navbar-brand.logowhite img"),
                i = g(".navbar-brand.logo2 img"),
                r = g(".navbar-brand.logo4 img"),
                s = g(".navbar-brand.logo5 img"),
                l = g(".navbar-brand.logo6 img"),
                n = g(".navbar-brand.logo7 img"),
                d = g(".navbar-brand.logo8 img");
            e <= 50
                ? (g("header")
                      .removeClass("scrollHeader")
                      .addClass("fixedHeader"),
                  o.attr("src", "img/logos/logo-inner.png"),
                  a.attr("src", "img/logos/logo.png"),
                  t.attr("src", "img/logos/logo-white.png"),
                  i.attr("src", "img/logos/logo-2-light.png"),
                  r.attr("src", "img/logos/logo-4.png"),
                  s.attr("src", "img/logos/logo-5-light.png"))
                : (g("header")
                      .removeClass("fixedHeader")
                      .addClass("scrollHeader"),
                  o.attr("src", "img/logos/logo.png"),
                  a.attr("src", "img/logos/logo.png"),
                  t.attr("src", "img/logos/logo-white.png"),
                  i.attr("src", "img/logos/logo-2-dark.png"),
                  r.attr("src", "img/logos/logo-4.png"),
                  s.attr("src", "img/logos/logo-5-dark.png")),
                l.attr("src", "img/logos/logo-6.png"),
                n.attr("src", "img/logos/logo-7.png"),
                d.attr("src", "img/logos/logo-8.png");
        }),
        c.on("scroll", function () {
            500 < g(this).scrollTop()
                ? g(".scroll-to-top").fadeIn(400)
                : g(".scroll-to-top").fadeOut(400);
        }),
        g(".scroll-to-top").on("click", function (e) {
            e.preventDefault(), g("html, body").animate({ scrollTop: 0 }, 600);
        }),
        g(".parallax,.bg-img").each(function (e) {
            g(this).attr("data-background") &&
                g(this).css(
                    "background-image",
                    "url(" + g(this).data("background") + ")"
                );
        }),
        g(".story-video").magnificPopup({ delegate: ".video", type: "iframe" }),
        g(".popup-youtube").magnificPopup({
            disableOn: 700,
            type: "iframe",
            mainClass: "mfp-fade",
            removalDelay: 160,
            preloader: !1,
            fixedContentPos: !1,
        }),
        g(".select-departments").on("click", function () {
            g(".select-departments .dropdown").hasClass("current")
                ? g(".select-departments .dropdown").removeClass("current")
                : (g(".select-departments .dropdown").removeClass("current"),
                  g(".select-departments .dropdown").addClass("current"));
        }),
        c.on("resize", function (e) {
            clearTimeout(o),
                (o = setTimeout(function () {
                    991 < c.width()
                        ? g(".categories .shop-category").show()
                        : g(".categories .shop-category").hide();
                }, 250));
        }),
        g(".collapse-sm").on("click", function () {
            g(".categories .shop-category").slideToggle(),
                g(this).hasClass("current")
                    ? g(this).removeClass("current")
                    : (g(this).removeClass("current"),
                      g(this).addClass("current"));
        }),
        0 !== g(".copy-clipboard").length &&
            (new ClipboardJS(".copy-clipboard"),
            g(".copy-clipboard").on("click", function () {
                var e = g(this);
                e.text();
                e.text("Copied"),
                    setTimeout(function () {
                        e.text("Copy");
                    }, 2e3);
            })),
        g(".source-modal").magnificPopup({
            type: "inline",
            mainClass: "mfp-fade",
            removalDelay: 160,
        }),
        c.resize(function (e) {
            setTimeout(function () {
                a();
            }, 500),
                e.preventDefault();
        }),
        a(),
        g(document).ready(function () {
            var e, o;
            0 === g("#chBar").length ||
                ((e = document.getElementById("chBar")) &&
                    new Chart(e, {
                        type: "bar",
                        data: {
                            labels: [
                                "Jan",
                                "Feb",
                                "Mar",
                                "Apr",
                                "May",
                                "Jun",
                                "Jul",
                                "Aug",
                                "Sep",
                                "Oct",
                                "Nov",
                                "Dec",
                            ],
                            datasets: [
                                {
                                    data: [
                                        350, 365, 425, 475, 525, 575, 625, 675,
                                        725, 775, 825, 875,
                                    ],
                                    backgroundColor: [
                                        "rgba(28, 51, 65,0.8)",
                                        "rgba(0, 135, 115,0.8)",
                                        "rgba(107, 185, 131,0.8)",
                                        "rgba(242, 201, 117,0.8)",
                                        "rgba(237, 99, 83,0.8)",
                                        "rgba(242, 190, 84,0.8)",
                                        "rgba(240, 217, 207,0.8)",
                                        "rgba(135, 174, 180,0.8)",
                                        "rgba(21, 62, 92,0.8)",
                                        "rgba(237, 85, 96,0.8)",
                                        "rgba(201, 223, 241,0.8)",
                                        "rgba(240, 217, 207,0.9)",
                                    ],
                                },
                            ],
                        },
                        options: {
                            scales: {
                                xAxes: [
                                    {
                                        barPercentage: 0.5,
                                        categoryPercentage: 1,
                                    },
                                ],
                                yAxes: [{ ticks: { beginAtZero: !1 } }],
                            },
                            legend: { display: !1 },
                        },
                    })),
                0 !== g("#myPieChart").length &&
                    ((e = document
                        .getElementById("myPieChart")
                        .getContext("2d")),
                    new Chart(e, {
                        type: "pie",
                        data: {
                            labels: ["Red", "Blue", "Yellow", "Green"],
                            datasets: [
                                {
                                    data: [10, 15, 20, 30],
                                    backgroundColor: [
                                        "rgba(255, 99, 132, 0.8)",
                                        "rgba(54, 162, 235, 0.8)",
                                        "rgba(255, 206, 86, 0.8)",
                                        "rgba(75, 192, 192, 0.8)",
                                    ],
                                },
                            ],
                        },
                    })),
                g("#testmonials-carousel").owlCarousel({
                    loop: !1,
                    responsiveClass: !0,
                    nav: !0,
                    dots: !1,
                    margin: 0,
                    smartSpeed: 900,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>",
                    ],
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        1e3: { items: 1 },
                    },
                }),
                g("#testmonials-style2").owlCarousel({
                    loop: !0,
                    responsiveClass: !0,
                    nav: !0,
                    dots: !1,
                    smartSpeed: 900,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>",
                    ],
                    responsive: {
                        0: { items: 1, margin: 10 },
                        768: { items: 2, margin: 15 },
                        992: { items: 2, margin: 40 },
                    },
                }),
                g(".testimonial-style3").owlCarousel({
                    loop: !1,
                    responsiveClass: !0,
                    nav: !1,
                    dots: !0,
                    margin: 0,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1 },
                        600: { items: 1 },
                        1e3: { items: 1 },
                    },
                }),
                g(".testmonial-style5").owlCarousel({
                    loop: !0,
                    responsiveClass: !0,
                    nav: !0,
                    dots: !1,
                    smartSpeed: 900,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>",
                    ],
                    responsive: {
                        0: { items: 1, margin: 10 },
                        768: { items: 2, margin: 15 },
                        992: { items: 2, margin: 40 },
                    },
                }),
                g(".team .owl-carousel").owlCarousel({
                    loop: !0,
                    margin: 30,
                    dots: !1,
                    nav: !1,
                    autoplay: !0,
                    smartSpeed: 900,
                    responsiveClass: !0,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        700: { items: 2, margin: 15 },
                        1e3: { items: 4 },
                    },
                }),
                g(".project-single-two .owl-carousel").owlCarousel({
                    loop: !1,
                    nav: !1,
                    responsiveClass: !0,
                    dots: !1,
                    margin: 15,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 15 },
                        576: { items: 2, margin: 20 },
                        992: { items: 3, margin: 25 },
                        1200: { items: 4, margin: 30 },
                    },
                }),
                g("#services-carousel").owlCarousel({
                    loop: !0,
                    responsiveClass: !0,
                    dots: !1,
                    nav: !0,
                    smartSpeed: 900,
                    navText: [
                        "<i class='fa fa-angle-left'></i>",
                        "<i class='fa fa-angle-right'></i>",
                    ],
                    responsive: {
                        0: { items: 1, margin: 0 },
                        768: { items: 2, margin: 0 },
                        992: { items: 3, margin: 0 },
                    },
                }),
                g("#blog-grid").owlCarousel({
                    loop: !0,
                    dots: !1,
                    nav: !1,
                    autoplay: !0,
                    autoplayTimeout: 2500,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        768: { items: 2, margin: 0 },
                        992: { items: 3, margin: 0 },
                    },
                }),
                g(".carousel-style2 .owl-carousel").owlCarousel({
                    loop: !0,
                    dots: !1,
                    nav: !0,
                    navText: [
                        "<i class='fas fa-angle-left'></i>",
                        "<i class='fas fa-angle-right'></i>",
                    ],
                    autoplay: !0,
                    autoplayTimeout: 5e3,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        768: { items: 2, margin: 20 },
                        992: { items: 2, margin: 30 },
                        1200: { items: 3, margin: 30 },
                    },
                }),
                g(".carousel-style3 .owl-carousel").owlCarousel({
                    loop: !0,
                    dots: !1,
                    nav: !1,
                    autoplay: !0,
                    smartSpeed: 900,
                    autoplayTimeout: 5e3,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        768: { items: 2, margin: 20 },
                        992: { items: 2, margin: 30 },
                        1200: { items: 3, margin: 30 },
                    },
                }),
                g(".carousel-style4 .owl-carousel").owlCarousel({
                    loop: !0,
                    dots: !1,
                    nav: !0,
                    navText: [
                        "<i class='fas fa-angle-left'></i>",
                        "<i class='fas fa-angle-right'></i>",
                    ],
                    autoplay: !0,
                    autoplayTimeout: 5e3,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        481: { items: 2, margin: 5 },
                        500: { items: 2, margin: 20 },
                        992: { items: 3, margin: 30 },
                        1200: { items: 4, margin: 30 },
                    },
                }),
                g("#service-grids").owlCarousel({
                    loop: !0,
                    dots: !1,
                    nav: !1,
                    autoplay: !0,
                    autoplayTimeout: 2500,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 0 },
                        768: { items: 2, margin: 20 },
                        992: { items: 3, margin: 30 },
                    },
                }),
                g(".home-business-slider").owlCarousel({
                    items: 1,
                    loop: !0,
                    autoplay: !0,
                    smartSpeed: 900,
                    nav: !0,
                    dots: !1,
                    navText: [
                        '<span class="fas fa-chevron-left"></span>',
                        '<span class="fas fa-chevron-right"></span>',
                    ],
                    responsive: { 0: { nav: !1 }, 768: { nav: !0 } },
                }),
                g("#clients").owlCarousel({
                    loop: !0,
                    nav: !1,
                    dots: !1,
                    autoplay: !0,
                    autoplayTimeout: 3e3,
                    responsiveClass: !0,
                    autoplayHoverPause: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 2, margin: 20 },
                        768: { items: 3, margin: 40 },
                        992: { items: 4, margin: 60 },
                        1200: { items: 5, margin: 80 },
                    },
                }),
                g("#project-single").owlCarousel({
                    loop: !1,
                    nav: !1,
                    responsiveClass: !0,
                    dots: !1,
                    smartSpeed: 900,
                    responsive: {
                        0: { items: 1, margin: 15 },
                        600: { items: 2, margin: 15 },
                        1e3: { items: 3, margin: 15 },
                    },
                }),
                g(".slider-fade .owl-carousel").owlCarousel({
                    items: 1,
                    loop: !0,
                    margin: 0,
                    autoplay: !0,
                    smartSpeed: 500,
                    mouseDrag: !1,
                    animateIn: "fadeIn",
                    animateOut: "fadeOut",
                }),
                g(".services-grids").owlCarousel({
                    loop: !0,
                    nav: !1,
                    responsiveClass: !0,
                    dots: !1,
                    autoplay: !0,
                    smartSpeed: 900,
                    mouseDrag: !1,
                    responsive: {
                        0: { items: 1, margin: 15, mouseDrag: !0 },
                        768: { items: 2, margin: 20, mouseDrag: !0 },
                        1200: { items: 3, margin: 25, mouseDrag: !1 },
                    },
                }),
                g(".owl-carousel").owlCarousel({
                    items: 1,
                    loop: !0,
                    dots: !1,
                    margin: 0,
                    autoplay: !0,
                    smartSpeed: 500,
                }),
                g(".slider-fade").on("changed.owl.carousel", function (e) {
                    e = e.item.index - 2;
                    g("h3").removeClass("animated fadeInUp"),
                        g("h1").removeClass("animated fadeInUp"),
                        g("p").removeClass("animated fadeInUp"),
                        g(".butn").removeClass("animated fadeInUp"),
                        g(".owl-item")
                            .not(".cloned")
                            .eq(e)
                            .find("h3")
                            .addClass("animated fadeInUp"),
                        g(".owl-item")
                            .not(".cloned")
                            .eq(e)
                            .find("h1")
                            .addClass("animated fadeInUp"),
                        g(".owl-item")
                            .not(".cloned")
                            .eq(e)
                            .find("p")
                            .addClass("animated fadeInUp"),
                        g(".owl-item")
                            .not(".cloned")
                            .eq(e)
                            .find(".butn")
                            .addClass("animated fadeInUp");
                }),
                0 !== g("#rev_slider_1").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_1").revolution
                            ? revslider_showDoubleJqueryError("#rev_slider_1")
                            : o("#rev_slider_1")
                                  .show()
                                  .revolution({
                                      sliderType: "standard",
                                      sliderLayout: "fullwidth",
                                      dottedOverlay: "none",
                                      delay: 9e3,
                                      spinner: "spinner4",
                                      navigation: {
                                          keyboardNavigation: "off",
                                          keyboard_direction: "horizontal",
                                          mouseScrollNavigation: "off",
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: {
                                              enable: !1,
                                              style: "metis",
                                              rtl: !1,
                                              hide_onleave: !0,
                                              hide_onmobile: !0,
                                              hide_under: 0,
                                              hide_over: 9999,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              tmp: '<div class="tp-title-wrap">   <div class="tp-arr-imgholder"></div> </div>',
                                              left: {
                                                  container: "slider",
                                                  h_align: "left",
                                                  v_align: "center",
                                                  h_offset: 20,
                                                  v_offset: 0,
                                              },
                                              right: {
                                                  container: "slider",
                                                  h_align: "right",
                                                  v_align: "center",
                                                  h_offset: 20,
                                                  v_offset: 0,
                                              },
                                          },
                                          bullets: {
                                              enable: !1,
                                              hide_onmobile: !1,
                                              hide_under: 300,
                                              style: "hermes",
                                              hide_onleave: !1,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              direction: "horizontal",
                                              h_align: "center",
                                              v_align: "bottom",
                                              h_offset: 0,
                                              v_offset: 30,
                                              space: 8,
                                          },
                                      },
                                      responsiveLevels: [1240, 1024, 767, 480],
                                      gridwidth: [1170, 1170, 767, 480],
                                      gridheight: [700, 700, 600, 600],
                                      lazyType: "none",
                                      shadow: 0,
                                      shuffle: "off",
                                      autoHeight: "off",
                                  });
                    }),
                0 !== g("#rev_slider_2").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_2").revolution
                            ? revslider_showDoubleJqueryError("#rev_slider_2")
                            : o("#rev_slider_2")
                                  .show()
                                  .revolution({
                                      sliderType: "standard",
                                      sliderLayout: "fullwidth",
                                      dottedOverlay: "none",
                                      delay: 9e3,
                                      spinner: "spinner4",
                                      navigation: {
                                          keyboardNavigation: "off",
                                          keyboard_direction: "horizontal",
                                          mouseScrollNavigation: "off",
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: {
                                              enable: !0,
                                              style: "metis",
                                              tmp: "",
                                              rtl: !1,
                                              hide_onleave: !0,
                                              hide_onmobile: !0,
                                              hide_under: 0,
                                              hide_over: 9999,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              left: {
                                                  container: "slider",
                                                  h_align: "left",
                                                  v_align: "center",
                                                  h_offset: 20,
                                                  v_offset: 0,
                                              },
                                              right: {
                                                  container: "slider",
                                                  h_align: "right",
                                                  v_align: "center",
                                                  h_offset: 20,
                                                  v_offset: 0,
                                              },
                                          },
                                          bullets: { enable: !1 },
                                      },
                                      responsiveLevels: [1240, 1024, 767, 480],
                                      gridwidth: [1370, 1170, 767, 480],
                                      gridheight: [700, 700, 600, 600],
                                      lazyType: "none",
                                      shadow: 0,
                                      shuffle: "off",
                                      autoHeight: "off",
                                  });
                    }),
                0 !== g("#rev_slider_video").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_video").revolution
                            ? revslider_showDoubleJqueryError(
                                  "#rev_slider_video"
                              )
                            : o("#rev_slider_video")
                                  .show()
                                  .revolution({
                                      sliderType: "standard",
                                      sliderLayout: "fullwidth",
                                      dottedOverlay: "none",
                                      delay: 9e3,
                                      spinner: "spinner4",
                                      navigation: {
                                          keyboardNavigation: "off",
                                          keyboard_direction: "horizontal",
                                          mouseScrollNavigation: "off",
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: { enable: !1 },
                                          bullets: { enable: !1 },
                                      },
                                      responsiveLevels: [1240, 1024, 767, 480],
                                      gridwidth: [1170, 1170, 767, 480],
                                      gridheight: [700, 700, 600, 600],
                                      lazyType: "none",
                                      shadow: 0,
                                      shuffle: "off",
                                      autoHeight: "off",
                                  });
                    }),
                0 !== g("#rev_slider_3").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_3").revolution
                            ? revslider_showDoubleJqueryError("#rev_slider_3")
                            : o("#rev_slider_3")
                                  .show()
                                  .revolution({
                                      sliderLayout: "fullscreen",
                                      delay: 12e3,
                                      responsiveLevels: [4096, 1024, 778, 420],
                                      gridwidth: [1370, 1024, 778, 410],
                                      gridheight: 600,
                                      hideThumbs: 10,
                                      fullScreenAutoWidth: "on",
                                      fullScreenOffsetContainer: ".rev-offset",
                                      navigation: {
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: {
                                              enable: !0,
                                              style: "hermes",
                                              tmp: '<div class="tp-arr-allwrapper">  <div class="tp-arr-imgholder"></div> <div class="tp-arr-titleholder">{{title}}</div> </div>',
                                              left: {
                                                  h_align: "left",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                              right: {
                                                  h_align: "right",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                          },
                                          bullets: {
                                              style: "",
                                              enable: !1,
                                              hide_onmobile: !1,
                                              hide_onleave: !0,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              hide_under: 0,
                                              hide_over: 9999,
                                              direction: "horizontal",
                                              space: 12,
                                              h_align: "center",
                                              v_align: "bottom",
                                              h_offset: 0,
                                              v_offset: 30,
                                              tmp: "",
                                          },
                                      },
                                      parallax: {
                                          type: "scroll",
                                          levels: [
                                              5, 10, 15, 20, 25, 30, 35, 40, 45,
                                              50, 55, 60, 65, 70, 75, 80, 85,
                                          ],
                                          origo: "enterpoint",
                                          speed: 400,
                                          bgparallax: "on",
                                          disable_onmobile: "on",
                                      },
                                      spinner: "spinner4",
                                  });
                    }),
                0 !== g("#rev_slider_4").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_4").revolution
                            ? revslider_showDoubleJqueryError("#rev_slider_4")
                            : o("#rev_slider_4")
                                  .show()
                                  .revolution({
                                      sliderLayout: "fullscreen",
                                      delay: 12e3,
                                      responsiveLevels: [4096, 1024, 778, 420],
                                      gridwidth: [1370, 1024, 778, 410],
                                      gridheight: 600,
                                      hideThumbs: 10,
                                      fullScreenAutoWidth: "on",
                                      fullScreenOffsetContainer: "",
                                      navigation: {
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: {
                                              enable: !1,
                                              style: "hermes",
                                              tmp: '<div class="tp-arr-allwrapper">  <div class="tp-arr-imgholder"></div> <div class="tp-arr-titleholder">{{title}}</div> </div>',
                                              left: {
                                                  h_align: "left",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                              right: {
                                                  h_align: "right",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                          },
                                          bullets: {
                                              style: "",
                                              enable: !0,
                                              hide_onmobile: !1,
                                              hide_onleave: !0,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              hide_under: 0,
                                              hide_over: 9999,
                                              direction: "vertical",
                                              space: 18,
                                              h_align: "right",
                                              v_align: "center",
                                              h_offset: 40,
                                              v_offset: 0,
                                              tmp: "",
                                          },
                                      },
                                      parallax: {
                                          type: "scroll",
                                          levels: [
                                              5, 10, 15, 20, 25, 30, 35, 40, 45,
                                              50, 55, 60, 65, 70, 75, 80, 85,
                                          ],
                                          origo: "enterpoint",
                                          speed: 400,
                                          bgparallax: "on",
                                          disable_onmobile: "on",
                                      },
                                      spinner: "spinner4",
                                  });
                    }),
                0 !== g("#rev_slider_5").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o("#rev_slider_5").revolution
                            ? revslider_showDoubleJqueryError("#rev_slider_5")
                            : o("#rev_slider_5")
                                  .show()
                                  .revolution({
                                      sliderLayout: "fullscreen",
                                      delay: 12e3,
                                      responsiveLevels: [4096, 1024, 778, 420],
                                      gridwidth: [1370, 1024, 778, 410],
                                      gridheight: 600,
                                      hideThumbs: 10,
                                      fullScreenAutoWidth: "on",
                                      fullScreenOffsetContainer: "header",
                                      navigation: {
                                          onHoverStop: "off",
                                          touch: {
                                              touchenabled: "on",
                                              swipe_threshold: 75,
                                              swipe_min_touches: 1,
                                              swipe_direction: "horizontal",
                                              drag_block_vertical: !1,
                                          },
                                          arrows: {
                                              enable: !1,
                                              style: "hermes",
                                              tmp: '<div class="tp-arr-allwrapper">  <div class="tp-arr-imgholder"></div> <div class="tp-arr-titleholder">{{title}}</div> </div>',
                                              left: {
                                                  h_align: "left",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                              right: {
                                                  h_align: "right",
                                                  v_align: "center",
                                                  h_offset: 0,
                                                  v_offset: 0,
                                              },
                                          },
                                          bullets: {
                                              style: "",
                                              enable: !0,
                                              hide_onmobile: !1,
                                              hide_onleave: !0,
                                              hide_delay: 200,
                                              hide_delay_mobile: 1200,
                                              hide_under: 0,
                                              hide_over: 9999,
                                              direction: "vertical",
                                              space: 18,
                                              h_align: "right",
                                              v_align: "center",
                                              h_offset: 40,
                                              v_offset: 0,
                                              tmp: "",
                                          },
                                      },
                                      spinner: "spinner4",
                                  });
                    }),
                0 !== g(".horizontaltab").length &&
                    g(".horizontaltab").easyResponsiveTabs({
                        type: "default",
                        width: "auto",
                        fit: !0,
                        tabidentify: "hor_1",
                        activate: function (e) {
                            var o = g(this),
                                a = g("#nested-tabInfo");
                            g("span", a).text(o.text()), a.show();
                        },
                    }),
                0 !== g(".childverticaltab").length &&
                    g(".childverticaltab").easyResponsiveTabs({
                        type: "vertical",
                        width: "auto",
                        fit: !0,
                        tabidentify: "ver_1",
                        activetab_bg: "#fff",
                        inactive_bg: "#F5F5F5",
                        active_border_color: "#c1c1c1",
                        active_content_border_color: "#c1c1c1",
                    }),
                0 !== g(".verticaltab").length &&
                    g(".verticaltab").easyResponsiveTabs({
                        type: "vertical",
                        width: "auto",
                        fit: !0,
                        closed: "accordion",
                        tabidentify: "hor_1",
                        activate: function (e) {
                            var o = g(this),
                                a = g("#nested-tabInfo2");
                            g("span", a).text(o.text()), a.show();
                        },
                    }),
                g(".countup").counterUp({ delay: 25, time: 2e3 }),
                0 !== g(".countdown").length &&
                    (o = jQuery)(document).ready(function () {
                        null == o(".countdown").countdown
                            ? revslider_showDoubleJqueryError(".countdown")
                            : o(".countdown")
                                  .show()
                                  .countdown({
                                      date: "01 Nov 2024 00:01:00",
                                      format: "on",
                                  });
                    }),
                g(".form_date").datetimepicker({
                    language: "en",
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    minView: 2,
                    forceParse: 0,
                }),
                g(".form_time").datetimepicker({
                    language: "en",
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 1,
                    minView: 0,
                    maxView: 1,
                    forceParse: 0,
                }),
                g(".current-year").text(new Date().getFullYear());
        }),
        c.on("load", function () {
            var o = g(".portfolio-gallery-isotope").isotope({});
            g(".filtering").on("click", "span", function () {
                var e = g(this).attr("data-filter");
                o.isotope({ filter: e });
            }),
                g(".filtering").on("click", "span", function () {
                    g(this).addClass("active").siblings().removeClass("active");
                }),
                g(
                    ".portfolio-gallery,.portfolio-gallery-isotope"
                ).lightGallery(),
                g(".portfolio-link").on("click", (e) => {
                    e.stopPropagation();
                }),
                c.stellar();
        });
})(jQuery);

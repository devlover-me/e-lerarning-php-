jQuery(document).ready(function(){
    "use strict";


/* ==================================================================
                    Accordion Icon
================================================================== */
    $('.trd-accordion-items').on('shown.bs.collapse', function(){
        $(this).find(".trd-expandable-icon").removeClass("trd-collapsed").addClass("trd-expand").children('i').removeClass('fa fa-plus').addClass('fa fa-minus');
    }).on('hidden.bs.collapse', function(){
        $(this).find(".trd-expandable-icon").removeClass("trd-expand").addClass("trd-collapsed").children('i').removeClass('fa fa-minus').addClass('fa fa-plus');
    });



/* ==================================================================
                    WOW JS
================================================================== */
  var e = new WOW({
      boxClass: "appear",
      animateClass: "animated",
      offset: 100,
      mobile: !1,
      live: !0,
      callback: function(e) {}
  });
  e.init();

/* ==================================================================
                    Counter
================================================================== */
    $('.trd-counter-section').waypoint(function(direction) {
            $('.trd-count').countTo({
                speed: 3500
            });
            this.destroy()
        }, {
            offset: 'bottom-in-view'
        });

        // Resize
        $(function(){
            $(window).on("resize.showContent", function() {
            var windowsize = $(window).width();
            if(windowsize <= 767) {

                $('.trd-counter-section').waypoint(function(direction) {
                    $('.trd-count').countTo({
                        speed: 3500
                    });
                    this.destroy()
                }, {
                    offset: '25%'
                });

              }
            }).trigger("resize.showContent")
        });

/* ==================================================================
                    Minified Header
================================================================== */
    var clearResize,
          trdHeader = $(".trd-header"),
          trdHeaderHeight = trdHeader.outerHeight();

    $(window).on('scroll', function() {
        if ($(window).scrollTop() > trdHeaderHeight) {
            $('.trd-header').addClass('minified');
        } else {
            $('.trd-header').removeClass('minified');
        }
    });

    trdHeader.after('<section class="trd-false-div"></section>');

    var falseDiv = trdHeader.next();

    if (trdHeader.hasClass('trd-fixed-header')) {
        falseDiv.css({
            'height' : 0,
            'display' : 'none'
        });
    } else {
        falseDiv.css({
            'height' : trdHeaderHeight
        });
    }

    $(window).on('resize', function(e) {
        clearTimeout(clearResize);
        clearResize = setTimeout(function() {
          var trdHeaderHeight = trdHeader.outerHeight();
          falseDiv.css({
            'height' : trdHeaderHeight
          });
        }, 250);
    });

/* ==================================================================
                    Responsive Menu (Mobile)
================================================================== */
    $(".navbar-collapse").css({
        maxHeight: $(window).height() - $(".navbar-header").height() + "px"
    });


/* ==================================================================
                    Same Height
================================================================== */
    var mapWrapper = $('.trd-map-wrapper, .trade-same-height'),
        mapNextHeight = mapWrapper.next().outerHeight();

        $(window).resize(function() {
            if ($(this).width() < 768) {

               var sectionHeight = $(window).height() - 80;

                mapWrapper.css({
                    height: sectionHeight,
                });
            } else {
                mapWrapper.css({
                    height: mapNextHeight
                });
            }
        });

        $(window).trigger('resize');





/* ==================================================================
                    Select 2 Dropdown
================================================================== */
    function languageFlag (language) {
            if (!language.id) { return language.text; }
            var $language = $(
                '<span><img src="images/flags/' + language.element.value.toLowerCase() + '.png" class="img-flag" /> ' + language.text + '</span>'
            );
            return $language;
        };

        $(".trd-multilang-opt").select2({
            minimumResultsForSearch: Infinity,
            dropdownCssClass: "trd-lang-dropdown",
            templateResult: languageFlag,
            templateSelection: languageFlag,
        });


/* ==================================================================
                    Skillbar
================================================================== */
        $('.trd-skillbar').waypoint(function(direction) {
            $('.trd-skillbar[data-percent]').each(function () {
                var skillbarWrapper = $(this);
                var progress = $(this).find('span.skill-bar-percent');
                var percentage = Math.ceil($(this).attr('data-percent'));
                    $({countNum: 0}).animate({countNum: percentage}, {
                      duration: 3000,
                      step: function() {
                        // What todo on every count
                      var pct = '';
                      if(percentage == 0){
                        pct = Math.floor(this.countNum) + '%';
                      }else{
                        pct = Math.floor(this.countNum+1) + '%';
                      }
                      progress.text(pct) && skillbarWrapper.find('.trd-skillbar-bar').css('width',pct);
                      }
                    });
                  })
                this.destroy()
            }, {
            offset: 'bottom-in-view'
        });

/* ==================================================================
                    Slick Slider
================================================================== */
        $('#trd-testimonial').slick({
            infinite: true,
            speed: 300,
            autoplay: true,
            autoplaySpeed: 5000,
            speed: 1000,
            slidesToShow: 3,
            centerMode: true,
            centerPadding: '30px',
            responsive: [{
              breakpoint: 1023,
              settings: {
                slidesToShow: 3
              }

            }, {

              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                centerPadding : '20px'
              }

            }]
        });

        $('#trd-custom-testimonial').slick({
            infinite: true,
            speed: 300,
            autoplay: false,
            autoplaySpeed: 5000,
            speed: 1000,
            slidesToShow: 1,
            dots: true,
            responsive: [{
              breakpoint: 1023,
              settings: {
                slidesToShow: 1
              }

            }, {

              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                centerPadding : '20px'
              }

            }]
        });

        $('#trd-testimonial-alt').slick({
             infinite: true,
            speed: 300,
            autoplay: false,
            autoplaySpeed: 5000,
            speed: 1000,
            slidesToShow: 2,
            autoplay: false,
            arrows: true,
            appendArrows: '.trd-testimonial-nav',
            prevArrow: '<button type="button" class="trd-prev-slides trd-slide-nav"><i class="ion-ios-arrow-left"></i></button>',
            nextArrow: '<button type="button" class="trd-next-slides trd-slide-nav"><i class="ion-ios-arrow-right"></i></button>',
            responsive: [{
              breakpoint: 1023,
              settings: {
                slidesToShow: 2
              }

            }, {

              breakpoint: 767,
              settings: {
                slidesToShow: 2,
                centerPadding : '20px'
              }

            },{

              breakpoint: 560,
              settings: {
                slidesToShow: 1,
                centerPadding : '15px'
              }

            }]
        });



/* ==================================================================
                    MATCH HEIGHT
================================================================== */
$('.trade-same-height').matchHeight();



/* ==================================================================
                    Slider Pro
================================================================== */
        $(window).resize(function() {
            var windowHeight = $(window).height() ,
                siliderHeight = windowHeight - 35,
                fixedSiliderHeight = 650 - trdHeaderHeight,
                fullSliderHeight = windowHeight - trdHeaderHeight;

            $( '#trd-hero-slider' ).sliderPro({
                width: '100%',
                height : siliderHeight,
                fade: true,
                loop: false,     // Set it true if you add 3+ slides
                forceSize: 'fullWidth',
                arrows: true,
                waitForLayers: false,
                buttons: false,
                autoplay: true,
                autoplayDelay: 7500,
                autoplayOnHover: 'none',
                autoScaleLayers: false,
                slideAnimationDuration: 2000,
                breakpoints: {
                    767: {
                        height : windowHeight
                    }
                }
            });

            $( '#trd-fullscreen-slider' ).sliderPro({
                width: '100%',
                height : fullSliderHeight,
                fade: true,
                loop: false,     // Set it true if you add 3+ slides
                forceSize: 'fullWidth',
                arrows: true,
                waitForLayers: false,
                buttons: false,
                autoplay: true,
                autoplayDelay: 7500,
                autoplayOnHover: 'none',
                autoScaleLayers: false,
                slideAnimationDuration: 2000
            });

            $( '#trd-fixed-slider' ).sliderPro({
                width: '100%',
                height : fixedSiliderHeight,
                fade: true,
                loop: false,     // Set it true if you add 3+ slides
                forceSize: 'fullWidth',
                arrows: true,
                waitForLayers: false,
                buttons: false,
                autoplay: true,
                autoplayDelay: 7500,
                autoplayOnHover: 'none',
                autoScaleLayers: false,
                slideAnimationDuration: 2000
            });

            $( '#trd-slider-homesix' ).sliderPro({
                width: '100%',
                height : 650,
                fade: true,
                loop: false,     // Set it true if you add 3+ slides
                forceSize: 'fullWidth',
                arrows: true,
                waitForLayers: false,
                buttons: false,
                autoplay: false,
                autoplayDelay: 7500,
                autoplayOnHover: 'none',
                autoScaleLayers: false,
                slideAnimationDuration: 2000
            });
        });
        $(window).trigger('resize');

/* ==================================================================
                    Isotope
================================================================== */
        var $gridPostContainer = $('.trd-blog-post-wrapper');

        $gridPostContainer.imagesLoaded(function(){
            $gridPostContainer.isotope({
                itemSelector : '.trd-blog-posts',
                masonry: {
                columnWidth: 1,
              }
            });
        });
});

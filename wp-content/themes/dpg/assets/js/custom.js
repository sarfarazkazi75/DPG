jQuery(document).ready(function ($) {
    // Menu Open
    $(".menu-icon").click(function () {
        $("body").toggleClass("menu-open");
    });
    // Search Open
    $(".search-button").click(function () {
        $(".header-search").toggleClass("active");
    });
    // Faqs
    let title = document.querySelectorAll(".faqs-wrapper .faq-item .faq-title");

    title.forEach((qsitem) => {
        qsitem.addEventListener("click", function (e) {
            //   store the .answer div containing the answer
            let sibling = qsitem.nextElementSibling;

            // Nested loop for removing active class from all and set answer height to 0
            title.forEach((item) => {
                item.nextElementSibling.style.height = "0px";
                //   remove class "active" except for the currently clicked item
                item != qsitem && item.parentNode.classList.remove("active");
            });
            //then toggle the "active" class of clicked item's parent ".qna"
            this.parentNode.classList.toggle("active");

            // set actual height for .answer div if .qna has the class "active"
            if (qsitem.parentNode.classList.contains("active")) {
                sibling.style.height = sibling.scrollHeight + "px";
            } else {
                sibling.style.height = "0px";
            }
        });
    });
    // Products Slider
    $('.product-main-images').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        swipe: true
    });
    $('.product-thumbnails-image').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: '.product-main-images',
        dots: false,
        centerMode: false,
        focusOnSelect: true,
        arrows: false
    });

    //Logo slider
    $('.our-clients-wrapper').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        autoplay: true,
        autoplaySpeed: 0,
        speed: 8000,
        pauseOnHover: false,
        cssEase: 'linear',
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 5,
              }
            },
            {
              breakpoint: 991,
              settings: {
                slidesToShow: 4,
              }
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 2,
              }
            }

          ]
    });

    $('.tab-item').click(function () {
        $this= $(this);
        $('.tab-item a').removeClass('active');
        $this.find('a').addClass('active');
        $content_div_id = $this.attr('data-tab-index');
        $('.tabs-content-item').hide();
        $('#' + $content_div_id).fadeIn();

    });
}, jQuery);
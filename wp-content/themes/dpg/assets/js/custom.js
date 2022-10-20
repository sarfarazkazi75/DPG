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
        focusOnSelect: true
    });

    $('.tab-item').click(function () {
        $this= $(this);
        $('.tab-item a').removeClass('active');
        $this.find('a').addClass('active');
        $content_div_id = $this.attr('data-tab-index');
        $('.tabs-content-item').hide();
        $('#' + $content_div_id).fadeIn();

    });
    $('#load_more_btn').click(function (){
        let $search_section = jQuery('#lbs_books_search_wrapper #lbs_books_result');
        let $form = jQuery('#lbs_books_search_wrapper #lbs_search_form').serialize();
        let $send_data = {action: 'lbs_fetch_search_result', _wpnonce: lbs_frontend_object.wpnonce, search_data: $form,};
        jQuery.ajax({
            type: 'POST',
            url: lbs_frontend_object.ajaxurl,
            data: $send_data,
            beforeSend: function (xhr) {
                $search_section.block({message: null, overlayCSS: {background: '#fff', opacity: 0.6}});
            },
            success: function (response) {
                $search_section.unblock();
                $search_section.html($($.parseHTML(response.data.html)).filter("#lbs_books_result").html());
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}, jQuery);
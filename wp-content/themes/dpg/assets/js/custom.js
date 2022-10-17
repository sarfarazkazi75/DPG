jQuery( document ).ready(function($) {
	// Menu Open
	$(".menu-icon").click(function(){
  		$("body").toggleClass("menu-open");
	});
	// Search Open
	$(".search-button").click(function(){
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
});
jQuery( document ).ready(function($) {
	$(".menu-icon").click(function(){
  		$("body").toggleClass("menu-open");
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
});
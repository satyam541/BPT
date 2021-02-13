
    //Start Fixed header
    window.onscroll = function () {
        myFunction()
    };
    var header = $("#fixheader");
    var sticky = header.offsetTop;

    function myFunction() {
        if ($(this).scrollTop() > 400 && $(this).width() >= 320) {
            header.addClass("sticky").addClass("sticky-down").removeClass("sticky-up");
        } else {
            header.removeClass("sticky").addClass("sticky-up").removeClass("sticky-down");
        }
    }
    //End Fixed header 
    
     //Start Toggle menu//
     function toggleMenu() {
        event.stopPropagation();
        $("#menuToggle").toggleClass('active');
    }
    //End Toggle menu//
    //Start Testimonial//
    $('.owl-carousel').owlCarousel({
        loop: true,
        responsiveClass: true,
        dots: true,
        nav: true,
        autoplay: true,
        navText: ["", ""],
        items: 1,
        responsive: {
            0: {
                items: 1,
            }
            
        }
        

    });
    $('.owl-next').addClass("btn-active");
    $('.owl-prev,.owl-next').click(function () {
        $(this).addClass("btn-active").siblings().removeClass("btn-active");
    });
    // End Testimonial//
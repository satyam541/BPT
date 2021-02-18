
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
    $('.topic-list').owlCarousel({
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

       //Start aboutus Testimonial//
       $('.testimonial-content').owlCarousel({
        loop: true,
        responsiveClass: true,
        dots: false,
        nav: true,
        autoplay: true,
        navText: ["", ""],
        responsive: {
            0: {
                items: 1,
            },
            768: {
                items: 2,
            }
        }
        

    });
    $('.owl-next').addClass("btn-active");
    $('.owl-prev,.owl-next').click(function () {
        $(this).addClass("btn-active").siblings().removeClass("btn-active");
    });
    // End aboutus Testimonial//

    //Start Testimonial//
    $('.testimonial-list').owlCarousel({
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

    // Start FAQ
   $(".faq-item").click(function () {
    $(this).toggleClass("active");
    $(this).find('.ans').slideToggle();
    $(this).siblings(".faq-item").removeClass("active").find('.ans').slideUp();
});

// End FAQ

circleProgress();
function circleProgress(){
    setProgress(98,$('.difference-list .first'));
    setProgress(86,$('.difference-list .second'));
    setProgress(92,$('.difference-list .third'));
    setProgress(94,$('.difference-list .fourth'));
}
function setProgress(percent, svg,radius=45) {
    var circumference = radius * 2 * Math.PI;
    var firstcircle = svg.find('circle').last();
    firstcircle.css('strokeDasharray', `${circumference}`);
    firstcircle.css('strokeDashoffset', `${circumference}`);
    const firstoffset = circumference - percent / 100 * circumference;
    firstcircle.css('strokeDashoffset' , firstoffset);
    var span = document.createElementNS('http://www.w3.org/2000/svg', 'text');
    span.setAttribute('x', radius-12);
    span.setAttribute('y', radius+12);
    span.setAttribute('fill', '#000');
    span.textContent=percent+"%";
    svg.append(span);
}
    
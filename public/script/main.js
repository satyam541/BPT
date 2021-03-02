
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
    

      //Start Smoothscroll
        $('.smoothscroll').on('click', function (e) {
            e.preventDefault();
            var hash = $(this).data('href');
            if (hash !== "") {
                event.preventDefault();
                var top = $(hash).offset().top;
                var newtop = (top - 80);
                window.location.hash = hash;
                $('html, body').animate({
                    scrollTop: newtop
                }, 1200);
            }
        });
    //End Smoothscroll
    
     //Start Toggle menu//
     function toggleMenu() {
        event.stopPropagation();
        $("#menuToggle").toggleClass('active');
    }
    //End Toggle menu//

    // Start Foundation Script
    $('.showmorecontent').click(function(event) {
        event.preventDefault();
        var id = $(this).attr('href');
        $(id).toggleClass('toggle', 'slow');
        
        if($(id).hasClass("toggle")) {  
            $(this).find('.text').html(" Show Less");       
        } else {
            $(this).find('.text').html(" Show More");
            scrollToSpecificDiv("#overview");
        } 
    });
    // End Foundation Script

    //Start Delivery method script//
   $(".tab-content").hide();
   $(".tab-content").first().css("display", "flex");
   $(".tab-click").click(function () {
      var target = $(this).data("target");
      $(".tab-content").hide();
      $("#" + target).css("display", "flex");
      $(".tab-click").removeClass('active');
      $(this).addClass("active");
   });
 //End Delivery method script//
    
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
    $('.testimonial-list' ).owlCarousel({
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

    
    //Start home Testimonial//
    $('.reviews-outer').owlCarousel({
        loop: true,
        responsiveClass: true,
        dots: false,
        nav: false,
        autoplay: true,
        navText: ["", ""],
        items: 1,
        responsive: {
            0: {
                items: 1,
            },
            1024: {
                nav: true,
            }
            
        }

    });
    $('.owl-next').addClass("btn-active");
    $('.owl-prev,.owl-next').click(function () {
        $(this).addClass("btn-active").siblings().removeClass("btn-active");
    });
    // End home Testimonial//

    //Start Catalouge Testimonial//
    $('.testi-list').owlCarousel({
        loop: true,
        responsiveClass: true,
        dots: false,
        nav: true,
        autoplay: true,
        navText: ["", ""],
        items: 1,
        responsive: {
            0: {
                items: 1,
            },

            1024: {
                items: 2,
            }
            
        }
    });
    $('.owl-next').addClass("btn-active");
    $('.owl-prev,.owl-next').click(function () {
        $(this).addClass("btn-active").siblings().removeClass("btn-active");
    });
    // End Catalouge Testimonial//

    // Start FAQ
   $(".faq-item").click(function () {
    $(this).toggleClass("active");
    $(this).find('.ans').slideToggle();
    $(this).siblings(".faq-item").removeClass("active").find('.ans').slideUp();
});

// End FAQ

// circleProgress();
// function circleProgress(){                                                              
//     setProgress(98,$('.circle .first'));
//     setProgress(86,$('.circle .second'));
//     setProgress(92,$('.circle .third'));
//     setProgress(94,$('.circle .fourth'));
// }

circleProgress();
function circleProgress(){
    setProgress(98,$('.circle .first'),45);
    setProgress(86,$('.circle .second'),45);
    setProgress(92,$('.circle .third'),45);
    setProgress(94,$('.circle .fourth'),45);
    setProgress(55,$('.circle .topic-first'),45);
    setProgress(75,$('.circle .topic-second'),45);
}
function setProgress(percent, svg, radius) {
var circumference = radius * 2 * Math.PI;
var firstcircle = svg.find('circle').last();
firstcircle.css({'strokeDasharray':circumference});
firstcircle.css('strokeDashoffset',circumference);
const firstoffset = circumference - ((percent / 100) * circumference);
firstcircle.css('strokeDashoffset' , firstoffset + 12);
var span = document.createElementNS('http://www.w3.org/2000/svg', 'text');
span.setAttribute('x', radius-12);
span.setAttribute('y', radius+12);
span.setAttribute('fill', '#000');
span.textContent=percent+"%";
svg.append(span);
}


//enquiry form consent check
function checkConsent(button)
{
    var form = button.closest('form');
    var checkbox = $(form).find("input[name='contactConsent']");
    if(checkbox.length == 0)
    {
        console.log('contact consent field not found');
        return false;
    }
    var error = checkbox.closest('form').find('.consent-error');
    if(checkbox.is(":checked"))
    {
        error.hide();

        $(this).find('form').submit();
        
        return true;
    }
    error.show();
    console.log('contact consent is not checked');
    event.preventDefault();
    return false;
}


 //phone code start

$.ajax({
    url: countryjsonurl,
    type:'get',
    dataType: 'json',
    success: function(response)
    {
        var options = "";
        $.each(response, function(index, value){
            options += "<option data-index="+index+' value="'+value.code+'" data-phone-code="'+value.dial_code+'" data-country-id="'+index+'" data-country-name="'+value.name+'">'+value.code+'&emsp;&emsp; - &emsp;&emsp;'+value.name+'</option>';
        });
        $('select.country-code').html(options).trigger('change');
    }
});
 
$("select.country-code").on('change', function(e){
    var phonecode = $(this).find(':selected').data('phone-code');
    $(this).closest('.phonecode-field').find('span.prefix').text(phonecode);
    var prefix = $(this).closest('.phonecode-field').find('span.prefix').text();
    $(this).closest('.phonecode-field').find('input.telephone').val('').trigger('change');
    $(this).closest('.phonecode-field').find('input.phonenumber').val(prefix);
    $(this).closest('.phonecode-field').find('input.phonecode').val(phonecode);
});
$('input.telephone').on('focusout', function(event){
    var prefix = $(this).closest('.phonecode-field').find('span.prefix').text();
    var phonecode =  $(this).closest('.phonecode-field').find(':selected').data('phone-code');
    var data = $(this).val();
    if(data.startsWith('0'))
    {
        data = data.substring(1,data.length);
    }
    var number = prefix + data;
    $(this).closest('.phonecode-field').find('input.phonenumber').val(number);
    $(this).closest('.phonecode-field').find('input.phonecode').val(phonecode);
});

 //phone code end

// honeytrap start
 function addInputField()
 {
         $.each($('form'), function(index, form){
             $(form).append('\
         <div style="visibility:hidden;pointer-events:none;width:0;height:0;position:absolute;top:-9999px;left:-9999px;z-index:-1;">\
             <input type="text" name="email_address" class="email"  tabindex="-1">\
         </div>\
         ');
         });
 }
 $(document).ready(addInputField());

//  honeytrap end
    

//Start home blog-detail Testimonial//

$('.blog-review').owlCarousel({
    loop: true,
    responsiveClass: true,
    dots: false,
    nav: true,
    autoplay: true,
    navText: ["",""],
    items: 1,
    responsive: {
        0: {
            items: 1,
        }
    }

});

//End  home blog-detail Testimonial//

//Start pop-up//
$(".open-popup").on("click", function(){
    $(".enquiry-popup").css("display","flex");
});
$(".cross").on("click", function(){
    $(".enquiry-popup").css("display","none");
});
$('body').on('click',function(e){
    var element = event.target;
    if($(element).closest(".popup,.open-popup").length > 0)
    {
        return true;
    }
});
// End pop-up//

    //start Load more // 

    $(".hide").slice(0, 2).show();
    $("#loadMore").on('click', function (e) {
        e.preventDefault();
        $(".hide:hidden").slice(0, 2).slideDown();
        if ($(".hide:hidden").length == 0) {
            $(this).text("No More"); 
        }
    });

    // End load more //



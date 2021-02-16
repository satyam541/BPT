var URL = window.location.origin;

$(document).ready(function() {

    
    $('#overlays, .callus').click(function () {
        $('#overlays').removeClass("nav-add-overlay");
    });
    $('.finder').click(function() {
        $('#overlays').toggleClass("nav-add-overlay");
    });

    /* Show More - Show Less ------------------------------------------------ */

    calculateShowMoreDiv();
    function calculateShowMoreDiv() {       
        $(".text-toggle").each(function() {
            var textDivHeight = $(this).height();   
        
            if(textDivHeight >= 250){
                $(this).next(".moreless").css("display","block");
            } else{         
                $(this).addClass('toggle');      
                $(this).next(".moreless").css("display","none");
            }
        });
    }
    $(".ui-accordion-header").click(function() {
       calculateShowMoreDiv();
    });

    $('.action-toggle').click(function(event) {
        event.preventDefault();
        var id = $(this).attr('href');
        $(id).toggleClass('toggle');
        
        if($(id).hasClass("toggle")) {   
            $(this).addClass('show-less');
            $(this).html("Show Less <i class='fa fa-chevron-up'></i>");
        } else {
            $(this).removeClass('show-less');
            $(this).html("Show More <i class='fa fa-chevron-down'></i>");
        } 
    });

    $(".search-btn").click(function(e) {    

         var course = $(".courseDisplayName option:selected").text();;
         if(course=='') {
            e.preventDefault();
            $(".courseDisplayName").select2("open");
         }
    });
   

    // Image Modal Box
    $('.about-program img, .faqs img, .contentdivision img').addClass('zoomImg');

    var modal1 = document.getElementById('imgModal');

    $('.zoomImg').click(function() {
      
      $('#imgModal').css("display","block");
      $('#zoomedImg').attr('src',this.src);
      $('#caption').html(this.alt);

    });

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() { 
        modal1.style.display = "none";
    }

    // Carousel ----------------------------------------------- 


    $('.owl-carousel').owlCarousel({
      loop:true,
      slideSpeed: 8000,
      navText: ['<img src="images/icons/nav-left.png" />', '<img src="images/icons/nav-right.png" />'],
      autoplay: true,
      autoplaySpeed:3000,
      autoplayHoverPause:true,
      autoHeightClass: 'myowl-height',
      margin:0,
      responsiveClass:true,
      responsive:{
        0:{
          items:1,
          nav:true
        },
        600:{
          items:1,
          nav:false
        },
        1000:{
          items:1,
          nav:true,
        }
      }
    });

    // Accordian

  var icons = {
    header: "iconClosed",    // custom icon class
    activeHeader: "iconOpen" // custom icon class
  };

  $( ".accordion" ).accordion({
    icons: icons,
    heightStyle: "content",
    collapsible: true,
  });


    $('#map').css('pointer-events', 'none');
    $('.map').click(function(e) {
        $('#map').css('pointer-events', 'all');
    }).mouseleave(function(e) {
        $('#map').css('pointer-events', 'none');
    });

// Course page scripts ---------------------------------------------


    $("#scroll-to a").click(function() {
        $("#scroll-to a").removeClass("active");
        $(this).addClass("active");
    });

    /* Smooth Scroll ------------------------------------------------------ */

    $("#goto, #goto2, #goto3, #goto4, #goto5, #goto6, #goto1, #goto7,#goto8, #goToTop, #sm1, #sm2, #sm3, #sm4, #sm5").on('click', function(event) 
    {
        event.preventDefault();
        var hash = this.hash;    
        $('html, body').animate({ scrollTop: $(hash).offset().top-55 }, 800, 
            function() { window.location.hash = hash; });

    });

    

    // Search Scripts ---------------------------------------------

$(".hslug").val(''); // clear if has any value

$(".select2courses").select2({
      placeholder: "Find your training course...",
      tags: true,
      ajax: {
        url: URL+"/autocomplete/courses",
        dataType: 'json',
        delay: 250,
        data: function (params) {
          return {
            q: params.term, // search term
          };
        },
        processResults: function (data) {
          return {
                results: $.map(data, function (item) {

                    $(".hslug").val(item.slug);
                    return {
                        text: item.value,
                        id: item.id,
                        slug: item.slug
                    }
                })
            }
        },
        cache: false
      }
    });


    $(".select2courses").on("select2:open", function (e) { 
       $(this).closest('li.open > .dropdown-menu').css('display','block');
    });

    $(".select2courses").on("select2:close", function (e) { 

        var select2data=$(this).select2('data')[0];
        var hslug = select2data.slug;

        $('.courseDisplayName').find('option').each(function(i,e){
            var textattr = $(this).attr('data-select2-tag');
           
            if(textattr && hslug == undefined) {
                var text = $(this).text();
                $('.select2courses').val(text).select2();
            }
        });
    });
    $(".select2courses.crs").on("select2:select", function (e) {

        var select2data=$(this).select2('data')[0];
        var hslug = select2data.slug;
        var course = $(".courseDisplayName option:selected").text();
        if(hslug != undefined) {
            if(hslug != course) { 
                $(".hslug").val(hslug);  
                window.location.href=URL+'/'+hslug;  
            } 
        }
          
    });

    $('.select2courses.crs').on("change", function(e) {

        var select2data=$(this).select2('data')[0];
        var hslug = select2data.slug;
        var course = $(".courseDisplayName option:selected").text();
        if(hslug != undefined) {
            if(hslug != course) {
                $(".hslug").val(hslug);    
                window.location.href=URL+'/'+hslug;
            } 
        }
        $(this).closest('form').submit();

    }); 


    $(".select2courses.loc").on("select2:select", function (e) { 
        var select2data=$(this).select2('data')[0];
        var hslug = select2data.slug;
        $(".hslug").val(hslug); 
    });

    $('.locSearch').submit(function(e){
        var course = $(".courseDisplayName option:selected").text();
        var venue =  $(this).find("select[name='venue']").val().toLowerCase();

        // if only venue entered
        if(course == '' & venue != ''){
            e.preventDefault();
            $('.hslug').val('');   
            window.location.href=URL+'/locations/'+venue;
        }

        var select2data=$(this).find(".select2courses.loc").select2('data')[0];
        var hslug = select2data.slug;      

        if(hslug == undefined & course !='') {
            return;
        }else if(hslug != course) {       
            e.preventDefault();
            urlParam = hslug;
            if(venue != ''){
                urlParam += '/'+venue;
            }
            window.location.href=URL+'/'+urlParam;
        } 

    });

    // Contact Form Scripts ---------------------------------------------

    $('.enquiryForm').on('submit',function(e){ 
        var formValues = $(this).serialize();

         $('.loading-image-eq').show();
         $.ajax({
            url: URL+"/enquiry",
            type: "post",
            dataType : "JSON",
            data: formValues,
            success: function(data)
            {  
               $.each(data, function(key, value) {
                    if(key == 'Errors') {
                        var errors = '';
                        $.each(value, function(i) {
                            errors += '<li>'+value[i]+'</li>';
                        })
                        $('.alert-danger').html('<ul>'+errors+'</ul>');
                        $('.alert-danger').show();
                    }

                    if(key == 'MailError') {
                        $('.alert-danger').html('<ul><li>'+value+'</li></ul>');
                        $('.alert-danger').show();
                    }

                    if(key == 'Success') {

                        $('.enquiryForm').hide();
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.success').show();
                    }
                }) 
            },
            complete: function(){
                $('.loading-image-eq').hide();
            },
            error: function() {
                $('.alert-danger').html('Sorry, Please try again later !');
                $('.alert-danger').show();
            }
        });
         return false;
    });

    $('#modalForm').on('submit',function(e){ 
        var formValues = $(this).serialize();

        $('.loading-image-eq').show();

         $.ajax({
            url: URL+"/enquiry",
            type: "post",
            dataType : "JSON",
            data: formValues,
            success: function(data)
            {      
               $.each(data, function(key, value) {
                    if(key == 'Errors') {
                        var errors = '';
                        $.each(value, function(i) {
                            errors += '<li>'+value[i]+'</li>';
                        })
                        $('.alert-danger').html('<ul>'+errors+'</ul>');
                        $('.alert-danger').css('display','block');
                    }

                    if(key == 'MailError') {
                        $('.alert-danger').html('<ul><li>'+value+'</li></ul>');
                        $('.alert-danger').css('display','block');
                    }

                    if(key == 'Success') {
                        $("#modalForm").css('display','none');
                        $('.alert-danger').css('display','none');
                        $('.success').css('display','block');
                    }
                })    
            },
            complete: function(){
                $('.loading-image-eq').hide();
            },
            error: function() {
                $('.alert-danger').html('Sorry, Please try again later !');
                $('.alert-danger').css('display','block');
            }
        });
         return false;
    });


    $('.onsiteForm').on('submit',function(e){ 
        var formValues = $(this).serialize();

        $('.loading-image-eq').show();
         $.ajax({
            url: URL+"/onsiteenquiry",
            type: "post",
            dataType : "JSON",
            data: formValues,
            success: function(data)
            {  
               
               $.each(data, function(key, value) {
                    if(key == 'Errors') {
                        var errors = '';
                        $.each(value, function(i) {
                            errors += '<li>'+value[i]+'</li>';
                        })
                        $('.onsite-alert').html('<ul>'+errors+'</ul>');
                        $('.onsite-alert').show();
                    }

                    if(key == 'MailError') {
                        $('.onsite-alert').html('<ul><li>'+value+'</li></ul>');
                        $('.onsite-alert').show();
                    }

                    if(key == 'Success') {

                        $('.onsiteForm').hide();
                        $('.onsite-alert').hide();
                        $('.onsite-success').show();
                    }
                }) 
            },
            complete: function(){
                $('.loading-image-eq').hide();
            },
            error: function() {
                $('.onsite-alert').html('Sorry, Please try again later !');
                $('.onsite-alert').show();
            }
        });
         return false;
    });


    $('.filterdates').click(function(){ 
        $('.datesbox').each(function() {
                $(this).show();
            });
        $('.filterdates').each(function() {
            var fid = $(this).attr('id');

            if(!$(this).is(':checked')) {
                $('#filter-'+$(this).attr('id')).hide();        
            }

        });
    });


           
}); // document ready


function filterSchedules(venueName,courseSlug,csrfToken) {
    
     //$('.loading-image-eq').show();
     window.location.href = URL+'/'+courseSlug+'/'+venueName+'#schedules';
}

function showScheduleEntries(entries,courseSlug,courseId,csrfToken) {

        $.ajax({
        url: URL+"/courses/showScheduleEntries",
        type: "post",
        data:{
            entries: entries,
            courseId: courseId,
            _token: csrfToken
        },
        success: function(data)
        {  
             window.location.href = URL+'/'+courseSlug+'#schedules';
             location.reload();
             
        }
    });
}



// Location page scripts ---------------------------------------------

function filterByAlpha(alphabet) {
    var alphabets = $('.alphabets > li');
    var contentRows = $('.contentRows');
    var contentRow = $('.contentRows .contentRow a');
    var contentAdd = $('.contentAdd');
    
    alphabets.removeClass("active");
    $("#"+alphabet).addClass("active");
    
    contentRows.hide();
    contentAdd.html('');
    $(contentRow).each(function(){
        var current = $(this).find('.loc-text').text();
    
        if (RegExp('^'+alphabet).test(current) || alphabet == 'all') {
            var link = $(this).attr('href');
            var content = '<div class="locationBtn text-left contentRow"><a href="'+link+'" title="View '+current+' Details"><span class="loc-icn"><img src="'+URL+'/images/icons/destination-point.png" alt="Location"></span><span class="loc-text">'+current+'</span><span class="loc-icn-arw"><img src="'+URL+'/images/icons/arrow-right-w.png" class="arw1"><img src="'+URL+'/images/icons/arrow-right.png" class="arw"> </span></a></div>';     
            contentAdd.html(contentAdd.html()+content);
        }
    });

    if(contentAdd.html() == '') { contentAdd.html('<p>Sorry, There are no locations starting with '+alphabet+'.</p>'); }
}

function filterlocations(keyword) {
    filter = keyword.toUpperCase();
    var contentRows = $('.contentRows');
    var contentRow = $('.contentRows .contentRow a');
    var contentAdd = $('.contentAdd');

    contentRows.hide();
    contentAdd.html('');
    $(contentRow).each(function(){
        var current = $(this).find('.loc-text').text();
            
        if (current.toUpperCase().indexOf(filter) > -1) {
            var link = $(this).attr('href');
            var content = '<div class="btn-loc col-sm-4 col-md-3 text-left contentRow"><a href="'+link+'" title="'+current+'"><i class="fa fa-globe"></i> <span class="loc-text">'+current+'</span></a></div>';    
            contentAdd.html(contentAdd.html()+content);
        }
    });

    if(contentAdd.html() == '') { contentAdd.html('<p>Sorry, There are no locations starting with '+alphabet+'.</p>'); }

}

$(document).ready(function() {

  var icons = {
    header: "iconClosed",    // custom icon class
    activeHeader: "iconOpen" // custom icon class
  };

  $( ".accordion" ).accordion({
    icons: icons,
    heightStyle: "content",
    collapsible: true
  });

  $('.owl-carousel').owlCarousel({
    loop:true,
    slideSpeed: 8000,
    navText: ['<img src="images/icons/nav-left.png" />', '<img src="images/icons/nav-right.png" />'],
    autoplay: true,
    autoplaySpeed:3000,
    autoplayHoverPause:true,
    autoHeightClass: 'myowl-height',
    margin:0,
    responsiveClass:true,
    responsive:{
      0:{
        items:1,
        nav:true
      },
      600:{
        items:1,
        nav:false
      },
      1000:{
        items:1,
        nav:true,
      }
    }
  });



});



function initializeMap(locations,mapmarker,zoom,country,infobox) {

  var address;
  if(country != '') address= country;
  else address = locations[0][3];

  var myOptions = {
    zoom: zoom,
    scrollwheel: false,
    center: new google.maps.LatLng(locations[0][1], locations[0][2]),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#55575b"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"color":"#55575b"}]}]
  };

  var map = new google.maps.Map($('#map')[0],myOptions);
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode( { 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          icon: mapmarker,
          animation: google.maps.Animation.DROP, map: map });

        google.maps.event.addListener(marker, 'mouseover', (function (marker, i) { return function () {
           infowindow.setContent("<div class='iw-container'><div class='iw-title'>Office Address</div><div class='iw-content'><div class='address'><span class='left'>Address:</span> <span>"+locations[i][3]+"</span></div><div class='phone'><span class='left'>Telephone: </span>"+locations[i][4]+"</div><div class='email'><span class='left'>Email: </span> "+locations[i][5]+"</div></div>");
          infowindow.open(map, marker);
        } })(marker, i));

        google.maps.event.addListener(marker, 'mouseout', (function (marker, i) { return function () {
          infowindow.setContent(''); infowindow.close(map, marker);
        } })(marker, i));

        if(infobox == 1) {
          infowindow.setContent("<div class='iw-container'><div class='iw-title'>Office Address</div><div class='iw-content'><div class='address'><span class='left'>Address:</span> <span>"+locations[i][3]+"</span></div><div class='phone'><span class='left'>Phone: </span><span> "+locations[i][4]+"</span></div><div class='email'><span class='left'>, Email: </span> <span> "+locations[i][5]+"</span> </div></div>");
          infowindow.open(map, marker);
        }

        google.maps.event.addListener(infowindow, 'domready', function() {

          var iwOuter = $('.gm-style-iw');
          var iwBackground = iwOuter.prev();
          iwBackground.children(':nth-child(2)').css({'background' : 'rgba(255,255,255,0.8)','border-radius': '20px'});
          iwBackground.children(':nth-child(4)').css({'background' : 'rgba(255,255,255,0.8)','border-radius': '20px'});
        });

      }
    }
  });
}

// Modal Box Scripts ---------------------------------------------
function resetForm(formType,courseName,additionalData,addText) {

  if(courseName == undefined) {  courseName = ''; }
  if(additionalData == undefined) {  additionalData = ''; }
  if(addText == undefined) {  addText = ''; }

  $('#modalForm').css('display','block');
  $('#myModal .alert-danger').css('display','none');
  $('#myModal .success').css('display','none');
  $('#modalForm').trigger("reset");
  $('#formType').val(formType);
  $('#courseName').val(courseName);
  $('#enquiry-text').text("");

  if(formType == 'Request CallBack') {
    $('#myModalLabel').html('Request <span>Callback</span>');
    $('#modalButton').html('<span>Submit Request</span>');
  }else if(formType == 'Get a Quote') {
    $('#myModalLabel').html('Get a<span> Quote</span>');
    $('#modalButton').html('<span>Submit Request</span>');
  }else {
    $('#myModalLabel').html('Have a Query?');
    $('#modalButton').html('Submit Your Message<i class"fa fa-long-arrow-right"></i>');
    if(formType == 'Schedule') {
      $('#schedule').val(additionalData);
    } else if(formType == 'Online Course' || formType == 'Online Course Booking') {
      $('#package').val(additionalData);
    } else if(formType == 'Bundle') {
        $('#courseId').val(additionalData);
    }

    if(courseName != '') {
      if(addText != '') addText = ", "+addText;
      $('#enquiry-text').text("Enquiry For "+courseName+addText);
    }
  }
}
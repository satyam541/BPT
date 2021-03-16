<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ metaData('title') }}</title>
    <meta name="description" content="{{ metaData('description') }} " />
    <meta name="keyword" content="{{ metaData('keyword') }}" />
    @if (request()->has('page') || request()->has('month'))
        <meta name="robots" content="noindex, nofollow" />
    @endif
    @if (preg_match('/[A-Z]/', request()->url()))
        <meta name="robots" content="noindex" />
    @endif
    <meta name="token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ url('style/country-select.css') }}">
    <link rel="stylesheet" href="{{ url('style/main.css') }}">
    <link rel="stylesheet" href="{{ url('style/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('style/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="{{ url('jqueryautocomplete/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ url('style/fontawesome.css') }}">

    @yield('header')
</head>

<body>
    @yield("content")
    <footer class="flex-container footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-content">
                    <div class="content">
                        <img src="{{ footer()->footer['heading']->getImagePath() }}" alt="white-logo"
                            class="logo-image">
                        <p>{{ footer()->footer['heading']->content }}</p>
                        <div class="social-media">
                            <p>Follow Us On:</p>
                            <a href="{{ socialmedialinks()->where('website', 'Facebook')->first()->link ?? '' }}">
                                <img src="{{ url('img/master/facebook.svg') }}" alt="facebook">
                            </a>
                            <a href="{{ socialmedialinks()->where('website', 'Twitter')->first()->link ?? '' }}">
                                <img src="{{ url('img/master/twitter.svg') }}" alt="twitter">
                            </a>
                            <a href="{{ socialmedialinks()->where('website', 'Google')->first()->link ?? '' }}">
                                <img src="{{ url('img/master/google-plus.svg') }}" alt="google-plus">
                            </a>
                            <a href="{{ socialmedialinks()->where('website', 'Linkedin')->first()->link ?? '' }}">
                                <img src="{{ url('img/master/linked-in.svg') }}" alt="linked-in">
                            </a>
                        </div>
                    </div>
                    <div class="content links">
                        <div class="heading">
                            <h2>Useful Links</h2>
                        </div>
                        <ul>
                            <li><a href="{{ route('privacy-policy') }}"><img
                                        src="{{ url('img/master/right-arrow.svg') }}" alt="right-arrow">Our Privacy
                                    Policy</a></li>
                            <li><a href="{{ route('terms-and-conditions') }}"><img
                                        src="{{ url('img/master/right-arrow.svg') }}" alt="right-arrow">Terms &
                                    Conditions</a></li>
                            <li><a href="{{ route('third-party') }}"><img
                                        src="{{ url('img/master/right-arrow.svg') }}" alt="right-arrow">Third Party
                                    Trademarks</a></li>
                            <li><a href="{{ route('cookies') }}"><img src="{{ url('img/master/right-arrow.svg') }}"
                                        alt="right-arrow">Cookies</a></li>
                            <li><a href="{{ route('onsite') }}"><img src="{{ url('img/master/right-arrow.svg') }}"
                                        alt="right-arrow">Onsite</a></li>
                        </ul>
                    </div>
                    <div class="content blog">
                        <div class="heading">
                            <h2>Recent Blogs</h2>
                        </div>
                        <ul>
                            @foreach (blogs()->take(3) as $blog)
                                <li><img src="{{ url('img/master/polygon.svg') }}" alt="polygon" class="polygon-img">
                                    <a
                                        href="{{ route('blogDetail', ['blog' => $blog->reference]) }}">{{ $blog->title }}</a>
                                    <span>
                                        <img src="{{ url('img/master/time.svg') }}" alt="time">
                                        <p class="date">{{ $blog->post_date }}</p>
                                    </span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    {{-- {{dd(websiteDetail())}} --}}
                    <div class="content contact-us">
                        {{-- {{dd(blogs())}} --}}
                        <h2>Contact Info</h2>
                        <ul>
                            <li><img src="{{ url('img/master/white-call.svg') }}" alt="call">
                                <a
                                    href="tel:{{ websiteDetail()->contact_number }}">{{ websiteDetail()->contact_number }}</a>
                            </li>
                            <li><img src="{{ url('img/master/white-email.svg') }}" alt="email">
                                <a
                                    href="mailto:{{ websiteDetail()->contact_email }}">{{ websiteDetail()->contact_email }}</a>
                            </li>
                            <li><img src="{{ url('img/master/location.svg') }}" alt="location">
                                <p>{{ websiteDetail()->address }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <p class="terms">{{ websiteDetail()->copyright_footer }}</p>
            </div>
        </div>
    </footer>
    <section class="flex-container enquiry-popup">
        <div class="enquire-popup">
            <span class="cross"><img src="{{ url('img/master/cross.svg') }}" alt="name"></span>
            {{-- <form class="form" id="popup"> --}}
            <form class="form bestpracticetraining.com-hubspot" onsubmit="submitEnquiry(this)" id="contact-us">
                @csrf

                <div class="heading center-heading">
                    <h2 id="quote">Get A Quote</h2>
                </div>
                <div class="form-input">
                    <div class="input-container">
                        <span><img src="{{ url('img/contactus/name.svg') }}" alt="name" class="black">
                            <img src="{{ url('img/contactus/name-red.svg') }}" alt="name-red" class="red"></span>
                        <input type="text" name="name" id="f-name" placeholder="Name*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{ url('img/contactus/phone-call.svg') }}" alt="phone-call" class="black">
                            <img src="{{ url('img/contactus/phone-callred.svg') }}" alt="phonecall-red"
                                class="red"></span>
                        <!-- <input type="number" name="phone" id="phone" placeholder="Phone Number*" autocomplete="off"> -->
                        <div class="phonecode-field field-black">
                            <select class="country-code"></select>
                            <span class="prefix"></span>
                            <input type="number" class="telephone" placeholder="Phone Number*" min=0>
                            <div style="z-index:-1;width:0;height:0;pointer-events: none;">
                                <input type="text" name="phone" class="phonenumber" tabindex="-1">
                            </div>
                        </div>
                    </div>
                    <div class="input-container">
                        <span><img src="{{ url('img/contactus/email.svg') }}" alt="email" class="black">
                            <img src="{{ url('img/contactus/email-red.svg') }}" alt="email-red" class="red"></span>
                        <input type="text" name="email" id="email" placeholder="Email*" autocomplete="off">
                    </div>
                    <div class="input-container">
                        <span><img src="{{ url('img/master/house-black.svg') }}" alt="email" class="black">
                            <img src="{{ url('img/master/house-red.svg') }}" alt="email-red" class="red"></span>
                        <input type="text" name="company" id="company" placeholder="Company Name"
                            autocomplete="off">
                    </div>
                    <div class="input-container message">
                        <span><img src="{{ url('img/contactus/comment.svg') }}" alt="comment" class="black">
                            <img src="{{ url('img/contactus/comment-red.svg') }}" alt="comment-red" class="red"></span>
                        <textarea placeholder="Message (Optional)" id="message" name="message"></textarea>
                    </div>
                    <div class="form-consent">
                        <p>The information you provide shall be processed by Best Practice Training Limited – a
                            professional training organisation. Your data shall be used by a member of staff to contact
                            you regarding your enquiry.
                        </p>
                    </div>
                    <div class="form-consent">
                        <p>Please click <a>here</a> for privacy policy. </p>
                    </div>
                    <div class="form-consent">
                        <input type="checkbox" id="checkConsent" name="contactConsent">
                        <label for="checkConsent">By submitting this enquiry I agree to be contacted in the most
                            suitable manner (by phone or email) in order to respond to my enquiry.</label>
                    </div>
                    <div class="consent-error" style="display: none;">
                        <p>We cannot process your enquiry without contacting you, please tick to confirm you
                            consent to us contacting you about your enquiry</p>
                    </div>
                    <div class="form-consent">
                        <input type="checkbox" name="marketing_consent" id="allowconsent">
                        <label for="allowconsent">Click here to sign up to our email marketing, offers and
                            discounts</label>
                    </div>
                    <div id="hiddenFields">

                    </div>
                    <div class="buttons">
                        <button class="btn-blue" onclick="EnquiryFormSubmit('enquiry',this)">Submit</button>
                        {{-- <button class="btn-blue">Submit</button> --}}
                    </div>
            </form>
        </div>
    </section>
    <section class="flex-container bottom-bar">
        <div class="container">
            <div class="bottom-list">
                <a href="{mailto:{{ websiteDetail()->contact_number }}" class="email">
                    <img src="{{ url('img/master/email-white.png') }}" alt="mail">
                </a>
                <a href="javascript:void(0);" class="search-btn search" id="mobile-search">
                    <img src="{{ url('img/master/search-white.png') }}" alt="search">
                </a>
                <a href="{{ route('cart') }}" class="cart">
                    <img src="{{ url('img/master/cart-white.png') }}" alt="cart">
                </a>
                <a href="tel:{{ websiteDetail()->contact_number }}" class="call">
                    <img src="{{ url('img/master/call.png') }}" alt="call">
                </a>
            </div>
        </div>
    </section>
    <nav class="tooltips">
        <ul>
            <li><a href="tel:{{ websiteDetail()->contact_number }}">{{ websiteDetail()->contact_number }}<img
                        src="{{ url('img/master/phone-ringing.svg') }}" alt="phone-ringing"></a></li>
            <li><a class="open-popup enquiryJS">Enquiry<img src="{{ url('img/master/mail.svg') }}" alt="mail"></a></li>
            <li><a class="open-popup enquiryJS">Request Callback</a><img
                    src="{{ url('img/master/phone-contact.svg') }}" alt="phone-contact"></li>
        </ul>
    </nav>
    <a class="up-arrow smoothscroll" id="scroll" data-href=".banner">
        <img src="{{ url('../img/master/up-arrow.svg') }}" alt="up-arrow">
    </a>

    <div class="cookie-div" id="footerCookie">
        <p>To give you the best possible experience, this site uses cookies. Continuing to use this site means that you
            agree to our use of cookies. <a>Click here to see our cookie policy</a></p>

        <div class="buttons">
            <button class="btn-white" onclick="storecookie()">Ok, I Accept</button>
        </div>
    </div>


    <div class="pop-search" id="pop-mobile">
        <span class="search-close"><img src="{{ url('img/master/cross.svg') }}" alt="name"></span>
        <form class="search-form" onsubmit="getquery(this)">
            <h2>Search <span>our</span> courses and <span>solutions</span></h2>
            <div class="search">
                <input type="text" placeholder="Search your course here...." autocomplete="off"
                    class="auto-complete-course auto-redirect">
                <button onclick="getquery(this)">
                    Search
                </button>
            </div>
        </form>
    </div>
    <div class="scene">
  <svg 
  version="1.1" 
  id="dc-spinner" 
  xmlns="http://www.w3.org/2000/svg" 
  x="0px" y="0px"
  width:"38"
  height:"38"
  viewBox="0 0 38 38" 
  preserveAspectRatio="xMinYMin meet"
  >
  <text x="14" y="21" font-family="Monaco" font-size="2px" style="letter-spacing:0.6" fill="#c0c0c0">LOADING
     <animate 
       attributeName="opacity"
       values="0;1;0" dur="1.8s"
       repeatCount="indefinite"/>
  </text>
  <path fill="#181818" d="M20,35c-8.271,0-15-6.729-15-15S11.729,5,20,5s15,6.729,15,15S28.271,35,20,35z M20,5.203
    C11.841,5.203,5.203,11.841,5.203,20c0,8.159,6.638,14.797,14.797,14.797S34.797,28.159,34.797,20
    C34.797,11.841,28.159,5.203,20,5.203z">
  </path>

  <path fill="#181818" d="M20,33.125c-7.237,0-13.125-5.888-13.125-13.125S12.763,6.875,20,6.875S33.125,12.763,33.125,20
    S27.237,33.125,20,33.125z M20,7.078C12.875,7.078,7.078,12.875,7.078,20c0,7.125,5.797,12.922,12.922,12.922
    S32.922,27.125,32.922,20C32.922,12.875,27.125,7.078,20,7.078z">
  </path>

  <path fill="#2AA198" stroke="#0064D8" stroke-width="0.6027" stroke-miterlimit="10" d="M5.203,20
			c0-8.159,6.638-14.797,14.797-14.797V5C11.729,5,5,11.729,5,20s6.729,15,15,15v-0.203C11.841,34.797,5.203,28.159,5.203,20z">
  <animateTransform
        attributeName="transform"
        type="rotate"
        from="0 20 20"
        to="360 20 20"
        calcMode="spline"
        keySplines="0.4, 0, 0.2, 1"
        keyTimes="0;1"
        dur="2s"
        repeatCount="indefinite" />      
   </path>

  <path fill="#859900" stroke="#1C2848" stroke-width="0.2027" stroke-miterlimit="10" d="M7.078,20
  c0-7.125,5.797-12.922,12.922-12.922V6.875C12.763,6.875,6.875,12.763,6.875,20S12.763,33.125,20,33.125v-0.203
  C12.875,32.922,7.078,27.125,7.078,20z">
   <animateTransform
      attributeName="transform"
      type="rotate"
      from="0 20 20"
      to="360 20 20"
      dur="1.8s"  
      repeatCount="indefinite" />
    </path>
  </svg>
</div>


</body>
<!--enquiry submit script start-->

<!--enquiry submit script end-->
<script>
    var countryjsonurl = "{{ url('json/countries.json') }}";

</script>
<script src="{{ url('script/jquery-3.3.1.min.js') }}"></script>
<script src="{{ url('script/owl.carousel.min.js') }}"></script>
<script src="{{ url('jqueryautocomplete/jquery-ui.min.js') }}"></script>
<script src="{{ url('script/main.js') }}"></script>
<script src="{{ url('script/count.js') }}"></script>
<script>var searchUrl = '{{route('SearchCourse')}}'</script>
<script src="{{ url('script/search.js') }}"></script>
<script>
    //country selectbox 
    $("#country-list li.country").on('click', function() {
        var countryCode = $(this).data('country-code');
        window.location.href = location.origin + '/' + countryCode + '/home';
    });

    
function storecookie()
{
   setCookie("cookie","true",365);
}
function setCookie(cname, cvalue, exdays) {
   var d = new Date();
   d.setTime(d.getTime() + (exdays*24*60*60*1000));
   var expires = "expires="+ d.toUTCString();
   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
   $("#footerCookie").hide();
   $(".footer").css("padding-bottom", "0px");
}

function getCookie(cname) {
   var name = cname + "=";
   var decodedCookie = decodeURIComponent(document.cookie);
   var ca = decodedCookie.split(';');
   for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
         c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
         return c.substring(name.length, c.length);
      }
   }
   return "";
}
checkCookie();
function checkCookie() {
   var username = getCookie("cookie");
   if (username != "") {
      $("#footerCookie").hide();
    //   $(".footer").css("padding-bottom", "0px");
   }
}



    var formValidationUrl = '{{ route('validateEnquiry') }}';
    var formSubmitUrl = '{{ route('sendEnquiry') }}';
    var ajaxTime = new Date().getTime();
    $(document).ready(function() {
        $(".enquiryJS").click(function() {
            var type = $(this).data('type');
            var course = $(this).data('course');
            var location = $(this).data('location');
            var date = $(this).data('date');
            var quote = $(this).data('quote');
            var deliveryType = $(this).data('deliverytype');
            var price = $(this).data('price');
            var url = "{{ Request::url() }}";
            var button = $(this).data('button');
            buttonval = button + '<i class="fas fa-paper-plane"></i>';
            buttonvalue = 'Submit' + '<i class="fas fa-paper-plane"></i>';



            if (button == "undefined") {
                $("#button").html(buttonvalue);

            } else {
                $("#button").html(buttonval);

            }
            $("#hiddenFields").empty();
            if (type) {
                $("#hiddenFields").append('<input type="hidden" name="type"  id="type" value="' + type +
                    '">');
            }
            if (course) {
                $("#hiddenFields").append('<input type="hidden" name="course"  id="course" value="' +
                    course + '">');
            }
            if (location) {
                $("#hiddenFields").append(
                    '<input type="hidden" name="location"  id="location" value="' + location + '">');
            }
            if (date) {
                $("#hiddenFields").append('<input type="hidden" name="date"  id="date" value="' + date +
                    '">');
            }
            if (deliveryType) {
                $("#hiddenFields").append(
                    '<input type="hidden" name="deliveryType"  id="deliveryType" value="' +
                    deliveryType + '">');
            }
            if (url) {
                $("#hiddenFields").append('<input type="hidden" name="Url"  id="url" value="' + url +
                    '">');
            }

            if (price) {
                $("#hiddenFields").append('<input type="hidden" name="price"  id="price" value="' +
                    price + '">');
            }

            // document.getElementById("quote").innerHTML=quote;


        });
    });

    function EnquiryFormSubmit(formType, button) {
        if (button != null) {
            consentValidation = checkConsent(button);
            if (consentValidation == false) {
                return false;
            }
        }
    }

 
    function processEnquiry(formData) {

$.ajax({
    url: formSubmitUrl,
    data: formData,
    type: "post",
    headers: {
              'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
          },
    timeout: 90000,
    global: false,
    success: function(response) {
        if (response == 'done') {

            var input = '{{ csrf_field() }}';
            var form = $('<form>').attr('id', 'thank-you').attr('method', 'post').attr('action',
                '{{ route('thanks') }}').html(input);
            $('body').append(form);
            $('#thank-you').submit();
        }

    }
});
}

    function submitEnquiry(formElement) {
        button = $(formElement).find('button').first();
        event.preventDefault();
        if (checkConsent(button) == false) {
            return false;
        }

        formData = $(formElement).serialize();

        $.ajax({
            url: formValidationUrl,
            data: formData,
            type: "post",
            beforeSend: function() {
                $(formElement).find(".input-error").removeClass('input-error');
                $(formElement).find("input,button").prop('disabled', true);
            },
            complete: function() {
                $(formElement).find("input,button").prop('disabled', false);
            },
            success: function(response) {
                if (response == "done") {

                    // $('#modal3').modal('show'); 
                    $(formElement).find('input').not(
                        'input[name="_token"],input[name="type"],input[name="url"]').val("");
                    $(formElement).find('textarea').val("");
                    $(formElement).find("input[type='checkbox']").prop("checked", false);

                    processEnquiry(formData);
                } else {
                    alert("failed");
                    return false;
                }
            },
            error: function(err) {

                $(formElement).find("button,input").attr('disabled', false);
                errors = err.responseJSON.errors;
                $.each(errors, function(index, value) {

                   $(formElement).find("input[name='" + index + "']").closest('.input-container').addClass('input-error');
                   $(formElement).find("input[name='" + index + "']").attr('placeholder',value);

                });
            }
        });
    }

</script>
@yield('footerScripts')
<script>
    $(".auto-complete-course").focus(function() {
        $(this).removeClass("error");
        $(this).attr("placeholder", "");
    });
    //  function getquery(elm)
    // {
    //    var query = $(elm).prev().val();
    //    if(query.length >= 1)
    //       {window.location.href = window.origin+"/search?q="+query;}
    //    $(elm).prev().attr("placeholder","Add Course to Search");
    //    $(elm).prev().addClass("error");
    // }


    var autoCompleteCourseUrl = "{{ route('courseAutoComplete') }}";
    $(function() {


        $.widget("custom.catcomplete", $.ui.autocomplete, {
            _create: function() {
                this._super();
                this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
            },
            _renderMenu: function(ul, items) {
                var that = this,
                    currentTopic = "";
                $.each(items, function(index, item) {
                    var li;

                    if (item.topic.name != currentTopic) {
                        ul.append("<li class='ui-autocomplete-category'>" + item.topic
                            .name + "</li>");
                        currentTopic = item.topic.name;
                    }
                    li = that._renderItemData(ul, item);
                    if (item.topic.name) {
                        li.attr("aria-label", item.topic.name + " : " + item.label);
                    }
                });
            }

        });
        $(".auto-complete-course.auto-redirect").catcomplete({
            delay: 0,
            source: autoCompleteCourseUrl,
            select: function(event, ui) {
                location.href = ui.item.url;
            }
        });

        $(".auto-complete-course").catcomplete({
            source: function(request, response) {
                $.ajax({
                    global: false,
                    source: autoCompleteCourseUrl,
                    url: autoCompleteCourseUrl,
                    dataType: "json",
                    data: {
                        term: request.term
                    },
                    success: function(data) {
                        response(data);
                    }
                });
            },
        });

    });

</script>

</html>

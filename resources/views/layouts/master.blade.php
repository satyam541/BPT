<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{url('style/main.css')}}">
    <link rel="stylesheet" href="{{url('style/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('style/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   @yield('header')
</head>
<body>
    @yield("content")
    <footer class="flex-direction footer">
        <div class="container">
            <div class="footer-main">
                <div class="footer-content">
                    <div class="content">
                        <img src="{{footer()->footer['heading']->getImagePath()}}" alt="white-logo" class="logo-image">
                        <p>{{footer()->footer['heading']->content}}</p>
                        <div class="social-media">
                            <p>Follow Us On:</p>
                            <a href="{{ socialmedialinks()->where('website','Facebook')->first()->link ?? ''}}">
                                <img src="{{url('img/master/facebook.svg')}}" alt="facebook">
                            </a>
                            <a href="{{ socialmedialinks()->where('website','Twitter')->first()->link ?? ''}}">
                                <img src="{{url('img/master/twitter.svg')}}" alt="twitter">
                            </a>
                            <a href="{{ socialmedialinks()->where('website','Google')->first()->link ?? ''}}">
                                <img src="{{url('img/master/google-plus.svg')}}" alt="google-plus">
                            </a>
                            <a href="{{ socialmedialinks()->where('website','Linkedin')->first()->link ?? ''}}">
                                <img src="{{url('img/master/linked-in.svg')}}" alt="linked-in">
                            </a>
                        </div>
                    </div>
                    <div class="content links">
                        <div class="heading">
                            <h2>Useful Links</h2>
                        </div>
                        <ul>
                            <li><a href="{{route('privacy-policy')}}"><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Our Privacy Policy</a></li>
                            <li><a href="{{route('terms-and-conditions')}}"><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Terms & Conditions</a></li>
                            <li><a href="{{route('third-party')}}"><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Third Party Trademarks</a></li>
                            <li><a href="{{route('cookies')}}"><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Cookies</a></li>
                            <li><a href="{{route('onsite')}}"><img src="{{url('img/master/right-arrow.svg')}}" alt="right-arrow">Onsite</a></li>
                        </ul>
                    </div>
                    <div class="content blog">
                        <div class="heading">
                            <h2>Recent Blogs</h2>
                        </div>
                        <ul>
                            @foreach(blogs()->take(3) as $blog)
                            <li><img src="{{url('img/master/polygon.svg')}}" alt="polygon" class="polygon-img">
                                <a href="{{$blog->reference}}">{{$blog->title}}</a>
                                <span>
                                    <img src="{{url('img/master/time.svg')}}" alt="time">
                                    <p class="date">{{$blog->post_date}}</p>
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
                            <li><img src="{{url('img/master/white-call.svg')}}" alt="call">
                                <a href="">{{websiteDetail()->contact_number}}</a>
                            </li>
                            <li><img src="{{url('img/master/white-email.svg')}}" alt="email">
                                <a href="">{{websiteDetail()->contact_email}}</a>
                            </li>
                            <li><img src="{{url('img/master/location.svg')}}" alt="location">
                                <p>{{websiteDetail()->address}}</p>
                            </li>                           
                        </ul>
                    </div>
                </div>
                <p class="terms">{{websiteDetail()->copyright_footer}}</p>
            </div>
        </div>
    </footer>

</body>
<!--enquiry submit script start-->
<script>
    
    var formValidationUrl = '{{ route("validateEnquiry") }}';
    var formSubmitUrl = '{{ route("sendEnquiry") }}';

    function EnquiryFormSubmit(formType, button) {
        if (button != null) {
            consentValidation = checkConsent(button);
            if (consentValidation == false) {
                return false;
            }
        }
    }

    function processEnquiry(formData)
    {
    
        $.ajax({
            url:formSubmitUrl,
            data:formData,
            type:"post",
            global:false,
            success:function(response){
                
            }
        });
    }

    function submitEnquiry(formElement)
    { 
        console.log(formElement);
        button = $(formElement).find('button').first();
        event.preventDefault();
        if (checkConsent(button) == false) {
            return false;
    }
    
    formData = $(formElement).serialize();
    
    console.log(formData);
    $.ajax({
        url:formValidationUrl,
        data:formData,
        type:"post",
        beforeSend:function(){
            $(formElement).find(".error").removeClass('error');
            $(formElement).find("input,button").prop('disabled',true);
        },
        complete:function(){
            $(formElement).find("input,button").prop('disabled',false);
        },
        success:function(response){
            if(response == "done"){
                
                // $('#modal3').modal('show'); 
                $(formElement).find('input').not('input[name="_token"],input[name="type"],input[name="url"]').val("");
                $(formElement).find('textarea').val("");
                $(formElement).find("input[type='checkbox']").attr("checked",false);

                processEnquiry(formData);
            }
            else{
                alert("failed");
                return false;
            }
        },
        error:function(err){
            
            $(formElement).find("button,input").attr('disabled',false);
            errors = err.responseJSON.errors;

            $.each(errors,function(index,value){
                $(formElement).find("input[name='"+index+"']").addClass('error').attr('title',value[0]);
            });
            console.log(errors);
        }
    });
    }
</script>
<!--enquiry submit script end-->
<script>
    var countryjsonurl = "{{url('json/countries.json')}}";
  </script>
<script src="{{url('script/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('script/owl.carousel.min.js')}}"></script>

<script src="{{url('script/main.js')}}"></script>
<script src="{{url('script/count.js')}}"></script>
@yield('footerscripts')
</html>
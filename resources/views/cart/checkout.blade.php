<html>
<head>
    <meta name="robots" content="noindex, nofollow" /> 
</head>
<body bgcolor="#FFFFFF">
   <form method="post"  id="checkout" action="{{$paymentUrl}}"> 
        @foreach ($response as $key => $value)
            <input type="hidden" name="{{$key}}" value="{{ $value }}">
        @endforeach
    </form>
    <script type="text/javascript">
        function submitCheckoutForm() {
            var checkoutForm = document.getElementById("checkout");
            checkoutForm.submit();
        }
        window.onload = submitCheckoutForm;
    </script>
</body>
</html>
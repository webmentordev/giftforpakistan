<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js" integrity="sha512-Ooi9IbjM2SIDjQ02ENbPFuuORT8F8Rc+rowcYfLneDwKRxw1+gVVj5tciVmV/APnA/Ys+qy1MbNKK3k2EaAHcw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    @livewireStyles
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-L9REMXQ5LJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-L9REMXQ5LJ');
    </script>
</head>
<body>
    <x-navbar />
        
    {{ $slot }}
    <x-our-policies />
    <x-footer />
    <x-cart-component />
    @livewireScripts
</body>
<script>
    CKEDITOR.replace( 'summary_ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
<script>
    $("#topBtn").hide();
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $("#topBtn").show().fadeIn();
            $("#navbar").css('box-shadow', '0px 2px 5px rgba(0,0,0,0.1)');
        } else {
            $("#topBtn").fadeOut().hide();
            $("#navbar").css('box-shadow', '0px 0px 0px rgba(0,0,0,0.1)');
        }
        
    });
    $("#topBtn").click(function() {
        $("html").animate({ scrollTop: 0 }, "slow");
    });
</script>
</html>
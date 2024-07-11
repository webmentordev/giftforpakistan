<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    {!! SEOMeta::generate() !!}
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
    <section class="py-[100px] w-full">
        <div class="container" style="max-width: 960px">
            <div class="flex 980px:flex-col">
                <div class="box flex flex-col w-full max-w-[300px] p-3 980px:flex-row 980px:max-w-full 980px:flex-wrap">
                    <a href="{{ route('profile') }}" class="p-3 text-dark mb-2 flex rounded-lg border border-gray-10 980px:mr-2 font-bold @if(Request::is('profile')) bg-main border-main text-white @endif"><i class="fas fa-user mr-2"></i> Dashboard</a>
                    <a href="{{ route('orders') }}" class="p-3 text-dark mb-2 flex rounded-lg border border-gray-10 980px:mr-2 font-bold @if(Request::is('profile/orders')) bg-main border-main text-white @endif"><i class="fas fa-shopping-cart mr-2"></i> Orders</a>
                    <a href="{{ route('setting') }}" class="p-3 text-dark mb-2 flex rounded-lg border border-gray-10 980px:mr-2 font-bold @if(Request::is('profile/setting')) bg-main border-main text-white @endif"><i class="fas fa-cog mr-2"></i> Settings</a>
                    <a href="{{ route('logs') }}" class="p-3 text-dark mb-2 flex rounded-lg border border-gray-10 980px:mr-2 font-bold @if(Request::is('profile/activity-log')) bg-main border-main text-white @endif"><i class="fas fa-clipboard-list mr-2"></i> Login Activity</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="p-3 mb-2 text-white bg-dark rounded-lg border border-gray-10 font-bold text-start w-full" type="submit"><i class="fas fa-arrow-right-from-bracket"></i> Logout</button>
                    </form>
                </div>
                <div class="box w-full p-3">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    <x-our-policies />
    <x-footer />
    <x-cart-component />
</body>
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
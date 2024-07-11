<footer class="bg-gray-100 relative">
    <button class="absolute -top-4 left-2/4 p-3 px-[1.1rem] rounded-full bg-dark z-20" onclick="goToTop()" id="topBtn"><i class="fas fa-arrow-up text-white"></i></button>
    <div class="container py-10 grid grid-cols-3 border-b border-main-light px-4 1180px:grid-cols-4 980px:grid-cols-3 760px:grid-cols-2 450px:grid-cols-1">
        <div class="flex flex-col mr-[50px]">
            <div class="flex items-center mb-3">
                <img src="{{ asset('images/gift-logo.png') }}" width="60px" class="mr-2" alt="Favicon">
                <h2>GiftForPakistan</h2>
            </div>
            <p class="mb-3 text-dark">Awesome store for sending gifts to your family or friends</p>
            <ul class="flinks">
                <li><i class="fas fa-location-dot icons"></i><strong>Address:</strong> Shop No 8 St no7 Dalmia Mujahid colony stadium road, Karachi</li>
                <li><i class="fas fa-headphones-simple icons"></i><strong>Call Us:</strong> +923182360966</li>
                <li><i class="fas fa-envelope h-full icons"></i><strong>Email:</strong> contact@giftforpakistan.com</li>
                <li><i class="fas fa-clock h-full icons"></i><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</li>
            </ul>
        </div>
        <div class="flex flex-col px-3 mr-[20px] 450px:ml-0">
            <h2 class="text-[24px] mb-3">Company</h2>
            <ul class="flinks linking">
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                <li><a href="{{ route('terms') }}">Terms & Conditions</a></li>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('sitemap') }}">Sitemap</a></li>
            </ul>
        </div>
        <div class="flex flex-col px-3 mr-[20px] 450px:ml-0">
            <h2 class="text-[24px] mb-3">Account</h2>
            <ul class="flinks linking">
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('signup') }}">Signup</a></li>
                <li><a href="{{ route('cart') }}">View Cart</a></li>
                <li><a href="{{ route('track.order') }}">Track My Order</a></li>
                <li><a href="{{ route('orders') }}">Order Status</a></li>
                <li><a href="{{ route('setting') }}">Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="container flex justify-between items-center py-4 px-4 670px:flex-col 670px:text-center">
        <p class="670px:mb-3">&copy;
            <script>
                document.write(new Date().getFullYear())
            </script>, <strong>GiftForPakistan</strong> <br>
            All rights reserved
        </p>
        <div class="flex flex-col 670px:mb-3">
          <p>Secured Payment Gateways</p>
          <div class="flex"><img class="w-[50px] mr-2" src="{{ asset('images/visa.png') }}" alt="Visa Card"><img class="w-[60px] h-[35px] mt-2 mr-2" src="{{ asset('images/mastercard.png') }}" alt="Master Card"><img class="w-[60px] h-[35px] mt-2" src="{{ asset('images/paypak.png') }}" alt="PayPak"></div>
        </div>
        <div class="flex items-center 670px:mb-3">
            <i class="text-[25px] fas fa-phone mr-2 text-main"></i>
            <div class="flex flex-col">
                <h3 class="text-main text-[20px]">+923182360966</h3>
                <p class="ml-2 text-[14px]">Working 8:00 - 22:00</p>
            </div>
        </div>
    </div>
</footer>

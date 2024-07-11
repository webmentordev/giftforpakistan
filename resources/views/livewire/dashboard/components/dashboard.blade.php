<div>
    <h2 class="text-xl font-bold mb-2">Welcome to Dashboard</h2>
    <div class="grid grid-cols-3 gap-6">
        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-user text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-main mr-3 text-4xl top-2 right-2 absolute">{{ $users }}</h1>
            <p class="text-lg">Users Registered!</p>
        </div>

        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-box text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-main mr-3 text-4xl top-2 right-2 absolute">{{ $products }}</h1>
            <p class="text-lg">Products Registered!</p>
        </div>

        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-list text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-main mr-3 text-4xl top-2 right-2 absolute">{{ $categories }}</h1>
            <p class="text-lg">Categories Registered!</p>
        </div>

        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-envelope text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-main mr-3 text-4xl top-2 right-2 absolute">{{ $contacts }}</h1>
            <p class="text-lg">Contacts</p>
        </div>

        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-sack-dollar text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-dark mr-3 text-4xl top-2 right-2 absolute">{{ number_format($worth_order, 2) }}</h1>
            <p class="text-lg">Worth Of Orders</p>
        </div>

        <div class="bg-white rounded-lg p-6 relative">
            <i class="fas fa-shopping-cart text-white bg-dark p-3 px-4 rounded-full mb-3 text-2xl"></i>
            <h1 class="text-main mr-3 text-4xl top-2 right-2 absolute">{{ $orders }}</h1>
            <p class="text-lg">Orders Placed!</p>
        </div>
    </div>
</div>

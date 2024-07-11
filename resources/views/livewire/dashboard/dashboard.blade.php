<section class="py-[100px] px-4">
    <div class="container" style="max-width: 1200px">
        <div class="grid grid-cols-7 gap-3 mb-3">
            <button wire:click="renderComponent('dashboard')" 
            class="@if($component == 'dashboard') bg-main text-white border-main @else border-dark @endif border  py-2 font-semibold rounded-md">Dashboard</button>

            <button wire:click="renderComponent('products')" 
            class="@if($component == 'products') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Products</button>

            <button wire:click="renderComponent('categories')" 
            class="@if($component == 'categories') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Categories</button>

            <button wire:click="renderComponent('contacts')" 
            class="@if($component == 'contacts') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Contacts</button>

            <button wire:click="renderComponent('orders')" 
            class="@if($component == 'orders') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Orders</button>

            <button wire:click="renderComponent('users')" 
            class="@if($component == 'users') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Users</button>

            <button wire:click="renderComponent('blogs')" 
            class="@if($component == 'blogs') bg-main text-white border-main @else border-dark @endif border py-2 font-semibold rounded-md">Blogs</button>
        </div>
        <p wire:loading wire:target="renderComponent" class="text-lg text-green-700 py-2"><i class="fab fa-react animate-spin"></i> Loading Components...</p>
        <div class="p-6 rounded-lg bg-gray-200">
            @if($component == 'dashboard')
                <livewire:dashboard.components.dashboard /> 
            @elseif($component == 'products')
                <livewire:dashboard.components.products />
            @elseif($component == 'categories')
                <livewire:dashboard.components.categories />
            @elseif($component == 'contacts')
                <livewire:dashboard.components.contacts />
            @elseif($component == 'orders') 
                <livewire:dashboard.components.orders />
            @elseif($component == 'users') 
                <livewire:dashboard.components.users />
            @elseif($component == 'blogs') 
                <livewire:dashboard.components.blogs />
            @endif
        </div>
    </div>
</section>

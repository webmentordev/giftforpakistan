@component('mail::message')
# Your GiftForPakistan Order receipt
{{ \Carbon\Carbon::now()->format('M d, Y h:i:s A') }} PKT  
**Order ID:** {{ $data[0]->order_number }}
<?php $total = 0; ?>
@component('mail::table')
| Product       | Quantity      | Unit Price  | Price  |
| ------------- |:-------------:| --------:|--------:|
@foreach ($data as $item)
| {{ $item->product_name }}|{{ $item->quantity }}| Rs.{{ $item->product->price }}|Rs.{{ $item->price }}|
<?php $total = $total + $item->price ?>
@endforeach
@endcomponent  
  
- **Total Price:** Rs. {{ number_format($total, 2) }}
- **Payment Menthod:** Cash On Delivery  

**Customer:** {{ $data[0]->customer->name }}  
**Phone:** {{ $data[0]->customer->phone_number }}  
**Address:** {{ $data[0]->customer->address }}  

Thanks,<br>
{{ config('app.name') }}
@endcomponent
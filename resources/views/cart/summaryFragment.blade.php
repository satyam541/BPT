<div class="payment">
    <h2>Summary Detail</h2>
    <div class="payment-content">
        <p><strong>Total exe. VAT: </strong> {!!country()->currency_symbol!!}{{$orderData->sub_total}}</p>
        <p><strong>VAT @ ({{ $orderData->vat_percentage }}%): </strong> {!! country()->currency_symbol !!} {{ $orderData->vat_amount }}</p>
        <p><strong>Card Free Charges: </strong> {!! country()->currency_symbol !!} {{ $orderData->card_fees_amount }}</p>
        <p><strong>Total: </strong> {!! country()->currency_symbol !!} {{ $orderData->grand_total }}</p>
    </div>
</div>
<div class="payment">
    <h2>Payment Details</h2>
    <div class="payment-content">
        <p><strong>Payment Method: </strong> {{$orderData->payment_method}}</p>
        <p><strong>Payment Detail: </strong> {{ $orderData->payment_detail}}</p>
    </div>
</div>

<div class="payment">
    <h2>Customer Detail</h2>
    <div class="payment-content">
        <p><strong>First Name: </strong> {{ $customerData->firstname}}</p>
        <p><strong>Last Name: </strong> {{ $customerData->lastname }}</p>
        <p><strong>Mobile: </strong> {{ $customerData->mobile }}</p>
        <p><strong>Email: </strong> {{ $customerData->email }}</p>
    </div>
</div>
<div class="payment">
    <h2>Billing Detail</h2>
    <div class="payment-content">
        <p><strong>First Name: </strong> {{ $billingData->firstname}}</p>
        <p><strong>Last Name: </strong> {{ $billingData->lastname}}</p>
        <p><strong>Address1: </strong> {{ $billingData->address1 }}</p>
        <p><strong>Address2: </strong> {{ $billingData->address2 }}</p>
        <p><strong>City/Town: </strong> {{ $billingData->city }}</p>
        <p><strong>Postcode: </strong> {{ $billingData->postcode }}</p>
        <p><strong>Country: </strong> {{ $billingData->country->name }}</p>
    </div>
</div>
<div class="payment">
    <h2>Item & Delegate Detail</h2>
    <div class="payment-content">
        @foreach ($cartItems as $cartItem)
            <p><strong>Course Name: </strong> {{ $cartItem->name }}</p>
            <p><strong>Booking Type: </strong> {{ $cartItem->options['method'] }}</p>

            @if($cartItem->options['method'] == 'classroom' || $cartItem->options['method'] == 'virtual')
                <p><strong>Location: </strong> {{ $cartItem->options['location'] }}</p>
                <p><strong>Date: </strong> {{ $cartItem->options['date']}}</p>

            @elseif($cartItem->options['method'] == 'online' && !empty($cartItem->options['addons']))
                <p><strong>Addons: </strong>
                    @foreach($cartItem->options['addons'] as $addon)
                        {{ $addon->name }}
                    @endforeach
                </p> 
            @endif 
            
            @foreach($delegateData[$cartItem->rowId] as $delegate)
                <p><strong>Delegate Detail</strong></p>
                <p><strong>Name: </strong> {{ $delegate->firstname.' '.$delegate->lastname }}</p>
                <p><strong>Mobile: </strong> {{ $delegate->mobile }}</p>
                <p><strong>Email: </strong> {{ $delegate->email }}</p>
            @endforeach
        @endforeach
       
    </div>
</div>
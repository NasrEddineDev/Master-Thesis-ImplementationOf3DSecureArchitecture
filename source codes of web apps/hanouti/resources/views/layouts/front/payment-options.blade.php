@if(isset($payment['name']))
    @if($payment['name'] == config('stripe.name'))
        @include('front.payments.stripe')
    @elseif($payment['name'] == config('paypal.name'))
        @include('front.payments.paypal')
    @elseif($payment['name'] == config('bank-transfer.name'))
        @include('front.payments.bank-transfer')
    @elseif($payment['name'] == config('pay-pfe3ds.name'))
        @include('front.payments.pay-pfe3ds')
    @endif
@endif
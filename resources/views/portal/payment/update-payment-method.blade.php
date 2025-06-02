@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('content_header')
    <h1 class="m-0 text-dark">Update Payment Method</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <label for="card-holder-name">Card Holder Name</label>
                    <input id="card-holder-name" type="text">

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element">

                    </div>

                    <button id="card-button" data-secret="{{ $intent->client_secret }}">
                        Update Payment Method
                    </button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const stripe = Stripe('{{config('cashier.key')}}');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                console.log(error.message)
            } else {
                console.log('card verified successfully.')
                console.log(setupIntent);
                token =
                $.post('{{route('payment.method.update')}}',{paymentMethod:setupIntent.payment_method});
            }
        });


    </script>
@stop

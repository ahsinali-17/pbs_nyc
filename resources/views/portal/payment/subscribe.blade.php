@extends('frontend.master')

@php($pageTitle ='Subscribe')

@section('meta')

@stop

@section('css')
    <style>
        /*.StripeElement {*/
        /*    box-sizing: border-box;*/

        /*    height: 40px;*/

        /*    padding: 10px 12px;*/

        /*    border: 1px solid transparent;*/
        /*    border-radius: 4px;*/
        /*    background-color: white;*/

        /*    box-shadow: 0 1px 3px 0 #e6ebf1;*/
        /*    -webkit-transition: box-shadow 150ms ease;*/
        /*    transition: box-shadow 150ms ease;*/
        /*}*/

        /*.StripeElement--focus {*/
        /*    box-shadow: 0 1px 3px 0 #cfd7df;*/
        /*}*/

        /*.StripeElement--invalid {*/
        /*    border-color: #fa755a;*/
        /*}*/

        /*.StripeElement--webkit-autofill {*/
        /*    background-color: #fefde5 !important;*/
        /*}*/
        .radio-tile-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: left;
        }

        .radio-tile-group .input-container {
            position: relative;
            height: 7rem;
            width: 100%;
            margin: 0.5rem;
        }

        .radio-tile-group .input-container .radio-button {
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            margin: 0;
            cursor: pointer;
        }

        .radio-tile-group .input-container .radio-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            border: 2px solid #9cabb1;
            border-radius: 5px;
            padding: 1rem;
            transition: transform 300ms ease;
        }

        .radio-tile-group .input-container .radio-tile-label {
            text-align: center;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #9cabb1;
        }

        .radio-tile-group .input-container .radio-button:checked + .radio-tile {
            background-color: #9cabb1;
            border: 2px solid #9cabb1;
            color: white;
            transform: scale(1.1, 1.1);
        }

        .radio-tile-group .input-container .radio-button:checked + .radio-tile .icon svg {
            fill: white;
            background-color: #9cabb1;
        }

        .radio-tile-group .input-container .radio-button:checked + .radio-tile .radio-tile-label {
            color: white;
            background-color: #9cabb1;
        }

        .inpot {
            color: #fff;
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif';
            fontSmoothing: 'antialiased';
            fontSize: '16px';
        }

        .inpot::placeholder {
            color: #aab7c4 !important;
        }

    </style>

@stop

@section('slider')

@stop


@section('content')
    <section class="bg-transparent" id="content">

        <div class="content-wrap">
            <div class="container clearfix">
                <div class="tabs side-tabs nobottommargin clearfix ui-tabs ui-corner-all ui-widget ui-widget-content"
                     id="tab-6">

                    <div class="tab-container">
                        <div class="overlay"
                             style="z-index: 50; background: rgba(255, 255, 255, 0.7); display: none;">
                            <br/>
                            <h1 style="position: absolute; top: 45%;width: 100%; text-align: center; margin-left: -15px; margin-top: -15px; color: #000;font-size: 30px;">
                                PROCESSING...</h1>
                            <i class="fas fa-sync-alt fa-spin"
                               style="position: absolute; top: 50%; left: 50%; margin-left: -15px; margin-top: -15px; color: #000;font-size: 30px;"></i>
                        </div>
                        <div class="container clearfix">
                            <div class="row">
                                <div class="col-12">
                                    <div class="heading-block center">
                                        <h3>Subscription</h3>
                                    </div>
                                </div>
                                <div class="col-12 mb-4 pb-4">
                                    <div class="center text-warning">
                                        <p style="font-size: large">Dear {{auth()->user()->name}},
                                            please select your desired subscription from the options below.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 bottommargin">

                                    <div class="team opak-arkaplan text-center row pb-3">
                                        <div class="p-0 align-self-center col-12 text-center">
                                            <img height="150px" class="rounded-circle"
                                                 src="{{asset('images/others/bronze.png')}}" alt="Bronze">
                                        </div>
                                        <div class="team-desc p-0 col-12">
                                            <div class="team-title"><h4> Bronze </h4><h6>Alert Subscription</h6>
                                                <i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i
                                                        class="fas fa fa-star-half"></i>
                                                <span>Instantly get alert for your properties</span><br/></div>
                                            <div>
                                                <table class="table text-light table-comparison nobottommargin">
                                                    <thead>
                                                    <tr>
                                                        <th width="50%">&nbsp;</th>
                                                        <th><img width="10%"
                                                                 class="rounded-circle"
                                                                 src="{{asset('images/others/bronze.png')}}"
                                                                 alt="Jon"><br/>Bronze
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Instant Alert</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Add/Remove Property</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Summary</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Portal Access</td>
                                                        <td><i class="text-danger icon-remove"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Management</td>
                                                        <td><i class="text-danger icon-remove"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ticket Access</td>
                                                        <td><i class="text-danger icon-remove"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Card</td>
                                                        <td><i class="text-danger icon-remove"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Documents/Note Control</td>
                                                        <td><i class="text-danger icon-remove"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Monthly Price</td>
                                                        <td>$9.00</td>
                                                    </tr>

                                                    <tr>
                                                        <td>First 3 months</td>
                                                        <td><del>$9.00</del> Free</td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <hr>
                                            </div>
                                            <hr>
                                            <span>Get alerts for only <del>$15</del> $9 per property</span><br/>
                                            <br/>
                                            <h4 class="text-warning mb-0 pb-0">Total Amount for your account is
                                                9x{{auth()->user()->properties_count}}=
                                                <b><u>${{auth()->user()->properties_count*9}}</u></b></h4>
                                            <br/>
                                            {{--                                            <a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"--}}
                                            {{--                                               class="inline-block si-small si-light si-email3">--}}
                                            {{--                                                <button class="btn btn-sm btn-info small">Compare</button>--}}
                                            {{--                                            </a>--}}
                                            {{--                                            <a href="#" data-toggle="modal"--}}
                                            {{--                                               data-target=".bs-example-modal-lg2"--}}
                                            {{--                                               class="inline-block si-small si-light si-email3">--}}
                                            {{--                                                <button class="btn btn-sm btn-warning small">Read More</button>--}}
                                            {{--                                            </a>--}}
                                            {{--                                            <div class="modal fade bs-example-modal-lg" tabindex="-1"--}}
                                            {{--                                                 role="dialog"--}}
                                            {{--                                                 aria-labelledby="myLargeModalLabel" style="display: none;"--}}
                                            {{--                                                 aria-hidden="true">--}}
                                            {{--                                                <div class="modal-dialog modal-lg">--}}
                                            {{--                                                    <div class="modal-body">--}}
                                            {{--                                                        <div class="modal-content">--}}
                                            {{--                                                            <div class="modal-header">--}}
                                            {{--                                                                <h4 class="modal-title" id="myModalLabel">--}}
                                            {{--                                                                    Comparison Table</h4>--}}
                                            {{--                                                                <button type="button" class="close"--}}
                                            {{--                                                                        data-dismiss="modal"--}}
                                            {{--                                                                        aria-hidden="true">×--}}
                                            {{--                                                                </button>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="modal-body">--}}
                                            {{--                                                                <table class="table text-light table-hover table-comparison nobottommargin">--}}
                                            {{--                                                                    <thead>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <th>&nbsp;</th>--}}
                                            {{--                                                                        <th><img width="10%"--}}
                                            {{--                                                                                 class="rounded-circle"--}}
                                            {{--                                                                                 src="{{asset('images/others/bronze.png')}}"--}}
                                            {{--                                                                                 alt="Jon"><br/>Bronze--}}
                                            {{--                                                                        </th>--}}
                                            {{--                                                                        <th><img width="10%"--}}
                                            {{--                                                                                 class="rounded-circle"--}}
                                            {{--                                                                                 src="{{asset('images/others/gold.png')}}"--}}
                                            {{--                                                                                 alt="Jon"><br/>Gold--}}
                                            {{--                                                                        </th>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    </thead>--}}
                                            {{--                                                                    <tbody>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Instant Alert</td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Add/Remove Property</td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Summary</td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Portal Access</td>--}}
                                            {{--                                                                        <td><i class="text-danger icon-remove"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Property Management</td>--}}
                                            {{--                                                                        <td><i class="text-danger icon-remove"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Ticket Access</td>--}}
                                            {{--                                                                        <td><i class="text-danger icon-remove"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Property Card</td>--}}
                                            {{--                                                                        <td><i class="text-danger icon-remove"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Documents/Note Control</td>--}}
                                            {{--                                                                        <td><i class="text-danger icon-remove"></i></td>--}}
                                            {{--                                                                        <td><i class="text-success icon-ok"></i></td>--}}
                                            {{--                                                                    </tr>--}}
                                            {{--                                                                    <tr>--}}
                                            {{--                                                                        <td>Monthly Price</td>--}}
                                            {{--                                                                        <td>$9.00</td>--}}
                                            {{--                                                                        <td>$15.00</td>--}}
                                            {{--                                                                    </tr>--}}

                                            {{--                                                                    </tbody>--}}
                                            {{--                                                                </table>--}}
                                            {{--                                                                <hr>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                            {{--                                            <div class="modal fade bs-example-modal-lg2" tabindex="-1"--}}
                                            {{--                                                 role="dialog"--}}
                                            {{--                                                 aria-labelledby="myLargeModalLabel2" style="display: none;"--}}
                                            {{--                                                 aria-hidden="true">--}}
                                            {{--                                                <div class="modal-dialog modal-lg">--}}
                                            {{--                                                    <div class="modal-body">--}}
                                            {{--                                                        <div class="modal-content">--}}
                                            {{--                                                            <div class="modal-header">--}}
                                            {{--                                                                <h4 class="modal-title" id="myModalLabel">--}}
                                            {{--                                                                    Bronze Plan Details</h4>--}}
                                            {{--                                                                <button type="button" class="close"--}}
                                            {{--                                                                        data-dismiss="modal"--}}
                                            {{--                                                                        aria-hidden="true">×--}}
                                            {{--                                                                </button>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                            <div class="modal-body">--}}
                                            {{--                                                                Contact Us for more details by <a--}}
                                            {{--                                                                        href="{{route('contactus')}}"> clicking--}}
                                            {{--                                                                    here</a>.--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                    </div>
                                    <div class="radio-tile-group">
                                        <div class="input-container">
                                            <input id="bronze" class="radio-button" value="bronze" type="radio"
                                                   name="paytype"/>
                                            <div class="radio-tile">
                                                <i style="font-size: 2em" class="icon-ok-sign">

                                                </i>

                                                <label for="bronze" class="radio-tile-label">Select Bronze
                                                    Plan</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6 bottommargin">

                                    <div class="team opak-arkaplan text-center row pb-3">
                                        <div class="p-0 align-self-center col-12 text-center">
                                            <img height="150px" class="rounded-circle"
                                                 src="{{asset('images/others/gold.png')}}" alt="Gold">
                                        </div>
                                        <div class="team-desc p-0 col-12">
                                            <div class="team-title"><h4> GOLD </h4><h6>Member Subscription</h6>
                                                <i
                                                        class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                        class="fas fa-star"></i><i class="fas fa fa-star"></i><i
                                                        class="fas fa fa-star"></i>
                                                <span>Get full access member portal</span><br/></div>
                                            <div>
                                                <table class="table text-light  table-comparison nobottommargin">
                                                    <thead>
                                                    <tr>
                                                        <th width="50%">&nbsp;</th>
                                                        <th><img width="10%"
                                                                 class="rounded-circle"
                                                                 src="{{asset('images/others/gold.png')}}"
                                                                 alt="Gold"><br/>Gold
                                                        </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Instant Alert</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Add/Remove Property</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Summary</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Portal Access</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Management</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ticket Access</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Property Card</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Documents/Note Control</td>
                                                        <td><i class="text-success icon-ok"></i></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Monthly Price</td>
                                                        <td>$15.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>First 3 months</td>
                                                        <td><del>$15.00</del> Free</td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <hr>
                                            </div>
                                            <hr>
                                            <span class="text-red">Get portal access for only <del>$25</del> $15 per property</span><br/>
                                            <br/>
                                            <h4 class="text-warning mb-0 pb-0"> Total Amount for your account is
                                                15x{{auth()->user()->properties_count}}
                                                =
                                                <b><u>${{auth()->user()->properties_count*15}}</u></b></h4>
                                            <br/>

                                        </div>

                                    </div>
                                    <div class="radio-tile-group">
                                        <div class="input-container">
                                            <input id="gold" class="radio-button" value="gold" type="radio"
                                                   name="paytype"/>
                                            <div class="radio-tile">
                                                <i style="font-size: 2em" class="icon-ok-sign">

                                                </i>
                                                <label for="gold" class="radio-tile-label">Select Gold Plan</label>
                                            </div>
                                        </div>

                                        {{--                                                <input type="radio" class="custom-control-input" id="GoldRadio"--}}
                                        {{--                                                       name="inlineDefaultRadiosExample">--}}
                                        {{--                                                <label class="btn btn-secondary btn-lg btn-block custom-control-label col-12" for="GoldRadio">--}}

                                        {{--                                                        Select Gold Plan--}}
                                        {{--                                                    </label>--}}

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <span class='payment-errors'></span>
                                <div>
                                    <div class="col-12">
                                        <div class="heading-block center">
                                            <h4>Please submit the form below to finalize your subscription.</h4>
                                            <i>Note: your card will not be charged until the three month trial is over.</i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="card-holder-name">Name on
                                            Card</label>
                                        <div class="col-sm-12">
                                            <input required type="text" class="inpot form-control" stripe-data="name"
                                                   id="card-holder-name" placeholder="Card Holder's Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="card-number">Card
                                            Number</label>
                                        <div class="col-sm-12">
                                            <div class="control-label form-control">
                                                <div id="card-element" class="inpot">

                                                </div>
                                            </div>
                                            <br/>
{{--                                            <div class="float-right"><img class="pull-right"--}}
{{--                                                                          src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png"--}}
{{--                                                                          style="max-width: 250px; padding-bottom: 20px;">--}}
{{--                                            </div>--}}
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                            </div>
                                        </div>
                                    </div>
                                    <button data-secret="{{ $intent->client_secret }}" id="card-button" type="submit"
                                            class="btn btn-success btn-lg" style="width:100%;" disabled>Subscribe Now
                                    </button>
                                    <br/>
                                    <div style="text-align: left;"><br/>
                                        By submitting your subscription you are agreeing to our <a
                                                href="{{route('billingagreement')}}" target="_blank">Account Holder Agreement</a>,
                                        and <a href="{{route('tos')}}" target="_blank">Terms of Service</a>.
                                        If you have any questions about our services please <a
                                                href="{{route('contactus')}}">contact us</a>.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

            </div>


    </section><!-- #content end -->
@stop


@section('js')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function carddisablefunx() {
            document.getElementById("card-button").disabled = false;
        }

        document.getElementById('gold').addEventListener("click", carddisablefunx);
        document.getElementById('bronze').addEventListener("click", carddisablefunx);

        const stripe = Stripe('{{config('cashier.key')}}');

        const elements = stripe.elements();

        var style = {
            base: {
                iconColor: "#fff",
                color: "#fff",
                fontWeight: 400,
                fontFamily: "Helvetica Neue, Helvetica, Arial, sans-serif",
                fontSize: "16px",
                fontSmoothing: "antialiased",
                '::placeholder': {
                    color: '#aab7c4'
                },
                ":-webkit-autofill": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        const cardElement = elements.create('card', {
            iconStyle: "solid",
            style: style
        });

        // Create an instance of the card Element.
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
                if (cardHolderName === '') {
                    Swal.fire({
                        title: 'Error',
                        text: 'Please fill the Card Holder\'s Name',
                    });
                    return null;
                }
                $('.overlay').show();
                const {setupIntent, error} = await stripe.confirmCardSetup(
                    clientSecret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {name: cardHolderName.value}
                        }
                    }
                );

                if (error) {
                    Swal.fire({
                        title: 'Error Occured!',
                        icon: 'error',
                        text: error.message,
                    })
                    location.reload();
                    console.log(error.message)
                } else {
                    Swal.fire({
                        title: 'Subscription Successful!',
                        icon: 'success',
                    })
                    $.post('{{route('payment.method.setdefault')}}', {paymentMethod: setupIntent.payment_method}, function () {
                        $.post('{{route('payment.need-payment')}}', {paytype: $('[name=paytype]:checked').val()}, function () {
                            location.href = "{{route('portal.index')}}";
                        });
                    });

                    $('.overlay').hide();
                }
            }
        );


    </script>
@stop


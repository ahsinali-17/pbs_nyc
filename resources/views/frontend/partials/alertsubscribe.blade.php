@push('css')
    <!--Tags input seysi-->
    <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet"/>
    <!--select2-->
    <style type="text/css">
        .select2-selection--single {
            height: calc(1.5em + 0.75rem + 2px) !important;
        }
    </style>

@endpush

<div class="clearfix">
    <div class="tabs advanced-real-estate-tabs nomargin clearfix">

        <ul class="tab-nav clearfix">
            <li class="noleftmargin w-100 desktop mobile"><a><i class="icon-bell"></i> Alert
                    Subscription </a></li>
        </ul>

        <div class="tab-container">
            <div class="overlay" style="z-index: 50; background: rgba(255, 255, 255, 0.7); display: none;">
                <i class="fas fa-sync-alt fa-spin"
                   style="position: absolute; top: 50%; left: 50%; margin-left: -15px; margin-top: -15px; color: #000;font-size: 30px;"></i>
            </div>
            <div class="tab-content clearfix" id="tab-karbonsearch">
                <div class="form-widget p-5 center" id="form-widget-submitted-main">
                    <div class="row">
                        <div class="col-12">
                            <i class="icon-bell h1 color"></i>
                            <h4 class="t700 mb-0 font-body text-blue">Thank you for signing up.
                                <br>You will receive an email with additional information shortly. </h4>
                        </div>
                    </div>
                </div>
                <div class="form-widget" id="alert-subscribe-form-main">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <label class="text-black-50 nobottommargin" for="karbon-property-name">First and Last
                                Name<small
                                        class="text-danger">*</small></label>
                            <input class="form-control bg-gri required"
                                   id="karbon-property-name"
                                   name="karbon-property-name" required
                                   type="text" value=""/>
                        </div>

                        <div class="w-100 d-md-none"><br/></div>

                        <div class="col-md-6 col-12">
                            <label class="text-black-50 nobottommargin" for="karbon-property-contact">Contact
                                Number<small
                                        class="text-danger">*</small></label>
                            <input class="form-control bg-gri required"
                                   id="karbon-property-contact"
                                   name="karbon-property-contact" required
                                   type="number" value="">
                        </div>

                        <div class="w-100"><br/></div>
                        <div class="col-sm-12">
                            <label class="text-black-50 nobottommargin" for="karbon-property-email">Email
                                Address<small
                                        class="text-danger">*</small></label>
                            <input class="form-control bg-gri required"
                                   id="karbon-property-email"
                                   name="karbon-property-email" required
                                   type="email" value="">
                        </div>
                        <input name="prefix" type="hidden" value="karbon-property-">

                        <div class="w-100"><br/></div>


                        <div class="toggle toggle-border nobottommargin col-12">
                            <div class="togglet text-black-50" style="font-size: 1.1em !important;">
                                <i class="toggle-closed icon-circle" style="font-size: 1.3em !important;"></i>
                                <i class="toggle-open icon-ok-circle" style="font-size: 1.3em !important;"></i>
                                &nbsp; I want to add my properties now!
                            </div>
                            <div class="togglec" style="padding-left: 15px !important;">
                                <div class="notopmargin nobottommargin divider karbondivider divider-center"><i
                                            class="icon-double-angle-down"></i></div>
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <label class="text-black-50 nobottommargin" for="boro">Borough</label>
                                        <select class="selectpicker form-control bg-gri" data-style="bg-gri"
                                                data-live-search="false" data-size="6" name="boro"
                                                id="boro">
                                            <option class="bg-gri" value>--Select a Borough--
                                            </option>
                                            <option class="bg-gri" value="1">Manhattan</option>
                                            <option class="bg-gri" value="2">Bronx</option>
                                            <option class="bg-gri" value="3">Brooklyn</option>
                                            <option class="bg-gri" value="4">Queens</option>
                                            <option class="bg-gri" value="5">Staten Islands</option>
                                        </select>
                                    </div>

                                    <div class="w-100 d-md-none"><br/></div>

                                    <div class="col-md-6 col-12">
                                        <label class="text-black-50 nobottommargin" for="house-no-1-name">House Number:</label>
                                        <input class="form-control bg-gri" id="house-no-1-name"
                                               name="house-number" type="text" value="">
                                    </div>
                                    <div class="w-100"><br/></div>


                                    <div class="col-sm-12">
                                        <label class="text-black-50 nobottommargin" for="street-name2">Street Name:</label>
                                        <select class="form-control bg-gri" data-style="bg-gri" id="street-name2"
                                                name="street-name2" style="width: 100%;"></select>
                                    </div>
                                    <div class="w-100"><br/></div>

                                    <div class="col-sm-12" style="height: auto;">
                                        <label class="text-black-50 nobottommargin">Property List:</label>
                                        <input class="col_full required" data-role="tagsinput"
                                               id="PropertyListesi" style="color: transparent!important;"
                                               name="karbon-property-propertyList"
                                               readonly/>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 clearfix">
                            <button
                                    class="button button-3d button-rounded btn-block noleftmargin"
                                    id="PropertyEkleme"><p class="mobile">Subscribe for Alerts</p>
                                <p class="desktop">
                                    Subscribe for Instant Alerts</p>
                            </button>
                            {{--                            <p style="color: black;" class="text-center mb-auto"> OR </p>--}}
                            {{--                            <a href="{{route('addpropertyrequest')}}" target="_blank"--}}
                            {{--                               class="button button-amber button-3d button-rounded btn-block noleftmargin"--}}
                            {{--                            ><p class="mobile text-center">ADD PROPERTY FOR ME</p>--}}
                            {{--                                <p class="desktop text-center">ADD PROPERTY FOR ME</p>--}}
                            {{--                            </a>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('js')

    <script src="{{ asset('js/tagsinput.js') }}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script>
        jQuery(document).ready(function () {
            var route = "{{ route('property.search.ac') }}";

            $('#panel-street-name2').select2({
                width: 'resolve',
                minimumInputLength: 4,
                containerCssClass: 'bg-gri',
                dropdownCssClass: 'bg-gri',
                ajax: {
                    type: 'POST',
                    url: route,

                    dataType: 'json',
                    data: function (params) {
                        var query;
                        var borough = $("#panel-boro").val();
                        var house = $('#panel-house-no').val();

                        var token = $('meta[name="csrf-token"]').attr('content');
                        if (borough && house && params.term.length > 3) {
                            query = {
                                borough: borough, house: house, term: params.term, _token: token
                            };
                            return query;
                        } else {
                            return false;
                        }
                    },
                    processResults: function (data) {
                        // Transforms the top-level key of the response object from 'items' to 'results'
                        var result = $.map(data, function (obj) {
                            obj.id = obj.bin; // replace pk with your identifier
                            obj.text = obj.bin + ": " + (obj.lhnd.trim() === obj.hhnd.trim() ? obj.lhnd.trim() : obj.lhnd.trim() + " to " + obj.hhnd.trim()) + " - " + obj.stname; // replace pk with your identifier

                            return obj;
                        });
                        return {
                            results: result
                        };
                    }
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                }
            });


            $('#panel-street-name2').on('select2:select', function (e) {
                var data = e.params.data;
                console.log(data);


                var boroelm = $("#panel-boro");
                var borobtnelm = $('[data-id="panel-boro"]');
                var housenoelm = $('#panel-house-no');
                var streetnameelm = $('#panel-street-name2');
                if (!boroelm.val()) {
                    borobtnelm.css('borderColor', "red").css('borderWidth', '2px');
                } else {
                    borobtnelm.css('borderWidth', '1px');
                }

                if (!housenoelm.val()) {
                    housenoelm.css('borderColor', "red").css('borderWidth', '2px');
                    //return false;
                } else {
                    housenoelm.css('borderWidth', '1px');
                }

                if (!streetnameelm.val()) {
                    streetnameelm.css('borderColor', "red").css('borderWidth', '2px');
                    //    return false;
                } else {
                    streetnameelm.css('borderWidth', '1px');
                }

                if (boroelm.val() && housenoelm.val() && streetnameelm.val()) {

                    var elem = $("#PanelPropertyListesi");
                    // Selecting the input element and get its value
                    var boro = boroelm.find(":selected").text();
                    var house = housenoelm.val();
                    var street = data.stname;
                    //var lng = elem.tagsinput("items").length;
                    var tagsinputici = data.bin + " | " + house + ", " + street + ", " + boro;


                    // Displaying the value

                    // confirm('Do you want to save the form ??');

                    // Swal.fire({
                    //         title: 'Successfull!',
                    //         text: 'Your property is added to list.',
                    //         icon: 'success',
                    //         showConfirmButton: false,
                    //         timer: 1000
                    //     }
                    // );
                    window.selecteddata = {
                        id: data.bin,
                        house: house,
                        street: street,
                        zipcode: data.zipcode,
                        text: tagsinputici,
                    };

                    $('#subscribealertbtn').removeAttr('disabled');

                    // housenoelm.val('');
                    // streetnameelm.val('');
                    // boroelm.selectpicker('val', '');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please fill the form correctly!',
                        showConfirmButton: false,
                        timer: 1000
                    });
                }

            });

            $('#subscribealertbtn').on('click', function (e) {
                var route = "{{ route('add.property.to.user') }}";
                var properties = [window.selecteddata];
                var token = $('meta[name="csrf-token"]').attr('content');
                $.post(route, {properties: properties, _token: token})
                    .done(function (data) {
                        if (data === 'success') {
                            Swal.fire({
                                icon: 'success',
                                text: 'Successfully Added',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            location.reload();
                        } else if (data === 'Email already in use.') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data,
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured.!',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }
                    })
                    .fail(function () {
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occured.!',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    });
                return false;
            });

            $('#form-widget-submitted-main').hide();

            $('#alert-subscribe-form-main').bind('formSubmitSuccess', function () {
                $('#alert-subscribe-form-main').hide();
                $('#form-widget-submitted-main').show();
            });


            var elem = $("#PropertyListesi");
            elem.tagsinput({
                itemValue: 'id',
                itemText: 'text',
                tagClass: 'bootstrap-tagsinput badge big label label-danger'
            });


            $("#PropertyEkleme").on('click', function (e) {
                e.preventDefault();
                // if ($("#PropertyListesi").val()) {
                $('.overlay').show();
                var route = "{{ route('property.register') }}";
                var name = $('#karbon-property-name').val();
                var email = $('#karbon-property-email').val();
                var number = $('#karbon-property-contact').val();
                //var properties = $("#PropertyListesi").tagsinput("items").map(o => o['id']).toString();
                var properties = $("#PropertyListesi").tagsinput("items");
                $.post(route, {name: name, email: email, number: number, properties: properties})
                    .done(function (data) {
                        $('.overlay').hide();
                        if (data === 'Successfuly Subscribed.') {
                            $('#alert-subscribe-form-main').trigger('formSubmitSuccess');
                            window.location.replace("{{route('portal.index')}}");
                        } else if (data === 'Email already in use.') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data,
                                showConfirmButton: false,
                                timer: 1000
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'An error occured.!',
                                showConfirmButton: false,
                                timer: 1000
                            });
                        }
                    })
                    .fail(function () {
                        $('.overlay').hide();
                        Swal.fire({
                            icon: 'error',
                            text: 'An error occured.!',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    });
                return false;
                // }
                // Swal.fire({
                //     text: 'You did not add any property!',
                //     showConfirmButton: false,
                //     timer: 1000
                // });
                // return false;
            });
        });


        function AddProperty() {
            var boroelm = $("#boro");
            var borobtnelm = $('[data-id="boro"]');
            var housenoelm = $('#house-no-1-name');
            var streetnameelm = $('#street-name2');
            if (!boroelm.val()) {
                borobtnelm.css('borderColor', "red").css('borderWidth', 2);
            } else {
                borobtnelm.css('borderWidth', 0);
            }

            if (!housenoelm.val()) {
                housenoelm.css('borderColor', "red").css('borderWidth', 2);
                //return false;
            } else {
                housenoelm.css('borderWidth', 0);
            }

            if (!streetnameelm.val()) {
                streetnameelm.css('borderColor', "red").css('borderWidth', 2);
                //    return false;
            } else {
                streetnameelm.css('borderWidth', 0);
            }

            if (boroelm.val() && housenoelm.val() && streetnameelm.val()) {

                var elem = $("#PropertyListesi");
                // Selecting the input element and get its value
                var boro = boroelm.find(":selected").text();
                ;
                var house = housenoelm.val();
                var street = streetnameelm.val();
                var tagsinputici = streetnameelm.data('active').bin + " | " + house + ", " + street + ", " + boro;


                // Displaying the value

                // confirm('Do you want to save the form ??');

                Swal.fire({
                        title: 'Successfull!',
                        text: 'Your property is added to list.',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1000
                    }
                );
                console.log()
                elem.tagsinput('add', {
                    id: streetnameelm.data('active').bin,
                    house: house,
                    street: streetnameelm.data('active').stname,//street,
                    zipcode: streetnameelm.data('active').zipcode,
                    text: tagsinputici
                });
                elem.val(JSON.stringify(elem.tagsinput("items")));
                housenoelm.val('');
                streetnameelm.val('');
                boroelm.selectpicker('val', '');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill the form correctly!',
                    showConfirmButton: false,
                    timer: 1000
                });
            }
        }
    </script>

    <script type="text/javascript">
        var route = "{{ route('property.search.ac') }}";
        // $('#street-name2').typeahead({
        //     source: function (term, process) {
        //         //$('#property-detail').hide();
        //         var borough = $("#boro").val();
        //         var house = $('#house-no-1-name').val();
        //         if (borough && house && term.length > 3) {
        //             return $.post(route, {borough: borough, house: house, term: term}, function (data) {
        //                 return process(data);
        //             });
        //         } else {
        //             return false;
        //         }
        //     },
        //     matcher: function (item) {
        //         return true;
        //     },
        //     items: 10,
        //     delay: 500,
        //     minLenght: 3,
        //     autoSelect: true,
        //     fitToElement: true,
        //     displayText: function (item) {
        //         return item.bin + " - " + item.stname;
        //     },
        // });
    </script>

    <script>
        var route = "{{ route('property.search.ac') }}";

        $('#street-name2').select2({
            language: {
                noResults: function(){
                    return "No Results Found.  </br><i style='font-size:smaller'>If you're having difficulties to find the address, please </i><a href='{{route('contactus')}}' class='btn btn-sm btn-success float-right mb-1'>Contact Us</a>";
                }
            },
            escapeMarkup: function (markup) {
                return markup;
            },
            width: 'resolve',
            minimumInputLength: 4,
            containerCssClass: 'bg-gri',
            dropdownCssClass: 'bg-gri',
            ajax: {
                type: 'POST',
                url: route,

                dataType: 'json',
                data: function (params) {
                    var query;
                    var borough = $("#boro").val();
                    var house = $('#house-no-1-name').val();
                    if (borough && house && params.term.length > 3) {
                        query = {
                            borough: borough, house: house, term: params.term
                        };
                        return query;
                    } else {
                        return false;
                    }
                },
                processResults: function (data) {
                    // Transforms the top-level key of the response object from 'items' to 'results'
                    var result = $.map(data, function (obj) {
                        obj.id = obj.bin; // replace pk with your identifier
                        obj.text = obj.bin + ": " + (obj.lhnd.trim() === obj.hhnd.trim() ? obj.lhnd.trim() : obj.lhnd.trim() + " to " + obj.hhnd.trim()) + " - " + obj.stname; // replace pk with your identifier

                        return obj;
                    });
                    return {
                        results: result
                    };
                }
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
            }
        });


        $('#street-name2').on('select2:select', function (e) {
            var data = e.params.data;
            console.log(data);

            var boroelm = $("#boro");
            var borobtnelm = $('[data-id="boro"]');
            var housenoelm = $('#house-no-1-name');
            var streetnameelm = $('#street-name2');
            if (!boroelm.val()) {
                borobtnelm.css('borderColor', "red").css('borderWidth', 2);
            } else {
                borobtnelm.css('borderWidth', 0);
            }

            if (!housenoelm.val()) {
                housenoelm.css('borderColor', "red").css('borderWidth', 2);
                //return false;
            } else {
                housenoelm.css('borderWidth', 0);
            }

            if (!streetnameelm.val()) {
                streetnameelm.css('borderColor', "red").css('borderWidth', 2);
                //    return false;
            } else {
                streetnameelm.css('borderWidth', 0);
            }

            if (boroelm.val() && housenoelm.val() && streetnameelm.val()) {

                var elem = $("#PropertyListesi");
                // Selecting the input element and get its value
                var boro = boroelm.find(":selected").text();
                var house = housenoelm.val();
                var street = data.stname;
                var zipcode = data.zipcode;
                var lng = elem.tagsinput("items").length;
                var tagsinputici = lng + 1 + "    -  " + data.bin + " | " + (data.lhnd.trim() === data.hhnd.trim() ? data.lhnd.trim() : data.lhnd.trim() + " to " + data.hhnd.trim()) + ", " + street + ", " + boro;


                // Displaying the value

                // confirm('Do you want to save the form ??');

                // Swal.fire({
                //         title: 'Successfull!',
                //         text: 'Your property is added to list.',
                //         icon: 'success',
                //         showConfirmButton: false,
                //         timer: 1000
                //     }
                // );
                elem.tagsinput('add', {
                    id: data.bin,
                    house: house,
                    street: street,
                    zipcode: zipcode,
                    text: tagsinputici
                });
                elem.val(JSON.stringify(elem.tagsinput("items")));
                // housenoelm.val('');
                // streetnameelm.val('');
                // boroelm.selectpicker('val', '');
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please fill the form correctly!',
                    showConfirmButton: false,
                    timer: 1000
                });
            }

        });
    </script>
@stop

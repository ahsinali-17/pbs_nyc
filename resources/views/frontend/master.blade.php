<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

    <!-- HTML Meta Tags -->
    <meta name="description" content="Proactive Building Solution (PBS) is a property managmenet and monitoring system. You can get alert and manage everything related with your property. ">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://www.pbs.nyc">
    <meta property="og:type" content="website">
    <meta property="og:title" content="PBS.NYC | Proactive Building Solutions">
    <meta property="og:description" content="Proactive Building Solution (PBS) is a property managmenet and monitoring system. You can get alert and manage everything related with your property. ">
    <meta property="og:image" content="{{ asset('images/favicon.png') }}">

    <!-- Twitter Meta Tags -->
    <meta property="twitter:url" content="https://www.pbs.nyc">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PBS.NYC | Proactive Building Solutions">
    <meta name="twitter:description" content="Proactive Building Solution (PBS) is a property managmenet and monitoring system. You can get alert and manage everything related with your property. ">
    <meta name="twitter:image" content="{{ asset('images/favicon.png') }}">

    <meta content="text/html; charset=utf-8" http-equiv="content-type"/>
    <meta content="KarbonSoft" name="Karbonsoft Software Development"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <!-- Document Title     ============================================= -->
    <title>{{config('pbsnyc.sitename')}} @if($pageTitle??'') - @endif {{ $pageTitle ?? ''}}</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>

    @yield('meta')

    <link href="{{ asset('images/favicon.png') }}" rel="icon" sizes="16x16" type="image/png"/>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-RW51TYX51S"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-RW51TYX51S');
    </script>

    <!-- Stylesheets
    ============================================= -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Roboto:300,400,500,700|Rubik:400,600"
          rel="stylesheet"/>
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/dark.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('css/colors.php?color=778ca0') }}" type="text/css"/>
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/components/dark-components.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-icons/font-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-icons/realestate-font-icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/font-icons/et-line.css') }}" rel="stylesheet" type="text/css"/>


    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/font-icons/fonts.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Bootstrap Select CSS -->
{{--    <link href="{{ asset('css/components/bs-select.css') }}" rel="stylesheet" type="text/css"/>--}}

    <!-- Bootstrap Switch CSS -->
    {{--    <link href="{{ asset('css/components/bs-switches.css') }}" rel="stylesheet" type="text/css"/>--}}
<!-- Range Slider CSS -->
    {{--    <link href="{{ asset('css/components/ion.rangeslider.css') }}" rel="stylesheet" type="text/css"/>--}}

<!-- Bootstrap Data Table Plugin -->
    <link rel="stylesheet" href="{{asset('css/components/bs-datatable.css')}}"
          type="text/css"/>

    <link href="{{ asset('css/karbonsoft.css') }}" rel="stylesheet"/>

    <!--Tags input seysi-->
    <link href="{{ asset('css/tagsinput.css') }}" rel="stylesheet"/>

    <link href="{{ asset('vendor/pace-progress/themes/silver/pace-theme-flash.css') }}" rel="stylesheet" type="text/css"/>

    @stack('css')
    @yield('css')


</head>

<body class="stretched metalarkaplan dark sticky-responsive-menu side-push-panel">

{{--@include('frontend.partials.sidepanel')--}}

<!-- Document Wrapper
============================================= -->
<div class="bg-transparent clearfix" id="wrapper">


@include('frontend.partials.header')

@yield('slider')


@unless(Route::currentRouteName() == 'home')
    <!-- Page Title
		============================================= -->
        <section class="bg-section" id="page-title">

            <div class="container clearfix">
                <h1 class="text-white ">{{$pageTitle}}</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$pageTitle}}</li>
                </ol>
            </div>

        </section>
        <!-- #page-title end -->
    @endunless

    @include('frontend.partials.flyingbuttons')

    @yield('content')


    @include('frontend.partials.footer')

</div><!-- #wrapper end -->

<!-- Go To Top ============================================= -->
<div class="icon-angle-up" id="gotoTop"></div>

<!-- External JavaScripts ============================================= -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>

<!-- Bootstrap Select Plugin -->
{{--<script src="{{ asset('js/components/bs-select.js') }}"></script>--}}

<!-- Bootstrap Switch Plugin -->
{{--<script src="{{ asset('js/components/bs-switches.js') }}"></script>--}}

<!-- Range Slider Plugin -->
{{--<script src="{{ asset('js/components/rangeslider.min.js') }}"></script>--}}


{{--<script src="{{asset('js/components/bs-datatable.js')}}"></script>--}}

<!-- Sweet Alert ============================================= -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<!-- Footer Scripts ============================================= -->
<script src="{{ asset('js/functions.js') }}"></script>
@stack('js')
@yield('js')
<script src="{{asset('js/components/bs-datatable.js')}}"></script>

<script src="{{ asset('js/tagsinput.js') }}"></script>

<script
        src="{{asset('js/typeahead.min.js')}}"></script>
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet"/>
<script src="{{asset('js/select2.full.min.js')}}"></script>

<script src="{{asset('vendor/pace-progress/pace.min.js')}}"></script>

<script>

    $(document).ajaxStart(function () {
        Pace.restart();
    });


    $(document).ready(function () {
        var table1 = $('#sidepaneltable').DataTable({
            "ajax": "{{route('get.property.list.of.user')}}",
            "searching": false,
            "ordering": false,
            "scrollX": true,
            "paging": false,
            "info": false,
            "lengthMenu": [[10, 25, 100, -1], [10, 25, 100, "All"]],
            "responsive": true,
            "columnDefs": [
                {
                    "targets": [1],
                    "visible": false,
                }
            ]
        });

        $('#sidepaneltable tbody').on('click', 'tr', function () {
            $(this).toggleClass('selected');
        });

        $('#deletePropertyButton').on('click', function () {
            if (table1.rows('.selected').data().length < 1) {
                return;
            }
            var route = "{{ route('delete.property.from.user') }}";
            var propdata = table1.rows('.selected').data();
            // window.data = propdata;
            var properties = [];
            for (i = 0; i < propdata.length; i++) {
               properties.push(propdata[i][1]);
            }
            $.post(route, {properties: properties})
                .done(function (data) {
                    if (data === 'success') {

                        Swal.fire({
                            icon: 'success',
                            text: 'Successfully Deleted',
                            showConfirmButton: false,
                            timer: 1000
                        });
                        table1.ajax.reload();
                        // window.location.href="http://localhost:8000";
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

            console.log(table1.rows('.selected').data().length + " items selected to delete.");
        });

        $('#addPropertyButton').on('click', function () {
            console.log("call add new prop modal");
        });


        var elem = $("#PanelPropertyListesi");
        elem.tagsinput({
            itemValue: 'id',
            itemText: 'text',
            tagClass: 'bootstrap-tagsinput badge big label label-danger'
        });


        $("#PaneldenPropertyEkleme").submit(function (e) {
            e.preventDefault();
            if ($("#PanelPropertyListesi").val()) {
                var route = "{{ route('add.property.to.user') }}";
                var properties = $("#PanelPropertyListesi").tagsinput("items");
                $.post(route, {properties: properties})
                    .done(function (data) {
                        if (data === 'success') {
                            Swal.fire({
                                icon: 'success',
                                text: 'Successfully Added',
                                showConfirmButton: false,
                                timer: 1000
                            });
                            table1.ajax.reload();
                            $("#PanelPropertyListesi").tagsinput("removeAll");
                            $("#PanelPropertyListesi").val('');
                            $('#target').toggle();
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
            }
            Swal.fire({
                text: 'You did not add any property!',
                showConfirmButton: false,
                timer: 1000
            });
            return false;
        });


    });


    function PanelAddProperty() {
        var boroelm = $("#panel-boro");
        var borobtnelm = $('[data-id="panel-boro"]');
        var housenoelm = $('#panel-house-no');
        var streetnameelm = $('#panel-street-name');
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

            var elem = $("#PanelPropertyListesi");
            // Selecting the input element and get its value
            var boro = boroelm.find(":selected").text();
            ;
            var house = housenoelm.val();
            var street = streetnameelm.val();
            var lng = elem.tagsinput("items").length;
            var tagsinputici = lng + 1 + "    -  " + streetnameelm.data('active').bin + " | " + house + ", " + street + ", " + boro;


            // Displaying the value

            // confirm('Do you want to save the form ??');

            Swal.fire({
                    title: 'Successfull!',
                    text: 'Your property is added to list.',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1000
                });
            elem.tagsinput('add', {
                id: streetnameelm.data('active').bin,
                house: house,
                street: streetnameelm.data('active').stname,//street,
                zipcode: streetnameelm.data('active').zipcode,//street,
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
    $('#panel-street-name').typeahead({
        source: function (term, process) {
            //$('#property-detail').hide();
            var borough = $("#panel-boro").val();
            var house = $('#panel-house-no').val();
            if (borough && house && term.length > 3) {
                return $.post(route, {borough: borough, house: house, term: term}, function (data) {
                    return process(data);
                });
            } else {
                return false;
            }
        },
        matcher: function(item){
            return true;
        },
        items: 10,
        delay: 500,
        minLenght: 3,
        autoSelect: true,
        fitToElement: true,
        displayText: function (item) {
            return item.bin + " - " +item.stname;
        },
    });
</script>

<script>
    var route = "{{ route('property.search.ac') }}";

    $('#panel-street-name2').select2({
        width: 'resolve',
        minimumInputLength: 4,
        containerCssClass:'bg-gri',
        dropdownCssClass: 'bg-gri',
        ajax: {
            type: 'POST',
            url: route,

            dataType: 'json',
            data: function (params) {
                var borough = $("#panel-boro").val();
                var house = $('#panel-house-no').val();
                if (borough && house && params.term.length > 3) {
                    var query = {
                        borough: borough, house: house, term: params.term
                    };
                    return query;
                } else {
                    return false;
                }
            },
            processResults: function (data) {
                // Transforms the top-level key of the response object from 'items' to 'results'
                var data2 = $.map(data, function (obj) {
                    obj.id = obj.bin; // replace pk with your identifier
                    obj.text = obj.bin + " - " + obj.stname; // replace pk with your identifier

                    return obj;
                });
                return {
                    results: data2
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

            var elem = $("#PanelPropertyListesi");
            // Selecting the input element and get its value
            var boro = boroelm.find(":selected").text();
            var house = housenoelm.val();
            var street = data.stname;
            var lng = elem.tagsinput("items").length;
            var tagsinputici = lng + 1 + "    -  " + data.bin + " | " + house + ", " + street + ", " + boro;


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
                zipcode: data.zipcode,
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

<script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/sweetalert2-dark.css')}}">
</body>
</html>

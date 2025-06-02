@extends('portal.master')

@section('title', 'Dashboard')

@section('plugins.Sweetalert2', true)


@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div id="custom-search-input" class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Borough</label>
                            <select class="form-control select2" id="borough" name="borough" autocomplete="off">
                                <option value="0">Pick a Borough</option>
                                <option value="1">Manhattan</option>
                                <option value="2">Bronx</option>
                                <option value="3">Brooklyn</option>
                                <option value="4">Queens</option>
                                <option value="5">Staten Island</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="house">House No</label>
                            <input id="house" name="house" type="text" class="form-control" placeholder="House Number"
                                   autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label for="search">Street Name</label>
                            <input id="search" name="search" type="text" class="form-control typeahead" style="z-index: 999"
                                   placeholder="Search Street" data-provide="typeahead" autocomplete="off"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div id="property-detail" class="panel" style="display: none">
                    <div id="property-detail-body" class="panel-body">

                    </div>
                    <div class="panel-footer">
                        <button id="add-to-my-props" type="submit" class="btn btn-primary">Add to My Property List</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

@stop

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var route = "{{ route('property.search.ac') }}";
        var routeatl = "{{ route('property.list.add') }}";
        $('#search').typeahead({
            source: function (term, process) {
                $('#property-detail').hide();
                var borough = $('#borough').val();
                var house = $('#house').val();
                return $.post(route, {borough: borough, house: house, term: term}, function (data) {
                    return process(data);
                });
            },
            matcher: function(item){
                return true;
            },
            items:'all',
            delay:500,
            minLenght:3,
            autoSelect: true,
            fitToElement:true,
            displayText: function (item) {
                return item.bin + " - " +item.stname;
            },
            afterSelect: function (item){
                $('#property-detail-body').html(
                    '<div id="demo">'+JSON.stringify(item)+'</div>'
                );
                $('#add-to-my-props').on('click',function(){
                    $.post(routeatl,{bin: item.bin, bbl: item.bbl},function(response){
                        if ( response) {
                            Swal.fire(
                                'Success',
                                'Property Addition Successfull',
                                'success'
                            );

                            //toastr.success("Property Successfuly Added To List");
                            //$file.parent().fadeOut(300, function() { $(this).remove(); })
                        } else {
                            Swal.fire(
                                'Error',
                                'There is an error',
                                'error'
                            );
                            //toastr.error("Property Add Failed.");

                        }
                    });
                    console.log(item);
                });
                $('#property-detail').show();
            }
        });
    </script>
@stop

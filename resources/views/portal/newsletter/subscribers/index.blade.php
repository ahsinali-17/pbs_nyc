@extends('portal.master')

@section('title', 'Newsletter Subscribers')
@section('plugins.Datatables', true)

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title col-12 col-md-8  my-1 text-center text-md-left">
                    All Subscribers in "{{$list->name}}"
                </div>
                <div class="card-tools mx-0 col-12 col-md-4">
                    <div class="row">
                        <div class="col-12 col-md-4 my-1">
                            <a href="{{route('lists.index')}}" class="btn btn-block btn-sm btn-dark w-100"><i
                                        class="fas fa-backward"></i> Go Back</a>
                        </div>
                        <div class="col-6 col-md-4 my-1">
                            <a href="{{route('lists.subscribers.create',[$list->id])}}"
                               class="btn btn-block btn-sm btn-dark w-100"><i class="fas fa-plus-circle"></i> Create</a>
                        </div>
                        <div class="col-6 col-md-4 my-1">
                            <a href="{{route('lists.subscribers.bulkaddview',[$list->id])}}"
                               class="btn btn-block btn-sm btn-dark w-100"><i class="fas fa-paste"></i> Bulk Add</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div id="tablebody" class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table id="resultstable" data-order='[[ 0, "asc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>
                            <th width="5%">#</th>
                            <th width="20%">Name</th>
                            <th width="45%">E-Mail</th>
                            <th width="10%">Status</th>
                            <th width="10%">Created</th>
                            <th width="10%">Actions</th>
                            </thead>
                            <tbody>
                            @forelse($subscribers as $subscriber)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subscriber->merge_fields->FNAME}} {{$subscriber->merge_fields->LNAME}}</td>
                                    <td>{{$subscriber->email_address}}</td>
                                    <td>@if($subscriber->status)
                                            @if($subscriber->status == 'subscribed')
                                                <i style="color: green" class="fas fa fa-user-plus"></i>
                                                <i style="font-size:smaller">Subscribed</i>
                                            @else
                                                <i style="color: darkgrey" class="fas fa fa-user-minus"></i>
                                                <i style="font-size:smaller">Unsubscribed</i>
                                            @endif
                                        @else N/A
                                        @endif
                                    </td>
                                    <td>{{Str::substr($subscriber->timestamp_signup,0,10)}}</td>
                                    <td>
                                        <div class="row">
                                            {{--                                <a href="{{route('lists.subscribers.show',[$list->id,$subscriber->id])}}"--}}
                                            {{--                                   class="btn btn-secondary mx-1">View</a>--}}
                                            <a href="{{route('lists.subscribers.edit',[$list->id,$subscriber->id])}}"
                                               class="btn btn-warning mx-1">Edit</a>
                                            {!! Form::open(['route' => ['lists.subscribers.destroy', [$list->id,$subscriber->id]], 'method' => 'DELETE','class'=>'mx-1']) !!}
                                            {!! Form::hidden('subscriber_hash',$subscriber->id) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </div>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="8">No subscribers created.</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <th width="5%">#</th>
                            <th width="20%">Name</th>
                            <th width="45%">E-Mail</th>
                            <th width="10%">Status</th>
                            <th width="10%">Created</th>
                            <th width="10%">Actions</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

@stop

@section('js')
    <script>
        var table;
        $(function () {
            table = $('#resultstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
                buttons: [
                    {
                        extend: 'copyHtml5',
                        text: '<i class="fas fa-copy" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Copy'
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel" style="font-size: 1.2em;"></i>',
                        titleAttr: 'Excel'
                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-alt" style="font-size: 1.2em;"></i>',
                        titleAttr: 'CSV'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf" style="font-size: 1.2em;"></i>',
                        titleAttr: 'PDF'
                    }
                ],
                dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4 text-center'B><'col-sm-12 col-md-4'f>>" +
                    "<'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",

            });

            var filterbuttons2 = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter2",
                        text: 'ALL',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            table.draw();
                            //dt.columns(6).search("").draw();
                        }

                    },
                    {
                        name: "filter2",
                        text: 'Subscribed',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var status = data[3];
                                    if (status !== null && status !== '' && status.includes('Unsubscribed')) {
                                        return false;
                                    }
                                    return true;
                                }
                            );
                            table.draw();
                        }
                    },
                    {
                        name: "filter2",
                        text: 'Unsubscribed',
                        action: function (e, dt, node, config) {
                            table.buttons('filter2:name').active(false);
                            this.active(true);
                            $.fn.dataTable.ext.search.pop();
                            $.fn.dataTable.ext.search.push(
                                function (settings, data, dataIndex) {
                                    var status = data[3];
                                    if (status !== null && status !== '' && status.includes('Unsubscribed')) {
                                        return true;
                                    }
                                    return false;
                                }
                            );
                            table.draw();
                        }
                    },
                ]
            });

            table.buttons('filter2:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('Subscribed')").trigger();
            $('<div class="card-header"></div>').append($(filterbuttons2.container().addClass('col-12'))).prependTo($("#tablebody"));

        });
    </script>
@stop

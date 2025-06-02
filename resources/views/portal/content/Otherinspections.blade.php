@extends('portal.master')

@section('title', 'Other Inspections')

@section('plugins.Datatables', true)

@section('css')
    <style>
    </style>
@endsection

@section('content_header')
@stop


@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Other Inspections</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 4, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">

                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th width="8%">Type</th>
                                <th width="8%">Status</th>
                                <th width="40%">Description</th>
                                <th width="8%">Due Date</th>
                                <th width="8%">Alert Date</th>
                                <th width="5%">Alerted?</th>
                                <th width="8%"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->otherInspections as $item)
                                    <tr>
                                        <td>{{$property->house_number}} {{$property->stname}}</td>
                                        <td>{{$item->type}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>{{$item->content}}</td>
                                        <td>{{$item->due_date->format('Y-m-d')}}</td>
                                        <td>{{$item->alert_date->format('Y-m-d')}}</td>
                                        <td class="text-center">@if($item->last_alert == null)
                                                <i style="font-size: 1.2em" class="fas fa-times-circle text-danger"></i>
                                            @else
                                                <i style="font-size: 1.2em"
                                                   class="fas fa-check-circle text-success"></i>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row text-center">


                                                <div class="w-50 text-center">
                                                    <a href="{{route('otherinspections.edit',['inspectionid'=>$item->id])}}" id="edit" class="btn btn-warning  btn-sm"><i
                                                                class="fas fa-edit"></i>
                                                    </a>
                                                </div>

                                                <div class="w-50 text-center">
                                                    <form class="pr-1" method="post"
                                                          action="{{route('otherinspections.destroy',['inspectionid'=>$item->id])}}">
                                                        @csrf
                                                        <input type="hidden" name="property_id"
                                                               value="{{$property->id}}">
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ADDRESS</th>
                                <th width="8%">Type</th>
                                <th width="8%">Status</th>
                                <th width="40%">Description</th>
                                <th width="8%">Due Date</th>
                                <th width="8%">Alert Date</th>
                                <th width="5%">Alerted?</th>
                                <th width="8%"></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-light collapsed-card">
                    <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse"
                         aria-expanded="false">
                        <i class="fas fa-plus-circle"></i><b>&nbsp;Add New Custom Inspection</b>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-plus"></i>
                            </button>

                        </div>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body pt-0">
                        <div class="tab-pane fade active show" id="newfile" role="tabpanel"
                             aria-labelledby="newfile-tab">
                            <form role="form" method="post"
                                  action="{{route('otherinspections.store')}}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="property_id">Property</label>
                                        <select class="form-control" name="property_id">
                                            @foreach($properties as $property)
                                                <option value="{{$property->id}}">{{$property->getAddress()}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-lg-3">
                                        <label for="type">Inspection Type</label>
                                        <select class="form-control" name="type">
                                            <option value="LL84">LL84</option>
                                            <option value="LL87">LL87</option>
                                            <option value="LL152">LL152</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="status">Inspection Status</label>
                                        <select class="form-control" name="status">
                                            <option value="New">New</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="On Hold">On Hold</option>
                                            <option value="Cancelled">Cancelled</option>
                                            <option value="Completed">Completed</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="due_date">Due</label>
                                        <input type="date" class="form-control" name="due_date">
                                        </input>
                                    </div>
                                    <div class="form-group col-lg-3">
                                        <label for="alert_date">Notify Before:</label>
                                        <select class="form-control" name="alert_date">
                                            <option value="1">1 Week</option>
                                            <option value="4">1 Month</option>
                                            <option value="12">3 Months</option>
                                            <option value="24">6 Months</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="content">Details:</label>
                                    <textarea class="form-control" rows="3" name="content"
                                              id="content"
                                              placeholder="Content of the inspection ..."></textarea>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-secondary"><i
                                                class="fas fa-save"></i> Save
                                    </button>
                                    <button type="reset" class="btn btn-secondary"><i
                                                class="fas fa-window-close"></i> Cancel
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->


            </div>
            <!-- /.card -->
        </div>
    </div>



    </div>
@stop

@section('js')
    <!-- page script -->
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

            function filterfunc(e, dt, node, config) {
                dt.buttons('filter:name').active(false);
                this.active(true);
                var filter = node[0].innerText;
                if (filter === "ALL") filter = "";
                dt.columns().search("");
                dt.columns(1).search(filter).draw();

            }

            var filterbuttons = new $.fn.dataTable.Buttons(table, {
                "buttons": [
                    {
                        name: "filter",
                        text: '<b>ALL</b>',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("").draw();
                        }

                    },
                    {
                        name: "filter",
                        text: 'LL84',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(1).search("LL84").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'LL87',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(1).search("LL87").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'LL152',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(1).search("LL152").draw();
                        }
                    },
                    {
                        name: "filter",
                        text: 'Other',
                        action: function (e, dt, node, config) {
                            table.buttons('filter:name').active(false);
                            this.active(true);
                            dt.columns().search("");
                            dt.columns(1).search("Other").draw();
                        }
                    },
                ]
            });

            table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
            table.button("button:contains('ALL')").trigger();

            $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));


        });

    </script>
@stop


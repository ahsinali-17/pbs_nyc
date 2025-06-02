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
                <div class="card bg-light">
                    <div class="card-header hover text-muted border-bottom-0" data-card-widget="collapse"
                         aria-expanded="false">
                        <i class="fas fa-plus-circle"></i><b>&nbsp;Edit Custom Inspection</b>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body pt-0">
                        <div class="tab-pane fade active show" id="newfile" role="tabpanel"
                             aria-labelledby="newfile-tab">
                            <form role="form" method="post"
                                  action="{{route('otherinspections.update',['inspectionid'=>$inspection->id])}}"
                                  enctype="multipart/form-data">
                                @csrf
                                        <input type="hidden" class="form-control" name="property_id" value="{{$inspection->property->id}}">
                                        <input type="hidden" class="form-control" name="id" value="{{$inspection->id}}">
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="property_id">Property</label>
                                        <input type="text" disabled class="form-control" value="{{$inspection->property->getAddress()}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group  col-lg-3">
                                        <label for="type">Inspection Type</label>
                                        <select class="form-control" name="type">
                                            <option value="LL84" @if (old('type',$inspection->type) =="LL84") {{'selected'}} @endif>LL84</option>
                                            <option value="LL87" @if (old('type',$inspection->type) =="LL87") {{'selected'}} @endif>LL87</option>
                                            <option value="LL152" @if (old('type',$inspection->type) =="LL152") {{'selected'}} @endif>LL152</option>
                                            <option value="Other" @if (old('type',$inspection->type) =="Other") {{'selected'}} @endif>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="status">Inspection Status</label>
                                        <select class="form-control" name="status">
                                            <option value="New" @if (old('status',$inspection->status) =="New") {{'selected'}} @endif>New</option>
                                            <option value="In Progress" @if (old('status',$inspection->status) =="In Progress") {{'selected'}} @endif>In Progress</option>
                                            <option value="On Hold" @if (old('status',$inspection->status) =="On Hold") {{'selected'}} @endif>On Hold</option>
                                            <option value="Cancelled" @if (old('status',$inspection->status) =="Cancelled") {{'selected'}} @endif>Cancelled</option>
                                            <option value="Completed" @if (old('status',$inspection->status) =="Completed") {{'selected'}} @endif>Completed</option>
                                        </select>
                                    </div>
                                    <div class="form-group  col-lg-3">
                                        <label for="due_date">Due</label>
                                        <input type="date" class="form-control" name="due_date" value="{{ \Carbon\Carbon::parse(old('due_date',$inspection->due_date))->format('Y-m-d') }}">
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
                                              placeholder="Content of the inspection ...">{{ old('content',$inspection->content) }}</textarea>
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
        $('#edit').on('click')
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


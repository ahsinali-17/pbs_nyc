@extends('portal.master')

@section('title', 'FDNY Complints')

@section('plugins.Datatables', true)

@section('content_header')
@stop

@section('content')


    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">FDNY Complaints</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="resultstable" data-order='[[ 1, "desc" ]]' class="table table-bordered table-striped"
                               autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">


                            <thead>
                            <tr>
                                <th>ADDRESS</th>
                                <th>Complaint #</th>
                                <th>Received</th>
                                <th>Agency</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($properties as $property)
                                @foreach($property->serviceRequests311 as $item)
                                    @if(Str::contains(\App\Helpers\Helper::getServicesRequestsAgency($item->agency), 'FDNY'))
                                   <tr>
                                       <td> {{$property->house_number}} {{$property->stname}}</td>
                                       <td>{{$item->unique_key}}</td>
                                       <td>{{$item->createdDate()}}</td>
                                       <td>{{\App\Helpers\Helper::getServicesRequestsAgency($item->agency)}}</td>
                                       <td>{{$item->complaint_type}}</td>
                                       <td>{{$item->descriptor}}</td>
                                       <td>{{$item->status}}</td>
                                   </tr>
                                   @endif
                               @endforeach
                           @endforeach
                           </tbody>
                           <tfoot>
                           <tr>
                               <th>ADDRESS</th>
                               <th>Complaint #</th>
                               <th>Received</th>
                               <th>Agency</th>
                               <th>Type</th>
                               <th>Desc</th>
                               <th>Status</th>
                           </tr>
                           </tfoot>
                       </table>
                   </div>
                   <!-- /.card-body -->
               </div>
               <!-- /.card -->
           </div>
       </div>
   </div>
@stop

@section('css')
   <link rel="stylesheet" href="/css/admin_custom.css">
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
               dt.columns(6).search(filter).draw();

           }

           var filterbuttons = new $.fn.dataTable.Buttons(table, {
               "buttons": [
                   {
                       name: "filter",
                       text: 'ALL',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Assigned',
                       action: filterfunc,

                   },
                   {
                       name: "filter",
                       text: 'Started',
                       action: filterfunc,

                   },
                   {
                       name: "filter",
                       text: 'Unspecified',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Draft',
                       action: filterfunc,
                   },

                   {
                       name: "filter",
                       text: 'In Progress',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Unassigned',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Cancelled',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Email Sent',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Pending',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Open',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Closed',
                       action: filterfunc,
                   },
                   {
                       name: "filter",
                       text: 'Closed-Testing',
                       action: filterfunc,
                   },

               ]
           });
           table.buttons('filter:name').nodes().removeClass('btn-secondary').addClass('btn-outline-secondary btn-flat m-1');
           table.button("button:contains('Open')").trigger();
           $('<div class="row mb-3"></div>').append($(filterbuttons.container().addClass('col-12'))).prependTo($(table.table().container()));

       });

   </script>
@stop


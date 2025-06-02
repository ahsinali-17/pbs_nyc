@extends('portal.master')

@section('title', 'Settings')

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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h3>All Settings</h3></div>
                        <div class="card-tools">   @if(Auth::user()->hasRole('developer'))
                                <a href="{{route('settings.create')}}" class="btn btn-lg btn-block btn-secondary">Create New Setting</a>
                            @endif</div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="settingstable" class="table table-bordered table-striped table-valign-middle" autosize="1"
                                       style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                                       width="100%"
                                       border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                                    <thead>
                                    <th width="5%">#</th>
                                    <th width="20%">Category</th>
                                    {{--                <th width="15%">Key</th>--}}
                                    <th width="30%">Description</th>
                                    <th width="30%">Value</th>
                                    <th width="15%">Actions</th>
                                    </thead>
                                    <tbody>
                                    @forelse($settings as $setting)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            {{--                        <td>{{$setting->key}}</td>--}}
                                            <td>{{$setting->category}}</td>
                                            <td>{{$setting->description}}</td>
                                            <td>
                                                @if($setting->type == \App\Models\Settings::BOOL)
                                                    <i class="fas @if($setting->value) fa-lg text-success fa-check-circle @else text-danger fa-lg fa-times-circle @endif"></i>
                                                @else
                                                    {{$setting->value}}
                                                @endif
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <a href="{{route('settings.show',$setting->id)}}" class="btn btn-secondary mx-1">View</a>
                                                    <a href="{{route('settings.edit',$setting->id)}}" class="btn btn-warning mx-1">Edit</a>
                                                    @if(Auth::user()->hasRole('developer'))
                                                        {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'DELETE','class'=>'mx-1']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                </div>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">No settings yet.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <th>#</th>
                                    <th>Category</th>
                                    {{--                <th>Key</th>--}}
                                    <th>Description</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(function () {
            $('#settingstable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "responsive": true,
            });
        });
    </script>
@stop

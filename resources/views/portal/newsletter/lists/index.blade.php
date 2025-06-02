@extends('portal.master')

@section('title', 'Lists')

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')

        <div class="card">
            <div class="card-header">
                All Lists
                {{--            <a href="{{route('lists.create')}}" class="btn btn-lg btn-block btn-secondary">Create New List</a>--}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped" autosize="1"
                               style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                               width="100%"
                               border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                            <thead>
                            <th width="40%">Name</th>
                            <th width="10%">Member Count</th>
                            <th width="10%">Unsubscribe Count</th>
                            <th width="10%">Created</th>
                            <th width="30%">Actions</th>
                            </thead>
                            <tbody>
                            @forelse($lists as $list)
                                <tr>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->stats->member_count}}</td>
                                    <td>{{$list->stats->unsubscribe_count}}</td>
                                    <td>{{Str::substr($list->date_created,0,10)}}</td>
                                    <td>
                                        <div class="row">
                                            <a href="{{route('lists.subscribers.index',$list->id)}}"
                                               class="btn btn-secondary mx-1">Subscribers</a>
                                            {{--                                <a href="{{route('lists.edit',$list->id)}}" class="btn btn-warning mx-1">Edit</a>--}}
                                            {{--                                {!! Form::open(['route' => ['lists.destroy', $list->id], 'method' => 'DELETE','class'=>'mx-1']) !!}--}}
                                            {{--                                {!! Form::hidden('name',$list->name) !!}--}}
                                            {{--                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}--}}
                                            {{--                                {!! Form::close() !!}--}}
                                        </div>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="8">No lists created.</td>
                                </tr>
                            @endforelse
                            </tbody>
                            <tfoot>
                            <th width="40%">Name</th>
                            <th width="10%">Member Count</th>
                            <th width="10%">Unsubscribe Count</th>
                            <th width="10%">Created</th>
                            <th width="30%">Actions</th>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer">

            </div>
        </div>




@stop

@section('js')
    <script>

    </script>
@stop

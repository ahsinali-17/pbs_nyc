@extends('portal.master')

@section('title', 'Newsletters')

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
            <div class="row">
                <div class="col-md-10">
                    <h3>All Campaigns</h3>
                </div>
                <div class="col-md-2 text-right">
                    <a href="{{route('campaign.create')}}" class="btn btn-lg btn-block btn-secondary">Create New
                        Campaign</a>
                </div>
            </div>
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped" autosize="1"
                           style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                           width="100%"
                           border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                        <thead>
                        <th width="25%">Title</th>
                        <th width="10%">Recipients</th>
                        <th width="10%">Status</th>
                        <th width="5%">Total Sent</th>
                        <th width="10%">Created</th>
                        <th width="10%">Sent Time</th>
                        <th width="30%">Actions</th>
                        </thead>
                        <tbody>
                        @forelse($campaigns as $campaign)
                            <tr>
                                <td>{{$campaign->settings->title}}</td>
                                <td>@if($campaign->recipients->list_id) {{$campaign->recipients->list_name}} @else
                                        N/A @endif</td>
                                <td>@if($campaign->status)
                                        @if($campaign->status != 'sent')
                                            <i style="color: darkgrey" class="fas fa fa-envelope-open-text"></i>
                                            <i style="font-size:smaller">Draft</i>
                                        @else
                                            <i style="color: green" class="fas fa fa-mail-bulk"></i>
                                            <i style="font-size:smaller">Sent</i>
                                        @endif
                                    @else N/A
                                    @endif
                                </td>
                                <td>{{$campaign->emails_sent}} </td>
                                <td>{{Str::substr($campaign->create_time,0,10)}}</td>
                                <td>{{Str::substr($campaign->send_time,0,10)}} </td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('campaign.show',$campaign->id)}}"
                                           class="btn btn-secondary mx-1">View</a>
                                        @if($campaign->status != 'sent')<a href="{{route('campaign.edit',$campaign->id)}}"
                                                                           class="btn btn-warning mx-1">Edit</a>@endif
                                        @if($campaign->status == 'sent')<a href="{{route('campaign.report',$campaign->id)}}"
                                                                           class="btn btn-success mx-1">Report</a>@endif
                                        <a href="{{route('campaign.replicate',$campaign->id)}}" class="btn btn-warning mx-1">Replicate</a>
                                        {!! Form::open(['route' => ['campaign.destroy', $campaign->id], 'method' => 'DELETE','class'=>'mx-1']) !!}
                                        {!! Form::hidden('title',$campaign->settings->title) !!}
                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="8">No campaigns created.</td>
                            </tr>
                        @endforelse
                        </tbody>
                        <tfoot>
                        <th width="25%">Title</th>
                        <th width="10%">Recipients</th>
                        <th width="10%">Status</th>
                        <th width="5%">Total Sent</th>
                        <th width="10%">Created</th>
                        <th width="10%">Sent Time</th>
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

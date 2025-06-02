@extends('portal.master')

@section('title', 'View Campaign')

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $campaign->settings->title }}
                </div>
                <div class="card-body">
                    {!! $content->archive_html !!}
                </div>
                <div class="card-footer">
                    <div class="col-md-12 mt-2">
                        {{ Html::linkRoute('campaign.index', '<< See all campaigns', array(), ['class' => 'btn btn-secondary btn-block btn-h1-spacing']) }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                @if($campaign->status != "sent")
                    <div class="card">
                        <div class="card-header">
                            Template Information
                        </div>
                        <div class="card-body">
                            <dl class="dl-horizontal">
                                <label>Status:</label>
                                {{$campaign->status}}
                            </dl>
                            <dl class="dl-horizontal">
                                <label>Created At:</label>
                                {{ $campaign->create_time }}
                            </dl>
                            <dl class="dl-horizontal">
                                <label>Title:</label>
                                {{ $campaign->settings->title }}
                            </dl>
                        </div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <div class="mr-1">
                                    {!! Html::linkRoute('campaign.edit', 'Edit', array($campaign->id), array('class' => 'btn btn-primary mr-1')) !!}
                                </div>
                                <div class="mr-1">

                                    {!! Form::open(['route' => ['campaign.destroy', $campaign->id], 'method' => 'DELETE']) !!}

                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger mr-1']) !!}

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Send a Test Email
                        </div>
                        {!! Form::open(['route' => ['campaign.sendtest',$campaign->id]]) !!}
                        <div class="card-body">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">E-Mail</span>
                                </div>
                                {!! Form::text('test_email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {!! Form::submit('Send Test', ['class' => 'btn btn-warning']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="card">
                        <div class="card-header">
                            Send the template to all recipients below
                        </div>
                        {!! Form::open(['route' => ['campaign.send', $campaign->id], 'method' => 'POST']) !!}
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-2">
                                    {{ Form::select('recipient_id',$recipients , null , ['class' => 'form-control','placeholder' => 'Pick a list...']) }}
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <div class="col-md-12 mt-2">
                                    {!! Form::submit('Send', ['class' => 'btn btn-success']) !!}
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            Template Information
                        </div>
                        <div class="card-body">
                            <b>This campaign already sent. Please create <a href="{{route('campaign.create')}}">a new
                                    one</a>.</b>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    Go to All Mail List
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            {{ Html::linkRoute('campaign.index', '<< See all campaigns', array(), ['class' => 'btn btn-secondary btn-block btn-h1-spacing']) }}
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
        $('#canspamBarWrapper').remove();

    </script>
@stop

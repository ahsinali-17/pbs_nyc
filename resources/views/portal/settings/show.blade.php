@extends('portal.master')

@section('title', 'View Setting')

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
            {!! Form::model($setting,['route' => ['settings.update',$setting->id],'files'=>'true','method' => 'PUT']) !!}
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {!! Form::label('key', 'Key', ['class' => 'control-label']) !!}
                        {!! Form::text('key', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                    </div>
                    @if($setting->type == \App\Models\Settings::BOOL)
                        <div class="form-group">
                            {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                            <br>
                            {!! Form::checkbox('value','1', null, ['class' => 'form-control','id'=>'value' ,'readonly','data-toggle'=>'switchbutton','data-size'=>'lg','data-onstyle'=>"outline-success", 'data-offstyle'=>"outline-secondary"]) !!}
                        </div>
                    @elseif ($setting->type == \App\Models\Settings::NUMBER)
                        <div class="form-group">
                            {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                            {!! Form::number('value', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                        </div>
                    @else
                        <div class="form-group">
                            {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                            {!! Form::text('value', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                        </div>
                    @endif
                    {{--                    <div class="form-group">--}}
                    {{--                        {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}--}}
                    {{--                        {!! Form::text('value', null, ['class' => 'form-control','disabled'=>'disabled']) !!}--}}
                    {{--                    </div>--}}

                    <div class="form-group">
                        {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                        {!! Form::text('category', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-4">
            <div class="well">

                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ $setting->created_at->format('Y/m/d H:s') }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ $setting->updated_at->format('Y/m/d H:s')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-{{auth()->user()->hasRole('developer') ? '6' : '12'}}">
                        {!! Html::linkRoute('settings.edit', 'Edit', array($setting->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    @role('developer')
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['settings.destroy', $setting->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                    @endrole
                </div>

                <div class="row">
                    <div class="col-md-12 mt-2">
                        {{ Html::linkRoute('settings.index', '<< See All Settings', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        @if($setting->type == \App\Models\Settings::BOOL)
        document.getElementById('value').switchButton('disable');
        @endif
    </script>
@stop

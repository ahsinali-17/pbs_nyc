@extends('portal.master')

@section('title', 'Settings')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Edit Setting</h1>
@stop

@section('content')

    @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($setting,['route' => ['settings.update',$setting->id],'files'=>'true','method' => 'PUT']) !!}
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                {!! Form::label('key', 'Key', ['class' => 'control-label']) !!}
                {!! Form::text('key', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
            </div>
            @if($setting->type == \App\Models\Settings::BOOL)
                <div class="form-group">
                    {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                    <br>
                    {!! Form::checkbox('value','1', null, ['class' => 'form-control','id'=>'value' ,'data-toggle'=>'switchbutton','data-size'=>'lg','data-onstyle'=>"outline-success", 'data-offstyle'=>"outline-secondary"]) !!}
                </div>
            @elseif ($setting->type == \App\Models\Settings::NUMBER)
                <div class="form-group">
                    {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                    {!! Form::number('value', null, ['class' => 'form-control']) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
                    {!! Form::text('value', null, ['class' => 'form-control']) !!}
                </div>
            @endif
            @if(Auth::user()->hasRole('developer'))
                <div class="form-group">
                    {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
                    {!! Form::select('type', [\App\Models\Settings::TEXT => "Text",\App\Models\Settings::NUMBER => "Number",\App\Models\Settings::BOOL => "Bool"],null, ['class' => 'form-control']) !!}
                </div>

            @endif
            <div class="form-group">
                {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
                @if(Auth::user()->hasRole('developer'))
                    {!! Form::text('category', null, ['class' => 'form-control']) !!}
                @else
                    {!! Form::text('category', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                @endif
            </div>

            <div class="form-group">
                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}

                @if(Auth::user()->hasRole('developer'))
                    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                @else
                    {!! Form::textarea('description', null, ['class' => 'form-control','disabled'=>'disabled']) !!}
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{$setting->created_at->format('Y/m/d H:s') }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ $setting->updated_at->format('Y/m/d H:s') }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('settings.index', 'Cancel', null, array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        $(function () {
            $("textarea.summernote-editor").summernote({
                tabsize: 2,
                height: 400,
            });
        });
    </script>
@stop

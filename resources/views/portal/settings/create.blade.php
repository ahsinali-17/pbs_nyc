@extends('portal.master')

@section('title', 'Settings')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Create New Settings</h1>
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
    {!! Form::open(['route' => 'settings.store','files'=>'true']) !!}
    <div class="row">
        <div class="form-group col-12">
            {!! Form::label('key', 'Key', ['class' => 'control-label']) !!}
            {!! Form::text('key', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-12">
            {!! Form::label('value', 'Value', ['class' => 'control-label']) !!}
            {!! Form::text('value', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-12">
            {!! Form::label('category', 'Category', ['class' => 'control-label']) !!}
            {!! Form::text('category', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-12">
            {!! Form::label('type', 'Type', ['class' => 'control-label']) !!}
            {!! Form::select('type', [\App\Models\Settings::TEXT => "Text",\App\Models\Settings::NUMBER => "Number",\App\Models\Settings::BOOL => "Bool"],null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-12">
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group col-12">
            {!! Form::submit('Create Setting', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
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

@extends('portal.master')

@section('title', 'Create a New List')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Create a New List</h1>
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
    <div class="row">

        {!! Form::open(['route' => 'lists.store','files'=>'true','class'=>'col-12']) !!}
        <div class="form-group">
            {!! Form::label('name', 'List Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('subject_line', 'E-Mail Subject', ['class' => 'control-label']) !!}
            {!! Form::text('subject_line', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('from_name', 'From Name', ['class' => 'control-label']) !!}
            {!! Form::text('from_name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('to_name', 'To Name', ['class' => 'control-label']) !!}
            {!! Form::text('to_name', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('reply_to', 'Reply to', ['class' => 'control-label']) !!}
            {!! Form::text('reply_to', "newsletter@pbs.nyc", ['class' => 'form-control','disabled'=>'disabled']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
            {!! Form::textarea('content', null, ['class' => 'form-control summernote-editor']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('list_id', 'Recipients List', ['class' => 'control-label']) !!}
            {{ Form::select('list_id',$recipients , null , ['class' => 'form-control','placeholder' => 'Pick a list...']) }}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Campaign', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $("textarea.summernote-editor").summernote({
                tabsize: 2,
                height: 400,
                callbacks: {
                    onImageUpload: function (files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    }
                },
            });

            $.upload = function (file) {
                let out = new FormData();
                out.append('file', file, file.name);
                out.append('_token',$('meta[name="csrf-token"]').attr('content'));

                $.ajax({
                    method: 'POST',
                    url: "{{route('campaign.imageupload')}}",
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function (img) {
                        $("textarea.summernote-editor").summernote('insertImage', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };
        });
    </script>
@stop

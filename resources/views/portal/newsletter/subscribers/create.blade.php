@extends('portal.master')

@section('title', 'Create a New Campaign')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Create New Subscriber</h1>
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

        {!! Form::open(['route' => ['lists.subscribers.store',$list->id],'files'=>'true','class'=>'col-12']) !!}
        <div class="form-group">
            {!! Form::label('fname', 'Firstname', ['class' => 'control-label']) !!}
            {!! Form::text('fname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('lname', 'Lastname', ['class' => 'control-label']) !!}
            {!! Form::text('lname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-Mail Address', ['class' => 'control-label']) !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Create Subscriber', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
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

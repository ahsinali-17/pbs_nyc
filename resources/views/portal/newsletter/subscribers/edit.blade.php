@extends('portal.master')

@section('title', 'Campaigns')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Edit Campaign</h1>
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
        {!! Form::model($subscriber,['route' => ['lists.subscribers.update',$list->id,$subscriber->id],'files'=>'true','method' => 'PUT','class'=>'col-12']) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Update subscriber {{$subscriber->merge_fields->FNAME}} {{$subscriber->merge_fields->LNAME}} ({{$subscriber->email_address}})
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('FNAME', 'Firstname', ['class' => 'control-label']) !!}
                            {!! Form::text('FNAME', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('LNAME', 'Lastname', ['class' => 'control-label']) !!}
                            {!! Form::text('LNAME', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email_address', 'E-Mail Address', ['class' => 'control-label']) !!}
                            {!! Form::text('email_address', null, ['class' => 'form-control']) !!}
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            {!! Form::submit('Update Subscriber', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

@section('js')
    <script>
        $(function () {
            $("textarea.summernote-editor").summernote({
                tabsize: 2,
                height: 700,
                emptyPara: '',
                callbacks: {
                    onImageUpload: function (files) {
                        for (let i = 0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                },
            });
            var basecontent = $('#basecontent')[0].innerHTML;
            $("textarea.summernote-editor").summernote('reset');
            $("textarea.summernote-editor").summernote('code', ' ');
            $("textarea.summernote-editor").summernote('pasteHTML', basecontent);

            $.upload = function (file) {
                let out = new FormData();
                out.append('file', file, file.name);
                out.append('_token', $('meta[name="csrf-token"]').attr('content'));

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

@extends('portal.master')

@section('title', 'Campaigns')

@section('plugins.Summernote', true)

{{--@section('content_header')--}}
{{--    <h1 class="m-0 text-dark">Edit Campaign</h1>--}}
{{--@stop--}}

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
    <div class="card">
        <div class="card-header">
            <h3>Edit Campaign</h3>
        </div>
    </div>
    <div class="row">
        {!! Form::model($campaign,['route' => ['campaign.update',$campaign->id],'files'=>'true','method' => 'PUT','class'=>'col-12']) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="form-group">
                            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
                            {!! Form::textarea('content', null, ['class' => 'form-control summernote-editor']) !!}

                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>


            </div>
            <div class="col-md-4">
                <div class="well">
                    <div class="card">
                        <div class="card-header">
                            Template Information
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                </thead>
                                <tbody>
                                <tr>
                                    <td width="40%"><b>Created At:</b></td>
                                    <td>{{Str::substr($campaign->create_time,0,10) }}</td>
                                </tr>
                                <tr>
                                    <td><b>From</b></td>
                                    <td>{{$campaign->settings->from_name}}</td>
                                </tr>
                                <tr>
                                    <td><b>Reply</b></td>
                                    <td>{{$campaign->settings->reply_to}}</td>
                                </tr>
                                <tr>
                                    <td><b>To Name</b></td>
                                    <td>{{$campaign->settings->to_name}}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-6">
                                    {!! Html::linkRoute('campaign.show', 'Cancel', array($campaign->id), array('class' => 'btn btn-danger btn-block')) !!}
                                </div>
                                <div class="col-sm-6">
                                    {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
                                </div>
                            </div>
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

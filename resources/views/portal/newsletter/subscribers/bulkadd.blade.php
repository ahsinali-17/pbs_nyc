@extends('portal.master')

@section('title', 'Bulk Add Subscribers')

@section('plugins.Summernote', true)

@section('css')
    <style>
        textarea {
            width: 100%;
            min-height: 100px;
            background: url({{asset('images/newsletterlinedtextarea.png')}}) top -12px left / auto no-repeat,
            linear-gradient(#F1F1F1 50%, #F9F9F9 50%) top left / 100% 32px;
            border: 1px solid #CCC;
            box-sizing: border-box;
            padding: 0 0 0 30px !important;
            resize: vertical;
            line-height: 16px !important;
            font-size: 13px !important;
        }
    </style>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Bulk Add Subscribers to "{{$list->name}}"</h1>
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
    {!! Form::open(['route' => ['lists.subscribers.bulkadd',$list->id],'method'=>'POST','class'=>'col-12']) !!}
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                All emails should write in seperate line, each line must contain E-Mail, First Name and Last Name
                respectively and these should be seperated with ;
                (semicolon). </br>
                Ex.</br>
                <b>info@pbs.nyc;Jon;Credendino</b>
                </i>
            </div>
            <div class="card-tools">
                <div class="form-group">
                    {!! Form::submit('Add All', ['class' => 'form-control btn btn-success btn-lg btn-block']) !!}
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                {!! Form::label('members', 'List of Subscribers', ['class' => 'control-label']) !!}
                {!! Form::textarea('members', null, ['class' => 'form-control', 'id' => 'subscribers','rows'=>'500','cols'=>'500', 'placeholder'=>'info@pbs.nyc;Jon;Credendino']) !!}
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                {!! Form::submit('Add All', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
            </div>
        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('js')
    <script>
        String.prototype.lines = function () {
            return this.split(/\r\n|\n|\r/);
        }
        String.prototype.lineCount = function () {
            return this.lines().length;
        }
        $("#subscribers").bind('input propertychange', function (e) {
            if ($("#subscribers").val().lineCount() > 500) {
                Swal.fire({
                        html: 'You can upload max 500 contact for one process.<br/> \r\n If your list is longer than 500, please split it!',
                        title: 'Maximum Subscriber exceed!',
                        icon: 'error',
                        showConfirmButton: true,
                    }
                );
                $("#subscribers").val($("#subscribers").val().lines().slice(0, 500).join('\r\n'));
            }
            console.log($("#subscribers").val().lineCount());
        });
    </script>
@stop

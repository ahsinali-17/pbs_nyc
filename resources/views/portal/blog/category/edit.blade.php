@extends('portal.master')

@section('title', 'Edit Category')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Edit Category</h1>
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
        {!! Form::model($category,['route' => ['category.update',$category->id],'files'=>'true','method' => 'PUT']) !!}
        <div class="col-md-8">
            {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
            {!! Form::textarea('description', null, ['class' => 'form-control summernote-editor']) !!}
            {!! Form::label('featured', 'Featured Image', ['class' => 'control-label']) !!}
            {!! Form::file('featured', ['class' => 'form-control']) !!}
        </div>
        <div class="col-md-3">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{$category->created_at->format('Y/m/d H:s') }}</dd>
                </dl>

                <dl class="dl-horizontal">
                    <dt>Last Updated:</dt>
                    <dd>{{ $category->updated_at->format('Y/m/d H:s') }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('category.show', 'Cancel', array($category->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
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
                height: 400,
            });
        });
    </script>
@stop

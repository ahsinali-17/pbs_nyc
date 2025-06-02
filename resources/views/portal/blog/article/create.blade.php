@extends('portal.master')

@section('title', 'Articles')

@section('plugins.Summernote', true)
@section('css')
    <style>
        .note-editable { background-color: #383838 !important; color: white!important;}
    </style>
@endsection

@section('content_header')
    <h1 class="m-0 text-dark">Create New Article</h1>
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

    {!! Form::open(['route' => 'article.store','files'=>'true']) !!}
    <div class="row">
        <div class="col-12">

        <div class="form-group">
            {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
            {!! Form::textarea('content', null, ['class' => 'form-control summernote-editor']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id', 'Category', ['class' => 'control-label']) !!}
            {!! Form::select('category_id', \App\Models\Blog\Category::pluck('name','id') , null , ['class' => 'form-control','placeholder' => 'Pick a category...']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('featured', 'Featured Image', ['class' => 'control-label']) !!}
            {!! Form::file('featured', ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <div class="form-check">
                {!! Form::checkbox('isActive', '1', true,  ['id' => 'isActive','class'=>'form-check-input']) !!}
                {!! Form::label('isActive', 'Publish?', ['class' => 'form-check-label']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::submit('Create Article', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
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
                height: 600,
                toolbar: [
                    ['clear', ['clear']],
                    ['style', ['bold', 'italic', 'underline']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                    ['insert', ['picture', 'link', 'video', 'table', 'hr']],
                    ['misc', ['undo', 'redo', 'fullscreen', 'codeview']]
                ]
            });
            $("textarea.summernote-editor").summernote('foreColor','white');
        });
    </script>
@stop

@extends('portal.master')

@section('title', 'Create New Category')

@section('plugins.Summernote', true)

@section('content_header')
    <h1 class="m-0 text-dark">Create New Category</h1>
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

    {!! Form::open(['route' => 'category.store','files'=>'true']) !!}
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', null, ['class' => 'form-control summernote-editor']) !!}
    {!! Form::label('featured', 'Featured Image', ['class' => 'control-label']) !!}
    {!! Form::file('featured', ['class' => 'form-control']) !!}
    {!! Form::submit('Create Category', ['class' => 'form-control btn btn-success btn-lg btn-block mt-2']) !!}
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

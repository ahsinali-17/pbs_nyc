@extends('portal.master')

@section('title', 'Articles')

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')

    <div class="row">
        <div class="col-md-10">
            <h1>All Articles</h1>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{route('article.create')}}" class="btn btn-lg btn-block btn-secondary">Create New Article</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped" autosize="1"
                   style="page-break-inside: avoid;margin: 20px 0px; border-collapse: collapse; width: 100%"
                   width="100%"
                   border="0" cellspacing="0" cellpadding="0" bgcolor="#bdc0c2">
                <thead>
                <th width="10%">#</th>
                <th width="25%">Title</th>
                <th width="20%">Featured Image</th>
                <th width="10%">Category</th>
                <th width="8%">Created At</th>
                <th width="8%">Updated At</th>
                <th width="4%">Published</th>
                <th width="15%">Actions</th>
                </thead>
                <tbody>
                @forelse($articles as $article)
                    <tr>
                        <td>{{$article->id}}</td>
                        <td>{{$article->title}}</td>
                        <td><img height="50px;" src="{{Storage::url($article->featured)}}"></td>
                        <td>@if($article->category) {{$article->category->name}} @else N/A @endif</td>
                        <td>{{$article->created_at->format('Y/m/d H:s')}}</td>
                        <td>{{$article->updated_at->format('Y/m/d H:s')}}</td>
                        <td><i class="fas fa-fw @if($article->isActive) fa-check-circle @else fa-times-circle @endif"></i>
                        </td>
                        <td>
                            <div class="row">
                                <a href="{{route('article.show',$article->id)}}" class="btn btn-secondary mx-1">View</a>
                                <a href="{{route('article.edit',$article->id)}}" class="btn btn-warning mx-1">Edit</a>
                                {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE','class'=>'mx-1']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="8">No articles written yet.</td>
                    </tr>
                @endforelse
                </tbody>
                <tfoot>
                <th>#</th>
                <th>Title</th>
                <th>Featured Image</th>
                <th>Category</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Published</th>
                <th>Actions</th>
                </tfoot>
            </table>
        </div>
    </div>
    {{$articles->links()}}

@stop

@section('js')
    <script>

    </script>
@stop

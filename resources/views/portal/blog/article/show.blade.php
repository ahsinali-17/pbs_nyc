@extends('portal.master')

@section('title', 'View Article')

@section('content_header')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            <strong>Success:</strong> {!! Session::get('success') !!}
        </div>
    @endif
@stop

@section('content')

    <div class="row">
        <div class="col-md-8">
            @if($article->featured)
                <img height="300px" src="{{Storage::url($article->featured)}}">
            @endif

            <h1>{{ $article->title }}</h1>

            <h3>@if($article->category) {{$article->category->name}} @else N/A @endif</h3>

            <div width="100%"><p class="lead">{!! $article->content !!}</p></div>

            <hr>


            {{--            <div class="tags">--}}
            {{--                @foreach ($post->tags as $tag)--}}
            {{--                    <span class="label label-default">{{ $tag->name }}</span>--}}
            {{--                @endforeach--}}
            {{--            </div>--}}

            {{--            <div id="backend-comments" style="margin-top: 50px;">--}}
            {{--                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>--}}

            {{--                <table class="table">--}}
            {{--                    <thead>--}}
            {{--                    <tr>--}}
            {{--                        <th>Name</th>--}}
            {{--                        <th>Email</th>--}}
            {{--                        <th>Comment</th>--}}
            {{--                        <th width="70px"></th>--}}
            {{--                    </tr>--}}
            {{--                    </thead>--}}

            {{--                    <tbody>--}}
            {{--                    @foreach ($post->comments as $comment)--}}
            {{--                        <tr>--}}
            {{--                            <td>{{ $comment->name }}</td>--}}
            {{--                            <td>{{ $comment->email }}</td>--}}
            {{--                            <td>{{ $comment->comment }}</td>--}}
            {{--                            <td>--}}
            {{--                                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>--}}
            {{--                                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>--}}
            {{--                            </td>--}}
            {{--                        </tr>--}}
            {{--                    @endforeach--}}
            {{--                    </tbody>--}}
            {{--                </table>--}}
            {{--            </div>--}}
        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <label>Url:</label>
                    <p>
                        <a href="{{ route('frontend.blog.article.show', $article->slug) }}">{{ route('frontend.blog.article.show', $article->slug) }}</a>
                    </p>
                </dl>

                {{--                <dl class="dl-horizontal">--}}
                {{--                    <label>Category:</label>--}}
                {{--                                        <p>{{ $post->category->name }}</p>--}}
                {{--                </dl>--}}

                <dl class="dl-horizontal">
                    <label>Published:</label>
                    <i class="fas fa-fw @if($article->isActive) fa-check-circle @else fa-times-circle @endif"></i>
                </dl>
                <dl class="dl-horizontal">
                    <label>Created At:</label>
                    <p>{{ $article->created_at->format('Y/m/d H:s') }}</p>
                </dl>

                <dl class="dl-horizontal">
                    <label>Last Updated:</label>
                    <p>{{ $article->updated_at->format('Y/m/d H:s')}}</p>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('article.edit', 'Edit', array($article->id), array('class' => 'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route' => ['article.destroy', $article->id], 'method' => 'DELETE']) !!}

                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 mt-2">
                        {{ Html::linkRoute('article.index', '<< See All Articles', array(), ['class' => 'btn btn-default btn-block btn-h1-spacing']) }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@stop

@section('js')
    <script>

    </script>
@stop

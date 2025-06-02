@extends('frontend.master')

@php($pageTitle ='Blog')

@section('meta')
    {{--meta etiketleri--}}

@stop

@section('css')


@stop

@section('slider')
    {{--slider bölümü--}}

@stop


@section('content')
    {{--content bölümü--}}
    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <div class="postcontent nobottommargin clearfix">

                    <!-- Posts
                    ============================================= -->
                    <div id="posts" class="small-thumbs">

                        @foreach($articles as $article)
                            <div class="entry clearfix">
                                @if($article->featured)
                                    <div class="entry-image">
                                        <a href="{{Storage::url($article->featured)}}" data-lightbox="image"><img
                                                    class="image_fade"
                                                    src="{{Storage::url($article->featured)}}"
                                                    alt="{{$article->title}}"></a>
                                    </div>
                                @endif
                                <div class="entry-c">
                                    <div class="entry-title">
                                        <h2>
                                            <a href="{{route('frontend.blog.article.show',$article->slug)}}">{{$article->title}}</a>
                                        </h2>
                                    </div>
                                    <ul class="entry-meta clearfix">
                                        <li><i class="icon-calendar3"></i> {{$article->created_at->format('M d, Y')}}
                                        </li>
                                        {{--                                    <li><a href="#"><i class="icon-user"></i> admin</a></li>--}}
                                        {{--                                    <li><i class="icon-folder-open"></i> <a href="#">General</a>, <a href="#">Media</a>--}}
                                        </li>
                                        {{--                                    <li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>--}}
                                        {{--                                    <li><a href="#"><i class="icon-camera-retro"></i></a></li>--}}
                                    </ul>
                                    <div class="entry-content">
                                        <p>{{\Illuminate\Support\Str::limit(html_entity_decode(strip_tags(htmlspecialchars_decode($article->content))),250)}}</p>
                                        <a href="{{route('frontend.blog.article.show',$article->slug)}}"
                                           class="more-link">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div><!-- #posts end -->

                    <!-- Pagination
                    ============================================= -->
                    <div class="row mb-3">
                        <div class="col-12">
                            {{$articles->links()}}
                        </div>
                    </div>
                    <!-- .pager end -->

                </div><!-- .postcontent end -->

                <!-- Sidebar
                ============================================= -->
                <div class="sidebar nobottommargin col_last clearfix">
                    <div class="sidebar-widgets-wrap">

                        <div class="widget widget_links clearfix">

                            <h4>Categories</h4>
                            <ul>
                                @foreach(\App\Models\Blog\Category::all() as $category)
                                    <li><a href="#">{{$category->name}}</a></li>
                                @endforeach
                            </ul>

                        </div>

                        <div class="widget clearfix">

                            <h4>Recent Articles</h4>
                            <div id="post-list-footer">
                                @foreach($recentArticles as $article)
                                    <div class="spost clearfix">
                                        @if($article->featured)
                                            <div class="entry-image">
                                                <a href="{{route('frontend.blog.article.show',$article->slug)}}"><img
                                                            src="{{Storage::url($article->featured)}}" alt="Image"></a>
                                            </div>
                                        @endif
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4>
                                                    <a href="{{route('frontend.blog.article.show',$article->slug)}}">{{$article->title}}</a>
                                                </h4>
                                            </div>
                                            <ul class="entry-meta">
                                                <li class="color"><i
                                                            class="icon-calendar3"></i> {{$article->created_at->format('M d, Y')}}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                </div><!-- .sidebar end -->

            </div>

        </div>

    </section><!-- #content end -->
    <!-- #content end -->
@stop


@section('js')
    {{--javascript bölümü--}}
@stop

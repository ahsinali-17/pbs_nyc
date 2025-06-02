<!-- Header ============================================= -->
<header class="full-header dark" id="header">
    <div class="metalarkaplan" id="header-wrap">
        <div class="container clearfix">
            <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
            <!-- Logo   ============================================= -->
            <div id="logo">
                <a class="standard-logo" data-dark-logo="{{ asset('images/logos/logo.png') }}" href="{{route('home')}}"><img
                            alt="Proactive Building Solutions | PBS.NYC"
                            src="{{ asset('images/logos/logo.png') }}"></a>
                <a class="retina-logo" data-dark-logo="{{ asset('images/logos/logo.png') }}"
                   href="{{route('home')}}"><img
                            alt="Proactive Building Solutions | PBS.NYC"
                            src="{{ asset('images/logos/logo.png') }}"></a>
            </div>
            <!-- #logo end -->

            <!-- Primary Navigation ============================================= -->
            <nav class="with-arrows" id="primary-menu">
                <ul class="align-self-start">
                    <li><span class="menu-bg col-auto align-self-start d-flex"></span></li>
                    @foreach(config('pbsnyc.menu') as $menuitem)
                        <li class="{{$menuitem['class']}}"><a
                                    href="@if($menuitem['href'] !== "#"){{route($menuitem['href'])}}@else#@endif">
                                <div>
                                    <i class="{{$menuitem['icon']}}"></i>{{$menuitem['text']}}
                                    @if($menuitem['text']==='Portal')
                                        @if(auth()->user())
                                            {{'('.explode(' ',auth()->user()->name)[0].')'}}
                                        @else {!! '(Login)' !!}
                                        @endif
                                    @endif</div>
                            </a>
                            @if($menuitem['submenu'])
                                <ul>
                                    @foreach($menuitem['submenu'] as $subitem)
                                        <li class="{{$subitem['class']}}"><a
                                                    href="@if($subitem['href'] !== "#"){{route($subitem['href'])}}@else#@endif">
                                                <div><i class="{{$subitem['icon']}}"></i>{{$subitem['text']}}</div>
                                            </a>
                                            @if($subitem['submenu'])
                                                <ul>
                                                    @foreach($subitem['submenu'] as $secondsub)
                                                        <li class="{{$secondsub['class']}}"><a
                                                                    href="@if($secondsub['href'] !== "#"){{route($secondsub['href'])}}@else#@endif">
                                                                <div>
                                                                    <i class="{{$secondsub['icon']}}"></i>{{$secondsub['text']}}
                                                                </div>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif

                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
                    @if(auth()->user())
                        @php( $logout_url = View::getSection('logout_url') ?? config('adminlte.logout_url', 'logout') )

                        @if (config('adminlte.use_route_url', false))
                            @php( $logout_url = $logout_url ? route($logout_url) : '' )
                        @else
                            @php( $logout_url = $logout_url ? url($logout_url) : '' )
                        @endif
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <div><i class="icon-line2-logout"></i>
                                {{ __('adminlte::adminlte.log_out') }}
                                    </div>
                            </a>
                            <form id="logout-form" action="{{ $logout_url }}" method="POST" style="display: none;">
                                @if(config('adminlte.logout_method'))
                                    {{ method_field(config('adminlte.logout_method')) }}
                                @endif
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </nav>
            <!-- #primary-menu end -->
        </div>
    </div>
</header>
<!-- #header end -->

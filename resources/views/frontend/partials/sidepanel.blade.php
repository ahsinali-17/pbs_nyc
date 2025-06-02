@push('css')
    {{--css kodları--}}
    <style>
        .profile-user-img {
            border: 3px solid #adb5bd;
            margin: 0 auto;
            padding: 3px;
            width: 100px;
        }
    </style>
@endpush



<div id="side-panel">
    <div class="side-panel-trigger" id="side-panel-trigger-close"><a href="#"><i class="icon-line-cross"></i></a></div>
    <div class="side-panel-wrap pl-3 pr-4">
        <div style="width: 100%!important;" class="widget clearfix mb-3">
            @if(!auth()->user())
                <h4 class="t400">Register New Account</h4>
                <a class="button button-3d button-rounded btn-block center noleftmargin mb-5"
                   href="{{route('register')}}">Register</a>

                <h4 class="t400">Existing Account?</h4>
                <form action="{{route('login')}}" class="nobottommargin" id="login-form" method="post"
                      name="login-form">
                    @csrf
                    <div class="col_full">
                        <label class="t400" for="email">E-Mail:</label>
                        <input class="form-control" id="email" name="email" type="email" value=""/>
                    </div>
                    <div class="col_full">
                        <label class="t400" for="password">Password:</label>
                        <input class="form-control" id="password" name="password" type="password" value=""/>
                    </div>
                    <div class="col_full">
                        <button class="button button-3d button-rounded btn-block nomargin" id="login-form-submit"
                                name="login-form-submit"
                                value="login">Login
                        </button>
                    </div>
                    <div class="col_full nobottommargin">
                        <a class="fright" href="{{route('password.request')}}">Forgot Password?</a>
                    </div>
                </form>
            @else
                Hi,

                <div class="px-0 mb-1 clearfix">
                    <div class="min-vh-20 feature-box fbox-center fbox-bg px-2 ">
                        <div class="fbox-icon">
                            {{--                            <a href="#"><i class="bg-section icon-et-profile-male"></i></a>--}}
                            <img class="profile-user-img img-fluid img-circle"
                                 src="{{auth()->user()->adminlte_image()}}"
                                 alt="User profile picture">
                        </div>
                        <h3>{{auth()->user()->name}}    </h3>
                        <span class="subtitle small"> {{auth()->user()->email}}</span>
                        <br/>
                        <span class="subtitle small">{{auth()->user()->contact_number}}</span>
                        <br/>

                    </div>
                </div>
                <div class="mb-3 clearfix">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <form action="{{route('logout')}}" class="nobottommargin" id="logout-form" method="post"
                                  name="login-form">
                                @csrf
                                <div>
                                    <button class="btn w-100 btn-secondary"
                                            id="logout-form-submit"
                                            name="login-form-submit"
                                            value="logout"><i class="fa fa-sign-out-alt"> </i>

                                        <h6 class="mb-0"><small>LOGOUT</small></h6>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('password.request')}}"
                               class="btn w-100  btn-secondary"><i class="fa fa-trash-alt "></i>
                                <h6 class="mb-0"><small>Reset Password</small></h6>
                            </a>


                        </div>
                        <div class="col-12 mt-2">
                            <a href="{{route('portal.index')}}" class="btn  w-100 btn-primary">
                                <i class="icon-people-carry"></i>
                                Member Portal
                            </a>
                        </div>
                    </div>
                </div>


                <div class="mx-0 px-0 table-responsive">
                    <table id="sidepaneltable" class="table text-white table-bordered" cellspacing="0"
                           width="100%">
                        <thead>
                        <tr>
                            <th style="min-width: 10px">#</th>
                            <th>BIN</th>
                            <th>Property</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <div class="my-3 clearfix">
                    <div class="row">
                        <div class="col-sm-6 ">
                            <button class="btn  w-100 btn-success" onclick="$('#target').toggle();">
                                <i class="fa fa-plus-circle"> </i>

                                <h6 class="mb-0"><small>Add New<br/>Property</small></h6>
                            </button>

                        </div>
                        <div class="col-sm-6">
                            <button id="deletePropertyButton" class="btn w-100  btn-danger">
                                <i class="fa fa-trash-alt "></i>

                                <h6 class="mb-0"><small>Delete Selected<br/>Property</small></h6>

                            </button>

                        </div>
                    </div>
                </div>
                {{--                                        yeni property ekle--}}
                <div id="target" style="display: none">
                    <div class="clearfix">
                        <div class=" advanced-real-estate-tabs nomargin clearfix">

                            <ul class="tab-nav clearfix">
                                <li class="noleftmargin w-100 desktop mobile"><a><i class="icon-bell"></i> Add Property
                                    </a></li>
                            </ul>

                            <div class="tab-container px-3">
                                <div class="tab-content clearfix" id="tab-karbonsearch">

                                    <div class="form-widget" id="alert-subscribe-form">

                                        <form id="PaneldenPropertyEkleme" action="include/form.php" autocomplete="off"
                                              class="nobottommargin" method="post">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <label class="text-black-50 nobottommargin"
                                                           for="panel-boro">Borough</label>
                                                    <select class="selectpicker form-control bg-gri" data-style="bg-gri"
                                                            data-live-search="false" data-size="6" name="panel-boro"
                                                            id="panel-boro">
                                                        <option class="bg-gri" value>Select a Borough
                                                        </option>
                                                        <option class="bg-gri" value="1">Manhattan</option>
                                                        <option class="bg-gri" value="2">Bronx</option>
                                                        <option class="bg-gri" value="3">Brooklyn</option>
                                                        <option class="bg-gri" value="4">Queens</option>
                                                        <option class="bg-gri" value="5">Staten Islands</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <label class="text-black-50 nobottommargin" for="panel-house-no">House
                                                        Number:</label>
                                                    <input class="form-control bg-gri" id="panel-house-no"
                                                           name="panel-house-no" type="text" value="">
                                                </div>

                                                {{--                                                <div class="col-sm-12">--}}
                                                {{--                                                    <label class="text-black-50 nobottommargin" for="panel-street-name">Street--}}
                                                {{--                                                        Name:</label>--}}
                                                {{--                                                    <input class="form-control bg-gri" id="panel-street-name"--}}
                                                {{--                                                           name="panel-street-name" type="text" value="">--}}
                                                {{--                                                </div>--}}
                                                <div class="col-sm-12">
                                                    <label class="text-black-50 nobottommargin"
                                                           for="panel-street-name2">Street Name:</label>
                                                    <select class="form-control bg-gri" data-style="bg-gri"
                                                            id="panel-street-name2"
                                                            name="panel-street-name2" style="width: 100%"></select>
                                                </div>
                                                <div class="w-100"></div>
                                                {{--                                                <div class="col-md-12 center">--}}
                                                {{--                                                    <button--}}
                                                {{--                                                            class="button button-3d button-rounded btn-block noleftmargin"--}}
                                                {{--                                                            id="addmoreproperty" onclick="PanelAddProperty();"--}}
                                                {{--                                                            type="button">--}}
                                                {{--                                                        <i class="icon-line-square-plus"></i> Add to List--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </div>--}}
                                                <div class="w-100"></div>
                                                <div class="col-sm-12" style="height: auto">
                                                    <label class="text-black-50 nobottommargin">Property List:</label>
                                                    <input class="col_full required" data-role="tagsinput"
                                                           id="PanelPropertyListesi"
                                                           style="color: transparent!important;"
                                                           name="panel-propertyList"
                                                           readonly/>
                                                </div>

                                                <input name="prefix" type="hidden" value="karbon-property-">
                                                <div class="col-md-12 clearfix">
                                                    <button
                                                            class="button button-3d button-rounded btn-block noleftmargin"
                                                            id="subscribealertbtn"><p class="mobile">Add All</p>
                                                        <p class="desktop">
                                                            Add All</p>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--            property ekleme bitti--}}



            @endif
        </div>
    </div>
</div>

@section('js')

@endsection

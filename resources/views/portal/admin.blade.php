@extends('portal.master')
@section('page', trans('ticketit::admin.index-title'))

@section('title', 'PBS Member Portal')

@section('plugins.Knob', true)

@section('content_header')
    <!-- Navbar -->
    {{--    <nav class="main-header navbar navbar-expand navbar-white navbar-light">--}}
    {{--        <!-- Left navbar links -->--}}
    {{--        <ul class="navbar-nav">--}}
    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item d-none d-sm-inline-block">--}}
    {{--                <a href="index3.html" class="nav-link">Home</a>--}}
    {{--            </li>--}}
    {{--            <li class="nav-item d-none d-sm-inline-block">--}}
    {{--                <a href="#" class="nav-link">Contact</a>--}}
    {{--            </li>--}}
    {{--        </ul>--}}

    {{--        <!-- SEARCH FORM -->--}}
    {{--        <form class="form-inline ml-3">--}}
    {{--            <div class="input-group input-group-sm">--}}
    {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--                <div class="input-group-append">--}}
    {{--                    <button class="btn btn-navbar" type="submit">--}}
    {{--                        <i class="fas fa-search"></i>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </form>--}}

    {{--        <!-- Right navbar links -->--}}
    {{--        <ul class="navbar-nav ml-auto">--}}
    {{--            <!-- Messages Dropdown Menu -->--}}
    {{--            <li class="nav-item dropdown">--}}
    {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
    {{--                    <i class="far fa-comments"></i>--}}
    {{--                    <span class="badge badge-danger navbar-badge">3</span>--}}
    {{--                </a>--}}
    {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <!-- Message Start -->--}}
    {{--                        <div class="media">--}}
    {{--                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
    {{--                            <div class="media-body">--}}
    {{--                                <h3 class="dropdown-item-title">--}}
    {{--                                    Brad Diesel--}}
    {{--                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
    {{--                                </h3>--}}
    {{--                                <p class="text-sm">Call me whenever you can...</p>--}}
    {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <!-- Message End -->--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <!-- Message Start -->--}}
    {{--                        <div class="media">--}}
    {{--                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
    {{--                            <div class="media-body">--}}
    {{--                                <h3 class="dropdown-item-title">--}}
    {{--                                    John Pierce--}}
    {{--                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
    {{--                                </h3>--}}
    {{--                                <p class="text-sm">I got your message bro</p>--}}
    {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <!-- Message End -->--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <!-- Message Start -->--}}
    {{--                        <div class="media">--}}
    {{--                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
    {{--                            <div class="media-body">--}}
    {{--                                <h3 class="dropdown-item-title">--}}
    {{--                                    Nora Silvester--}}
    {{--                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
    {{--                                </h3>--}}
    {{--                                <p class="text-sm">The subject goes here</p>--}}
    {{--                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <!-- Message End -->--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
    {{--                </div>--}}
    {{--            </li>--}}
    {{--            <!-- Notifications Dropdown Menu -->--}}
    {{--            <li class="nav-item dropdown">--}}
    {{--                <a class="nav-link" data-toggle="dropdown" href="#">--}}
    {{--                    <i class="far fa-bell"></i>--}}
    {{--                    <span class="badge badge-warning navbar-badge">15</span>--}}
    {{--                </a>--}}
    {{--                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
    {{--                    <span class="dropdown-item dropdown-header">15 Notifications</span>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <i class="fas fa-envelope mr-2"></i> 4 new messages--}}
    {{--                        <span class="float-right text-muted text-sm">3 mins</span>--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <i class="fas fa-users mr-2"></i> 8 friend requests--}}
    {{--                        <span class="float-right text-muted text-sm">12 hours</span>--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item">--}}
    {{--                        <i class="fas fa-file mr-2"></i> 3 new reports--}}
    {{--                        <span class="float-right text-muted text-sm">2 days</span>--}}
    {{--                    </a>--}}
    {{--                    <div class="dropdown-divider"></div>--}}
    {{--                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
    {{--                </div>--}}
    {{--            </li>--}}
    {{--        </ul>--}}
    {{--    </nav>--}}
    <!-- /.navbar -->

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard v2</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v2</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@stop

@section('content')
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Server Capacity</span>
                    <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Alerts</span>
                    <span class="info-box-number">41,410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Properties</span>
                    <span class="info-box-number">{{$properties->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Members</span>
                    <span class="info-box-number">{{$users->count()}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-6">
                    <!-- DIRECT CHAT -->
                    <div class="card direct-chat direct-chat-warning">
                        <div class="card-header">
                            <h3 class="card-title">Tickets</h3>

                            <div class="card-tools">
                                <span data-toggle="tooltip" title="3 New Messages" class="badge badge-warning">{{$open_tickets_count }}</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                                        data-widget="chat-pane-toggle">
                                    <i class="fas fa-comments"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            @if($tickets_count)
                                <div class="card-deck mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body row d-flex align-items-center">
                                            <div class="col-3" style="font-size: 5em;">
                                                <i class="fas fa-th"></i>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h1>{{ $tickets_count }}</h1>
                                                <div>Total Tickets</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card bg-danger">
                                        <div class="card-body row d-flex align-items-center">
                                            <div class="col-3" style="font-size: 5em;">
                                                <i class="fas fa-wrench"></i>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h1>{{ $open_tickets_count }}</h1>
                                                <div>{{ trans('ticketit::admin.index-open-tickets') }}</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card bg-success">
                                        <div class="card-body row d-flex align-items-center">
                                            <div class="col-3" style="font-size: 5em;">
                                                <i class="fas fa-thumbs-up"></i>
                                            </div>
                                            <div class="col-9 text-right">
                                                <h1>{{ $closed_tickets_count }}</h1>
                                                <span>{{ trans('ticketit::admin.index-closed-tickets') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-lg-12 mt-3">
                                        <nav>
                                            <ul class="nav nav-pills nav-justified">
                                                <li class="nav-item">
                                                    <a class="nav-link {{$active_tab == "cat" ? "active" : ""}}"
                                                       data-toggle="pill" href="#information-panel-categories">
                                                        <i class="fas fa-folder"></i>
                                                        <small>{{ trans('ticketit::admin.index-categories') }}</small>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{$active_tab == "agents" ? "active"  : ""}}"
                                                       data-toggle="pill" href="#information-panel-agents">
                                                        <i class="fas fa-user-secret"></i>
                                                        <small>{{ trans('ticketit::admin.index-agents') }}</small>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link {{$active_tab == "users" ? "active" : ""}}"
                                                       data-toggle="pill" href="#information-panel-users">
                                                        <i class="fas fa-users"></i>
                                                        <small>{{ trans('ticketit::admin.index-users') }}</small>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                        <br>
                                        <div class="tab-content">
                                            <div id="information-panel-categories"
                                                 class="list-group tab-pane fade {{$active_tab == "cat" ? "show active" : ""}}">
                                                <a href="#" class="list-group-item list-group-item-action disabled">
                            <span>{{ trans('ticketit::admin.index-category') }}
                                <span class="badge badge-pill badge-secondary">{{ trans('ticketit::admin.index-total') }}</span>
                            </span>
                                                    <small class="pull-right text-muted">
                                                        <em>
                                                            {{ trans('ticketit::admin.index-open') }} /
                                                            {{ trans('ticketit::admin.index-closed') }}
                                                        </em>
                                                    </small>
                                                </a>
                                                @foreach($categories as $category)
                                                    <a href="#" class="list-group-item list-group-item-action">
                        <span style="color: {{ $category->color }}">
                            {{ $category->name }} <span
                                    class="badge badge-pill badge-secondary">{{ $category->tickets()->count() }}</span>
                        </span>
                                                        <span class="pull-right text-muted small">
                            <em>
                                {{ $category->tickets()->whereNull('completed_at')->count() }} /
                                 {{ $category->tickets()->whereNotNull('completed_at')->count() }}
                            </em>
                        </span>
                                                    </a>
                                                @endforeach
                                                {!! $categories->render("pagination::bootstrap-4") !!}
                                            </div>
                                            <div id="information-panel-agents"
                                                 class="list-group tab-pane fade {{$active_tab == "agents" ? "show active" : ""}}">
                                                <a href="#" class="list-group-item list-group-item-action disabled">
                            <span>{{ trans('ticketit::admin.index-agent') }}
                                <span class="badge badge-pill badge-secondary">{{ trans('ticketit::admin.index-total') }}</span>
                            </span>
                                                    <span class="pull-right text-muted small">
                                <em>
                                    {{ trans('ticketit::admin.index-open') }} /
                                    {{ trans('ticketit::admin.index-closed') }}
                                </em>
                            </span>
                                                </a>
                                                @foreach($agents as $agent)
                                                    <a href="#" class="list-group-item list-group-item-action">
                                <span>
                                    {{ $agent->name }}
                                    <span class="badge badge-pill badge-secondary">
                                        {{ $agent->agentTickets(false)->count()  +
                                         $agent->agentTickets(true)->count() }}
                                    </span>
                                </span>
                                                        <span class="pull-right text-muted small">
                                    <em>
                                        {{ $agent->agentTickets(false)->count() }} /
                                         {{ $agent->agentTickets(true)->count() }}
                                    </em>
                                </span>
                                                    </a>
                                                @endforeach
                                                {!! $agents->render("pagination::bootstrap-4") !!}
                                            </div>
                                            <div id="information-panel-users"
                                                 class="list-group tab-pane fade {{$active_tab == "users" ? "show active" : ""}}">
                                                <a href="#" class="list-group-item list-group-item-action disabled">
                            <span>{{ trans('ticketit::admin.index-user') }}
                                <span class="badge badge-pill badge-secondary">{{ trans('ticketit::admin.index-total') }}</span>
                            </span>
                                                    <span class="pull-right text-muted small">
                                <em>
                                    {{ trans('ticketit::admin.index-open') }} /
                                    {{ trans('ticketit::admin.index-closed') }}
                                </em>
                            </span>
                                                </a>
                                                @foreach($agentusers as $user)
                                                    <a href="#" class="list-group-item list-group-item-action">
                                <span>
                                    {{ $user->name }}
                                    <span class="badge badge-pill badge-secondary">
                                        {{ $user->userTickets(false)->count()  +
                                         $user->userTickets(true)->count() }}
                                    </span>
                                </span>
                                                        <span class="pull-right text-muted small">
                                    <em>
                                        {{ $user->userTickets(false)->count() }} /
                                        {{ $user->userTickets(true)->count() }}
                                    </em>
                                </span>
                                                    </a>
                                                @endforeach
                                                {!! $agentusers->render("pagination::bootstrap-4") !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="card text-center">
                                    {{ trans('ticketit::admin.index-empty-records') }}
                                </div>
                            @endif
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <a href="/portal/tickets/create" class="btn btn-sm btn-info float-left">New Ticket</a>
                            <a href="/portal/tickets/" class="btn btn-sm btn-secondary float-right">View All Tickets</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!--/.direct-chat -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <!-- USERS LIST -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Latest Members</h3>

                            <div class="card-tools">
                                <span class="badge badge-danger">8 New Members</span>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                            class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                            class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <ul class="users-list clearfix">
                                <li>
                                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Alexander Pierce</a>
                                    <span class="users-list-date">Today</span>
                                </li>
                                <li>
                                    <img src="dist/img/user8-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Norman</a>
                                    <span class="users-list-date">Yesterday</span>
                                </li>
                                <li>
                                    <img src="dist/img/user7-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Jane</a>
                                    <span class="users-list-date">12 Jan</span>
                                </li>
                                <li>
                                    <img src="dist/img/user6-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">John</a>
                                    <span class="users-list-date">12 Jan</span>
                                </li>
                                <li>
                                    <img src="dist/img/user2-160x160.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Alexander</a>
                                    <span class="users-list-date">13 Jan</span>
                                </li>
                                <li>
                                    <img src="dist/img/user5-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Sarah</a>
                                    <span class="users-list-date">14 Jan</span>
                                </li>
                                <li>
                                    <img src="dist/img/user4-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Nora</a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                                <li>
                                    <img src="dist/img/user3-128x128.jpg" alt="User Image">
                                    <a class="users-list-name" href="#">Nadia</a>
                                    <span class="users-list-date">15 Jan</span>
                                </li>
                            </ul>
                            <!-- /.users-list -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <a href="#">View All Users</a>
                        </div>
                        <!-- /.card-footer -->
                    </div>
                    <!--/.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">Latest Managed ECB Orders</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table m-0">
                            <thead>
                            <tr>
                                <th>Client</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="pages/examples/invoice.html">ELMO</a></td>
                                <td>1793 Amsterdam Avenue</td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>$1800</td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">JAFFA</a></td>
                                <td>32 West Amsterdam DS</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>$346</td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">ELMO</a></td>
                                <td>32 West 123 Avenue</td>
                                <td><span class="badge badge-danger">OVER DUE</span></td>
                                <td>$785</td>

                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">ELMO</a></td>
                                <td>1793 Amsterdam Avenue</td>
                                <td><span class="badge badge-info">Processing</span></td>
                                <td>$785</td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">ELMO</a></td>
                                <td>1793 Amsterdam Avenue</td>
                                <td><span class="badge badge-success">Paid</span></td>
                                <td>$1800</td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">JAFFA</a></td>
                                <td>32 West Amsterdam DS</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>$346</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-tag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Paid Members</span>
                    <span class="info-box-number">200</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="far fa-heart"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Free Members</span>
                    <span class="info-box-number">1,050</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Foots</span>
                    <span class="info-box-number">114,381</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="far fa-comment"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Direct Messages&Tickets</span>
                    <span class="info-box-number">163,921</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


            <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Savings</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="PRoperty" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">Dob Complaints
                                    <span class="badge badge-warning float-right">$1800</span></a>
                                <span class="product-description">
                        32 West 312, Mn, NY.
                      </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Property" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">DOB Complaints
                                    <span class="badge badge-info float-right">$700</span></a>
                                <span class="product-description">
                        123 - 126 West Ams Stree, MN
                      </span>
                            </div>
                        </li>
                        <!-- /.item -->
                        <li class="item">
                            <div class="product-img">
                                <img src="dist/img/default-150x150.png" alt="Property" class="img-size-50">
                            </div>
                            <div class="product-info">
                                <a href="javascript:void(0)" class="product-title">
                                    ECB Hearings <span class="badge badge-danger float-right">
                        $350
                      </span>
                                </a>
                                <span class="product-description">
                        126 Amsterdam Avenue, NY
                      </span>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                    <a href="javascript:void(0)" class="uppercase">View All Savings</a>
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop

@section('js')
    <script>
        $(function () {
            /* jQueryKnob */

            $('.knob').knob({
                /*change : function (value) {
                //console.log("change : " + value);
                },
                release : function (value) {
                console.log("release : " + value);
                },
                cancel : function () {
                console.log("cancel : " + this.value);
                },*/
                draw: function () {

                    // "tron" case
                    if (this.$.data('skin') === 'tron') {

                        var a = this.angle(this.cv)  // Angle
                            ,
                            sa = this.startAngle          // Previous start angle
                            ,
                            sat = this.startAngle         // Start angle
                            ,
                            ea                            // Previous end angle
                            ,
                            eat = sat + a                 // End angle
                            ,
                            r = true;

                        this.g.lineWidth = this.lineWidth;

                        this.o.cursor
                        && (sat = eat - 0.3)
                        && (eat = eat + 0.3);

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value);
                            this.o.cursor
                            && (sa = ea - 0.3)
                            && (ea = ea + 0.3);
                            this.g.beginPath();
                            this.g.strokeStyle = this.previousColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                            this.g.stroke()
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false
                    }
                }
            });
        });
        /* END JQUERY KNOB */
    </script>

@append

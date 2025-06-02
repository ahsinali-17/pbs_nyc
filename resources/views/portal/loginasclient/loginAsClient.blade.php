@extends('portal.master')

@section('title', 'PBS Member Portal')

@section('plugins.Datatables', true)

@section('content_header')
    <h1 class="m-0 text-dark"><i class="fas fa-fw fa-mail-bulk"></i> Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Login As Clint
                            </span>

                        </div>
                    </div>
                    <div class="card-body">


                        <div class="table-responsive users-table">
                            <table id="example" class="table table-striped table-sm data-table">
                                {{--                                <caption id="user_count">--}}
                                {{--                                    {!! trans_choice('laravelusers::laravelusers.users-table.caption', 1, ['userscount' => $users->count()]) !!}--}}
                                {{--                                </caption>--}}
                                <thead class="thead">
                                <tr>
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th class="hidden-xs">E-mail</th>
                                    <th class="hidden-sm hidden-xs">Role</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Status</th>
                                    <th class="hidden-sm hidden-xs hidden-md">Photo</th>
                                    <th class="no-search no-sort">Actions</th>
                                    <th class="no-search no-sort"></th>
                                    <th class="no-search no-sort"></th>
                                </tr>
                                </thead>
                                <tbody id="users_table">
                                @foreach($users as $user)
                                    @if(\Illuminate\Support\Facades\Auth::user()->level()>=$user->level())
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td class="hidden-xs">{{$user->email}}</td>
                                            <td class="hidden-sm hidden-xs">
                                                @foreach ($user->roles as $user_role)
                                                    @if ($user_role->name == 'User')
                                                        @php $badgeClass = 'primary' @endphp
                                                    @elseif ($user_role->name == 'Admin')
                                                        @php $badgeClass = 'warning' @endphp
                                                    @elseif ($user_role->name == 'Unverified')
                                                        @php $badgeClass = 'danger' @endphp
                                                    @else
                                                        @php $badgeClass = 'dark' @endphp
                                                    @endif
                                                    <span class="badge badge-{{$badgeClass}}">{{ $user_role->name }}</span>
                                                @endforeach
                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md">
                                                <b>  {{Str::upper(isset($user->subscription()->stripe_status)?$user->subscription()->stripe_status:'Undefined')}} </b>
                                            </td>
                                            <td class="hidden-sm hidden-xs hidden-md">
                                                @if($user->photo) <img width="40px" src="{{asset($user->photo)}}">
                                                @else <img width="40px" src="{{asset('images/blank.svg')}}"> @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success btn-block"
                                                   href="{{ URL::to('users/' . $user->id) }}" data-toggle="tooltip"
                                                   title="Show User">
                                                    <i class="fas fa-user-check"></i> Show User
                                                </a>
                                            </td>
                                            <td>
                                               <a class="btn btn-sm btn-warning btn-block"
                                                href="{{ URL::to('portal/impersonate/take/' . $user->id) }}"
                                                data-toggle="tooltip"
                                                title="Login">
                                                <i class="fas fa-door-open"></i> Login This
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tbody id="search_results"></tbody>
                            </table>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection




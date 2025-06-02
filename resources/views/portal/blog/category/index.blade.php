@extends('portal.master')

@section('title', 'Categories')

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
            <h1>All Categories</h1>
        </div>
        <div class="col-md-2 text-right">
            <a href="{{route('category.create')}}" class="btn btn-lg btn-block btn-secondary">Create New Category</a>
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
                <th width="35%">Name</th>
                <th width="20%">Featured Image</th>
                <th width="10%">Created At</th>
                <th width="10%">Updated At</th>
                <th width="15%">Actions</th>
                </thead>
                <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><img height="50px;" src="{{Storage::url($category->featured)}}"></td>
                        <td>{{$category->created_at->format('Y/m/d H:s')}}</td>
                        <td>{{$category->updated_at->format('Y/m/d H:s')}}</td>
                        <td>
                            <div class="row">
                                <a href="{{route('category.show',$category->id)}}" class="btn btn-secondary mx-1">View</a>
                                <a href="{{route('category.edit',$category->id)}}" class="btn btn-warning mx-1">Edit</a>
                                {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'DELETE','class'=>'mx-1']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </div>
                    </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="6">No categories defined yet.</td>
                </tr>
                @endforelse
                </tbody>
                <tfoot>
                <th>#</th>
                <th>Name</th>
                <th>Featured Image</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
                </tfoot>
            </table>
        </div>
    </div>
    {{$categories->links()}}

@stop

@section('js')
    <script>

    </script>
@stop

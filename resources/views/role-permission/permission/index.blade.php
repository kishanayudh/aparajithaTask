@extends('layout.master')

@section('content')
@if(session('status'))
<div class='alert alert-success'>{{ session('status') }}</div>
@endif
<div class="card mt-3">
    <div class="card-header">
        <h4>{{ __('Permissions') }}
            @can('create permission')
            <a href="{{ url('permissions/create' )}}" class="btn btn-primary float-end">Add</a>
            @endcan
        </h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="data_table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sn=1;
                @endphp
                @foreach($permissions as $permission)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        @can('edit permission')
                        <a class="btn btn-primary" href="{{ url('permissions/'.$permission->id.'/edit') }}">Edit</a>
                        @endcan
                        @can('delete permission')
                        <a class="btn btn-danger" href="{{ url('permissions/'.$permission->id.'/delete') }}">Delete</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
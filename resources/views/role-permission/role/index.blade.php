@extends('layout.master')

@section('content')
@if(session('status'))
<div class='alert alert-success'>{{ session('status') }}</div>
@endif
<div class="card mt-3">
    <div class="card-header">
        <h4>{{ __('Roles') }}
            @can('create role')
            <a href="{{ url('roles/create' )}}" class="btn btn-primary float-end">Add</a>
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
                @foreach($roles as $role)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        @can('give permission to role')
                        <a class="btn btn-success" href="{{ url('roles/'.$role->id.'/give-permisions') }}">Add/Edit Permissions</a>
                        @endcan
                        @can('edit role')
                        <a class="btn btn-primary" href="{{ url('roles/'.$role->id.'/edit') }}">Edit</a>
                        @endcan
                        @can('delete role')
                        <a class="btn btn-danger" href="{{ url('roles/'.$role->id.'/delete') }}">Delete</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
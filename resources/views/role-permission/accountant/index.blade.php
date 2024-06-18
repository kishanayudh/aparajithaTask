@extends('layout.master')

@section('content')
                @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>{{ __('Accountants') }}
                        @can('create accountant')
                            <a href="{{ url('accountants/create') }}" class="btn btn-primary float-end">Add</a> 
                        @endcan  
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" id="data_table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn=1;
                                @endphp
                                @foreach ($users as $user)
                                    @if(in_array('accountant' , $user->getRoleNames()->toArray()))
                                        <tr>
                                            <td>{{ $sn++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $rolename)
                                                <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td>
                                            @can('edit accountant')
                                                <a href="{{ url('accountants/'.$user->id.'/edit') }}" class="btn btn-primary">Edit</a>
                                            @endcan
                                            @can('delete accountant') 
                                                <a href="{{ url('accountants/'.$user->id.'/delete') }}" class="btn btn-danger mx-2">Delete</a>
                                            @endcan
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
@endsection
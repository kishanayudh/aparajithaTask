@extends('layout.master')

@section('content')
        @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
            <li class="">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <div class="card">
            <div class="card-header">Edit Role
            </div>
            <div class="card-body">
                <form action="{{ url('roles/'.$role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="">Role Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $role->name }}" />
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

                </form>
            </div>
        </div>
@endsection
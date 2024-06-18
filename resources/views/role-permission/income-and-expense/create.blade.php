@extends('layout.master')

@section('content')
@if ($errors->any())
<ul class="alert alert-warning">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<div class="card mt-3">
    <div class="card-header">
        <h4>{{ __('Create Income And Expense') }}</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('income_and_expense') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="">Item</label>
                <input type="text" name="item" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Type</label>
                <select name="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="Income">{{ ('Income') }}</option>
                    <option value="Expense">{{ ('Expense') }}</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="text" name="amount" class="form-control" />
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
@endsection
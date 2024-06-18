@extends('layout.master')

@section('content')
@if ($errors->any())
<ul class="alert alert-warning">
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
</ul>
@endif

<div class="card">
    <div class="card-header">
        <h4>Edit Income And Expense</h4>
    </div>
    <div class="card-body">
        <form action="{{ url('income_and_expense/'.$inc_exp->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="">Item</label>
                <input type="text" name="item" value="{{ $inc_exp->item }}" class="form-control" />
                @error('item') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="">Type</label>
                <select name="type" class="form-control">
                    <option value="">Select Type</option>
                    <option value="Income" {{ $inc_exp->type =="Income" ? 'selected':'' }}>{{ ('Income') }}</option>
                    <option value="Expense" {{ $inc_exp->type =="Expense" ? 'selected':'' }}>{{ ('Expense') }}</option>
                </select>
                @error('type') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="">Amount</label>
                <input type="text" name="amount" value="{{ $inc_exp->amount }}" class="form-control" />
                @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
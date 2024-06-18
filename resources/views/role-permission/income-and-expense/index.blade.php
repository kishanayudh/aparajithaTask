@extends('layout.master')

@section('content')
@if (session('status'))
<div class="alert alert-success">{{ session('status') }}</div>
@endif

<div class="card mt-3">
    <div class="card-header">
        <h4>{{ __('Income And Expenses') }}
            @can('create income_and_expense')
            <a href="{{ url('income_and_expense/create') }}" class="btn btn-primary float-end">Add</a>
            @endcan
        </h4>
    </div>
    <div class="card-body">

        <table class="table table-bordered table-striped" id="data_table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Item</th>
                    <th>Type</th>
                    <th>Amount</th>
                    @canany(['edit income_and_expense', 'delete income_and_expense'])
                        <th>Action</th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @php
                    $sn = 1;
                    $total = 0;
                @endphp
                @foreach ($inc_exp as $row)
                <tr>
                    <td>{{ $sn++ }}</td>
                    <td>{{ $row->item }}</td>
                    <td>{{ $row->type }}</td>
                    <td>{{ $row->amount }}</td>
                    @php
                        if($row->type == 'Expense')
                        {
                            $total = $total - $row->amount;
                        }
                        else
                        {
                            $total = $total + $row->amount;
                        }
                    @endphp
                    @canany(['edit income_and_expense', 'delete income_and_expense'])
                        <td>
                            <a href="{{ url('income_and_expense/'.$row->id.'/edit') }}" class="btn btn-primary">Edit</a>
                            <a href="{{ url('income_and_expense/'.$row->id.'/delete') }}" class="btn btn-danger mx-2">Delete</a>
                        </td>
                    @endcanany
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $total }}</td>
                    @canany(['edit income_and_expense', 'delete income_and_expense'])
                        <td></td>
                    @endcanany
                </tr>
            </tfoot>
        </table>

    </div>
</div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Income_And_Expense;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class IncomeExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view income_and_expense', ['only' => ['index']]);
        $this->middleware('permission:create income_and_expense', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit income_and_expense', ['only' => ['edit','update']]);
        $this->middleware('permission:delete income_and_expense', ['only' => ['destroy']]);
    }

    public function index()
    {
        $inc_exp = Income_And_Expense::get();
        return view('role-permission.income-and-expense.index', ['inc_exp' => $inc_exp]);
    }

    public function create()
    {
        return view('role-permission.income-and-expense.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'type' => 'required',
            'amount' => 'required|integer',
        ]);

        $user = Income_And_Expense::create([
            'item' => $request->item,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect('/income_and_expense')->with('status', 'Record created successfully');
    }

    public function edit(Income_And_Expense $income_and_expense)
    {
        return view('role-permission.income-and-expense.edit', [
            'inc_exp' => $income_and_expense,        
        ]);
    }

    public function update(Request $request, Income_And_Expense $income_and_expense)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'type' => 'required',
            'amount' => 'required|integer',
        ]);

        $data = [
            'item' => $request->item,
            'type' => $request->type,
            'amount' => $request->amount,
        ];

        $income_and_expense->update($data);

        return redirect('/income_and_expense')->with('status', 'Record Updated Successfully');
    }

    public function destroy($income_and_expenseId)
    {
        $user = Income_And_Expense::findOrFail($income_and_expenseId);
        $user->delete();

        return redirect('/income_and_expense')->with('status', 'Record Deleted Successfully');
    }
}

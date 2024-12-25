<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['type', 'asset'])->get();

        return view("expenses", compact("expenses"));
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'type_id' => 'numeric|required',
            'asset_id' => 'numeric|required',
            'amount' => 'numeric|required',
            'start_at' => 'date|required',
            'end_at' => 'date|required',
            'comment' => 'string|nullable'
        ]);

        Expense::create($attributes);

        return redirect('/expenses');
    }

    public function show(Expense $expense): void
    {

    }

    public function edit(Expense $expense)
    {
        //
    }

    public function update(Request $request, Expense $expense)
    {
        $attributes = request()->validate([
            'type_id' => 'numeric|required',
            'asset_id' => 'numeric|required',
            'amount' => 'numeric|required',
            'start_at' => 'date|required',
            'end_at' => 'date|required',
            'comment' => 'string|nullable'
        ]);

        $expense->update($attributes);

        return redirect('expenses');
    }

    public function destroy(Expense $expense)
    {
        //
    }
}

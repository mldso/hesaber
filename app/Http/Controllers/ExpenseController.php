<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Expense;
use App\Models\Type;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Expense::with(['type', 'asset'])->orderBy('created_at', 'DESC')->paginate(5);

        return view("expense.index", compact("expenses"));
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

    public function create()
    {
        $types = Type::all();
        $assets = Asset::all();

        return view("expense.create", compact("types","assets"));
    }


    public function show(Expense $expense)
    {
        $expense->load(['type', 'asset']);
        return view('expense.show', compact('expense'));
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

        return response()->json($expense->toArray(), 201);
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect('/expenses');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CompanyExpense;
use Illuminate\Http\Request;

class CompanyExpenseController extends Controller
{
    public function company_expense()
    {
        $expenses = CompanyExpense::all();
        return view('blade.company_expense.company_expense', compact('expenses'));
    }
    public function company_expense_stores(Request $request)
    {
        CompanyExpense::create($request->all());
        return redirect()->back()->with('success', 'Company Expense created Successfully');
    }
    public function expense_delete($id)
    {
        $delete = CompanyExpense::find($id);
        $delete->delete();
        return redirect()->back()->with('error', 'Company Expense deleted Successfully');
    }
}

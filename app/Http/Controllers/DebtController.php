<?php

namespace App\Http\Controllers;

use App\Models\Debt;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    public function store(Request $request)
    {
        // request()->validate([
        //     'customer_name' => 'required',
        //     'voucher_no' => 'required',
        //     'amount' => 'required',
        // ]);

        // $debt = new Debt();
        // $debt->customer_name = $request->customer_name;
        // $debt->voucher_no = $request->voucher_no;
        // $debt->amount = $request->amount;
        // $debt->remark = $request->amount;
        // $debt->save();
        $debt = Debt::create($request->all());
        return redirect()->back()->with('success', 'Debt Register is Successfull');
    }

    public function delete($id)
    {

        $debt_delete = Debt::find($id);
        $debt_delete->delete();
        return redirect()->back()->with('delete_success', 'Debt Delete is Successfull');
    }

    public function show($id)
    {
        $debts = Debt::find($id);
        return view('blade.debt.debtEdit', compact('debts'));
    }

    public function update(Request $request, $id)
    {

        $debts = Debt::find($id);
        $debts->customer_name = $request->customer_name;
        $debts->voucher_no = $request->voucher_no;
        $debts->amount = $request->amount;
        $debts->remark = $request->remark;

        $debts->update();
        return redirect()->route('dashboard')->with('success', 'Debt Update is Successfull');
    }
}

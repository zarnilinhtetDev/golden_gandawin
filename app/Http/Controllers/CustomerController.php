<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer()
    {
        $customers = Customer::latest()->get();
        return view('blade.customer.customer', compact('customers'));
    }
    public function customer_store(Request $request, Customer $customers)
    {
        $customers->create($request->all());
        return back()->with('success', 'Customer Created Successfully');
    }
    public function customer_delete($id)
    {
        $delete = Customer::find($id);
        $delete->delete();
        return back()->with('error', 'Customer Deleted Successfully');
    }
    public function customer_edit($id)
    {
        $customer = Customer::find($id);
        return view('blade.customer.customer_edit', compact('customer'));
    }
    public function customer_update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->update($request->all());
        return redirect(url('customer'))->with('update', 'Customer Update Successfully');
    }
}

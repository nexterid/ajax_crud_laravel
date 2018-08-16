<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Crud1Controller extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(5);
        return view('crud.index', compact('customers'));
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
            return view('crud.form');
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate($request, $rules);
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return redirect('/laravel-easy-crud');
        }
    }

    public function delete($id)
    {
        Customer::destroy($id);
        return redirect('/laravel-easy-crud');
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
            return view('crud.form', ['customer' => Customer::find($id)]);
        else {
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
            ];
            $this->validate($request, $rules);
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $request->email;
            $customer->save();
            return redirect('/laravel-easy-crud');
        }
    }
}

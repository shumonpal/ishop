<?php

namespace App\Http\Controllers\AuthCustomer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Auth;

class ResisterController extends Controller
{
	
	protected $redirectPath = '/checkout-step-1';

    public function rules($request)
    {
        if ($request->ajax()) {
            return [
            'firstname' => 'required|max:80',
            'email' => 'required|email|max:80|unique:customers',
            'password' => 'required|max:80|min:6|confirmed',
            ];
        }
        $data = [
            'firstname' => 'required|max:80',
            'lastname' => 'required|max:80',
            'street' => 'required|max:100',
            'company' => 'nullable|max:100',
            'zip' => 'required|max:100',
            'state' => 'required|max:100',
            'country' => 'required|max:100',
            'phone' => 'required|max:255',            
            ];

            if (! $request->_method == 'PUT') {                
                $data['email'] = 'required|email|max:80|unique:customers';
                $data['password'] = 'required|max:80|min:6|confirmed';
            }else{
                $data['email'] = 'required|email|max:80';
            }

        return $data;

    }

    public function register(Request $request)
    {
    	$this->validate($request, $this->rules($request));
    	$data = $request->all();
    	$data['password'] = bcrypt($request->password);
    	$customer = Customer::create($data);
    	$this->guard()->login($customer);
    	return;
    }


    public function guard()
    {
    	return Auth::guard('customer_guard');
    }

    public function update(Request $request, $id)
    {
        //return $request->all();
        $this->validate($request, $this->rules($request));
        $data = $request->all();
        $customer = Customer::where('id', $id)->update($request->except('_method', '_token'));
        return redirect(route('checkout2'));
    }


}

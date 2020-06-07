<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\Customer as CustomerResource;
use App\Customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    //show All Customers
    public function index()
    {
        $Customers = Customer::with('contacts')->get();
        return  CustomerResource::collection($Customers);
    }

    //show a single Customer
    public function show(Customer $customer)
    {
        return new CustomerResource($customer::with('contacts')->get());
    }

    // save the new Customer
    public function store(CustomerRequest $request){
        $customer   =  new Customer();
        $customer->company=  $request->company;
        $customer->companyPhone=  $request->companyPhone;
        $customer->website=  $request->website;
        $customer->currency=  $request->currency;
        $customer->address=  $request->address;
        $customer->country=  $request->country;
        $customer->city=  $request->city;
        $customer->state=  $request->state;
        $customer->zipCode=  $request->zipCode;
        $customer->dateCreated=  $request->dateCreated;
        $customer->save();
        if($request->has('groups')){
            $customer->groups()->attach($request->groups);
        }
        return response()->json('The Customer was added successfully');
    }

    // show a view to edit Customer
    public function edit(Customer $customer){
        return new CustomerResource($customer::with('contacts')->get());
    }

    // persist the edited Customer
    public function update(CustomerRequest $request,Customer $customer){
//        $customer->update($request);
        $customer->update([
            'company'=>  $request->company,
            'companyPhone'=>  $request->companyPhone,
            'website'=>  $request->website,
            'currency'=>  $request->currency,
            'address'=>  $request->address,
            'country'=>  $request->country,
            'city'=>  $request->city,
            'state'=>  $request->state,
            'zipCode'=>  $request->zipCode,
            'dateCreated'=>  $request->dateCreated,
        ]);

        if($request->has('groups')) {
            $customer->groups()->sync($request->groups,false);
        }
        return response()->json('successfully updated');
    }

    // Delete Customer
    public function delete(Customer $customer){
        $customer->delete();
        return response()->json('successfully deleted');
    }


}

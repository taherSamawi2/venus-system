<?php

namespace App\Http\Controllers;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\Customer as CustomerResource;
use App\Customer;
use App\Project;
use Illuminate\Http\Request;

class customerController extends Controller
{
    //show All Customers
    public function index()
    {
        $Customers = Customer::paginate(10);
        return  CustomerResource::collection($Customers);
    }

    //show a single Customer
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    public function SaveCustomer($request ,$customer)
    {
        $customer->company =  $request->company;
        $customer->companyPhone =  $request->companyPhone;
        $customer->website =  $request->website;
        $customer->currency =  $request->currency;
        $customer->address =  $request->address;
        $customer->country =  $request->country;
        $customer->city =  $request->city;
        $customer->state =  $request->state;
        $customer->zipCode=  $request->zipCode;
        $customer->dateCreated=  $request->dateCreated;
        $customer->save();
        if($request->has('groups')){
            $customer->groups()->sync($request->groups,false);
        }
        return $customer;
    }

    // save the new Customer
    public function store(CustomerRequest $request)
    {
        $customer  = $this->SaveCustomer($request ,new Customer());
        return response()->json([
            "message" =>"added successfully",
            "item" => "Customer",
            "data" => $request->all()
        ], 201);
    }


    // persist the edited Customer
    public function update(CustomerRequest $request , Customer $customer){
        $customer  = $this->SaveCustomer($request , $customer);
        return response()->json([
            "message" => "successfully updated",
            "item" => "customer",
            "data" => $customer
        ], 200);
    }

    // Delete Customer
    public function delete(Customer $customer){
        $customer->delete();
        return response()->json([
            "message" => "successfully deleted",
            "item" => "customer",
        ], 204);
    }


}

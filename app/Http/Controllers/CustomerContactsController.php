<?php

namespace App\Http\Controllers;
use App\CustomerContacts;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;


class CustomerContactsController extends Controller
{
    //show All Contacts
    public function index()
    {
        $Contacts = CustomerContacts::all();
        return  ContactResource::collection($Contacts);
    }

    //show a single Contact
    public function show(CustomerContacts $contact)
    {
        return new ContactResource($contact);
    }

    // save the new Contact
    public function store(ContactRequest $request){
        $contact   =  new Contact();
        $contact->firstName=  $request->firstName;
        $contact->lastName=  $request->lastName;
        $contact->customer_id=  $request->customer;
        $contact->position=  $request->position;
        $contact->email=  $request->email;
        $contact->contactNumber=  $request->contactNumber;
        $contact->password= Hash::make($request->password);
        $contact->primaryContact=  $request->primaryContact;
        $contact->lastLogin=  $request->lastLogin;
        $contact->save();
        $contact->addMedia($request->imageProfile)->toMediaCollection('imageCustomerProfile');
        return response()->json('The Customer was added successfully');
    }

    // show a view to edit Contact
    public function edit(CustomerContacts $contact)
    {
        return new ContactResource($contact);
    }

    // persist the edited project
    public function update(ContactRequest $request,CustomerContacts $contact)
    {

        $input = $request->all();
        if(!empty($request->password))
        {
            $request['password'] = Hash::make($request->password);
        }
        else {
            $input = array_except($input,array('password'));
        }
        $contact->update($input);

//        $contact->update([
//            'firstName' => $request->firstName,
//            'lastName' => $request->lastName,
//            'customer_id' => $request->customer,
//            'position' => $request->position,
//            'email' => $request->email,
//            'password' => $request->password,
//            'contactNumber' => $request->contactNumber,
//            'primaryContact' => $request->primaryContact,
//            'lastLogin' => $request->lastLogin
//        ]);
        if($request->has('imageProfile')){
            $contact->addMedia(request('imageProfile'))->preservingOriginal()->toMediaCollection('imageCustomerProfile');
        }
        return response()->json('successfully updated');
    }

    // Delete Contact
    public function delete(CustomerContacts $contact)
    {
        $contact->delete();
        return response()->json('successfully deleted');
    }


}

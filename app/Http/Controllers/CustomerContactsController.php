<?php

namespace App\Http\Controllers;

use App\CustomerContacts;
use App\Http\Requests\ContactRequest;
use App\Http\Resources\Contact as ContactResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CustomerContactsController extends Controller
{
    //show All Contacts
    public function index()
    {
        $Contacts = CustomerContacts::paginate(10);
        return ContactResource::collection($Contacts);
    }

    //show a single Contact
    public function show(CustomerContacts $contact)
    {
        return new ContactResource($contact);
    }

    public function SaveContact($request, $contact)
    {
        $contact->firstName = $request->firstName;
        $contact->lastName = $request->lastName;
        $contact->customer_id = $request->customer;
        $contact->position = $request->position;
        $contact->email = $request->email;
        $contact->contactNumber = $request->contactNumber;
        $contact->password = $request->password;
        $contact->primaryContact = $request->primaryContact;
        $contact->lastLogin = $request->lastLogin;
        $contact->save();
        if ($request->has('imageProfile')) {
            $contact->addMedia($request->imageProfile)->toMediaCollection('imageCustomerProfile');
        }
        return $contact;
    }

    // save the new Contact
    public function store(ContactRequest $request)
    {
        $contact = $this->SaveContact($request, new CustomerContacts());
        return response()->json([
            "message" => "added successfully",
            "item" => "Contact",
            "data" => $contact
        ], 201);
    }

    // persist the edited Contact
    public function update(ContactRequest $request, CustomerContacts $contact)
    {
        $contact = $this->SaveCustomer($request, $contact);
        return response()->json([
            "message" => "successfully updated",
            "item" => "contact",
            "data" => $contact
        ], 200);
    }

    // Delete Contact
    public function delete(CustomerContacts $contact)
    {
        $contact->delete();
        return response()->json([
            "message" => "successfully deleted",
            "item" => "contact",
        ], 204);
    }


}

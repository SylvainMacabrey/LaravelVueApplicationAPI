<?php

namespace App\Http\Controllers;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ApiCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): AnonymousResourceCollection
    {
        return CustomerResource::collection(Customer::latest()->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): CustomerResource
    {
        $request->validate([
            "name" => 'required',
            "telephone" => 'required',
            "isFavorite" => 'boolean'
        ]);

        $customer = Customer::create([
            "name" => $request->name,
            "telephone" => $request->telephone,
            "isFavorite" => $request->isFavorite,
        ]);

        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return CustomerResource::make($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer): CustomerResource
    {
        $request->validate([
            "name" => 'required',
            "telephone" => 'required',
            "isFavorite" => 'boolean'
        ]);

        $customer->update($request->only(['name', 'telephone', 'isFavorite']));

        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer): Response
    {
        $customer->delete();
        return response()->noContent();
    }
}

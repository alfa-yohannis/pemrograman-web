<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Converter\StoreConverterRequest;
use App\Http\Requests\Converter\UpdateConverterRequest;
use App\Models\Converter;

class ConverterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $converters = Converter::all();
        return response()->api($converters, 'All currencies retrieved successfully', null, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConverterRequest $request)
    {
        $validatedData = $request->validated();
        $converter = Converter::insert($validatedData);
        return response()->api($converter, 'Currency converter created successfully', null, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Find the currency converter by its ID
        $converter = Converter::find($id);

        // Check if the currency converter exists
        if (!$converter) {
            // Return a not found response with a 404 status code
            return response()->api(null, 'Currency converter not found', 'Currency converter with ID ' . $id . ' was not found', Response::HTTP_NOT_FOUND);
        }

        // Return the currency converter as a JSON response
        return response()->api($converter, 'Currency converter retrieved successfully', null, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConverterRequest $request, string $id)
    {
        // Find the currency converter by its ID
        $converter = Converter::find($id);

        // Check if the currency converter exists
        if (!$converter) {
            // Return a not found response with a 404 status code
            return response()->api(null, 'Currency converter not found', 'Currency converter with ID ' . $id . ' was not found', Response::HTTP_NOT_FOUND);
        }

        // Get the index of the currency converter
        $index = Converter::all()->search(function ($item) use ($id) {
            return $item['id'] == $id;
        });

        // Validate the request data
        $validatedData = $request->validated();

        // Update the data (if needed)
        $updatedConverter = [
            'id' => $id,
            'from_currency' => $request->input('from_currency'),
            'from_currency_description' => $request->input('from_currency_description'),
            'to_currency' => $request->input('to_currency'),
            'to_currency_description' => $request->input('to_currency_description'),
            'conversion_rate' => $request->input('conversion_rate'),
        ];

        // Update the currency converter
        Converter::update($updatedConverter, $id);

        // Return the updated currency converter as a JSON response
        return response()->api($updatedConverter, 'Currency converter updated successfully', null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the currency converter by its ID
        $converter = Converter::find($id);

        // Check if the currency converter exists
        if (!$converter) {
            // Return a not found response with a 404 status code
            return response()->api(null, 'Currency converter not found', 'Currency converter with ID ' . $id . ' was not found', Response::HTTP_NOT_FOUND);
        }

        // Delete the currency converter
        Converter::delete($id);

        // Return a success response with a 200 status code
        return response()->api(null, 'Currency converter deleted successfully', null, Response::HTTP_OK);
    }
}

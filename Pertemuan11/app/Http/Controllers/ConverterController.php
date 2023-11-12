<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class ConverterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Currency Converter';
        $data['currencies'] = [
            'IDR' => 'Indonesia Rupiah',
            'USD' => 'United States Dollar',
            'EUR' => 'Euro Member Countries',
            'GBP' => 'United Kingdom Pound',
            // Add more currencies as needed
        ];

        // Set session for users (already authenticated)
        $user = Auth::user();

        // Set success message to session
        session()->flash('success', "Welcome back, you accessed the converter view {$user->name}!");

        // Retrieve the current value of the cookie
        $currentValue = request()->cookie('accessed_converter');

        // If the current value is not set, initialize it to 1
        if (!is_numeric($currentValue)) {
            $currentValue = 1;
        } else {
            // Convert the current value to an integer and increment it
            $currentValue = intval($currentValue) + 1;
        }

        // Create a cookie with the updated value
        $cookie = Cookie::make('accessed_converter', $currentValue, 60); // Expires in 60 minutes

        return response()->view('converter', $data)->withCookie($cookie);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

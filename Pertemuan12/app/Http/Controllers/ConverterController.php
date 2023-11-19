<?php

namespace App\Http\Controllers;

use App\Models\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConverterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function database()
    {
        $data['title'] = 'Currency Converter';
        $data['currencies'] = [
            'IDR' => 'Indonesia Rupiah',
            'USD' => 'United States Dollar',
            'EUR' => 'Euro Member Countries',
            'GBP' => 'United Kingdom Pound',
            // Add more currencies as needed
        ];

        // set session for users
        $user = Auth::user();

        // set success to session
        session()->flash('success', "Welcome back, you access converter view {$user->name}!");

        // set tracking to cookie for 1 minute
        cookie('converter view', true, 1);

        return view('converter', $data);
    }

    public function index()
    {
        $data['title'] = 'Converter';
        // pagination
        $data['converters'] = Converter::paginate(5);

        return view('home', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Add Currency Converter';
        return view('add-converter', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'from_currency' => 'required',
            'from_currency_description' => 'required',
            'to_currency' => 'required',
            'to_currency_description' => 'required',
            'conversion_rate' => 'required|numeric',
        ]);

        $data = $request->all();

        Converter::create($data);
        // set success to session
        session()->flash('success', "Converter created successfully");

        return redirect()->route('converter.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = 'Edit Currency Converter';
        $data['converter'] = Converter::find($id);

        if (!$data['converter']) {
            abort(404);
        }

        return view('edit-converter', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'from_currency' => 'required',
            'from_currency_description' => 'required',
            'to_currency' => 'required',
            'to_currency_description' => 'required',
            'conversion_rate' => 'required|numeric',
        ]);

        $data = $request->all();

        $converter = Converter::find($id);

        if (!$converter) {
            abort(404);
        }

        $converter->update($data);

        // set success to session
        session()->flash('success', "Converter updated successfully");

        return redirect()->route('converter.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $converter = Converter::find($id);

        if (!$converter) {
            abort(404);
        }

        $converter->delete($id);

        // set success to session
        session()->flash('success', "Converter deleted successfully");

        return redirect()->route('converter.index');
    }
}

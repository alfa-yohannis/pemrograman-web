<?php

namespace Database\Seeders;

use App\Models\Converter;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConverterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $conversionData = [
        //     ['from_currency' => 'USD', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'EUR', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 0.89],
        //     ['from_currency' => 'USD', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'GBP', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.77],
        //     ['from_currency' => 'EUR', 'to_currency' => 'GBP', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.87],
        //     ['from_currency' => 'EUR', 'to_currency' => 'USD', 'conversion_rate' => 1.12],
        //     ['from_currency' => 'GBP', 'to_currency' => 'USD', 'conversion_rate' => 1.29],
        //     ['from_currency' => 'GBP', 'to_currency' => 'EUR', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 1.15],
        //     ['from_currency' => 'IDR', 'to_currency' => 'USD', 'conversion_rate' => 0.000067],
        //     ['from_currency' => 'IDR', 'to_currency' => 'EUR', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 0.000059],
        //     ['from_currency' => 'IDR', 'to_currency' => 'GBP', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.000052],
        //     ['from_currency' => 'USD', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'IDR', 'conversion_rate' => 14990],
        //     ['from_currency' => 'EUR', 'to_currency' => 'IDR', 'conversion_rate' => 16818.78],
        //     ['from_currency' => 'GBP', 'to_currency' => 'IDR', 'conversion_rate' => 119352.09],
        //     // Add more conversion rates as needed
        // ];

        // foreach ($conversionData as $data) {
        //     Converter::create($data);
        // }
    }
}

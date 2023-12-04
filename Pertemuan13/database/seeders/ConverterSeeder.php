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
        $conversionData = [
            ['from_currency' => 'USD', 'from_currency_symbol' => '$', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'EUR', 'to_currency_symbol' => '€', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 0.89],
            ['from_currency' => 'USD', 'from_currency_symbol' => '$', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'GBP', 'to_currency_symbol' => '£', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.77],
            ['from_currency' => 'EUR', 'from_currency_symbol' => '€', 'from_currency_description' => 'Euro Member Countries', 'to_currency' => 'GBP', 'to_currency_symbol' => '£', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.87],
            ['from_currency' => 'EUR', 'from_currency_symbol' => '€', 'from_currency_description' => 'Euro Member Countries', 'to_currency' => 'USD', 'to_currency_symbol' => '$', 'to_currency_description' => 'United States Dollar', 'conversion_rate' => 1.12],
            ['from_currency' => 'GBP', 'from_currency_symbol' => '£', 'from_currency_description' => 'United Kingdom Pound', 'to_currency' => 'USD', 'to_currency_symbol' => '$', 'to_currency_description' => 'United States Dollar', 'conversion_rate' => 1.29],
            ['from_currency' => 'GBP', 'from_currency_symbol' => '£', 'from_currency_description' => 'United Kingdom Pound', 'to_currency' => 'EUR', 'to_currency_symbol' => '€', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 1.15],
            ['from_currency' => 'IDR', 'from_currency_symbol' => 'Rp', 'from_currency_description' => 'Indonesia Rupiah', 'to_currency' => 'USD', 'to_currency_symbol' => '$', 'to_currency_description' => 'United States Dollar', 'conversion_rate' => 0.000067],
            ['from_currency' => 'IDR', 'from_currency_symbol' => 'Rp', 'from_currency_description' => 'Indonesia Rupiah', 'to_currency' => 'EUR', 'to_currency_symbol' => '€', 'to_currency_description' => 'Euro Member Countries', 'conversion_rate' => 0.000059],
            ['from_currency' => 'IDR', 'from_currency_symbol' => 'Rp', 'from_currency_description' => 'Indonesia Rupiah', 'to_currency' => 'GBP', 'to_currency_symbol' => '£', 'to_currency_description' => 'United Kingdom Pound', 'conversion_rate' => 0.000052],
            ['from_currency' => 'USD', 'from_currency_symbol' => '$', 'from_currency_description' => 'United States Dollar', 'to_currency' => 'IDR', 'to_currency_symbol' => 'Rp', 'to_currency_description' => 'Indonesia Rupiah', 'conversion_rate' => 14990],
            ['from_currency' => 'EUR', 'from_currency_symbol' => '€', 'from_currency_description' => 'Euro Member Countries', 'to_currency' => 'IDR', 'to_currency_symbol' => 'Rp', 'to_currency_description' => 'Indonesia Rupiah', 'conversion_rate' => 16818.78],
            ['from_currency' => 'GBP', 'from_currency_symbol' => '£', 'from_currency_description' => 'United Kingdom Pound', 'to_currency' => 'IDR', 'to_currency_symbol' => 'Rp', 'to_currency_description' => 'Indonesia Rupiah', 'conversion_rate' => 119352.09],
        ];

        Converter::insert($conversionData);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Converter extends Model
{
    protected $table = 'converter';
    public $timestamps = false;
    protected $fillable = ['from_currency', 'from_currency_description', 'from_currency_symbol', 'to_currency', 'to_currency_description', 'to_currency_symbol', 'conversion_rate'];
    use HasFactory;
}

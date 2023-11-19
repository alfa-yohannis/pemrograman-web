<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Converter extends Model
{
    protected $table = 'converter';
    public $timestamps = false;
    protected $fillable = ['from_currency', 'from_currency_description', 'to_currency', 'to_currency_description', 'conversion_rate'];
    use HasFactory;
}

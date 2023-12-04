<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('converter', function (Blueprint $table) {
            $table->id();
            $table->string('from_currency', 100);
            $table->string('from_currency_description', 100);
            $table->string('to_currency', 100);
            $table->string('to_currency_description', 100);
            $table->decimal('conversion_rate', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('converter');
    }
};

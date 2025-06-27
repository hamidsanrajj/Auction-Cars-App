<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Car; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
            Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('img5');
            $table->string('img6');
            $table->string('name');
            $table->string('location');
            $table->string('lot_number');
            $table->string('vin');
            $table->string('odometer');
            $table->string('retail_val');
            $table->string('cylinders');
            $table->string('bodyStyle');
            $table->string('color');
            $table->string('engine_type');
            $table->string('transmission');
            $table->string('vehicle_type');
            $table->string('fuel');
            $table->string('keys');
            $table->string('highlight');
            $table->string('primary_damage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

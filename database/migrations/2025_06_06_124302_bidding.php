<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Bidding; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
            Schema::create('biddings', function (Blueprint $table) {
            $table->id();
            $table->string('car_id');
            $table->string('bidder_name');
            $table->string('bidder_email');
            $table->string('bidder_phone');
            $table->string('bidder_city');
            $table->string('bidder_country');
            $table->string('bid_car_name');
            $table->string('lot_number');
            $table->string('location');
            $table->string('bid_amount');
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

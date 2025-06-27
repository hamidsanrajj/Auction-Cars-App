<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'car_id',
        'bidder_name',
        'bidder_email',
        'bidder_phone',
        'bidder_city',
        'bidder_country',
        'bid_car_name',
        'lot_number',
        'location',
        'bid_amount',
    ];
}

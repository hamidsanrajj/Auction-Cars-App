<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
        'name',
        'location',
        'lot_number',
        'vin',
        'odometer',
        'retail_Val',
        'cylinders',
        'bodyStyle',
        'color',
        'engine_type',
        'transmission',
        'vehicle_type',
        'fuel',
        'keys',
        'highlight',
        'primary_damage',
    ];
}

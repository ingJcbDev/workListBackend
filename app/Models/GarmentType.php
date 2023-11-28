<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarmentType extends Model
{
    use HasFactory;

    protected $table = 'garment_types';
    protected $primaryKey = 'garment_type_id';
}

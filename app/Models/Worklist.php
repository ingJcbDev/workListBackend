<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worklist extends Model
{
    use HasFactory;

    protected $table = 'worklist';
    protected $primaryKey = 'worklist_id';    
}

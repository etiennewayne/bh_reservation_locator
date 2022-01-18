<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedRoom extends Model
{
    use HasFactory;

    protected $table = 'bedrooms';
    protected $primaryKey = 'bedroom_id';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedSpace extends Model
{
    use HasFactory;

    protected $table = 'bedspaces';
    protected $primaryKey = 'bedspace_id';
}

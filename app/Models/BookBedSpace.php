<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBedSpace extends Model
{
    use HasFactory;

    protected $table = 'book_bedspaces';
    protected $primaryKey = 'book_bedspace_id';
}

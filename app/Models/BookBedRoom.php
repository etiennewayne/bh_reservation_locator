<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBedRoom extends Model
{
    use HasFactory;

    protected $table = 'book_bedrooms';
    protected $primaryKey = 'book_bedroom_id';
}

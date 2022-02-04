<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'payment_id';


    protected $fillable = ['book_bedspace_id', 'payment_qr_ref', 'payment_price', 'payment_date'];




}

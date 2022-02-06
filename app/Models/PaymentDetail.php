<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;


    protected $table = 'payment_details';
    protected $primaryKey = 'payment_detail_id';

    protected $fillable = ['boarder_id', 'payment_to_pay', 'date_pay', 'payment_status', 'proof_transaction'];
}

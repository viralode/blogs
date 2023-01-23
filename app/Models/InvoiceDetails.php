<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetails extends Model
{
    use HasFactory;
    protected $table = 'invoice_details';
    protected $fillable = [
        'id','invoice_data_id','product_id','qty','total','created_at','updated_at'
    ];
}

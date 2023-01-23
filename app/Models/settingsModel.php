<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class settingsModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    
    protected $fillable = [
        'id','text','disscount','shipping','company_address','company_name','company_email','company_phone','company_mobile','logo','d_logo','d_title','footer_text','created_at','updated_at'
    ];
}

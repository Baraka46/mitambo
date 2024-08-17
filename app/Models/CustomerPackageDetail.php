<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPackageDetail extends Model
{
    use HasFactory;
    protected $fillable=[
        'customer_name', 'shipping_number', 's', 'm', 'contact'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godown_package extends Model
{
    use HasFactory;

         protected $fillable=[
'tracking_id','godown','section','row', 'position','status'
         ];
}

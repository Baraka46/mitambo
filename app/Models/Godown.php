<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Godown extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'section_id'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}

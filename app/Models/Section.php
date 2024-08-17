<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'godown_id'];

    public function godown()
    {
        return $this->belongsTo(Godown::class);
    }

    public function row()
    {
        return $this->hasMany(Row::class);
    }
}

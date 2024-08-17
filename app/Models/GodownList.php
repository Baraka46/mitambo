<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GodownList extends Model
{
    use HasFactory;
    protected $table = 'godown_list';
    protected $fillable = ['godown', 'section', 'row'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LovCategory extends Model
{
    // LIST OF VALUE CATEGORIES
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'remarks',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    protected $table = "travel";

    protected $fillable = [
        'name', 'slug', 'country', 'address', 'description', 'thumbnail'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Plano
class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    protected $fillable = ['name', 'url', 'price', 'description'];
}

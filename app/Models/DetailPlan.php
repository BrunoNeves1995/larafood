<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPlan extends Model
{
    use HasFactory;

    protected $table = 'details_plan';
    protected $fillable = ['name'];

    public function plan() : BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
}

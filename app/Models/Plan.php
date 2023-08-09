<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

// Plano
class Plan extends Model
{
    use HasFactory;
    protected $table = 'plans';
    protected $fillable = ['name', 'url', 'price', 'description'];

    public function details() : HasMany
    {
        return $this->hasMany(DetailPlan::class);
    }

    public function profiles() : HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function search($filters = null)
    {   
        $results = $this->where('name', 'like', "%{$filters}%")
            ->orWhere('description', 'like', "%{$filters}%")
            ->paginate(1);
        
        return $results;
    }
}

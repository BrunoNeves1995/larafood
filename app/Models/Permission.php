<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'description'];

    public function search($filters = null)
    {   
        $results = $this->where('name', 'like', "%{$filters}%")
            ->orWhere('description', 'like', "%{$filters}%")
            ->paginate(1);
        
        return $results;
    }
}

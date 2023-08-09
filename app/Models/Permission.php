<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $fillable = ['name', 'description'];

    /** 
     * Get Profiles
    */
    public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }

    public function filterProfilesAvailableSearch($filter = null, $idPermission)
    {
        $profiles = Profile::whereIn('id', function($query) use ($idPermission) {
            $query->select("profile_id");
            $query->from("permission_profile");
            $query->whereRaw("permission_id = {$idPermission}");
        })
        // filter
        ->where(function($queryFilter) use ($filter){
                if ($filter) {
                    $queryFilter->where('name', 'like', "%{$filter}%");
                    $queryFilter->orWhere('description', 'like', "%{$filter}%");
                }
            })
            ->paginate();
        return $profiles;
    }

    public function search($filters = null)
    {   
        $results = $this->where('name', 'like', "%{$filters}%")
            ->orWhere('description', 'like', "%{$filters}%")
            ->paginate(1);
        
        return $results;
    }
}

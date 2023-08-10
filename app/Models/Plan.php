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

    public function profiles() 
    {
        return $this->belongsToMany(Profile::class);
    }
    /** 
    * Get plan not linked with this profile
    */
    public function plansNotLinkedProfile($idProfile, $filter = null)
    {
        $permissions = $this->whereNotIn('id', function($query) use ($idProfile) {
            $query->select("plan_id");
            $query->from("plan_profile");
            $query->whereRaw("profile_id = {$idProfile}");
        })
        // filter
        ->where(function($queryFilter) use ($filter){
                if ($filter) {
                    $queryFilter->where('name', 'like', "%{$filter}%");
                    $queryFilter->orWhere('description', 'like', "%{$filter}%");
                }
            })
            ->paginate();
        return $permissions;
    }

    /** 
    * Get plan linked with this profile
    */
    public function filterPlansAvailableSearch($idPlan, $filter = null)
    {   
        if ($filter) {
            echo 'filtro';
            $profiles = Profile::whereIn('id', function($query) use ($idPlan) {
                $query->select("profile_id");
                $query->from("plan_profile");
                $query->whereRaw("plan_id = {$idPlan}");
            })
            // filter
            ->where(function($queryFilter) use ($filter){
                    $queryFilter->where('name', 'like', "%{$filter}%");
                })
                ->paginate(4);
        } else {
            echo ' sem filtro';
            $profiles = Profile::whereIn('id', function($query) use ($idPlan) {
                $query->select("profile_id");
                $query->from("plan_profile");
                $query->whereRaw("plan_id = {$idPlan}");
            })
            // filter
            ->where(function($queryFilter) use ($filter){
                $queryFilter->where('name', 'like', "%{$filter}%");
                $queryFilter->orWhere('description', 'like', "%{$filter}%");
                
            })
            ->paginate();
        }
        
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

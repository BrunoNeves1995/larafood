<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $fillable = ['name', 'description'];

    /** 
    * Get Permissions
    */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function plans()
    {
        return $this->belongsToMany(Plan::class);
    }

    /** 
    * Get Permissions not linked with this profile
    */
    public function permissionsNotLinkedProfile($idProfile, $filter = null)
    {
        $permissions = Permission::whereNotIn('id', function($query) use ($idProfile) {
            $query->select("permission_id");
            $query->from("permission_profile");
            $query->whereRaw("profile_id = {$idProfile}");
        })
        // // filter
        // ->where(function($queryFilter) use ($filter){
        //         if ($filter) {
        //             $queryFilter->where('name', 'like', "%{$filter}%");
        //             $queryFilter->orWhere('description', 'like', "%{$filter}%");
        //         }
        //     })
            ->paginate();
        return $permissions;
    }

    public function search($filters = null)
    {   
        $results = $this->where('name', 'like', "%{$filters}%")
            ->orWhere('description', 'like', "%{$filters}%")
            ->paginate(1);
        
        return $results;
    }

    public function filterPermissionsAvailableSearch($idProfile, $filter = null)
    {
        $permissions = Permission::whereNotIn('id', function($query) use ($idProfile) {
            $query->select("permission_id");
            $query->from("permission_profile");
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
}

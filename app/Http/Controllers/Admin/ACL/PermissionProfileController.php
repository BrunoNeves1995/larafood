<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Profile;
use Illuminate\Http\Request;

class PermissionProfileController extends Controller
{   
    private $repositoryProfile, $repositoryPermission;
    public function __construct(Profile $profile, Permission $permission)
    {
        $this->repositoryProfile = $profile;
        $this->repositoryPermission = $permission;
    }


    /** 
     * Lists the permissions of one profile 
    */
    public function permissions(int|string $idProfile)
    {   
        $profile = $this->repositoryProfile->find($idProfile);

        if (!$profile) {
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.permission', compact('profile', 'permissions'));
    }

    /** 
     * get the permissions availables of the profiles
    */
    public function permissionsAvailable(Request $request, int|string $idProfile)
    {
        if (!$profile = $this->repositoryProfile->find($idProfile)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $this->repositoryProfile->permissionsNotLinkedProfile($idProfile, $request->filter);


        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }

    public function addProfilePermission(Request $request, int|string $idProfile)
    {
        if (!$profile = $this->repositoryProfile->find($idProfile)) {
            return redirect()->back();
        }

        if (!$request->permissions || count($request->permissions) === 0) {
            return redirect()->back()->with('info', 'É preciso selecionar pelo menos uma permissão');
        }
        // add N x N
        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions.index', $profile->id);
    }

    public function detachProfilePermission(int|string $idProfile, int|string $idPermission) 
    {   
        $profile = $this->repositoryProfile->find($idProfile);
        $permission = $this->repositoryPermission->find($idPermission);

        if (!$profile || !$permission) {
            return redirect()->back();
        }

        $profile->permissions()->detach([$profile->id,$permission->id]);

        return redirect()->route('profiles.permissions.index', $profile->id);
    }

    public function filterPermissionsAvailable(Request $request, int|string $idProfile)
    {   
        $profile = $this->repositoryProfile->find($idProfile);
        $filters = $request->except('_token');
        $permissions = $this->repositoryProfile->filterPermissionsAvailableSearch($idProfile, $request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }
}
